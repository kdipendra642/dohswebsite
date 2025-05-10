<?php

namespace App\Http\Requests;

use App\Enums\PostSubCategoryTypeEnum;
use Illuminate\Validation\Rule;

class PostRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'title' => [
                'required',
                'string',
                'min:1',
                'max:255',
                Rule::unique('posts', 'title')
                    ->ignore($this->post),
            ],
            'title_nep' => 'sometimes|nullable|string|min:1|max:255',
            'description_nep' => 'sometimes|nullable|string|min:1|max:5000',
            'description' => 'sometimes|nullable|string|max:10000',
            'sub_category' => [
                'required',
                'string',
                Rule::in(PostSubCategoryTypeEnum::getAllValues()),
                // 'in:laws-regulation,information-news,tender-notice,other'
            ],
            'document' => 'sometimes|nullable|file|max:50000|mimes:jpg,png,jpeg,pdf',
            'document_nep' => 'sometimes|nullable|file|max:50000|mimes:jpg,png,jpeg,pdf',
            'show_on_ticker' => 'sometimes|nullable|boolean',
            'publised_at' => 'sometimes|nullable|date|date_format:Y-m-d',
        ];
    }
}
