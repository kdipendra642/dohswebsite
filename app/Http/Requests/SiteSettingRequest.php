<?php

namespace App\Http\Requests;

class SiteSettingRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titleOne' => 'sometimes|nullable|string|min:1|max:255',
            'titleTwo' => 'sometimes|nullable|string|min:1|max:255',
            'titleThree' => 'sometimes|nullable|string|min:1|max:255',
            'titleFour' => 'sometimes|nullable|string|min:1|max:255',
            'description' => 'sometimes|nullable|string|min:1|max:255',
            'address' => 'sometimes|nullable|string|min:1|max:255',
            'primaryContact' => 'sometimes|nullable|string|min:7|max:20',
            'secondaryContact' => 'sometimes|nullable|string|min:7|max:20',
            'primaryEmail' => 'sometimes|nullable|string|min:6|max:100',
            'secondaryEmail' => 'sometimes|nullable|string|min:6|max:100',
            'socialTwitterLink' => 'sometimes|nullable|string|min:1|max:255',
            'socialFacebookLink' => 'sometimes|nullable|string|min:1|max:255',
            'socialYoutubeLink' => 'sometimes|nullable|string|min:1|max:255',
            'metaKeywords' => 'sometimes|nullable|string|min:1|max:255',
            'metaDescription' => 'sometimes|nullable|string|min:1|max:255',
        ];
    }
}
