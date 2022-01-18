<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="User Preset Answer Create Form Request Fields",
 *      description="User Preset Answer Create request body data",
 *      type="object",
 *      required={"name"}
 * )
 */


class UserScriptTypePresetCreateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="script type answer",
     *      description="answer of the script type",
     *      example="Info Limited"
     * )
     *
     * @var string
     */
    private $answer;

    /**
     * @OA\Property(
     *      title="script_type_preset_id",
     *      description="Initial related script_type_preset_id of the id",
     *      example="1"
     * )
     *
     * @var int
     */
    private $script_type_preset_id;

    /**
     * @OA\Property(
     *      title="script_type_id",
     *      description="Initial related script_type_id of the id",
     *      example="1"
     * )
     *
     * @var int
     */
    private $script_type_id;
    

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
            'answer' => 'required|string',
            'script_type_preset_id' => 'required|int|exists:script_type_presets',
            'script_type_id' => 'required|int|exists:script_types',
        ];
    }
}
