    <!-- Nav -->
    <div id="nav">
        <!-- Main Nav -->
        <div id="nav-fixed">
            <div class="container">
                <!-- search & aside toggle -->
                <div class="nav-btns pull-left">

                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <div class="search-form text-left">

                    {!! Form::open(['method'=>'GET','action'=>'Frontend\PostController@searchTitle','style'=>'display:inline']) !!}

                        {!! Form::text('title',null,['class'=>'search-input','placeholder'=>'عبارت خود را وارد کنید ...']) !!}
                        {!! Form::close() !!}
                        <button class="search-close"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /search & aside toggle -->



                <!-- logo -->
                <div class="nav-logo pull-right">
                    <a href="/" class="logo"><img src="{{asset('/img/php-logo1.png')}}" alt=""></a>
                </div>
                <!-- /logo -->

                <!-- nav -->
                <ul class="nav-menu nav navbar-nav pull-right">
                        <li class="cat-3"><a href="/">خانه</a></li>
                        <li class="cat-1"><a href="category.html">ارتباط با ما</a></li>
                </ul>
                <!-- /nav -->

                <!-- /search & aside toggle -->
            </div>
        </div>
        <!-- /Main Nav -->
    </div>
    <!-- /Nav -->
    <div id="post-header" class="page-header">
        <div class="background-img" style="background-image: url('{{asset('/img/post-page.jpg')}}');"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 post-meta"><h1> وبلاگ تخصصی آموزش برنامه نویسی تحت وب</h1>
                    <div class="post-meta">
                        <span class="post-date">When people talk about PHP frameworks, one of the names that tend to pop up most often is <a class="post-category cat-2" href="https://laravel.com/" target="_blank">LARAVEL</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Header -->