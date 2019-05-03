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
    @if(Session::has('delete_messages'))
        <div class="alert alert-danger">{{session('delete_messages')}}</div>
    @endif
    <h3 class="p-b-1">لیست پیام ها</h3>
    <form method="POST" action="/admin/delete/message" class="form-inline">
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
            <th>نام</th>
            <th>متن پیام</th>
            <th>ایمیل</th>
            <th>زمان ارسال</th>
        </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                <td><input class="checkbox" type="checkbox" name="checkBoxArray[]" value="{{$message->id}}"></td>
                <td>{{$message->id}}</td>
                <td>{{$message->name}}</td>
                <td>{{$message->message}}</td>
                <td>{{$message->email}}</td>
                <td>{{\Hekmatinasser\Verta\Verta::persianNumbers(\Hekmatinasser\Verta\Verta::instance($message->created_at)->formatJalaliDatetime())}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </form>

@endsection