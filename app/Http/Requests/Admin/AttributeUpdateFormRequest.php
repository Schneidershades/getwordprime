<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Attribute Update Form Request Fields",
 *      description="Attribute Update request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class AttributeUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="attribute type",
     *      description="name of the attribute",
     *      example="openai"
     * )
     *
     * @var string
     */
    private $type;

    /**
     * @OA\Property(
     *      title="attribute name",
     *      description="name of the attribute",
     *      example="temperature"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *      title="attribute value",
     *      description="value of the attribute",
     *      example="0.1"
     * )
     *
     * @var int
     */
    private $default_value;

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
            'type' => 'required|string',
            'name' => 'required|string',
            'default_value' => 'required|numeric',
        ];
    }
}
