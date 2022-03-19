<?php

namespace App\Http\Controllers\Api\ExportImport;

use App\Models\Script;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ExportController extends Controller
{
     /**
    * @OA\Get(
    *      path="/api/v1/export/excel/model?model={model}&id={model_id}&type={user_type}&export={export_model}",
    *      operationId="searchParts",
    *      tags={"Shared"},
    *      summary="searchParts",
    *      description="searchParts",
    *      @OA\Parameter(
    *          name="model",
    *          description="The defined model",
    *          required=false,
    *          in="path",
    *          @OA\Schema(
    *              type="string"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="model",
    *          description="The defined model id",
    *          required=false,
    *          in="path",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="user_type",
    *          description="User Type",
    *          required=true,
    *          in="path",
    *          @OA\Schema(
    *              type="string"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="export_model",
    *          description="Export model",
    *          required=true,
    *          in="path",
    *          @OA\Schema(
    *              type="string"
    *          )
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *      ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */
    
    public function export(Request $request)
    {
        if($request->query('export') == null){
            return $this->errorResponse('no export model was selected from frontend', 409);
        }

        if($request->query('type') == null){
            return $this->errorResponse('no user type was selected from frontend', 409);
        }

        $fileName = sprintf('%s_export_%s.xlsx', strtolower($request->query('model')), now()->format('Ymd_Hi'));
        
        $namespace =  "\App\Exports\\" . $request->query('type') . '\\'.  $request->query('export');

        return (new $namespace)->download($fileName);
    }

     /**
    * @OA\Get(
    *      path="/api/v1/export/text/script/{id}",
    *      operationId="searchParts",
    *      tags={"Shared"},
    *      summary="searchParts",
    *      description="searchParts",
    *      @OA\Parameter(
    *          name="id",
    *          description="The defined script id",
    *          required=false,
    *          in="path",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *      ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */

    public function downloadScript($id)
    {
        $script = Script::where('id', $id)->first();

	    $data = $script->text;

        $fileName = $script->scriptType?->name .'_'.$script->id ."_script.txt";

        $headers = [
            'Content-type' => 'text/plain', 
            'Content-Disposition' => sprintf('attachment; filename="%s"', $fileName),
            'Content-Length' => strlen($data)
        ];   
        return Response::make($data, 200, $headers);
	  
	}
}
