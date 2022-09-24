<?php

namespace App\Services;

use App\Models\Document;
use App\Models\DocumentParticipant;

class DocumentService
{
    public function createDocument($userId, $title, $public = true)
    {
        return auth('api')->user()->activeTeam->team->documents()->create([
            'title' => $title,
            'user_id' => $userId,
            'public' => $public,
        ]);
    }

    public function userDocuments()
    {
        return auth('api')->user()
                ->activeTeam
                // ->team->documents()->with('uploads', 'uploads.tools', 'uploads.tools.appendPrint', 'participants')
                ->team->documents()->with('uploads', 'participants')
                ->withCount('participants', 'tools', 'uploads')
                ->latest()->get();
    }

    public function userDocumentsInShortDetails()
    {
        return auth('api')->user()
                ->activeTeam
                ->team->documents()
                ->withCount('participants', 'tools', 'uploads')
                ->latest()->get();
    }

    public function userDocumentById($id)
    {
        return Document::with('uploads', 'participants')
                ->withCount('participants', 'tools', 'uploads')
                ->find($id);
    }

    public function DocumentPerticipantsById($id)
    {
        return Document::with('participants', 'user')
                ->find($id);
    }

    public function userByDocumentIdAndEmail($email, $documentID)
    {
        return DocumentParticipant::where('email', $email)
                                    ->where('document_id', $documentID)
                                    ->first();
    }
}
