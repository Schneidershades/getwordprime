<?php

namespace App\Services;

use App\Models\Document;
use App\Traits\Image\AwsS3;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use Spatie\PdfToImage\Pdf;

class DocumentEditFromFileURL
{
    use AwsS3;

    public function collectAllRequest($request, $document)
    {
        $pdfFiles = [];
        $wordFiles = [];
        $convertedWordFilesToPdf = [];

        foreach ($request['files'] as $file) {
            $item = $this->fileStorage($file, $document);

            if ($item['type'] == 'pdf') {
                $pdfFiles[] = $item['storage'];
            }

            if ($item['type'] == 'docx' || $item['type'] == 'doc' || $item['type'] == 'vnd.openxmlformats-officedocument.wordprocessingml.document') {
                $wordFiles[] = $item['storage'];
            }

            if ($item['type'] == 'jpg' || $item['type'] == 'jpeg' || $item['type'] == 'png') {
                $this->matchFiles($item['type'], $item['storage'], $document);
            }
        }

        foreach ($wordFiles as $wordFile) {
            $convertedWordFilesToPdf[] = $this->matchFiles('docx', $wordFile, $document);
        }

        $allPdfs = $this->mergingItems($pdfFiles, $convertedWordFilesToPdf);

        if (! empty($allPdfs)) {
            $datadir = "uploads/documents/$document->id/";
            File::ensureDirectoryExists($datadir, $mode = 0777, true);
            $outputName = $datadir.Str::slug(uniqid().$request['title']).'.pdf';
            $filename = $datadir.$request['title'];

            $cmd = 'gs -q -dNOPAUSE -dBATCH -sDEVICE=pdfwrite -sOutputFile='.$outputName.' '.implode(' ', $allPdfs);
            shell_exec($cmd);

            $this->convertPdfToPng($outputName, $filename, $document);
        }
    }

    public function mergingItems($a, $b)
    {
        return array_merge($a, $b);
    }

    public function fileStorage($file, Document $document)
    {
        $img = $file;
        $folderPath = "uploads/documents/$document->id/";
        File::ensureDirectoryExists("uploads/documents/$document->id/", $mode = 0777, true);
        $image_parts = explode(';base64,', $img);
        $image_type_aux = explode('/', mime_content_type($file))[0];
        $image_type = explode('/', mime_content_type($file))[1];
        $image_base64 = base64_decode($image_parts[1]);
        $uniqid = uniqid();
        $file = $folderPath.$uniqid.'.'.$image_type;
        file_put_contents($file, $image_base64);

        return [
            'type' => $image_type,
            'storage' => $file,
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
            'docx','doc' => $this->convertWordToPdf($file, $document),
            'pdf' => $this->uploadDocument($file, 'pdf', $document),
            'jpg' => $this->uploadDocument($file, 'jpg', $document),
            'jpeg' => $this->uploadDocument($file, 'jpeg', $document),
            'png' => $this->uploadDocument($file, 'png', $document),
        };
    }

    public function convertWordToPdf($file, Document $document)
    {
        /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        Settings::setPdfRendererPath($domPdfPath);
        Settings::setPdfRendererName('DomPDF');

        //Load word file
        $Content = IOFactory::load($file);

        //Save it into PDF
        $PDFWriter = IOFactory::createWriter($Content, 'PDF');

        File::ensureDirectoryExists("uploads/documents/$document->id/", $mode = 0777, true);

        $path = "uploads/documents/$document->id/".rand(100000, 9000000).'.pdf';

        $PDFWriter->save($path);

        return $path;
    }

    public function convertPdfToPng($outputName, $filename, $document)
    {
        $pdf = new Pdf($outputName);

        foreach (range(1, $pdf->getNumberOfPages()) as $pageNumber) {
            $path = $filename.$pageNumber.uniqid().'.png';
            $pdf->setPage($pageNumber)->saveImage($path);

            $urlPath = $this->storeImage($path);

            $this->createUpload($urlPath, 'png', $document);
        }
    }

    public function uploadDocument($file, $extension, Document $document)
    {
        $url = $this->storeImage($file);

        $this->createUpload($url, $extension, $document);
    }

    public function createUpload($path, $extension, Document $document)
    {
        auth('api')->user()->documentUploads()->create([
            'file' => $path ? $path : null,
            'type' => $extension ? $extension : null,
            'parent_id' => null,
            'document_id' => $document->id,
            'status' => 'Processing',
        ]);
    }

    public function convertUrlPdfToPng($outputName, $filename, $document)
    {
        $item = $this->fileStorage('data:application/pdf;base64,'.base64_encode(file_get_contents($outputName)), $document);

        return $this->convertPdfToPng($item['storage'], "uploads/documents/$document->id/".$filename, $document);
    }

    public function storeRequestUploadFiles($request, $document)
    {
        foreach ($request['files'] as $file) {
            $item = $this->fileStorage($file, $document);

            $this->uploadDocument($item['storage'], $item['type'], $document);
        }
    }
}
