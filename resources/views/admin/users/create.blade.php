@extends('admin.layouts.master')

@section('content')
    <div class="col-md-6 offset-md-3">
        <h3 class="p-b-1">ثبت کاربر</h3>
        @include('partials.form-errors')
        {!! Form::open(['method'=>'POST','action'=>'Admin\AdminUserController@store','files'=>true]) !!}
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
            {!! Form::select('status',[0 => 'غیرفعال',1 => 'فعال'],0,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('avatar','تصویر پروفایل:') !!}
            {!! Form::file('avatar',null,['class'=>'form-control']) !!}{!! Form::label('avatarTip','(بارگزاری تصویر پروفایل ضروری نمی باشد)',['class'=>'small']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('ثبت کاربر',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>

@endsection