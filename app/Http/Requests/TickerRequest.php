<?php

namespace App\Http\Requests;

class TickerRequest extends BaseRequest
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
            'description' => 'sometimes|nullable|string|min:1|max:255',
            'document' => 'sometimes|nullable|file|max:50000|mimes:jpg,png,jpeg,pdf',
        ];
    }
}
