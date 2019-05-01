<div class="row">
    <div class="col-md-12 text-center">
        <div class="section-title">
            <h2>جدیدترین ها</h2>
        </div>
    </div>
    @foreach($last_posts as $last_post)
        <!-- post -->
        <div class="col-md-4">
            <div class="post">
                <a class="post-img" href="{{route('frontend.posts.show',$last_post->slug)}}"><img src="{{$last_post->photo_id ? $last_post->photo->path : "/img/avatar.jpg"}}" width="750" height="300"></a>
                <div class="post-body">
                    <div class="post-meta">
                        <a class="post-category cat-1" href="category.html">{{$last_post->category->title}}</a>
                        <a>در : </a>
                        <span class="post-date">{{(\Hekmatinasser\Verta\Verta::persianNumbers(\Hekmatinasser\Verta\Verta::instance($last_post->created_at)->format('%d، %B %Y')))}}</span>
                    </div>
                    <h3 class="post-title"><a href="{{route('frontend.posts.show',$last_post->slug)}}">{{str_limit($last_post->meta_description,80)}}</a></h3>
                </div>
            </div>
        </div>
        <!-- /post -->
        @endforeach
    <div class="clearfix visible-md visible-lg"></div>

</div>
<!-- /row -->

