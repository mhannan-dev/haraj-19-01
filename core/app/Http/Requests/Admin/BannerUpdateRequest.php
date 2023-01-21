<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;
class BannerUpdateRequest extends FormRequest
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
            'title'              => 'required',
            'banner_image'              => 'required',
            'link'              => 'required'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter name!',
            'banner_image.required' => 'Please add banner image!',
            'link.required' => 'Please enter link!'
        ];
    }
}
