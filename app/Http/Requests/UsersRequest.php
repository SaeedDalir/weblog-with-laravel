<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'roles' => 'required',
            'avatar' => 'mimes:jpg,jpeg,png|max:500',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'لطفا نام و نام خانوادگی را وارد نمائید',
            'email.required' => 'لطفا ایمیل را وارد نمائید',
            'email.email' => 'ایمیل معتبر نمی باشد',
            'password.required' => 'لطفا رمز عبور را وارد نمائید',
            'password.min' => 'رمز عبور باید حداقل 8 کاراکتر باشد',
            'roles.required' => 'لطفا حداقل یک نقش انتخاب نمائید',
            'avatar.mimes' => 'لطفا تصویر پروفایل را فقط با فرمت های jpg , jpeg , png بارگزاری نمائید',
            'avatar.max' => 'حجم تصویر انتخابی بیش از حد مجاز (500 کیلوبایت) می باشد',
        ];
    }
}


