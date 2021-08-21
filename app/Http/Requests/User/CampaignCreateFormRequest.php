<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Campaign Create Form Request Fields",
 *      description="Campaign Create request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class CampaignCreateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="campaign name",
     *      description="name of the campaign",
     *      example="Movie Campaigns"
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
