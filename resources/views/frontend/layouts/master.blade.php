<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@yield('head')
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link href="{{asset('/img/favicon.ico')}}" rel="shortcut icon">
    <title>وب آرتیـکل | Web Article</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/all.css')}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>
    <body>
        <header id="header">

        <!-- Header -->
            @yield('navigation')
        <!-- /Header -->
        </header>
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
                @yield('last_posts')
            <!-- row -->
            <div class="row" style="margin-top: 25px">
                <div class="col-md-8">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>

                <div class="col-md-4">
                    @yield('sidebar')
                    <!-- ad -->
                    <div class="aside-widget text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <img class="img-responsive" src="{{asset('/img/ad-1.jpg')}}" alt="">
                        </a>
                    </div>
                    <!-- /ad -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
    <!-- Footer -->
    <footer id="footer">
            <div class="footer-copyright text-center">
                <span>2019 © Copyright کليه حقوق مادی و معنوی برای Web-Article محفوظ است و هرگونه کپی برداری پیگرد قانونی دارد.</span>
            </div>
    </footer>
    <!-- /Footer -->
    <script src="{{asset('js/all.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(".reply").click(function () {
                $('.form-reply').hide('slow')
                var service = this.id
                var service_id = '#f-' + service
                $(service_id).toggle();
            })
        })
    </script>
        @stack('script')
    </body>
    </html>
