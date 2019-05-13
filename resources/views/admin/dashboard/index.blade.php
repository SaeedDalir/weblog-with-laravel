@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card card-inverse card-primary">
                <div class="card-block p-b-0">
                    <h4 class="m-b-0">{{$usersCount}}</h4>
                    <p>کاربران</p>
                </div>
                <div class="chart-wrapper p-x-1" style="height:70px;">
                    <canvas id="card-chart1" class="chart" height="70"></canvas>
                </div>
            </div>
        </div>
        <!--/col-->

        <div class="col-sm-6 col-lg-3">
            <div class="card card-inverse card-info">
                <div class="card-block p-b-0">
                    <h4 class="m-b-0">{{$postsCount}}</h4>
                    <p>پست ها</p>
                </div>
                <div class="chart-wrapper p-x-1" style="height:70px;">
                    <canvas id="card-chart2" class="chart" height="70"></canvas>
                </div>
            </div>
        </div>
        <!--/col-->

        <div class="col-sm-6 col-lg-3">
            <div class="card card-inverse card-warning">
                <div class="card-block p-b-0">
                    <h4 class="m-b-0">{{$categoriesCount}}</h4>
                    <p>دسته بندی ها</p>
                </div>
                <div class="chart-wrapper" style="height:70px;">
                    <canvas id="card-chart3" class="chart" height="70"></canvas>
                </div>
            </div>
        </div>
        <!--/col-->

        <div class="col-sm-6 col-lg-3">
            <div class="card card-inverse card-danger">
                <div class="card-block p-b-0">
                    <h4 class="m-b-0">{{$photosCount}}</h4>
                    <p>رسانه ها</p>
                </div>
                <div class="chart-wrapper p-x-1" style="height:70px;">
                    <canvas id="card-chart4" class="chart" height="70"></canvas>
                </div>
            </div>
        </div>
        <!--/col-->

    </div>
    <div>
        <div class="col-md-6">
            <h5 class="p-b-1"><strong>محبوب ترین ها</strong></h5>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>عنوان</th>
                    <th>دسته بندی</th>
                    <th>تعداد بازدیدها</th>
                    <th>زمان ایجاد</th>
                </tr>
                </thead>
                <tbody>
                @foreach($most_read_posts as $most_read_post)
                    <tr>
                        <td><a href="{{route('posts.edit',$most_read_post->id)}}">{{$most_read_post->title}}</a></td>
                        <td>{{$most_read_post->category->title}}</td>
                        <td>{{$most_read_post->count}}</td>
                        <td>{{\Hekmatinasser\Verta\Verta::persianNumbers(\Hekmatinasser\Verta\Verta::instance($most_read_post->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::now()))}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h5 class="p-b-1"><strong>آخرین مطالب</strong></h5>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>عنوان</th>
                    <th>دسته بندی</th>
                    <th>تعداد بازدیدها</th>
                    <th>زمان ایجاد</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td><a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a></td>
                        <td>{{$post->category->title}}</td>
                        <td>{{$post->count}}</td>
                        <td>{{\Hekmatinasser\Verta\Verta::persianNumbers(\Hekmatinasser\Verta\Verta::instance($post->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::now()))}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection