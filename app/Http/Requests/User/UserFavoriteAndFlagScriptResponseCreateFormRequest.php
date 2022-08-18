<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Script Favorite Create Form Request Fields",
 *      description="Script Favorite Create request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class UserFavoriteAndFlagScriptResponseCreateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="script_response_id ",
     *      description="Initial related script_response of the id",
     *      example="1"
     * )
     *
     * @var int
     */
    private $script_response_id;

    /**
     * @OA\Property(
     *      title="type",
     *      description="choose between flag/favorite",
     *      example="flag/favorite"
     * )
     *
     * @var int
     */
    private $type;
    

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
            'type' => 'required|in:flag,favorite',
        ];
    }
}
