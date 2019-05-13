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
    </script>
@endsection
@section('content')
    <h3 class="p-b-1">ویرایش پست</h3>
    <div class="col-md-3"><img src="{{$post->photo_id ? $post->photo->path : "/img/avatar.jpg"}}" class="img-fluid"></div>
    <div class="col-md-9">
        @include('partials.form-errors')
        {!! Form::model($post,['method'=>'PATCH','action'=>['Admin\AdminPostController@update',$post->id],'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('title','عنوان:') !!}
            {!! Form::text('title',$post->title,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('slug','نام مستعار:') !!}
            {!! Form::text('slug',$post->slug,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category','دسته بندی:')!!}
            {!! Form::select('category',$categories,$post->category->id,['placeholder'=>'دسته بندی این مطلب را انتخاب نمائید...','class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description','توضیحات:') !!}
            {!! Form::textarea('description',$post->description,['class'=>'form-control','id'=>'description']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('status','وضعیت:') !!}
            {!! Form::select('status',[0 => 'منتشر نشده',1 => 'منتشر شده'],$post->status,['placeholder'=>'وضعیت انتشار این مطلب را مشخص نمائید...','class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('first_photo','تصویر اصلی:') !!}
            {!! Form::file('first_photo',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('meta_description','متا توضیحات:') !!}
            {!! Form::textarea('meta_description',$post->meta_description,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('meta_keywords','متا برچسب ها:') !!}
            {!! Form::textarea('meta_keywords',$post->meta_keywords,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('بروزرسانی',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
        {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminPostController@destroy',$post->id]]) !!}
        <div class="form-group">
            {!! Form::submit('حذف مطلب',['class'=>'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}
    </div>

@endsection