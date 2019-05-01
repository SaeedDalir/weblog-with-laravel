@extends('frontend.layouts.master')
@section('head')
    <meta name=description" content="{{$post->meta_description}}">
    <meta name=keywords" content="{{$post->meta_keywords}}">
@endsection
@section('navigation')
    @include('partials.navigation',['categories'=>$categories])
@endsection

@section('content')
        <!-- post -->
        @if(Session::has('store_comment'))
            <div class="alert alert-success">{{session('store_comment')}}</div>
        @endif
        <hr>
        <div class="col-md-12">
            <div class="post">

                <div class="post-body">
                    <div class="post-meta">
                        <a class="post-category cat-4">{{$post->category->title}}</a>
                        <a>در :</a>
                        <span class="post-date">{{\Hekmatinasser\Verta\Verta::persianNumbers(\Hekmatinasser\Verta\Verta::instance($post->created_at)->formatJalaliDatetime())}}</span>
                        <span class="pull-left small">منتشر شده توسط <span style="color:blue;font-weight: bold">{{$post->user->name}}</span></span>
                    </div>
                    <h1 style="font-size: 26px">{{$post->title}}</h1>
                    <hr>
                    <a class="post-img"><img src="{{$post->photo_id ? $post->photo->path : "/img/avatar.jpg"}}"></a>
                    <hr>
                    <p class="text-justify">{!! $post->description !!}</p>


                </div>

            </div>
        </div>
        <!-- /post -->
        <!-- comments -->
        <hr>
        <div class="section-row">
            <div class="section-title">
                <h2>نظرات</h2>
            </div>
            @include('partials.comments',['comments'=>$post->comments , '$post'=>$post])
        </div>
        <!-- /comments -->

        <!-- reply -->
        <div class="section-row">
            <div class="section-title">
                <h2>نظر بدهید</h2>

                @include('partials.form-errors')
            </div>
             <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::open(['method'=> 'POST' , 'route' => ['frontend.comments.store',$post->id]]) !!}
                            {!! Form::textarea('description',null,['class'=>'input','placeholder'=>'متن نظر خود را وارد کنید ...']) !!}
                        </div>
                            {!! Form::submit('ثبت',['class'=>'primary-button']) !!}
                            {!! Form::close() !!}
                    </div>
             </div>
        </div>
        <!-- /reply -->


@endsection
@section('sidebar')
    @include('partials.sidebar',['categories'=>$categories])
@endsection