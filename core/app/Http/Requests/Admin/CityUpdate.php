<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CityUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|string|max:191|min:1,'. $this->city,
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter name!'
        ];
    }
}
