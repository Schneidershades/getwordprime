<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Freelancer Keyword Update Form Request Fields",
 *      description="Freelancer Keyword Update request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class UpdateFreelancerKeywordRequest extends FormRequest
{

    /**
     * @OA\Property(
     *      title="words ",
     *      description="words of the ads",
     *      example="Writing & Content"
     * )
     *
     * @var string
     */
    public $words;

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
            'words' => 'required|string',
        ];
    }
}
