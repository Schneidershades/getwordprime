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
     *      title="project title",
     *      description="title of the marketplace",
     *      example="Project for Maksim K."
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="project type",
     *      description="type of the marketplace",
     *      example="Fixed"
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *      title="project short_description",
     *      description="short_description of the marketplace",
     *      example="Hi Maksim K., I noticed your profile and would like to offer you my project. We can discuss any deta"
     * )
     *
     * @var int
     */
    public $short_description;

    /**
     * @OA\Property(
     *      title="project full_description",
     *      description="full_description of the marketplace",
     *      example="Hi Maksim K., I noticed your profile and would like to offer you my project. We can discuss any deta"
     * )
     *
     * @var int
     */
    public $full_description;

    /**
     * @OA\Property(
     *      title="project date",
     *      description="date of the marketplace",
     *      example="1646388297"
     * )
     *
     * @var int
     */
    public $date;

    /**
     * @OA\Property(
     *      title="project bids",
     *      description="bids of the marketplace",
     *      example="1"
     * )
     *
     * @var int
     */
    public $bids;

    /**
     * @OA\Property(
     *      title="project status",
     *      description="status of the marketplace",
     *      example="open"
     * )
     *
     * @var string
     */
    public $status;

    /**
     * @OA\Property(
     *      title="project bid_count",
     *      description="bid_count of the marketplace",
     *      example="1"
     * )
     *
     * @var int
     */
    public $bid_count;

    /**
     * @OA\Property(
     *      title="project bid_avg",
     *      description="bid_avg of the marketplace",
     *      example="1"
     * )
     *
     * @var int
     */
    public $bid_avg;

    /**
     * @OA\Property(
     *      title="project budget_type",
     *      description="budget_type of the marketplace",
     *      example="fixed"
     * )
     *
     * @var int
     */
    public $budget_type;

    /**
     * @OA\Property(
     *      title="project budget_low",
     *      description="budget_low of the marketplace",
     *      example="90.0"
     * )
     *
     * @var string
     */
    public $budget_low;

    /**
     * @OA\Property(
     *      title="project budget_high",
     *      description="budget_high of the marketplace",
     *      example="90.0"
     * )
     *
     * @var string
     */
    public $budget_high;

    /**
     * @OA\Property(
     *      title="project url",
     *      description="url of the marketplace",
     *      example="https://freelancer.com/"
     * )
     *
     * @var int
     */
    public $url;

    /**
     * @OA\Property(
     *      title="project currency_id",
     *      description="currency_id of the marketplace",
     *      example="1"
     * )
     *
     * @var int
     */
    public $currency_id;

    /**
     * @OA\Property(
     *      title="project currency_code",
     *      description="currency_code of the marketplace",
     *      example="1"
     * )
     *
     * @var int
     */
    public $currency_code;

    /**
     * @OA\Property(
     *      title="project currency_sign",
     *      description="currency_sign of the marketplace",
     *      example="$"
     * )
     *
     * @var string
     */
    public $currency_sign;

    /**
     * @OA\Property(
     *      title="project currency_name",
     *      description="currency_name of the marketplace",
     *      example="US Dollar"
     * )
     *
     * @var string
     */
    public $currency_name;

    /**
     * @OA\Property(
     *      title="project currency_exchange_rate",
     *      description="currency_exchange_rate of the marketplace",
     *      example="1"
     * )
     *
     * @var int
     */
    public $currency_exchange_rate;

    /**
     * @OA\Property(
     *      title="project currency_country",
     *      description="currency_country of the marketplace",
     *      example="US"
     * )
     *
     * @var string
     */
    public $currency_country;

    /**
     * @OA\Property(
     *      title="project currency_is_escrowcom_supported",
     *      description="currency_is_escrowcom_supported of the marketplace",
     *      example="true"
     * )
     *
     * @var boolean
     */
    public $currency_is_escrowcom_supported;

    /**
     * @OA\Property(
     *      title="project hourly_commitment",
     *      description="hourly_commitment of the marketplace",
     *      example="1"
     * )
     *
     * @var string
     */
    public $hourly_commitment;

    /**
     * @OA\Property(
     *      title="project hourly_interval",
     *      description="hourly_interval of the marketplace",
     *      example="1"
     * )
     *
     * @var string
     */
    public $hourly_interval;

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
            'title' => 'required|string',
            'type' => 'required|string',
            'short_description' => 'required|string',
            'full_description' => 'required|string',
            'date' => 'required|int',
            'bids' => 'required|int',
            'bid_count' => 'required|numeric',
            'bid_avg' => 'required|numeric',
            'budget_type' => 'required|string',
            'budget_low' => 'required|numeric',
            'budget_high' => 'required|numeric',
            'url' => 'required|url',
            'currency_id' => 'required|string',
            'currency_code' => 'required|string',
            'currency_sign' => 'required|string',
            'currency_name' => 'required|string',
            'currency_exchange_rate' => 'required|string',
            'currency_country' => 'required|string',
            'currency_is_escrowcom_supported' => 'required|string',
            'hourly_commitment' => 'required|string',
            'hourly_interval' => 'required|string',
        ];
    }
}
