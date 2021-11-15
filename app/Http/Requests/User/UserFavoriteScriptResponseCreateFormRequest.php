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

class UserFavoriteScriptResponseCreateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="script id",
     *      description="Initial related script of the id",
     *      example="1"
     * )
     *
     * @var int
     */
    private $script_type_id;
    

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
            'script_id' => 'required|int',
        ];
    }
}