<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryItemStore extends FormRequest
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

    public function rules()
    {
        $rules = [
            'title' => 'required|unique:category_items|max:255',
            'category_id' => 'required',

        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required'  => 'Please enter Name!',
            'category_id.required'  => 'Please select category first!',
        ];
    }

}
