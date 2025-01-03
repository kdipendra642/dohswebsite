<?php

namespace App\Http\Requests;

class StaffRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:1|max:255',
            'telephone' => 'sometimes|nullable|string|min:7|max:25',
            'email' => 'sometimes|nullable|email|min:9|max:100',
            'position' => 'sometimes|nullable|string|min:1|max:150',
            'division' => 'sometimes|nullable|string|min:1|max:255',
            'section' => 'sometimes|nullable|string|min:1|max:255',
            'description' => 'sometimes|nullable|string|min:1|max:255',
            'showOnHomePage' => 'sometimes|nullable|boolean',
            'image' => 'sometimes|nullable|file|max:1024|mimes:jpg,png,jpeg',
            'priority' => 'sometimes|nullable|integer|between:1,100',
        ];
    }
}
