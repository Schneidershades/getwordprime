<?php

namespace App\Services;

use App\Models\DocumentUpload;

class DocumentUploadService
{
    public function getAllSeals($user, DocumentUpload $documentUpload)
    {
        return $documentUpload->tools->where('type', 'Seal')->get();
    }

    public function getAllSignedSeals($user, DocumentUpload $documentUpload)
    {
        return $documentUpload->tools->where('type', 'Seal')->whereNotNull('append_print_id')->get();
    }

    public function countAllSeal($user, DocumentUpload $documentUpload)
    {
        return $this->getAllSeals($user, $documentUpload)->count();
    }

    public function countAllSignedSeal($user, DocumentUpload $documentUpload)
    {
        return $this->getAllSignedSeals($user, $documentUpload)->count();
    }
}
