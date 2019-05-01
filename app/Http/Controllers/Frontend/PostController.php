<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
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
    }])
            ->where('slug',$slug)
            ->where('status',1)
            ->first();
        $categories = Category::all();
        return view('frontend.posts.show',compact(['post','categories']));
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
        return view('frontend.posts.search',compact(['posts','categories','query']));
    }

    public function categoryPosts($slug)
    {
        $categories = Category::all();
        $category = Category::findOrFail($slug)->first();
        $posts = Category::findOrFail($slug)->posts;
        return view('frontend.categories.showPosts',compact(['posts','category','categories']));
    }
}
