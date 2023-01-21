<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SocialMediaUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|string|max:191|min:1',
            'icon' => 'required',
            'social_link' => 'required'
        ];


        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter name!',
            'icon.required' => 'Please enter icon text!',
            'social_link.required' => 'Please enter social_link!'
        ];
    }
}
