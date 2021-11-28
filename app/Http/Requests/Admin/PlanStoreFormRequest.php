<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;


/**
 * @OA\Schema(
 *      title="Plan Store Form Request Fields",
 *      description="Role Store request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class PlanStoreFormRequest extends FormRequest
{

    /**
     * @OA\Property(
     *      title="type",
     *      description="name of the plan",
     *      example="FE"
     * )
     *
     * @var string
     */
    private $type;

    /**
     * @OA\Property(
     *      title="plan name",
     *      description="name of the plan",
     *      example="FE"
     * )
     *
     * @var string
     */
    private $name;

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
            'type' => 'required|string',
            'name' => 'required|string',
        ];
    }
}
