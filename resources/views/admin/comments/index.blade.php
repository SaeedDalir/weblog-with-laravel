@extends('admin.layouts.master')
@section('content')
    @if(Session::has('delete_comment'))
        <div class="alert alert-danger">{{session('delete_comment')}}</div>
    @endif
    @if(Session::has('update_comment'))
        <div class="alert alert-success">{{session('update_comment')}}</div>
    @endif
    @if(Session::has('approved_comment'))
        <div class="alert alert-success">{{session('approved_comment')}}</div>
    @endif
    @if(Session::has('rejected_comment'))
        <div class="alert alert-danger">{{session('rejected_comment')}}</div>
    @endif
    <h3 class="p-b-1">لیست نظرات</h3>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>شناسه</th>
            <th>متن پیام</th>
            <th>نام</th>
            <th>مطلب</th>
            <th>ایمیل</th>
            <th>زمان ارسال</th>
            <th>وضعیت</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{{$comment->id}}</td>
                <td><a href="{{route('comments.edit',$comment->id)}}">{{$comment->description}}</a></td>
                <td>{{$comment->name}}</td>
                <td>{{$comment->post->title}}</td>
                <td>{{$comment->email}}</td>
                <td>{{\Hekmatinasser\Verta\Verta::persianNumbers(\Hekmatinasser\Verta\Verta::instance($comment->created_at)->formatJalaliDatetime())}}</td>
                <td>
                    @if($comment->status == 0)
                        <span class="tag tag-pill tag-danger font-sm">منتظر تایید</span>
                    @else
                        <span class="tag tag-pill tag-success font-sm">تایید شده</span>
                    @endif
                </td>
                <td>
                    @if($comment->status == 0)
                        {!! Form::open(['method'=>'POST','route'=>['comments.actions',$comment->id]]) !!}
                        {!! Form::hidden('action','approved') !!}
                        {!! Form::submit('تایید',['class'=>'btn btn-outline-success']) !!}
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['method'=>'POST','route'=>['comments.actions',$comment->id]]) !!}
                        {!! Form::hidden('action','rejected') !!}
                        {!! Form::submit('عدم تایید',['class'=>'btn btn-outline-danger']) !!}
                        {!! Form::close() !!}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="col-md-12 text-md-center">{{$comments->links()}}</div>

@endsection