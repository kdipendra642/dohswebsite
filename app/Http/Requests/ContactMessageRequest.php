<?php

namespace App\Http\Requests;

class ContactMessageRequest extends BaseRequest
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
            'email' => 'required|string|min:6|max:100',
            'phone' => 'required|string|min:7|max:20',
            'subject' => 'required|string|min:10|max:255',
            'message' => 'required|string|min:1|max:5000',
            // 'ip_address' => 'required|string|min:1|max:255',
             'captcha' => 'required|captcha',
        ];
    }
}
