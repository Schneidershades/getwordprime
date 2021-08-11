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
     * @OA\Property(
     *      title="script type question",
     *      description="question of the script type",
     *      example="Info Limited"
     * )
     *
     * @var string
     */
    private $question;

    /**
     * @OA\Property(
     *      title="user script_type id",
     *      description="Initial related script_type of the id",
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
            'question' => 'required|string',
            'script_type_id' => 'required|int',
        ];
    }
}
