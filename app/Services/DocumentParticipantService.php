<?php

namespace App\Services;

use App\Services\AuditTrailService;

class DocumentParticipantService
{
    public function addParticipant($document, $participant, $user)
    {
        $documentParticipant = $document->participants()->create([
            'user_id' => $user->id,
            'who_added_id' => auth('api')->user()->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'phone' => $user->phone,
            'role' => $participant['role']
        ]);
        
        $document->touch();
        
        (new AuditTrailService(auth('api')->user(), $document))->participantAdded($documentParticipant);
    } 

    public function updateParticipant($document, $participant, $user)
    {
        $document->participants()->update([
            'user_id' => $user->id,
            'who_added_id' => auth('api')->user()->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'phone' => $user->phone,
            'role' => $participant['role']
        ]);

        $document->touch();
    } 

    public function returnUniqueParticipants($array, $property) 
    {
        $tempArray = array_unique(array_column($array, $property));
        $moreUniqueArray = array_values(array_intersect_key($array, $tempArray));
        return $moreUniqueArray;
    }

    public function checkHowManyTimeAParticipantEmailCounts($document, $user)
    {
        $document->participants->where('email', $user['email'])->count();
    }

    public function transferToolsToUserIfEmailRepeats($document, $user)
    {
        $tools = $document->tools->where('email', $user['email']);
    }

    public function deleteParticipantEmailIfAppearedMoreThanOnce($document, $user)
    {
        $document->participants->where('email', $user->email)->having('occurences', '>', 1)->get();
    }

    public function deleteDocumentParticipantIfAppearedMoreThanOnce($document, $user)
    {
        $document->participants->where('user_id', $user->id)->delete();
    }

    
}