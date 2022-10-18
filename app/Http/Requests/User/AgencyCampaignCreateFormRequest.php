<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Agency Campaign Create Form Request Fields",
 *      description="Agency Campaign Create request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class AgencyCampaignCreateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="agency id",
     *      description="Initial related id of the agency",
     *      example="1"
     * )
     *
     * @var int
     */
    public $agency_id;

    /**
     * @OA\Property(
     *      title="campaign id",
     *      description="Initial related id of the campaign",
     *      example="1"
     * )
     *
     * @var int
     */
    public $campaign_id;

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
            'agency_id' => 'int|exists:agencies,id',
            'campaign_id' => 'int|exists:campaigns,id',
        ];
    }
}
