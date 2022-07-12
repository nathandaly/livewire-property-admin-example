<?php

namespace App\Http\Requests\Branches;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBranchRequest extends FormRequest
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
            'agent_id'    => ['required', 'int'],
            'branch_ref'  => ['required', 'string'],
            'branch_name' => ['required', 'string'],
            'telephone'   => ['string'],
            'website'     => ['url'],
            'email'       => ['email'],
        ];
    }
}
