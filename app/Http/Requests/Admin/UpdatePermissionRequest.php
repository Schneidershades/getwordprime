<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Tutorial Update Form Request Fields",
 *      description="Tutorial Update request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class UpdatePermissionRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="permission",
     *      description="permission of the role",
     *      example="create_user"
     * )
     *
     * @var string
     */
    private $permission;


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
            'status' => 'required|boolean',
            'email' => 'required|string',
        ];
    }
}
