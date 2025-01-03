<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class CategoryRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'min:1',
                'max:255',
                Rule::unique('categories', 'title')
                    ->ignore($this->category),
            ],
        ];
    }
}
