<?php

namespace App\Services;

use App\Models\Document;
use App\Models\DocumentUpload;
use App\Traits\Image\AwsS3;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use Spatie\PdfToImage\Pdf;

class DocumentEditService
{
    use AwsS3;

    public function collectAllRequest($request, $document, $status = null)
    {
        $pdfFiles = [];

        foreach ($request['files'] as $file) {
            $fileProperty = $this->fileStorage($file, $document);

            if ($fileProperty['type'] == 'pdf') {
                $pdfFiles[] = $fileProperty;
            }

            if ($fileProperty['type'] == 'vnd.openxmlformats-officedocument.wordprocessingml.document') {
                $pdfFiles[] = $this->matchFiles('vnd.openxmlformats-officedocument.wordprocessingml.document', $fileProperty, $document);
            }

            if ($fileProperty['type'] == 'jpg' || $fileProperty['type'] == 'jpeg' || $fileProperty['type'] == 'png') {
                $this->matchFiles($fileProperty['type'], $fileProperty, $document);
            }
        }

        $pdfCollection = collect($pdfFiles);

        $allPdfs = $pdfCollection->pluck('storage')->toArray();

        if (! empty($allPdfs)) {
            $datadir = $this->folderPath($document);

            File::ensureDirectoryExists($datadir, $mode = 0777, true);

            $outputName = $datadir.Str::slug(uniqid().$document->id).'.pdf';

            $filename = $datadir.$document->id;

            $cmd = 'gs -q -dNOPAUSE -dBATCH -sDEVICE=pdfwrite -sOutputFile='.$outputName.' '.implode(' ', $allPdfs);

            shell_exec($cmd);

            $this->convertPdfToPng($outputName, $filename, $document, $status);
        }
    }

    public function fileStorage($file, Document $document)
    {
        $folderPath = $this->folderPath($document);

        File::ensureDirectoryExists($folderPath, $mode = 0777, true);

        $image_parts = explode(';base64,', $file);

        $image_parts_ends = explode(',', $file);

        $image_type_aux = explode('/', mime_content_type($file))[0];

        $image_type = explode('/', mime_content_type($file))[1];

        $image_base64 = base64_decode($image_parts[1]);

        $filePath = $folderPath.uniqid().'.'.$image_type;

        file_put_contents($filePath, $image_base64);

        return [
            'type' => $image_type,
            'storage' => $filePath,
            'base64_file' => $file,
            'base64_type' => $image_parts_ends[0].',',
        ];
    }

    public function getFileExtensionBase64($file)
    {
        return $file ? explode('/', mime_content_type($file))[1] : null;
    }

    public function findFileExtension($file)
    {
        return $file ? $file->getClientOriginalExtension() : null;
    }

    public function matchFiles($extension, $file, Document $document)
    {
        return match ($extension) {
            'vnd.openxmlformats-officedocument.wordprocessingml.document' => $this->convertWordToPdf($file, $document),
            'pdf', 'jpg', 'jpeg', 'png' => $this->uploadDocument($file, $extension, $document),
        };
    }

    public function convertWordToPdf($file, Document $document)
    {
        /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        Settings::setPdfRendererPath($domPdfPath);
        Settings::setPdfRendererName('DomPDF');

        //Load word file
        $Content = IOFactory::load($file['storage']);

        //Save it into PDF
        $PDFWriter = IOFactory::createWriter($Content, 'PDF');

        File::ensureDirectoryExists($this->folderPath($document), 0777, true);

        $path = $this->folderPath($document).rand(100000, 9000000).'.pdf';

        $PDFWriter->save($path);

        return $this->fileStorage('data:application/pdf;base64,'.base64_encode(file_get_contents($path)), $document);
    }

    public function convertPdfToPng($outputName, $filename, $document, $status = null)
    {
        $outputFileType = 'png';

        $pdf = (new Pdf($outputName))->setOutputFormat($outputFileType);

        foreach (range(1, $pdf->getNumberOfPages()) as $pageNumber) {
            $path = $filename.$pageNumber.uniqid().".$outputFileType";

            $pdf->setPage($pageNumber)->saveImage($path);

            $fileProperty = $this->fileStorage(
                'data:image/'.$outputFileType.';base64,'.base64_encode(file_get_contents($path)),
                $document
            );

            $this->createUpload($fileProperty, $document, null, $status);
        }
    }

    public function uploadDocument($file, $document, $uploadType = null, $status = null)
    {
        $this->createUpload($file, $document, $uploadType, $status);
    }

    public function createUpload($file, $document, $uploadType = null, $status = null)
    {
        return DocumentUpload::create([
            'id' => Str::uuid()->toString(),
            'file' => $file['base64_file'],
            'file_url' => config('app.url').$file['storage'],
            'base64_type' => $file ? $file['base64_type'] : null,
            'type' => $file ? $file['type'] : null,
            'document_id' => $document->id,
            'user_id' => auth('api')->user()->id,
            'status' => $status ? strtoupper($status) : 'Processing',
        ]);
    }

    public function convertUrlPdfToPng($outputName, $filename, $document)
    {
        $item = $this->fileStorage('data:application/pdf;base64,'.base64_encode(file_get_contents($outputName)), $document);

        return $this->convertPdfToPng($item['storage'], $this->folderPath($document).$filename, $document);
    }

    public function convertUrlToFile($outputName, $filename, $document)
    {
        $item = $this->fileStorage('data:application/pdf;base64,'.base64_encode(file_get_contents($outputName)), $document);

        return $this->createUpload($item, $document);
    }

    public function storeRequestUploadFiles($request, $document)
    {
        foreach ($request['files'] as $file) {
            $fileProperty = $this->fileStorage($file, $document);

            $this->uploadDocument($fileProperty, $document, 'storage', $status = null);
        }
    }

    public function folderPath($model)
    {
        return config('upload.folder').'/'.strtolower(class_basename($model))."/$model->id/";
    }
}
