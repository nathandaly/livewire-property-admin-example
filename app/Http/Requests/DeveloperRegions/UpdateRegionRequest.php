<?php

namespace App\Http\Requests\DeveloperRegions;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRegionRequest extends FormRequest
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
            'developer_id' => ['required', 'integer'],
            'area_id'      => ['integer'],
            'region_name'  => ['required', 'string', 'max:255'],
        ];
    }
}
