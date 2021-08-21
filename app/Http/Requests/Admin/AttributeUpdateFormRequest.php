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
     *      title="attribute name",
     *      description="name of the attribute",
     *      example="Info Limited"
     * )
     *
     * @var string
     */
    private $name;

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
            //
        ];
    }
}
