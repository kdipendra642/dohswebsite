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
            'add_to_slider' => 'sometimes|nullable|boolean',
            'supportingImages' => 'sometimes|nullable|array|min:1',
            'supportingImages.*' => 'sometimes|nullable|file|max:1024|mimes:jpg,png,jpeg',
            'title_nep' => 'sometimes|nullable|string|min:1|max:255',
            'description' => 'sometimes|nullable|string|min:1|max:5000',
            'description_nep' => 'sometimes|nullable|string|min:1|max:5000',
        ];
    }
}
