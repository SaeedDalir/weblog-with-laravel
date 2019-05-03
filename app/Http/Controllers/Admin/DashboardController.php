<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $postsCount = Post::count();
        $categoriesCount = Category::count();
        $photosCount = Photo::count();
        $most_read_posts = Post::orderBy('count','desc')->limit(8)->get();
        $posts = Post::orderBy('created_at','desc')->limit(8)->get();
        return view('admin.dashboard.index', compact(['usersCount','postsCount','categoriesCount','photosCount','most_read_posts','posts']));
    }
}
