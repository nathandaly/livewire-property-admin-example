<?php

namespace App\Http\Requests\Pages;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
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
            'page_title'            => ['required', 'string'],
            'slug'                  => ['required', 'regex:/[0-9a-zA-Z\/\-]+/i'],
            'page_content'          => ['string'],
            'meta_page_title'       => ['nullable', 'string'],
            'meta_page_description' => ['nullable', 'string'],
            'show_on_sitemap'       => ['nullable', 'boolean'],
        ];
    }
}
