<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

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
    *       @OA\Property(property="presets", type="object", type="array",
    *            @OA\Items(
    *                @OA\Property(property="answer", type="string", example="info limited"),
    *            ),
    *            @OA\Items(
    *                @OA\Property(property="script_type_preset_id", type="int", example="1"),
    *            ),
    *            @OA\Items(
    *                @OA\Property(property="script_type_id", type="int", example="1"),
    *            ),
    *            @OA\Items(
    *                @OA\Property(property="user_script_type_preset_id", type="int", example="1"),
    *            ),
    *        ),
    *    ),
    */
    public $presets;

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
            'presets' => 'array', 
            'presets.*.answer' => 'required|string',
            'presets.*.script_type_preset_id' => 'required|int|exists:script_type_presets,id',
            'presets.*.script_type_id' => 'required|int|exists:script_types,id',
            'presets.*.user_script_type_preset_id' => 'required|int|exists:user_script_type_presets,id',
        ];
    }
}
