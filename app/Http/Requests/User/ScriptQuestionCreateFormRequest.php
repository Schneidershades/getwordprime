<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Script Question Create Form Request Fields",
 *      description="Script Question Create request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class ScriptQuestionCreateFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
