<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
class CategoryTypeStoreRequest extends FormRequest
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
            'title' => 'required|unique:category_types|max:255'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required'  => 'Please enter Name!'
        ];
    }
}
