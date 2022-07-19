<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phone_number' => 'required|digits:11|numeric|unique:users',
            'password' => 'required|min:8|max:16',
        ];
    }
    public function messages()
    {
        return [
            'phone_number.required' => 'شماره تلفن الزامی می باشد',
            'phone_number.digits' => 'شماره تلفن باید ۱۱ رقم می باشد',
            'phone_number.numeric' => 'شماره تلفن باید فقط شامل عدد باشد',
            'phone_number.unique' => 'این شماره تلفن قبلا ثبت شده است',

            'password.required' => 'رمز عبور الزامی می باشد',
            'password.min' => 'رمز عبور باید حد اقل هشت کاراکتر باشد ',
            'password.max' => 'رمز عبور باید حد اکثر شانزده کاراکتر باشد',
        ];
    }
}
