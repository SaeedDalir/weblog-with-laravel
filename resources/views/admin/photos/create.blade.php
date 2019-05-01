@extends('admin.layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/dropzone.css')}}">
@endsection
@section('content')
    <div class="col-md-10 offset-md-1">
        <h3 class="p-b-1">آپلود فایل ها</h3>
        @include('partials.form-errors')
        {!! Form::open(['method'=>'POST','action'=>'Admin\AdminPhotoController@store','class'=>'dropzone']) !!}
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/dropzone.js')}}"></script>
@endsection