<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::with('post')
            ->orderBy('created_at','desc')
            ->paginate(30);
        return view('admin.comments.index',compact(['comments']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('admin.comments.edit',compact(['comment']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->description = $request->description;
        $comment->save();
        Session::flash('update_comment','نظر با موفقیت بروزرسانی شد');

        return redirect('/admin/comments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id)->delete();
        Session::flash('delete_comment','نظر با موفقیت حذف شد');

        return redirect('/admin/comments');
    }

    public function actions(Request $request,$id)
    {
        if ($request->has('action')){
            if ($request->action == 'approved'){
                $comment = Comment::findOrFail($id);
                $comment->status = 1;
                $comment->save();
                Session::flash('approved_comment','نظر به "تایید شده" تغییر یافت');
            }
            else{
                $comment = Comment::findOrFail($id);
                $comment->status = 0;
                $comment->save();
                Session::flash('rejected_comment','نظر به "منتظر تایید" تغییر یافت');
            }
        }
        return redirect('/admin/comments');
    }
}
