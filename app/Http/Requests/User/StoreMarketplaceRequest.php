<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Store Marketplace Request Fields",
 *      description="Store Marketplace request body data",
 *      type="object",
 *      required={"name"}
 * )
 */


class StoreMarketplaceRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="project freelancer_ad_id",
     *      description="freelancer_ad_id of the marketplace",
     *      example="1"
     * )
     *
     * @var int
     */
    public $freelancer_ad_id;

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
            'freelancer_ad_id' => 'required|int|exists:freelancer_ads,id',
        ];
    }
}
