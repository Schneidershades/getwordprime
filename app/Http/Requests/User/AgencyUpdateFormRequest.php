<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Agency Update Form Request Fields",
 *      description="Agency Update request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class AgencyUpdateFormRequest extends FormRequest
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
