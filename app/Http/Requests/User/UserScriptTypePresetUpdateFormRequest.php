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
     *                @OA\Property(property="script_type_preset_id", type="string", example="1"),
     *                @OA\Property(property="script_type_id", type="string", example="1"),
     *                @OA\Property(property="user_script_type_preset_id", type="string", example="1"),
     *            ),
     *        ),
     *    ),
     */
    public $presets;

    /**
     *       @OA\Property(property="languages", type="object", type="array",
     *            @OA\Items(
     *                @OA\Property(property="language_id", type="string", example="1"),
     *                @OA\Property(property="script_type_id", type="string", example="1"),
     *                @OA\Property(property="user_id", type="string", example="1"),
     *            ),
     *        ),
     *    ),
     */
    public $languages;

    /**
     *       @OA\Property(property="tones", type="object", type="array",
     *            @OA\Items(
     *                @OA\Property(property="tone_id", type="string", example="1"),
     *                @OA\Property(property="script_type_id", type="string", example="1"),
     *                @OA\Property(property="user_id", type="string", example="1"),
     *            ),
     *        ),
     *    ),
     */
    public $tones;

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
            'presets.*.script_type_preset_id' => 'required|string|exists:script_type_presets,id',
            'presets.*.script_type_id' => 'required|string|exists:script_types,id',
            'presets.*.user_script_type_preset_id' => 'required|string|exists:user_script_type_presets,id',

            'tone' => 'array',
            'tone.*.tone_id' => 'nullable|string',
            'tone.*.script_type_id' => 'nullable|string|exists:script_types,id',
            'tone.*.user_id' => 'nullable|string|exists:users,id',

            'language' => 'array',
            'language.*.tone_id' => 'nullable|string',
            'language.*.script_type_id' => 'nullable|string|exists:script_types,id',
            'language.*.user_id' => 'nullable|string|exists:users,id',
        ];
    }
}
