@extends('admin.layouts.master')
@section('headScripts')
    <script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{asset('/ckeditor/adapters/jquery.js')}}"></script>

    <script type="text/javascript">
        CKEDITOR.replace('description', {
// Load the German interface.
            language: 'fa'
        });
        CKEDITOR.replace('meta_description', {
// Load the German interface.
            language: 'fa'
        });
    </script>
@endsection
@section('content')
    <div class="col-md-10 offset-md-1">
        <h3 class="p-b-1">ایجاد مطلب جدید</h3>
        @include('partials.form-errors')
        {!! Form::open(['method'=>'POST','action'=>'Admin\AdminPostController@store','files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('title','عنوان:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('slug','نام مستعار:') !!}
            {!! Form::text('slug',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category','دسته بندی:')!!}
            {!! Form::select('category',$categories,null,['placeholder'=>'دسته بندی این مطلب را انتخاب نمائید...','class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description','توضیحات:') !!}
            {!! Form::textarea('description',null,['class'=>'form-control','id'=>'description']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('status','وضعیت:') !!}
            {!! Form::select('status',[0 => 'منتشر نشده',1 => 'منتشر شده'],null,['placeholder'=>'وضعیت انتشار این مطلب را مشخص نمائید...','class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('first_photo','تصویر اصلی:') !!}
            {!! Form::file('first_photo',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('meta_description','متا توضیحات:') !!}
            {!! Form::textarea('meta_description',null,['class'=>'form-control','id'=>'meta_description']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('meta_keywords','متا برچسب ها:') !!}
            {!! Form::textarea('meta_keywords',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('ثبت مطلب',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>

@endsection