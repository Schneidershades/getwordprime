<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Agency File Store Form Request Fields",
 *      description="Agency File Store request body data",
 *      type="object",
 *      required={"name"}
 * )
 */


class AgencyFileStoreFormRequest extends FormRequest
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
     *      title="description",
     *      description="description ",
     *      example="description"
     * )
     *
     * @var string
     */
    private $description;



    /**
     * @OA\Property(
     *      title="url",
     *      description="url",
     *      example="https://"
     * )
     *
     * @var string
     */
    private $url;

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
            'description' => 'required|string',
            'url' => 'required|url',
        ];
    }
}
