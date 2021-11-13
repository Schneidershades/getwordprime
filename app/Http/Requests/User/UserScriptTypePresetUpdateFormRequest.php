<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="User Preset Answer Update Form Request Fields",
 *      description="User Preset Answer Update request body data",
 *      type="object",
 *      required={"name"}
 * )
 */


class UserScriptTypePresetUpdateFormRequest extends FormRequest
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
     *      title="script_type_prompt_id",
     *      description="Initial related script_type_prompt of the id",
     *      example="1"
     * )
     *
     * @var int
     */
    private $script_type_prompt_id;
    

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
            'question' => 'required|string',
            'script_type_preset_id' => 'required|int',
        ];
    }
}
