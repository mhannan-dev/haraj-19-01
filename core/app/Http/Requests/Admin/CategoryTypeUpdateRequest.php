<?php

namespace App\Http\Requests\Admin;

use App\Models\CategoryType;
use Illuminate\Foundation\Http\FormRequest;

class CategoryTypeUpdateRequest extends FormRequest
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

    public function rules(CategoryType $category_type)
    {
        $rules = [
            'title' => 'required|unique:category_types,id' . $category_type->id,
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required'  => 'Please enter Name!',
        ];
    }
}
