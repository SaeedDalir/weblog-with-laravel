<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminMessageController extends Controller
{
    public function index()
    {
        $messages = Message::all()->sortByDesc('created_at');
        return view('admin.messages.index',compact(['messages']));
    }

    public function deleteAll(Request $request)
    {
        $messages = Message::findOrFail($request->checkBoxArray);
        foreach ($messages as $message){
            $message->delete();
        }
        Session::flash('delete_messages','پیام ها با موفقیت حذف شدند');

        return back();
    }
}
