<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|integer',
            'preview' => 'required|file',
            'image' => 'required|file',
//            'tag_ids' => 'nullable|array',
            'tag_ids' => 'nullable|array',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'This field should be filled in',
            'title.string' => 'The data must match the string type',
            'category_id.required' => 'This field should be filled in',
            'category_id.integer' => 'The category_id must be number',
            'preview.required' => 'You  must choose file',
            'preview.file' => 'This field should be filled in ',
            'image.required' => 'You  must choose file',
            'image.file' => 'This field should be filled in ',
            'tag_ids.nullable' => 'This should be nullable',
            'tag_ids.array' => 'Need to send an array of data',
        ];
    }
}
