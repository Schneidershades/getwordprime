<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="User Create Form Request Fields",
 *      description="User Create request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class UserCreateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="First Name",
     *      description="first name of the user",
     *      example="Schneider"
     * )
     *
     * @var string
     */
    public $first_name;

    /**
     * @OA\Property(
     *      title="Last Name",
     *      description="last name of the user",
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
     *      title="User email",
     *      description="Email of the user",
     *      example="info@convertscript.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="User password",
     *      description="Email of the user",
     *      example="info@convertscript.com"
     * )
     *
     * @var string
     */
    public $password;

    /**
     *       @OA\Property(property="plans", type="object", type="array",
     *            @OA\Items(
     *                @OA\Property(property="plan_id", type="int", example="1"),
     *            ),
     *        ),
     *    ),
     */
    public $plans;

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
            'password' => 'required|string|min:8',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|max:255|in:Admin,User',
            'plans' => 'array',
            'plans.*.plan_id' => 'int|exists:plans,id',
        ];
    }
}
