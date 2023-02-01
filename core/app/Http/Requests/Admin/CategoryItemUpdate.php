<?php

namespace App\Http\Requests\Admin;

use App\Models\CategoryItem;
use Illuminate\Foundation\Http\FormRequest;

class CategoryItemUpdate extends FormRequest
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
    public function rules(CategoryItem $category_item)
    {
        $rules = [
            'title' => 'required|unique:category_items,id' . $category_item->id,
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
