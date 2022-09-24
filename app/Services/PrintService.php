<?php

namespace App\Services;

use App\Models\AppendPrint;
use App\Traits\Api\ApiResponder;

class PrintService
{
    use ApiResponder;

    public function findIfSignatureExist($user, $request)
    {
        if ($request['type'] == 'Signature'
            || $request['type'] == 'NotaryStamp'
            || $request['type'] == 'NotaryDigitalSeal'
            || $request['type'] == 'NotaryTraditionalSeal'
            || $request['type'] == 'CompanyStamp'
            || $request['type'] == 'Initial'
            || $request['type'] == 'CompanySeal') {
            $print = AppendPrint::where('user_id', $user->id)
                        ->where('type', $request['type'])
                        ->where('category', $request['category'])
                        ->first();

            return $print ? $this->updatePrint($print, $request) : $this->storeNewPrint($user, $request);
        } elseif ($request['type'] == 'Photograph') {
            $print = AppendPrint::where('user_id', $user->id)->where('type', $request['type'])->get();

            $print->count() > 2 ? throw new \ErrorException('You have reached the maximum limit of photograph uploads') : null;

            return $this->storeNewPrint($user, $request);
        } else {
            $this->storeNewPrint($user, $request);
        }
    }

    public function storeNewPrint($user, $request)
    {
        $user->prints()->create($request->validated());
    }

    public function updatePrint($print, $request)
    {
        $print->update($request->validated());
    }

    public function createPrintTextFromResourceTool($data)
    {
        return AppendPrint::create([
            'user_id' => $data['user_id'],
            'type' => 'Text',
            'category' => 'Type',
            'value' => $data['value'] ? $data['value'] : null,
        ]);
    }

    public function updatePrintTextFromResourceTool($data)
    {
        $print = AppendPrint::find($data['append_print_id']);

        $print->update([
            'value' => $data['value'] ? $data['value'] : null,
        ]);

        return AppendPrint::find($data['append_print_id']);
    }

    public function allowOnlyNotaryToStoreTheirStampAndSeal($user, $request)
    {
        return $user->role != 'Notary' && $request['type'] == 'Stamp' && $request['type'] == 'Seal'
                ? $this->errorResponse('You are not autorized to access this activity', 409)
                : null;
    }
}
