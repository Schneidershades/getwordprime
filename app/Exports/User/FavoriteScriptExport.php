<?php

namespace App\Exports\User;

use App\Models\FavoriteScript;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FavoriteScriptExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    use Exportable;
    
    public function collection()
    {
        return FavoriteScript::where('id', request()->get('id'))->get();
    }

    public function map($response) : array
    {
        return [
            $response->script->name,
            $response->text,
        ];
    }

    public function headings(): array
    {
        return [
            'Script Type',
            'Text',
        ];
    }
}
