@extends('admin.layouts.master')
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#options').click(function () {
                if (this.checked){
                    $('.checkbox').each(function () {
                        this.checked = true ;
                    })
                }else{
                    $('.checkbox').each(function () {
                        this.checked = false ;
                    })
                }
            })
        })
    </script>
@endsection
@section('content')
    @if(Session::has('delete_post'))
        <div class="alert alert-danger">{{session('delete_post')}}</div>
    @endif
    @if(Session::has('delete_posts'))
        <div class="alert alert-danger">{{session('delete_posts')}}</div>
    @endif
    @if(Session::has('store_post'))
        <div class="alert alert-success">{{session('store_post')}}</div>
    @endif
    @if(Session::has('update_post'))
        <div class="alert alert-success">{{session('update_post')}}</div>
    @endif
    <h3 class="p-b-1">لیست مطالب</h3>
    <form method="POST" action="/admin/delete/post" class="form-inline">
        {{@csrf_field()}}
        {{@method_field('DELETE')}}
        <div class="form-group m-b-1">
            <select name="checkBoxArray" class="form-control input">
                <option value="delete">حذف دسته جمعی</option>
            </select>
            <input type="submit" name="submit" class="btn btn-outline-info" value="اعمال">
        </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <td><input type="checkbox" id="options"></td>
            <th>تصویر مطلب</th>
            <th>کاربر</th>
            <th>عنوان</th>
            <th>توضیحات</th>
            <th>دسته بندی</th>
            <th>وضعیت</th>
            <th>زمان ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td><input class="checkbox" type="checkbox" name="checkBoxArray[]" value="{{$post->id}}"></td>
                <td><img src="{{$post->photo_id ? $post->photo->path : "/img/avatar.jpg"}}" width="100"></td>
                <td>{{$post->user->name}}</td>
                <td><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
                <td>{{str_limit($post->description,80)}}</td>
                <td>{{$post->category->title}}</td>
                <td>
                    @if($post->status == 0)
                        <span class="tag tag-pill tag-danger font-sm">منتشر نشده</span>
                    @else
                        <span class="tag tag-pill tag-success font-sm">منتشر شده</span>
                    @endif
                </td>
                <td>{{\Hekmatinasser\Verta\Verta::persianNumbers(\Hekmatinasser\Verta\Verta::instance($post->created_at)->formatJalaliDatetime())}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </form>
    <div class="col-md-12 text-md-center">{{$posts->links()}}</div>

@endsection