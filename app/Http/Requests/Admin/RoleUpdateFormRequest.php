<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Role Update Form Request Fields",
 *      description="Role Update request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class RoleUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="name",
     *      example="name"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *      property="permissions",
     *      type="string",
     *      example="['edit_user','create_user']",
     * ),
     *
     * @var string
     */
    private $permissions;

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
            'name' => 'nullable|string',
            'permissions' => 'nullable|array',
            'permissions.*' => 'nullable|string',
        ];
    }
}
