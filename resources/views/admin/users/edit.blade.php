@extends('admin.layouts.master')

@section('content')
    <h3 class="p-b-1">ویرایش کاربر "{{$user->name}}"</h3>
    <div class="col-md-3"><img src="{{$user->photo_id ? $user->photo->path : "/img/avatar.jpg"}}" class="img-fluid"></div>
    <div class="col-md-9">
        @include('partials.form-errors')
        {!! Form::model($user ,['method'=>'PATCH','action'=>['Admin\AdminUserController@update',$user->id],'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name','نام و نام خانوادگی:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','ایمیل:') !!}
            {!! Form::text('email',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password','رمز عبور:') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('roles','نقش:')!!}{!! Form::label('rolesTip','(انتخاب چند نقش امکان پذیر می باشد)',['class'=>'small']) !!}
            {!! Form::select('roles[]',$roles,null,['multiple'=>'multiple','class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('status','وضعیت:') !!}
            {!! Form::select('status',[0 => 'غیرفعال',1 => 'فعال'],null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('avatar','تصویر پروفایل:') !!}
            {!! Form::file('avatar',null,['class'=>'form-control']) !!}{!! Form::label('avatarTip','(بارگزاری تصویر پروفایل ضروری نمی باشد)',['class'=>'small']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('بروزرسانی',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
        {!! Form::open(['method'=>'DELETE','action'=>['Admin\AdminUserController@destroy',$user->id]]) !!}
        <div class="form-group">
            {!! Form::submit('حذف کاربر',['class'=>'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}
    </div>

@endsection