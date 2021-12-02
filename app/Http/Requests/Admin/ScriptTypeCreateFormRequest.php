<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Script Type Create Form Request Fields",
 *      description="Script Type Create request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class ScriptTypeCreateFormRequest extends FormRequest
{

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
     *      title="script type name",
     *      description="name of the script type",
     *      example="Info Limited"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *      title="script type icon",
     *      description="icon of the script type",
     *      example="icon link"
     * )
     *
     * @var string
     */
    private $icon;

    /**
     * @OA\Property(
     *      title="script type description",
     *      description="description of the script type",
     *      example="This is"
     * )
     *
     * @var string
     */
    private $description;


    /**
     * @OA\Property(
     *      title="script type presence_penalty",
     *      description="presence_penalty of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    private $presence_penalty;

    /**
     * @OA\Property(
     *      title="script type frequency_penalty",
     *      description="frequency_penalty of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    private $frequency_penalty;


    /**
     * @OA\Property(
     *      title="script type best_of",
     *      description="best_of of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    private $best_of;


    /**
     * @OA\Property(
     *      title="script type stream",
     *      description="stream of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    private $stream;


    /**
     * @OA\Property(
     *      title="script type documents",
     *      description="documents of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    private $documents;


    /**
     * @OA\Property(
     *      title="script type query",
     *      description="query of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    private $query;


    /**
     * @OA\Property(
     *      title="script type max_tokens",
     *      description="max_tokens of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    private $max_tokens;


    /**
     * @OA\Property(
     *      title="script type temperature",
     *      description="temperature of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    private $temperature;


    /**
     * @OA\Property(
     *      title="script type top_p",
     *      description="top_p of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    private $top_p;



    /**
     * @OA\Property(
     *      title="script type engine",
     *      description="engine of the script type",
     *      example="1"
     * )
     *
     * @var string
     */
    private $engine;
    

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
            'icon' => 'required|string',
            'description' => 'required|string',
            'presence_penalty' => 'nullable',
            'frequency_penalty' => 'nullable',
            'best_of' => 'nullable',
            'stream' => 'nullable',
            'documents' => 'nullable',
            'query' => 'nullable',
            'max_tokens' => 'nullable',
            'temperature' => 'nullable',
            'top_p' => 'nullable',
            'engine' => 'nullable',

            'script_type_presets' => 'array', 
            'script_type_presets.*.script_type_id' => 'nullable|int|exists:script_types,id',
            'script_type_presets.*.question' =>'nullable|string',
            'script_type_presets.*.field_type' =>'nullable|string',
            'script_type_presets.*.label' =>'nullable|string',
            'script_type_presets.*.placeholder' =>'nullable|string',
        ];
    }
}