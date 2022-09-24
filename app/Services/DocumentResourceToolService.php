<?php

namespace App\Services;

use App\Models\User;
use App\Models\Document;
use App\Models\DocumentResourceTool;
use App\Events\Document\SignerSigned;
use App\Events\Document\SigningCompleted;

class DocumentResourceToolService
{
    public function isOwnerDocument($user, Document $document)
    {
        return $document->user_id != $user->id ? false : true;
    }

    public function canDeleteTool($user, Document $document)
    {
        return $document->user_id != $user->id ? false : true;
    }

    public function canEditTool($user, Document $document)
    {
        return $document->user_id != $user->id ? false : true;
    }

    public function canCreateTool($user, Document $document)
    {
        return $document->user_id != $user->id ? false : true;
    }

    public function canFillInTool($user, DocumentResourceTool $resourceTool)
    {
        return $resourceTool->participants->where('user_id', $user->id)->first() ? true : false;
    }

    public function iAddedMyselfToDocument($user, Document $document)
    {
        return $document->user_id != $user->id ? false : true;
    }

    public function matchRights()
    {
        $message = match (false) {
            $this->isOwnerDocument => null,
            400 => 'not found',
            500 => 'server error',
            default => 'You dont have rights to this action',
        };
    }

    public function checkIfSignatureIsCompleted(Document $document)
    {
        if ($document->signedTools->count() == $document->unSignedTools->count());
        // $this->sendSignedCompletedMail($document);
    }

    public function checkIfToolIsSigned(DocumentResourceTool $documentResourceTool)
    {
        if ($documentResourceTool->append_print_id != '') {
            $this->sendSignerSignMail($documentResourceTool);
        }

        $documentResourceTool?->upload?->document ? $this->checkIfSignatureIsCompleted($documentResourceTool?->upload?->document) : null;
    }


    public function userTools(Document $document, User $user)
    {

    }

    public function userSignedTools(Document $document, User $user)
    {
        
    }

    public function userUnsignedTools(Document $document, User $user)
    {
        
    }

    public function sendSignedCompletedMail($detail)
    {
        event(new SigningCompleted($detail));
    }

    public function sendSignerSignMail($detail)
    {
        event(new SignerSigned($detail));
    }
}
