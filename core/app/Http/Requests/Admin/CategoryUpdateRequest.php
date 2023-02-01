<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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

    public function rules(Category $category)
    {
        $rules = [
            'title' => 'required|unique:categories,id' . $category->id,
            'icon' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required'  => 'Please enter Name!',
            'icon.required'  => 'Please enter icon code!'
        ];
    }
}
