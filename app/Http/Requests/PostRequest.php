<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class PostRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'title' => [
                'required',
                'string',
                'min:1',
                'max:255',
                Rule::unique('posts', 'title')
                    ->ignore($this->post),
            ],
            'description' => 'sometimes|nullable|string|max:5000',
            'document' => 'sometimes|nullable|file|max:5120|mimes:jpg,png,jpeg,pdf',
        ];
    }
}
