<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SocialMediaStore extends FormRequest
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
          'title'          => 'required',
          'icon'          => 'required',
          'social_link'          => 'required',

      ];

      return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter name!',
            'icon.required' => 'Please enter social` icon text!',
            'social_link.required' => 'Please enter social link!'
        ];
    }
}
