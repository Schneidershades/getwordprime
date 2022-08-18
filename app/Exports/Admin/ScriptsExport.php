<?php

namespace App\Exports\Admin;

use App\Models\Script;
use Maatwebsite\Excel\Concerns\FromCollection;

class ScriptsExport implements FromCollection
{
    public function collection()
    {
        return Script::all();
    }
}
