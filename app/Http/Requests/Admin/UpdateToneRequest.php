<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Tone Update Form Request Fields",
 *      description="Tone Update request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class UpdateToneRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="tone name",
     *      description="name of the tone",
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
