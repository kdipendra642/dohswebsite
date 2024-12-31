<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportantLinkRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'title' => 'required|string|min:1|max:255',
            'url' => 'required|url|min:1|max:255',
            'showOnHomePage' => 'sometimes|nullable|boolean',
        ];
    }
}
