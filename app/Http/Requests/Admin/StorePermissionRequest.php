<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;


/**
 * @OA\Schema(
 *      title="Store Permission Create Form Request Fields",
 *      description="Store Permission Create request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class StorePermissionRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="permission",
     *      description="permission",
     *      example="create_user"
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
