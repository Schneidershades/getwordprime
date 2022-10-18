<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Language Create Form Request Fields",
 *      description="Language Create request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class StoreLanguageRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="language name",
     *      description="name of the language",
     *      example="English"
     * )
     *
     * @var string
     */
    public $name;

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
