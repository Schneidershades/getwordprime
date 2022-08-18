<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Store Script Favorite Request Fields",
 *      description="Store Script Favorite request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class StoreFavoriteScriptFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="user script_response id",
     *      description="Initial related script_response of the id",
     *      example="1"
     * )
     *
     * @var int
     */
    public $script_response_id;
    

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
            'script_response_id' => 'required|int|exists:script_responses,id',
        ];
    }
}
