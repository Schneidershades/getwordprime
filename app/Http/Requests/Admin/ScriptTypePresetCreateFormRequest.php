<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Script Type Prompt Create Form Request Fields",
 *      description="Script Type Prompt Create request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class ScriptTypePresetCreateFormRequest extends FormRequest
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
            'script_type_presets' => 'array',
            'script_type_presets.*.script_type_id' => 'required|int|exists:script_types,id',
            'script_type_presets.*.question' => 'required|string',
            'script_type_presets.*.field_type' => 'required|string',
            'script_type_presets.*.label' => 'required|string',
            'script_type_presets.*.placeholder' => 'required|string',
        ];
    }
}
