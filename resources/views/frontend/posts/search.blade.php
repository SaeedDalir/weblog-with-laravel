@extends('frontend.layouts.master')
@section('navigation')
    @include('partials.navigation',['categories'=>$categories])
@endsection

@section('content')
    <div class="col-md-12 text-center">
        <div class="section-title">
            <h2>نتیجه جستجو شما برای : "{{$query}}"</h2>
        </div>
    </div>
    @foreach($posts as $post)
        <!-- post -->
        <hr>
        <div class="col-md-12">
            <div class="post">
                <div class="post-body">
                    <div class="post-meta">
                        <a class="post-category cat-4" href="category.html">{{$post->category->title}}</a>
                        <a>در : </a>
                        <span class="post-date">{{\Hekmatinasser\Verta\Verta::persianNumbers(\Hekmatinasser\Verta\Verta::instance($post->created_at)->formatJalaliDatetime())}}</span>
                        <span class="pull-left small">منتشر شده توسط <span style="color:blue;font-weight: bold">{{$post->user->name}}</span></span>
                    </div>
                    <h3 class="post-title"><a href="{{route('frontend.posts.show',$post->slug)}}">{{$post->title}}</a></h3>
                    <p>{!! str_limit($post->description,250) !!}</p>

                </div>
                <a class="post-img" href="{{route('frontend.posts.show',$post->slug)}}"><img src="{{$post->photo_id ? $post->photo->path : "/img/avatar.jpg"}}"></a>

            </div>
        </div>
        <!-- /post -->

    @endforeach
    <div class="col-md-12 text-center">{{$posts->links()}}</div>

@endsection
@section('sidebar')
    @include('partials.sidebar',['categories'=>$categories])
@endsection