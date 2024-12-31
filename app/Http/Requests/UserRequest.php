<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:6|max:255',
            'email' => [
                'required',
                'string',
                'min:6',
                'max:100',
                Rule::unique('users', 'email')
                    ->ignore($this->user),
            ],
            'password' => 'required|string|min:8|max:16|confirmed',
        ];
    }
}
