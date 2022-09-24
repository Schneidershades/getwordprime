<?php

namespace App\Services;

use App\Models\Document;
use Spatie\PdfToImage\Pdf;
use App\Traits\Image\AwsS3;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Str;
use App\Models\DocumentUpload;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Lukaswhite\DocumentConverter\Converter;
use NcJoes\OfficeConverter\OfficeConverter;

class DocumentConversionService
{
    use AwsS3;

    public function collectAllRequest($request, Document $document, $status = null)
    {
        $pdfFiles = [];

        $imageFiles = [];

        foreach ($request['files'] as $file) {
            $fileProperty = $this->fileStorage($file, $document);

            if ($fileProperty['type'] == 'pdf') {
                $pdfFiles[] = $fileProperty;
            }

            if ($fileProperty['type'] == 'vnd.openxmlformats-officedocument.wordprocessingml.document') {
                $pdfFiles[] = $this->matchFiles('vnd.openxmlformats-officedocument.wordprocessingml.document', $fileProperty, $document);
            }

            if ($fileProperty['type'] == 'jpg' || $fileProperty['type'] == 'jpeg' || $fileProperty['type'] == 'png') {
                $imageFiles[] = $fileProperty;
            }
        }

        $pdfCollection = collect($pdfFiles);

        $imageCollection = $imageFiles != [] ? collect([$this->mergeAllImagesToPdf($imageFiles, $document)]) : collect([]);

        $allImages = $imageCollection->pluck('storage')->toArray();

        $allPdfs = $pdfCollection->pluck('storage')->toArray();

        $allPdfMerged = array_merge($allPdfs, $allImages);

        if (! empty($allPdfMerged)) {
            $datadir = $this->folderPath($document);

            $this->makeDirectory($datadir);

            $outputName = "$datadir".Str::slug(uniqid()).'.pdf';

            $cmd = 'gs -q -dNOPAUSE -dBATCH -sDEVICE=pdfwrite -sOutputFile='.$outputName.' '.implode(' ', $allPdfMerged);

            shell_exec($cmd);

            $file = [
                'type' => 'pdf',
                'storage' => $outputName,
                'base64_file' => null,
                'base64_type' => null,
            ];

            $this->createUpload($file, $document, null, null);
        }
    }

    public function fileStorage($file, Document $document)
    {
        $folderPath = $this->folderPath($document);

        $this->makeDirectory($folderPath);

        $image_parts = explode(';base64,', $file);

        $image_parts_ends = explode(',', $file);

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
            'vnd.openxmlformats-officedocument.wordprocessingml.document' => $this->convertWordToPdfViaLibreOffice($file, $document),
            'pdf', 'jpg', 'jpeg', 'png' => $this->uploadDocument($file, $document),
        };
    }

    public function convertWordToPdfViaLibreOffice($file, Document $document)
    {
        $filename = rand(100000, 9000000);

        $dir = config('upload.folder').'/'.strtolower(class_basename($document))."/$document->id/";

        $path = $dir.$filename.'.pdf';

        $converter = new Converter($file['storage']);

        $time = $converter->outputAs($filename)->outputTo($dir)->toPDF();

        return $this->fileStorage('data:application/pdf;base64,'.base64_encode(file_get_contents($path)), $document);
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

        $dir = $this->folderPath($document);

        $this->makeDirectory($dir);

        $path = $dir.rand(100000, 9000000).'.pdf';

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

    public function createUpload($file, Document $document, $uploadType = null, $status = null)
    {
        $url = $file['storage'] ? $this->storeImage($file['storage']) : null;

        return DocumentUpload::create([
            'id' => Str::uuid()->toString(),
            'file_url' => $url ? $url : null,
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

    public function storeTemplatePdf($outputName, $document)
    {
        $file = [
            'type' => 'pdf',
            'storage' => $outputName,
            'base64_file' => null,
            'base64_type' => null,
        ];

        return $this->createUpload($file, $document, null, null);
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

    public function mergeAllImagesToPdf($files, $document)
    {
        $pdf = new Fpdf;

        foreach ($files as $file) {
            $pdf->AddPage();
            $pdf->Image($file['storage'], 0, 0);
        }

        $path = $this->folderPath($document).rand(100000, 9000000).'.pdf';

        $pdf->Output($path, 'F');

        return [
            'type' => 'pdf',
            'storage' => $path,
            'base64_file' => null,
            'base64_type' => null,
        ];
    }

    public function makeDirectory($file)
    {
        return File::ensureDirectoryExists(($file), 0777, true);
    }
}
