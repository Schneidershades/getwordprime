<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Script Attribute Create Form Request Fields",
 *      description="Script Attribute Create request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class ScriptTypeAttributeCreateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="user attribute id",
     *      description="Initial related attribute of the id",
     *      example="1"
     * )
     *
     * @var int
     */
    private $attribute_id;

    /**
     * @OA\Property(
     *      title="user script_type id",
     *      description="Initial related script_type of the id",
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
            'attribute_id' => 'required|int',
            'script_type_id' => 'required|int',
        ];
    }
}
