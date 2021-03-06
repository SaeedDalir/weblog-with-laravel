<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'لطفا نام را وارد نمائید',
            'email.required' => 'لطفا ایمیل را وارد نمائید',
            'email.email' => 'ایمیل معتبر نمی باشد',
            'message.required' => 'لطفا متن پیام را وارد نمائید',
        ];
    }
}
