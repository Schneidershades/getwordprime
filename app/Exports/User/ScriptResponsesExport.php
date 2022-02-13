<?php

namespace App\Exports\User;

use App\Models\ScriptResponse;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ScriptResponsesExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return auth()->user()->scriptResponses;
        // return ScriptResponse::where();
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
