<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules = $this->update();
        } elseif ($this->method() == 'POST') {
            $rules = $this->store();
        }

        return $rules;
    }

    /**
     * Get the validation rule that apply to store request
     */
    protected function store(): array
    {
        return [];
    }

    /**
     * Get the validation rule that apply to update request
     */
    protected function update(): array
    {
        return $this->store();
    }
}
