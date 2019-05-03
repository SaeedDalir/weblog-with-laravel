@extends('frontend.layouts.master')
@section('navigation')
    @include('partials.navigation',['categories'=>$categories])
@endsection
@section('content')
    <div class="col-md-12 text-center">
        <div class="section-title">
            <h2>ارتباط با ما</h2>
        </div>
    </div>
    <div class="col-md-12">
        @if(Session::has('store_message'))
            <div class="alert alert-success">{{session('store_message')}}</div>
        @endif
            <div class="section-row">
            <h3>پل های ارتباطی</h3>
            <p>این بلاگ توسط اینجانب "سعید دلیر" طراحی ، برنامه نویسی و پیاده سازی شده است . کدنویسی Backend این بلاگ با استفاده از زبان PHP و بهره گیری از فرم ورک قدرتمند Laravel انجام و استاندارد سازی شده و همچنین سعی بنده بر این بوده است تا مفاهیم کلی سئو نیز رعایت شود.</p>
            <ul class="list-style" style="margin-right: 20px">
                <li><p> <strong>ایمیل : </strong> <a>Saeedkingdr@gmail.com</a></p></li>
                <li><p><strong>آیدی تلگرام : </strong> Saeedkingdr@</p></li>
                <li><p><strong>آدرس : </strong>  تهران - شهرری</p></li>
            </ul>
        </div>
    </div>
    <div class="col-md-12 col-md-offset-1">
        <div class="section-row">
            <h3>ارسال پیغام به مدیران</h3>
            <hr>
            @include('partials.form-errors')
            {!! Form::open(['method'=> 'POST' , 'route' => ['frontend.contact.storeMessage']]) !!}
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            {!! Form::label('email','نام:') !!}
                            {!! Form::text('name',null,['class'=>'input','placeholder'=>'نام خود را وارد کنید ...']) !!}
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            {!! Form::label('email','ایمیل:') !!}
                            {!! Form::text('email',null,['class'=>'input','placeholder'=>'ایمیل خود را وارد کنید ...']) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('message','متن پیام:') !!}
                            {!! Form::textarea('message',null,['class'=>'input','placeholder'=>'متن پیام خود را وارد کنید ...']) !!}
                        </div>
                        {!! Form::submit('ارسال',['class'=>'primary-button']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>


@endsection
@section('sidebar')
    @include('partials.sidebar',['categories'=>$categories])
@endsection