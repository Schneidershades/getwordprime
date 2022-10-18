<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="User Update Form Request Fields",
 *      description="User Update request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */
class AuthUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="User First Name",
     *      description="first name of the user",
     *      example="Schneider"
     * )
     *
     * @var string
     */
    public $first_name;

    /**
     * @OA\Property(
     *      title="User Last Name",
     *      description="Last name of the user",
     *      example="Schneider"
     * )
     *
     * @var string
     */
    public $last_name;

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
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
        ];
    }
}
