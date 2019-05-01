@extends('admin.layouts.master')

@section('content')
        @if(Session::has('delete_user'))
            <div class="alert alert-danger">{{session('delete_user')}}</div>
        @endif
        @if(Session::has('store_user'))
            <div class="alert alert-success">{{session('store_user')}}</div>
        @endif
        @if(Session::has('update_user'))
            <div class="alert alert-success">{{session('update_user')}}</div>
        @endif
    <h3 class="p-b-1">لیست کاربران</h3>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>تصویر پروفایل</th>
            <th>نام</th>
            <th>ایمیل</th>
            <th>نقش</th>
            <th>وضعیت</th>
            <th>زمان عضویت</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td><img src="{{$user->photo_id ? $user->photo->path : "/img/avatar.jpg"}}" width="100"></td>
                <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>
                    <ul>
                        @foreach($user->roles as $role)
                            <li>{{$role->name}}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    @if($user->status == 0)
                        <span class="tag tag-pill tag-danger font-sm">غیر فعال</span>
                    @else
                        <span class="tag tag-pill tag-success font-sm">فعال</span>
                    @endif
                </td>
                <td>{{\Hekmatinasser\Verta\Verta::persianNumbers(\Hekmatinasser\Verta\Verta::instance($user->created_at)->formatJalaliDatetime())}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
        <div class="col-md-12 text-md-center">{{$users->links()}}</div>

@endsection