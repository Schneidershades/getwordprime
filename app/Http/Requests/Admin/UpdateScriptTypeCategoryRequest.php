<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Script Type Category Update Form Request Fields",
 *      description="Script Type Category Update request body data",
 *      type="object",
 *      required={"name"}
 * )
 */


class UpdateScriptTypeCategoryRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="script type category name",
     *      description="category of the script type",
     *      example="Info Limited"
     * )
     *
     * @var string
     */
    public $name;
    

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
            'name' => 'required|string',
        ];
    }

}
