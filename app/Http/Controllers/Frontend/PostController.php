<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Events\PostViewEvent;
use App\Post;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::with(['user','category','photo',
            'comments'=>function($q){
            $q->where('status',1);
            $q->where('parent_id',null);
            $q->orderBy('created_at','desc');
            },'comments.replies'=>function($q){
            $q->where('status',1);
            $q->orderBy('created_at','desc');
    }])
            ->where('slug',$slug)
            ->where('status',1)
            ->first();
        $categories = Category::all();
        $most_read_posts = Post::with('photo')
            ->where('status',1)
            ->orderBy('count','desc')
            ->limit(6)->get();
        event(new PostViewEvent($post));
        return view('frontend.posts.show',compact(['post','categories','most_read_posts']));
    }

    public function searchTitle()
    {
        $query = Input::get('title');
        $posts = Post::with('user','category','photo')
            ->where('title','like',"%".$query."%")
            ->where('status',1)
            ->orderBy('created_at','desc')
            ->paginate(5);
        $categories = Category::all();
        $most_read_posts = Post::with('photo')
            ->where('status',1)
            ->orderBy('count','desc')
            ->limit(6)->get();
        return view('frontend.posts.search',compact(['posts','categories','query','most_read_posts']));
    }

    public function categoryPosts($slug)
    {
        $categories = Category::all();
        $category = Category::with(['posts'=>function($q){
        $q->where('status', 1);
            }])->where('slug',$slug)->first();
        $most_read_posts = Post::with('photo')
            ->where('status',1)
            ->orderBy('count','desc')
            ->limit(6)->get();
        return view('frontend.categories.showPosts',compact(['category','categories','most_read_posts']));
    }
}
