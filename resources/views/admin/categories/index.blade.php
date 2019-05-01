@extends('admin.layouts.master')

@section('content')
    @if(Session::has('delete_category'))
        <div class="alert alert-danger">{{session('delete_category')}}</div>
    @endif
    @if(Session::has('store_category'))
        <div class="alert alert-success">{{session('store_category')}}</div>
    @endif
    @if(Session::has('update_category'))
        <div class="alert alert-success">{{session('update_category')}}</div>
    @endif
    <h3 class="p-b-1">لیست مطالب</h3>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>شناسه</th>
            <th>عنوان</th>
            <th>زمان ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td><a href="{{route('categories.edit',$category->id)}}">{{$category->title}}</a></td>
                <td>{{\Hekmatinasser\Verta\Verta::persianNumbers(\Hekmatinasser\Verta\Verta::instance($category->created_at)->formatJalaliDatetime())}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="col-md-12 text-md-center">{{$categories->links()}}</div>

@endsection