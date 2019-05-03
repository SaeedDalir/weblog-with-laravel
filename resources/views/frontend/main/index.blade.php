@extends('frontend.layouts.master')
@section('head')
    <meta name=description" content="دستیابی به بهترین مقاله های آموزش رایگان برنامه نویسی">
    <meta name=keywords" content="آموزش لاراول,آموزش برنامه نویسی,آموزش laravel,آموزش php">
@endsection
@section('navigation')
    @include('partials.navigation',['categories'=>$categories])
@endsection

@section('last_posts')
    @include('partials.last_posts',['last_posts'=>$last_posts])
@endsection

@section('content')
    @foreach($posts as $post)
        <!-- post -->
        <hr>
        <div class="col-md-12">
            <div class="post">
                <div class="post-body">
                    <div class="post-meta bg-faded">
                        <a class="post-category cat-4" href="{{route('frontend.categories.categoryPosts',$post->category->slug)}}">{{$post->category->title}}</a>
                        <a>در : </a><span class="post-date">{{\Hekmatinasser\Verta\Verta::persianNumbers(\Hekmatinasser\Verta\Verta::instance($post->created_at)->formatJalaliDatetime())}}</span>
                        <span class="small"> , منتشر شده توسط <span style="color:blue;font-weight: bold">{{$post->user->name}}</span></span>
                            <span class="small pull-left"><i class="fa fa-eye"></i><span style="color:blue;font-weight: bold">  {{$post->count}}  بازدید</span></span>
                            <span class="small pull-left" style="margin-left: 15px"><i class="fa fa-comments"></i><span style="color:blue;font-weight: bold">  {{$post->comments->count()}}  نظر</span></span>
                    </div>
                    <h3 class="post-title"><a href="{{route('frontend.posts.show',$post->slug)}}">{{$post->title}}</a></h3>
                    <p>{!!str_limit($post->description,250)!!}</p>
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