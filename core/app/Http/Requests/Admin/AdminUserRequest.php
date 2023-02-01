<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
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
        $id = (int) $this->segment(2);
        if (! is_int($id)) {
            $id = (int) $this->segment(3);
        }

        if (is_int($id) && $id > 0) {

            $rules = [
                'first_name'    => 'required|min:3|max:100',
                'status'        => 'required',
                // 'profile_pic'   => 'image|mimes:jpeg,png,jpg,gif',
                // 'username'      => "unique:auths,username,{$id},id,user_type,0",
                // 'mobile_no'     => "required|unique:auths,mobile_no,{$id},id,user_type,0|regex:/^01[3-9]/|digits:11",
                'email'         => "email|unique:auths,email,{$id},id,user_type,0",
                // 'gender'        => 'required',
                'can_login'     => 'required',
                //'role'          => 'required'
            ];
        } else {

            $rules = [
                'first_name'    => 'required|min:3|max:100',
                'status'        => 'required',
                'email'         => 'required|unique:auths,email,NULL,id,user_type,0|min:4',
                'password'      => 'required|confirmed|min:6',
                'password_confirmation' => 'required|min:6',
                'gender'        => 'required',
                'can_login'     => 'required',
                //'role'          => 'required'
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
           // 'user_type.required' => 'Please select user type',
        ];
    }
}
