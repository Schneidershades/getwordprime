<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Script Response Update Form Request Fields",
 *      description="Script Response Update request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class ScriptResponseUpdateFormRequest extends FormRequest
{

    /**
     * @OA\Property(
     *      title="script text",
     *      description="text of the script",
     *      example="Info Limited"
     * )
     *
     * @var string
     */
    public $text;

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
            'campaign_id' => 'nullable|int|exists:campaigns,id',
            'text' => 'nullable|string',
        ];
    }
}
