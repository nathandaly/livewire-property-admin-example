<?php

namespace App\Http\Requests\Developers;

use Illuminate\Foundation\Http\FormRequest;

class CreateDeveloperRequest extends FormRequest
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
            'name'         => ['required', 'string', 'max:255'],
            'display_name' => ['string', 'max:255'],
            'website'      => ['url', 'max:255'],
        ];
    }
}
