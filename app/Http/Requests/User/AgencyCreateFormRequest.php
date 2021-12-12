<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Agency Create Form Request Fields",
 *      description="Agency Create request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class AgencyCreateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="agency name",
     *      description="name of the agency",
     *      example="Info Limited"
     * )
     *
     * @var string
     */
    private $name;


    /**
     * @OA\Property(
     *      title="agency email",
     *      description="email of the agency",
     *      example="info@client.com"
     * )
     *
     * @var string
     */
    private $email;

    /**
    *       @OA\Property(property="campaigns", type="object", type="array",
    *            @OA\Items(
    *                @OA\Property(property="campaign_id", type="int", example="1"),
    *            ),
    *        ),
    *    ),
    */

    public $campaigns;

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
            'email' => 'required|string|email|max:255|unique:agencies,email',
            'campaigns' => 'array', 
            'campaigns.*.campaign_id' => 'int|exists:plans,id',
        ];
    }
}
