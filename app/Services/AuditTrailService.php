<?php

namespace App\Services;

class AuditTrailService
{
    public function audit($model, $log)
    {
        activity()->causedBy(auth('api')->user())->performedOn($model)->log($log);
    }
}
