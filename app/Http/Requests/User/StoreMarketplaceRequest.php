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
     *      title="user project_id",
     *      description="Initial related project_id of the marketplace",
     *      example="1"
     * )
     *
     * @var int
     */
    public $project_id;

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
            'project_id' => 'required|int',
        ];
    }
}
