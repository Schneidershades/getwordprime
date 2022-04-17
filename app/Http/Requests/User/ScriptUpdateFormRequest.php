<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Script Update Form Request Fields",
 *      description="Script Update request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class ScriptUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="script content",
     *      description="content of the script",
     *      example="Info Limited"
     * )
     *
     * @var string
     */
    public $content;

    /**
     * @OA\Property(
     *      title="user script_type id",
     *      description="Initial related script_type of the id",
     *      example="1"
     * )
     *
     * @var int
     */
    public $script_type_id;


    /**
     * @OA\Property(
     *      title="user campaign id",
     *      description="Initial related campaign of the id",
     *      example="1"
     * )
     *
     * @var int
     */
    public $campaign_id;
    

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
            'content' => 'required|string',
            'script_type_id' => 'required|int',
            'campaign_id' => 'required|int',
        ];
    }
}
