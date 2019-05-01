<?php

namespace App\Http\Controllers\Frontend;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function store(Request $request,$postId)
    {
        $post = Post::findOrFail($postId);
        if ($post){
            $comment = new Comment();
            $comment->description = $request->description;
            $comment->post_id = $post->id;
            $comment->status = 0;
            $comment->save();
            Session::flash('store_comment','نظر شما ثبت شد و در انتظار تایید مدیران قرار گرفت');
            return back();
        }
        return redirect('/');
    }

    public function reply(Request $request)
    {
        $parent_id = $request->parent_id;
        $postId = $request->post_id;
        $post = Post::findOrFail($postId);
        if ($post){
            $comment = new Comment();
            $comment->description = $request->description;
            $comment->parent_id = $parent_id;
            $comment->post_id = $post->id;
            $comment->status = 0;
            $comment->save();
            Session::flash('store_comment','نظر شما ثبت شد و در انتظار تایید مدیران قرار گرفت');
            return back();
        }
        return redirect('/');
    }
}
