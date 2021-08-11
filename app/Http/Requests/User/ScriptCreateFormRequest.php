<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Script Create Form Request Fields",
 *      description="Script Create request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class ScriptCreateFormRequest extends FormRequest
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
    private $content;

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
     * @OA\Property(
     *      title="user campaign id",
     *      description="Initial related campaign of the id",
     *      example="1"
     * )
     *
     * @var int
     */
    private $campaign_id;
    

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
