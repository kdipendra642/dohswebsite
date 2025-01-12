<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsefulToolRequest extends BaseRequest
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
                Rule::unique('useful_tools')->ignore($this->usefultool)
            ],
            'url' => 'sometimes|nullable|url|min:1|max:255',
            'icons' => 'sometimes|nullable|file|max:2056|mimes:png,jpg'
        ];
    }
}
