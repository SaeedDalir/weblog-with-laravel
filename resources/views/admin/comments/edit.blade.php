@extends('admin.layouts.master')

@section('content')
    <h3 class="p-b-1">ویرایش نظر</h3>
    <div class="col-md-6 offset-md-3">
        @include('partials.form-errors')
        {!! Form::model($comment ,['method'=>'PATCH','action'=>['Admin\CommentController@update',$comment->id]]) !!}
        <div class="form-group">
            {!! Form::label('description','توضیحات:') !!}
            {!! Form::textarea('description',$comment->description,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('بروزرسانی',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
        {!! Form::open(['method'=>'DELETE','action'=>['Admin\CommentController@destroy',$comment->id]]) !!}
        <div class="form-group">
            {!! Form::submit('حذف نظر',['class'=>'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}
    </div>

@endsection