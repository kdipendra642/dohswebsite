<?php

namespace App\Http\Requests;

class GalleryRequest extends BaseRequest
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
            // 'thumbnail' => 'sometimes|nullable|file|max:1024|mimes:jpg,png,jpeg',
            'supportingImages' => 'sometimes|nullable|array|min:1',
            'supportingImages.*' => 'sometimes|nullable|file|max:1024|mimes:jpg,png,jpeg',
        ];
    }
}
