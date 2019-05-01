<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->paginate(10);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id');
        return view('admin.users.create', compact(['roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $user = new User();
        if($file = $request->file('avatar'))
        {
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = new Photo();
            $photo->path = $name ;
            $photo->name = $file->getClientOriginalName();
            $photo->user_id = Auth::id();
            $photo->save();
            $user->photo_id = $photo->id;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->save();
        $user->roles()->attach($request->roles);
        Session::flash('store_user','کاربر با موفقیت ایجاد شد');

        return redirect('/admin/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id');
        return view('admin.users.edit', compact(['user','roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        if($file = $request->file('avatar'))
        {
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = new Photo();
            $photo->path = $name ;
            $photo->name = $file->getClientOriginalName();
            $photo->user_id = Auth::id();
            $photo->save();
            $user->photo_id = $photo->id;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if (trim($request->password) != ""){
            $user->password = bcrypt($request->password);
        }
        $user->status = $request->status;
        $user->save();
        $user->roles()->sync($request->roles);
        Session::flash('update_user','کاربر با موفقیت بروزرسانی شد');

        return redirect('/admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($photo = Photo::find($user->photo_id)){
            unlink(public_path() . $photo->path);
            $photo->delete();
        }
        $user->delete();

        Session::flash('delete_user','کاربر با موفقیت حذف شد');

        return redirect('admin/users');
    }
}
