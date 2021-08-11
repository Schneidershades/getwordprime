<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Script User Answer Update Form Request Fields",
 *      description="Script User Answer Update request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class ScriptUserAnswerUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="script type answer",
     *      description="answer of the script type",
     *      example="Info Limited"
     * )
     *
     * @var string
     */
    private $answer;

    /**
     * @OA\Property(
     *      title="user script_type question id",
     *      description="Initial related script_type question of the id",
     *      example="1"
     * )
     *
     * @var int
     */
    private $script_type_question_id;
    

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
            'answer' => 'required|string',
            'script_type_question_id' => 'required|int',
        ];
    }
}
