<?php

namespace App\Http\Controllers\Api\Admin;

Use Image;
use App\Models\Media;
use App\Models\ScriptType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ScriptTypeCreateFormRequest;
use App\Http\Requests\Admin\ScriptTypeUpdateFormRequest;

class ScriptTypeController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/admin/script-type",
    *      operationId="allScriptTypes",
    *      tags={"Admin"},
    *      summary="Get Script-type",
    *      description="Get script-type",
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
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
    public function index()
    {
        return $this->showAll(ScriptType::latest()->get());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/admin/script-type",
    *      operationId="postScriptType",
    *      tags={"Admin"},
    *      summary="Post script type",
    *      description="Post script type",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ScriptTypeCreateFormRequest")
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
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
    public function store(ScriptTypeCreateFormRequest $request)
    {
        $model = ScriptType::create([
            'name' => $request['name'],
            'prompt_1' => $request['prompt_1'],
            'prompt_2' => $request['prompt_2'],
            'description' => $request['description'],
            'presence_penalty' => $request['presence_penalty'],
            'frequency_penalty' => $request['frequency_penalty'],
            'best_of' => $request['best_of'],
            'stream' => $request['stream'],
            'documents' => $request['documents'],
            'query' => $request['query'],
            'max_tokens' => $request['max_tokens'],
            'temperature' => $request['temperature'],
            'top_p' => $request['top_p'],
            'engine' => $request['engine'],
        ]);

        if($request['script_type_presets']){
            foreach($request['script_type_presets'] as $preset){
                $model->presets()->create($preset);
            }
        }

        if($request->has('icon')){

            $image = $request['icon'];

            if (gettype($image) != "integer") {


                $file = $request->file('icon');
                $ogImage = Image::make($file)->getRealPath();
                $originalPath = 'public/';
                $ogImage =  $ogImage->save($originalPath.time().$file->getClientOriginalName());

                // $path = $this->uploadImage($image, "icon");

                $model->iconImage()->create([
                    'file_path' => $ogImage,
                ]);
            } else {
                $media = Media::where('id', $image)->first();
                $media->update([
                    'fileable_id' => $model->id,
                    'fileable_type' => $model->getMorphClass(),
                ]);
            }
        }

        return $this->showOne($model);
    }

    /**
    * @OA\Get(
    *      path="/api/v1/admin/script-type/{id}",
    *      operationId="showScriptType",
    *      tags={"Admin"},
    *      summary="Show script type",
    *      description="Show script type",
    *      @OA\Parameter(
    *          name="id",
    *          description="Script Type ID",
    *          required=true,
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
    *       ),
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
    public function show($id)
    {
        return $this->showOne(ScriptType::where('id', $id)->first());
    }

    /**
    * @OA\Put(
    *      path="/api/v1/admin/script-type/{id}",
    *      operationId="updateScriptType",
    *      tags={"Admin"},
    *      summary="Update script-type",
    *      description="Update script-type",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="script-type ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ScriptTypeUpdateFormRequest")
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
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
    public function update(ScriptTypeUpdateFormRequest $request, $id)
    {
        $model = ScriptType::where('id', $id)->first();

        if($model == null){
            return $this->errorResponse('Script type id not found. please place the id on the url to process', 401);
        }

        $model->update([
            'name' => $request['name'],
            'prompt_1' => $request['prompt_1'],
            'prompt_2' => $request['prompt_2'],
            'description' => $request['description'],
            'presence_penalty' => $request['presence_penalty'],
            'frequency_penalty' => $request['frequency_penalty'],
            'best_of' => $request['best_of'],
            'stream' => $request['stream'],
            'documents' => $request['documents'],
            'query' => $request['query'],
            'max_tokens' => $request['max_tokens'],
            'temperature' => $request['temperature'],
            'top_p' => $request['top_p'],
            'engine' => $request['engine'],
        ]);


        $model->presets()->delete();

        if($request['script_type_presets']){
            foreach($request['script_type_presets'] as $preset){
                $model->presets()->create($preset);
            }
        }

        if ($request->has('icon')) {
            foreach ($request['icon'] as $image) {
                if (gettype($image) != "integer") {


                    $file = $request->file('icon');
                    $ogImage = Image::make($file)->getRealPath();
                    $originalPath = 'public/';
                    $ogImage =  $ogImage->save($originalPath.time().$file->getClientOriginalName());

                    // $path = $this->uploadImage($image, "icon");

                    $model->iconImage()->create([
                        'file_path' => $ogImage,
                    ]);

                } else {

                    $media = Media::where('id', $image)->first();

                    $media->update([
                        'fileable_id' => $model->id,
                        'fileable_type' => $model->getMorphClass(),
                    ]);
                }
            }
        }

        return $this->showOne($model);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/admin/script-type/{id}",
    *      operationId="deleteScriptType",
    *      tags={"Admin"},
    *      summary="Delete script-type",
    *      description="Delete script-type",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="script-type ID",
     *          required=true,
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
    *       ),
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
    public function destroy($id)
    {
        $model = ScriptType::where('id', $id)->first();
        $model->delete();
        return $this->showMessage('deleted');
    }
}
