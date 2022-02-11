<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Suggession Create Form Request Fields",
 *      description="Suggession Create request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class SuggestionCreateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="user Initial related suggestion",
     *      description="Initial related suggestion of the user",
     *      example="1"
     * )
     *
     * @var int
     */
    private $parent_id;

    /**
     * @OA\Property(
     *      title="user suggestion",
     *      description="suggestion of the user",
     *      example="Info Limited"
     * )
     *
     * @var string
     */
    private $message;

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
            'message' => 'required|string',
            'parent_id' => 'nullable|int',
        ];
    }
}
