<?php

namespace App\Exports\Admin;

use App\Models\FavoriteScript;
use Maatwebsite\Excel\Concerns\FromCollection;

class FavoriteScriptExport implements FromCollection
{
    public function collection()
    {
        return FavoriteScript::all();
    }
}
