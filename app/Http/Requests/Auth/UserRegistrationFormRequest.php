<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Sign Up Form Request Fields",
 *      description="sign up request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class UserRegistrationFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="first_name",
     *      description="first_name of the user",
     *      example="Schneider"
     * )
     *
     * @var string
     */
    public $first_name;

    /**
     * @OA\Property(
     *      title="last_name",
     *      description="last_name of the user",
     *      example="Schneider"
     * )
     *
     * @var string
     */
    public $last_name;

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
    *      title="User Phone",
    *      description="Phone of the user",
    *      example="080222"
    * )
    *
    * @var string
    */
    public $phone;

    /**
     * @OA\Property(
     *      title="User email",
     *      description="Email of the user",
     *      example="user@getwordprime.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="User password",
     *      description="Password of the user",
     *      example="password"
     * )
     *
     * @var string
     */
    public $password;

    
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|max:255|in:Admin,User',
        ];
    }
}
