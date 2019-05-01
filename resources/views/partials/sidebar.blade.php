<!-- catagories -->
<div class="aside-widget">
    <div class="section-title">
        <h2>دسته بندی ها</h2>
    </div>
    <div class="category-widget">
        <ul>
            @foreach($categories as $category)
                <li><a href="{{route('frontend.categories.categoryPosts',$category->id)}}" class="cat-1">{{$category->title}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
<!-- post widget -->
<div class="aside-widget">
    <div class="section-title">
        <h2>Most Read</h2>
    </div>

    <div class="post post-widget">
        <a class="post-img" href="blog-post.html"><img src="{{asset('/img/widget-1.jpg')}}" alt=""></a>
        <div class="post-body">
            <h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
        </div>
    </div>

    <div class="post post-widget">
        <a class="post-img" href="blog-post.html"><img src="{{asset('/img/widget-2.jpg')}}" alt=""></a>
        <div class="post-body">
            <h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
        </div>
    </div>

    <div class="post post-widget">
        <a class="post-img" href="blog-post.html"><img src="{{asset('/img/widget-3.jpg')}}" alt=""></a>
        <div class="post-body">
            <h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
        </div>
    </div>

    <div class="post post-widget">
        <a class="post-img" href="blog-post.html"><img src="{{asset('/img/widget-4.jpg')}}" alt=""></a>
        <div class="post-body">
            <h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
        </div>
    </div>
</div>
<!-- /post widget -->