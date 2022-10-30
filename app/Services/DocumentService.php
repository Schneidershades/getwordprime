<?php

namespace App\Services;

use App\Models\Document;
use App\Models\DocumentParticipant;

class DocumentService
{
    public function createDocument($userId, $title, $public = true)
    {
        $document = auth('api')->user()->activeTeam->team->documents()->create([
            'title' => $title,
            'user_id' => $userId,
            'public' => $public,
        ]);

        (new AuditTrailService(auth('api')->user(), $document))->createDocumentLog($document);

        return $document;
    }

    public function userDocuments()
    {
        return auth('api')->user()
                ->activeTeam
                ->team->documents()->with('uploads', 'participants')
                ->withCount('participants', 'tools', 'uploads')
                ->latest()->get();
    }

    public function userDocumentsInShortDetails()
    {
        // $documentIds = auth('api')->user()->documentParticipants->pluck('document_id')->toArray();

        // return Document::whereIn('id', $documentIds)
        //         ->withCount('participants', 'tools', 'uploads')
        //         ->latest()->get();

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

    public function DocumentParticipantsById($id)
    {
        return Document::with('participants', 'user')->find($id);
    }

    public function userByDocumentIdAndEmail($email, $documentID)
    {
        return DocumentParticipant::where('email', $email)
                                    ->where('document_id', $documentID)
                                    ->first();
    }

    public function documentStatistics()
    {
        return [
            'New' => auth('api')->user()->activeTeam->team->newDocuments->count(),
            'Received' => Document::whereIn('id', auth('api')->user()->documentParticipants->where('who_added_id', '!=', auth('api')->user()->id)->pluck('document_id')->toArray())->count(),
            'Deleted' => auth('api')->user()->activeTeam->team->deletedDocuments->count(),
            'Completed' => auth('api')->user()->activeTeam->team->documents->where('status', 'Completed')->count(),
            'Sent' => auth('api')->user()->activeTeam->team->envelopsSent->where('status', 'Sent')->count(),
        ];
    }

    
}
