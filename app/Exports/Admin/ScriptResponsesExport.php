<?php

namespace App\Exports\Admin;

use App\Models\ScriptResponse;
use Maatwebsite\Excel\Concerns\FromCollection;

class ScriptResponsesExport implements FromCollection
{
    public function collection()
    {
        return ScriptResponse::all();
    }
}
