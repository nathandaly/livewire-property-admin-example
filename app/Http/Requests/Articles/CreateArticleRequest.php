<?php

namespace App\Http\Requests\Articles;

use Illuminate\Foundation\Http\FormRequest;

class CreateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'blog_title'            => ['required', 'string', 'max:255'],
            'slug'                  => ['required', 'regex:/[0-9a-zA-Z\/\-]+/i', 'max:127'],
            'blog_summary'          => ['string'],
            'blog_content'          => ['string'],
            'blog_page_title'       => ['nullable', 'string', 'max:255'],
            'blog_page_description' => ['nullable', 'string', 'max:255'],
            'published_at'          => ['nullable', 'date'],
        ];
    }
}
