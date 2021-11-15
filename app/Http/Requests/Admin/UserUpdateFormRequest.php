<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="User Update Form Request Fields",
 *      description="User Update request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class UserUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="User Name",
     *      description="name of the user",
     *      example="Schneider"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="User Role",
     *      description="User/Admin",
     *      example="User"
     * )
     *
     * @var string
     */
    public $role;

    /**
     * @OA\Property(
     *      title="User email",
     *      description="Email of the user",
     *      example="info@convertscript.com"
     * )
     *
     * @var string
     */
    public $email;

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
