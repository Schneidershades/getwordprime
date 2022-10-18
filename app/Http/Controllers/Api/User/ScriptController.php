<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ScriptCreateFormRequest;
use App\Http\Requests\User\ScriptUpdateFormRequest;
use App\Models\Language;
use App\Models\Script;
use App\Models\ScriptResponse;
use App\Models\ScriptType;
use App\Models\Tone;
use App\Models\UserScriptTypePreset;
use App\Traits\Plugins\OpenAi\OpenAi;
use Illuminate\Database\Eloquent\Builder;

class ScriptController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/scripts",
     *      operationId="allScripts",
     *      tags={"user"},
     *      summary="Get all script",
     *      description="Get all script",
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
        $search_query = request()->get('search') ? request()->get('search') : null;

        $scripts = ScriptResponse::query()
                ->selectRaw('script_responses.*')
                ->selectRaw('scripts.content AS script_content')
                ->selectRaw('script_types.name AS script_type_name')
                ->leftJoin('scripts', 'scripts.id', '=', 'script_responses.script_id')
                ->leftJoin('script_types', 'script_types.id', '=', 'script_responses.script_type_id')
                ->where('script_responses.user_id', '=', auth()->user()->id)
                ->when($search_query, function (Builder $builder, $search_query) {
                    $builder->where('script_responses.text', 'LIKE', "%{$search_query}%")
                    ->orWhere('script_types.name', 'LIKE', "%{$search_query}%")
                    ->orWhere('scripts.content', "%{$search_query}%");
                })->latest()->get();

        return $this->showAll($scripts);
    }

    /**
     * @OA\Post(
     *      path="/api/v1/scripts",
     *      operationId="postScripts",
     *      tags={"user"},
     *      summary="Post new script",
     *      description="Post new script",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/ScriptCreateFormRequest")
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
    public function store(ScriptCreateFormRequest $request)
    {
        $variation = 2;

        $script = Script::create([
            'name' => $request['name'],
            'user_id' => auth()->user()->id,
            'campaign_id' => $request['campaign_id'],
            'script_type_id' => $request['script_type_id'],
            'content' => $request['name'],
        ]);

        $scriptType = ScriptType::find($request['script_type_id']);

        $presets = $scriptType->presets->pluck('id')->toArray();

        $countPresets = $scriptType->presets->count();

        $userAnswers = UserScriptTypePreset::where('user_id', auth()->user()->id)
                            ->whereIn('script_type_preset_id', $presets)
                            ->get();

        if ($countPresets < $userAnswers->count()) {
            return $this->errorResponse('In other to generate a script kindly set all the answers in the script type questions', 422);
        }

        for ($i = 1; $i <= $variation; $i++) {
            $submissionToOpenAi = '';

            $submissionToOpenAi .= $scriptType->prompt_1." \n";
            $submissionToOpenAi .= '""""""'." \n";
            $submissionToOpenAi .= $scriptType->prompt_2." \n";
            $submissionToOpenAi .= '""""""'." \n";

            foreach ($userAnswers as $answer) {
                if ($answer['answers'] != null) {
                    $submissionToOpenAi .= $answer['answers']." \n";
                    $submissionToOpenAi .= '""""""'." \n";
                }
            }

            if ($request['input_language_id']) {
                $userLanguage = Language::where('id', $request['input_language_id'])
                ->first();

                if ($userLanguage) {
                    $submissionToOpenAi .= 'The input text language is '.$userLanguage->name." \n";
                    $submissionToOpenAi .= '""""""'." \n";
                }
            }

            if ($request['output_language_id']) {
                $userLanguage = Language::where('id', $request['output_language_id'])
                ->first();

                if ($userLanguage) {
                    $submissionToOpenAi .= 'Output the result in '.$userLanguage->name." \n";
                    $submissionToOpenAi .= '""""""'." \n";
                }
            }

            if ($request['tone_id']) {
                $userTone = Tone::where('id', $request['tone_id'])
                    ->first();

                if ($userTone) {
                    $submissionToOpenAi .= 'The tone for this should be '.$userTone->name." \n";
                    $submissionToOpenAi .= '""""""'." \n";
                }
            }

            $generate = (new OpenAi)->ad($submissionToOpenAi, $scriptType);

            ScriptResponse::create([
                'text' => $generate->choices[0]->text,
                'script_id' => $script->id,
                'script_type_id' => $request['script_type_id'],
                'user_id' => auth()->user()->id,
                'word_count' => str_word_count($generate->choices[0]->text),
            ]);
        }

        return $this->showOne($script);
    }

    /**
     * @OA\Get(
     *      path="/api/v1/scripts/{id}",
     *      operationId="showScript",
     *      tags={"user"},
     *      summary="Show an script",
     *      description="Show an script",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Agency ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
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
    public function show(Script $script)
    {
        return $this->showOne(auth()->user()->scripts->where('id', $script->id)->first());
    }

    /**
     * @OA\PUT(
     *      path="/api/v1/scripts/{id}",
     *      operationId="updateScript",
     *      tags={"user"},
     *      summary="Update an script",
     *      description="Update an script",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Agency ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/ScriptUpdateFormRequest")
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
    public function update(ScriptUpdateFormRequest $request, ScriptResponse $scriptResponse)
    {
        auth()->user()->scriptsResponses->where('id', $scriptResponse->id)->first()->update($request->validated());

        return $this->showOne(auth()->user()->scriptsResponses->where('id', $scriptResponse->id)->first());
    }

    /**
     * @OA\Delete(
     *      path="/api/v1/scripts/{id}",
     *      operationId="deleteScript",
     *      tags={"user"},
     *      summary="Delete an script",
     *      description="Delete an script",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Script ID",
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
    public function destroy(Script $script)
    {
        $script->delete();

        return $this->showMessage('deleted');
    }
}
