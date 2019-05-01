<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            'title' => 'required',
            'slug' => Rule::unique('categories')->ignore(request()->category),
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'لطفا عنوان را وارد نمائید',
            'title.unique' => 'عنوان مورد نظر شما قبلا ثبت شده است',
            'slug.unique' => 'نام مستعار مورد نظر شما قبلا ثبت شده است',
            'meta_description.required' => 'لطفا متا توضیحات را وارد نمائید',
            'meta_keywords.required' => 'لطفا متا برچسب ها را وارد نمائید',
        ];
    }
}
