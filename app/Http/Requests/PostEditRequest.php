<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostEditRequest extends FormRequest
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
    Protected function PrepareForValidation()
    {
        if ($this->slug){
            $this->merge(['slug' => make_slug($this->slug)]);
        }else{
            $this->merge(['slug' => make_slug($this->title)]);
        }
    }

    public function rules()
    {
        return [
            'title' => 'required|min:10',
            'slug' => Rule::unique('posts')->ignore(request()->post),
            'category' => 'required',
            'description' => 'required',
            'status' => 'required',
            'first_photo' => 'mimes:jpg,jpeg,png|max:5000',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'لطفا عنوان را وارد نمائید',
            'title.min' => 'عنوان باید حداقل 10 کاراکتر باشد',
            'slug.unique' => 'نام مستعار مورد نظر شما قبلا ثبت شده است',
            'category.required' => 'لطفا دسته بندی را انتخاب نمائید',
            'description.required' => 'لطفا توضیحات را وارد نمائید',
            'status.required' => 'لطفا وضعیت را مشخص نمائید',
            'first_photo.mimes' => 'لطفا تصویر اصلی را فقط با فرمت های jpg , jpeg , png بارگزاری نمائید',
            'first_photo.max' => 'حجم تصویر انتخابی بیش از حد مجاز (5000 کیلوبایت) می باشد',
            'meta_description.required' => 'لطفا متا توضیحات را وارد نمائید',
            'meta_keywords.required' => 'لطفا متا برچسب ها را وارد نمائید',
        ];
    }
}
