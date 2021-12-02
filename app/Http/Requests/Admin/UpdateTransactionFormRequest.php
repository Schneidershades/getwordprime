<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Transaction Update Form Request Fields",
 *      description="Transaction Update request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class UpdateTransactionFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="status",
     *      description="status of the transaction",
     *      example="status"
     * )
     *
     * @var string
     */
    private $status;

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
            'status' => 'required|string',
        ];
    }
}
