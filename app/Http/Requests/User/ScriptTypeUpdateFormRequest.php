<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Script Type Update Form Request Fields",
 *      description="Script Type Update request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class ScriptTypeUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="script type name",
     *      description="name of the script type",
     *      example="Info Limited"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *      title="script type icon",
     *      description="icon of the script type",
     *      example="icon link"
     * )
     *
     * @var string
     */
    private $icon;

    /**
     * @OA\Property(
     *      title="script type description",
     *      description="description of the script type",
     *      example="This is"
     * )
     *
     * @var string
     */
    private $description;
    

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
            'icon' => 'required|string',
            'description' => 'required|string',
        ];
    }
}
