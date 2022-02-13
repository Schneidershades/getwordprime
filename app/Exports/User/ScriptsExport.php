<?php

namespace App\Exports\User;

use App\Models\Script;
use Maatwebsite\Excel\Concerns\FromCollection;

class ScriptsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Script::all();
    }
}
