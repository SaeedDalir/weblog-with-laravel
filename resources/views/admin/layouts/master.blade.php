<!DOCTYPE html>
<html lang="IR-fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Roxo Administrator">
    <meta name="author" content="Masoud Salehi">
    <meta name="keyword" content="Bootstrap Data">

    <title>صفحه مدیریت</title>

    <link href="{{asset('/admin/dist/style.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/css/simple-line-icons.css')}}" rel="stylesheet">

    <!-- Main styles for this application -->
    @yield('styles')

<!-- Latest compiled and minified CSS -->
    <script src="{{asset('/admin/js/libs/jquery.min.js')}}"></script>
    @yield('headScripts')

</head>

<body class="navbar-fixed sidebar-nav fixed-nav">
<header class="navbar">
    <div class="container-fluid">
        <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
        <ul class="nav navbar-nav hidden-md-down">
            <li class="nav-item">
                <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
            </li>

        </ul>
        <ul class="nav navbar-nav pull-left hidden-md-down">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link m-r-2" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="hidden-md-down font-weight-bold font-lg">مدیر محترم {{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</header>
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard.index')}}"><i class="icon-speedometer"></i> داشبورد </a>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-user"></i>کـــاربـران</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('users.index')}}"><i class="icon-people"></i> لیست کاربران</a>
                        <a class="nav-link" href="{{route('users.create')}}"><i class="fa fa-user-plus"></i>کاربر جدید</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-archive"></i>مطالـــب</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('posts.index')}}"><i class="fa fa-list-ul"></i> لیست مطالب</a>
                        <a class="nav-link" href="{{route('posts.create')}}"><i class="fa fa-plus-circle"></i>مطلب جدید</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>دسته بندی ها</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories.index')}}"><i class="fa fa-list-ul"></i>لیست دسته بندی ها</a>
                        <a class="nav-link" href="{{route('categories.create')}}"><i class="fa fa-plus-circle"></i>دسته بندی جدید</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-file-photo-o"></i>فایل ها</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('photos.index')}}"><i class="fa fa-list-ul"></i>لیست فایل ها</a>
                        <a class="nav-link" href="{{route('photos.create')}}"><i class="fa fa-plus-circle"></i>فایل جدید</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('comments.index')}}"><i class="icon-speech"></i>نظرات</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('messages.index')}}"><i class="fa fa-comments"></i>پیام ها</a>
            </li>
        </ul>
    </nav>
</div>
<!-- Main content -->
<main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">خانه</a></li>
        <li class="breadcrumb-item"><a href="/admin/dashboard">مدیریت</a></li>
        <!-- Breadcrumb Menu-->
        <li class="breadcrumb-menu">
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <a class="btn btn-secondary" href="{{route('comments.index')}}"><i class="icon-speech"></i></a>
                <a class="btn btn-secondary" href="{{route('dashboard.index')}}"><i class="icon-graph"></i> &nbsp;داشبورد</a>
            </div>
        </li>
    </ol>

    <div class="container-fluid bg-content">
        <div class="animated fadeIn">
            <!--/row-->
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
    <!--/.container-fluid-->
</main>

<footer class="footer">
    <span class="pull-right">
            Powered by CoreUI
        </span>
</footer>

<script src="{{asset('/admin/js/app.js')}}"></script>
<script src="{{asset('/admin/js/views/main.js')}}"></script>
<script src="{{asset('/admin/js/libs/Chart.min.js')}}"></script>
<script src="{{asset('/admin/js/libs/tether.min.js')}}"></script>
<script src="{{asset('/admin/js/libs/bootstrap.min.js')}}"></script>
<script src="{{asset('/admin/js/libs/pace.min.js')}}"></script>

@yield('scripts')
</body>

</html>