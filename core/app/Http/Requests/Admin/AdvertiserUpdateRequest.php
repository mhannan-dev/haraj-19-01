<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdvertiserUpdateRequest extends FormRequest
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
        $rules = [
            'first_name'    => 'required',
            'last_name'    => 'required',
            'mobile_no'   => 'required'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'first_name.required'  => 'Please first name!',
            'last_name.required'  => 'Please last name!',
            'mobile_no.required'  => 'Please enter mobile no!'
        ];
    }
}
