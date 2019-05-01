@extends('admin.layouts.master')

@section('content')
    <h3 class="p-b-1">ویرایش پست</h3>
    <div class="col-md-6 offset-md-3">
        @include('partials.form-errors')
        {!! Form::model($category ,['method'=>'PATCH','action'=>['Admin\AdminCategoryController@update',$category->id]]) !!}
        <div class="form-group">
            {!! Form::label('title','عنوان:') !!}
            {!! Form::text('title',$category->title,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('slug','نام مستعار:') !!}{!! Form::label('slugTip','(به دلیل مباحث سئو ، سیستم به صورت خودکار ، در صورت خالی بودن این فیلد ، نام مستعار را با برابر با "عنوان" قرار خواهد داد)',['class'=>'small']) !!}
            {!! Form::text('slug',$category->slug,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('meta_description','متا توضیحات:') !!}
            {!! Form::textarea('meta_description',$category->meta_description,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('meta_keywords','متا برچسب ها:') !!}
            {!! Form::textarea('meta_keywords',$category->meta_keywords,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('بروزرسانی',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
        {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminCategoryController@destroy',$category->id]]) !!}
        <div class="form-group">
            {!! Form::submit('حذف دسته بندی',['class'=>'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}
    </div>

@endsection