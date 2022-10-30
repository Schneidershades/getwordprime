<?php

namespace App\Services;

use App\Models\User;
use App\Models\Document;
use App\Models\Transaction;
use App\Models\ScheduleSession;
use App\Models\DocumentParticipant;
use App\Models\DocumentResourceTool;

class AuditTrailService
{
    public function __construct(public User $user, public Document $document)
    {
    }

    public function audit($model, $log)
    {
        activity()->causedBy($this->user)->performedOn($model)->log($log);
    }

    public function createDocumentLog(Document $document)
    {
        activity()->causedBy($this->user)->performedOn($this->document)->log("{$this->user->name} created {$document->title} document");
    }

    public function participantAdded(DocumentParticipant $participant)
    {
        activity()->causedBy($this->user)->performedOn($this->document)->log("{$this->user->name} was added as a {$participant->role} document");
    }

    public function participantRemoved(DocumentParticipant $participant)
    {
        activity()->causedBy($this->user)->performedOn($this->document)->log("{$this->user->name} was removed as a {$participant->role} document");
    }

    public function annotationAdded(DocumentResourceTool $tool)
    {
        activity()->causedBy($this->user)->performedOn($this->document)->log("{$this->user->name} added a {$tool->tool_name} tool annotation");
    }

    public function annotationRemoved(DocumentResourceTool $tool)
    {
        activity()->causedBy($this->user)->performedOn($this->document)->log("{$this->user->name} removed a { $tool->tool_name } tool annotation");
    }

    public function documentAnnotationSigned(DocumentResourceTool $tool)
    {
        activity()->causedBy($this->user)->performedOn($this->document)->log("{$this->user->name} was signed {$tool->tool_name} tool");
    }

    public function scheduleNotarySessionCreatedLog(ScheduleSession $scheduleSession)
    {
        activity()->causedBy($this->user)->performedOn($this->document)->log("{$this->user->name} created a notary session");
    }

    public function scheduleNotarySessionStatusLog(ScheduleSession $scheduleSession)
    {
        activity()->causedBy($this->user)->performedOn($this->document)->log("{$this->user->name} {$scheduleSession->status} the notary session");
    }

    public function paymentLog(Transaction $transaction)
    {
        activity()->causedBy($this->user)->performedOn($this->document)->log("{$this->user->name} paid for {$transaction->title}");
    }
}
