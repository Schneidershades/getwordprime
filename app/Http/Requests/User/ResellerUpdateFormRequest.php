<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Reseller Update Form Request Fields",
 *      description="Reseller Update request body data",
 *      type="object",
 *      required={"name"}
 * )
 */


class ResellerUpdateFormRequest extends FormRequest
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
     *      title="User email",
     *      description="Email of the user",
     *      example="info@convertscript.com"
     * )
     *
     * @var string
     */
    public $email;

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'plans' => 'array', 
            'plans.*.plan_id' => 'int|exists:plans,id',
        ];
    }
}
