<!-- catagories -->
<div class="aside-widget"w>
    <div class="section-title">
        <h2>دسته بندی ها</h2>
    </div>
    <div class="category-widget">
        <ul>
            @foreach($categories as $category)
                <li><a href="{{route('frontend.categories.categoryPosts',$category->slug)}}"  class="cat-3">{{$category->title}}<span class="pull-left">{{$category->posts->count()}}</span></a></li>
            @endforeach
        </ul>
    </div>
</div>
<!-- post widget -->
<div class="aside-widget">
    <div class="section-title">
        <h2>محبوب ترین ها</h2>
    </div>
    @foreach($most_read_posts as $most_read_post)
        <div class="post post-widget">
            <a class="post-img" href="{{route('frontend.posts.show',$most_read_post->slug)}}"><img src="{{$most_read_post->photo_id ? $most_read_post->photo->path : "/img/avatar.jpg"}}" height="70px"></a>
            <div class="post-body">
                <h4><a href="{{route('frontend.posts.show',$most_read_post->slug)}}">{{$most_read_post->title}}</a></h4>
            </div>
            <div class="footer-fixed">
                <span class="small"><span style="color:blue;font-weight: bold">{{\Hekmatinasser\Verta\Verta::persianNumbers(\Hekmatinasser\Verta\Verta::instance($most_read_post->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::now()))}}</span>  توسط <span style="color:blue;font-weight: bold">{{$most_read_post->user->name}}</span></span>
            </div>
        </div>
        <hr>
    @endforeach
</div>
<!-- /post widget -->