<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Tutorial Update Form Request Fields",
 *      description="Tutorial Update request body data",
 *      type="object",
 *      required={"name"}
 * )
 */


class TutorialUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Tutorial title",
     *      description="title of the script type",
     *      example="How to"
     * )
     *
     * @var string
     */
    private $title;

    /**
     * @OA\Property(
     *      title="Tutorial description",
     *      description="description of the Tutorial",
     *      example="This is"
     * )
     *
     * @var string
     */
    private $description;

    /**
     * @OA\Property(
     *      title="Tutorial link URL",
     *      description="URL of the tutorial",
     *      example="https://www.youtube.com/watch?v=syJHxlJWGrk"
     * )
     *
     * @var string
     */
    private $link;
    
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
            'title' => 'required|string',
            'link' => 'required|string',
            'description' => 'nullable',
        ];
    }
}
