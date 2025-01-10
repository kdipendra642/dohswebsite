<?php

namespace App\Http\Requests;

class PopUpRequest extends BaseRequest
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
            'status' => 'sometimes|nullable|boolean',
            'image' => 'sometimes|nullable|file|max:2056|mimes:png,jpg,jpeg,pdf',
        ];
    }
}
