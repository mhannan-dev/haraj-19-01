<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;


class BrandStoreRequest extends FormRequest
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
            'title'              => 'required|max:255',
            'category_id'              => 'required',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter brand name!',
            'category_id.required' => 'Please select cateroy!',
        ];
    }
}
