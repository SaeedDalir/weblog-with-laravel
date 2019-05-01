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
    @if(Session::has('delete_photos'))
        <div class="alert alert-danger">{{session('delete_photos')}}</div>
    @endif
    <h3 class="p-b-1">لیست فایل ها</h3>
    <form method="POST" action="/admin/delete/media" class="form-inline">
        {{@csrf_field()}}
        {{@method_field('DELETE')}}
        <div class="form-group m-b-1">
            <select name="checkBoxArray" class="form-control input">
                <option value="delete">حذف دسته جمعی</option>
            </select>
            <input type="submit" class="btn btn-outline-info" value="اعمال">
        </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <td><input type="checkbox" id="options"></td>
            <th>شناسه</th>
            <th>تصویر</th>
            <th>کاربر</th>
            <th>زمان بارگزاری</th>
        </tr>
        </thead>
        <tbody>
        @foreach($photos as $photo)
            <tr>
                <td><input class="checkbox" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                <td>{{$photo->id}}</td>
                <td><img src="{{$photo->path}}" width="150"></td>
                <td>{{$photo->user->name}}</td>
                <td>{{\Hekmatinasser\Verta\Verta::persianNumbers(\Hekmatinasser\Verta\Verta::instance($photo->created_at)->formatJalaliDatetime())}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </form>

    <div class="col-md-12 text-md-center">{{$photos->links()}}</div>
@endsection