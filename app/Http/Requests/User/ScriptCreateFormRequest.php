<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Script Create Form Request Fields",
 *      description="Script Create request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class ScriptCreateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="script content",
     *      description="content of the script",
     *      example="Info Limited"
     * )
     *
     * @var string
     */
    public $content;

    /**
     * @OA\Property(
     *      title="user script_type id",
     *      description="Initial related script_type of the id",
     *      example="ids"
     * )
     *
     * @var int
     */
    public $script_type_id;


    /**
     * @OA\Property(
     *      title="user campaign id",
     *      description="Initial related campaign of the id",
     *      example="ids"
     * )
     *
     * @var int
     */
    public $campaign_id;


    /**
     * @OA\Property(
     *      title="user tone id",
     *      description="Initial related id of the tone",
     *      example="ids"
     * )
     *
     * @var int
     */
    public $tone_id;


    /**
     * @OA\Property(
     *      title="input language id",
     *      description="Initial related id of the language",
     *      example="ids"
     * )
     *
     * @var int
     */
    public $output_language_id;
    
    

    /**
     * @OA\Property(
     *      title="output language id",
     *      description="Initial related id of the language",
     *      example="ids"
     * )
     *
     * @var int
     */
    public $input_language_id;
    

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
            'content' => 'required|string',
            'script_type_id' => 'required|string|exists:script_types,id',
            'campaign_id' => 'nullable|string|exists:campaigns,id',
            'tone_id' => 'nullable|string|exists:tones,id',
            'input_language_id' => 'nullable|string|exists:languages,id',
            'output_language_id' => 'nullable|string|exists:languages,id',
        ];
    }
}
