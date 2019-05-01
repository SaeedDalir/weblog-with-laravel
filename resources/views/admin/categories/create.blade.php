@extends('admin.layouts.master')

@section('content')
    <div class="col-md-6 offset-md-3">
        <h3 class="p-b-1">ایجاد دسته بندی جدید</h3>
        @include('partials.form-errors')
        {!! Form::open(['method'=>'POST','action'=>'Admin\AdminCategoryController@store']) !!}
        <div class="form-group">
            {!! Form::label('title','عنوان:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('slug','نام مستعار:') !!}{!! Form::label('slugTip','(به دلیل مباحث سئو ، سیستم به صورت خودکار ، در صورت خالی بودن این فیلد ، نام مستعار را با برابر با عنوان قرار خواهد داد)',['class'=>'small']) !!}
            {!! Form::text('slug',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('meta_description','متا توضیحات:') !!}
            {!! Form::textarea('meta_description',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('meta_keywords','متا برچسب ها:') !!}
            {!! Form::textarea('meta_keywords',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('ثبت دسته بندی',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>

@endsection