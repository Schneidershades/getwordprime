<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Script Type Update Form Request Fields",
 *      description="Script Type Update request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class ScriptTypeUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="script type name",
     *      description="name of the script type",
     *      example="Info Limited"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="script type prompt 1",
     *      description="prompt 1 of the script type",
     *      example="This is a prompt 2"
     * )
     *
     * @var string
     */
    public $prompt_1;

    /**
     * @OA\Property(
     *      title="script type prompt 2",
     *      description="prompt 2 of the script type",
     *      example="This is a prompt 1"
     * )
     *
     * @var string
     */
    public $prompt_2;

    /**
     * @OA\Property(
     *      title="script type description",
     *      description="description of the script type",
     *      example="This is"
     * )
     *
     * @var string
     */
    public $description;


    /**
     * @OA\Property(
     *      title="script type presence_penalty",
     *      description="presence_penalty of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    public $presence_penalty;

    /**
     * @OA\Property(
     *      title="script type frequency_penalty",
     *      description="frequency_penalty of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    public $frequency_penalty;


    /**
     * @OA\Property(
     *      title="script type best_of",
     *      description="best_of of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    public $best_of;


    /**
     * @OA\Property(
     *      title="script type stream",
     *      description="stream of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    public $stream;


    /**
     * @OA\Property(
     *      title="script type documents",
     *      description="documents of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    public $documents;


    /**
     * @OA\Property(
     *      title="script type query",
     *      description="query of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    public $query;


    /**
     * @OA\Property(
     *      title="script type max_tokens",
     *      description="max_tokens of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    public $max_tokens;


    /**
     * @OA\Property(
     *      title="script type temperature",
     *      description="temperature of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    public $temperature;


    /**
     * @OA\Property(
     *      title="script type top_p",
     *      description="top_p of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    public $top_p;



    /**
     * @OA\Property(
     *      title="script type engine",
     *      description="engine of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    public $engine;

    /**
    *       @OA\Property(property="script_type_presets", type="object", type="array",
    *            @OA\Items(
    *                @OA\Property(property="script_type_id", type="int", example="1"),
    *                @OA\Property(property="question", type="string", example="what is this?"),
    *                @OA\Property(property="field_type", type="string", example="text"),
    *                @OA\Property(property="label", type="string", example="Question 1"),
    *                @OA\Property(property="placeholder", type="string", example="what is this?"),
    *            ),
    *        ),
    *    ),
    */    
    public $script_type_presets; 


    /**
     * @OA\Property(
     *      title="send array of images",
     *      description="send array of images",
     *      example="[4]"
     * )
     *
     * @var string
     */
    public $icon;
    

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'prompt_1' => 'required|string',
            'prompt_2' => 'required|string',
            'description' => 'required|string',
            'presence_penalty' => 'required',
            'frequency_penalty' => 'required',
            'best_of' => 'nullable|numeric',
            'stream' => 'nullable|numeric',
            'documents' => 'nullable|numeric',
            'query' => 'nullable|numeric',
            'max_tokens' => 'required|numeric',
            'temperature' => 'required|numeric',
            'top_p' => 'required|numeric',
            'engine' => 'required|nullable',

            'icon' => 'nullable|array',
            'icon.*' => 'nullable|max:2048',  

            'script_type_presets' => 'array', 
            'script_type_presets.*.script_type_id' => 'required|int|exists:script_types,id',
            'script_type_presets.*.question' =>'required|string',
            'script_type_presets.*.field_type' =>'required|string',
            'script_type_presets.*.label' =>'required|string',
            'script_type_presets.*.placeholder' =>'required|string',
        ];
    }
}
