<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Requests\MessageRequest;
use App\Post;
use http\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user','category','photo','comments'=>function($q){
            $q->where('status','1');
        }])
            ->where('status',1)
            ->orderBy('created_at','desc')
            ->paginate(6);
        $last_posts = Post::with('user','category','photo')->limit(6)->get();
        $categories = Category::all();
        $most_read_posts = Post::with('photo','user')
            ->where('status',1)
            ->orderBy('count','desc')
            ->limit(6)->get();
        return view('frontend.main.index',compact(['posts','categories','last_posts','most_read_posts']));
    }

    public function contactForm()
    {
        $categories = Category::all();
        $most_read_posts = Post::with('photo','user')
            ->where('status',1)
            ->orderBy('count','desc')
            ->limit(6)->get();
        return view('frontend.main.contact',compact(['categories','most_read_posts']));
    }

    public function storeMessage(MessageRequest $request)
    {
        $message = new \App\Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();
        Session::flash('store_message','پیام شما با موفقیت ارسال شد');

        return back();
    }
}
