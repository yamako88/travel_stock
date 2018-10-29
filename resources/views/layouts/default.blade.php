<!DOCTYPE html>
<!-- saved from url=(0053)http://getbootstrap.com/docs/4.1/examples/offcanvas/# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Offcanvas template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./login_bootstrap_sample_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    {{--<link href="./login_bootstrap_sample_files/signin.css" rel="stylesheet">--}}

    <!-- Bootstrap core CSS -->
    <link href="./list_bootstrap_sample_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./list_bootstrap_sample_files/offcanvas.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="./index_bootstrap_sanple_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./index_bootstrap_sanple_files/album.css" rel="stylesheet">

    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet">

</head>

<body class="bg-light" onload="load()">

<header>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</header>

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <a class="navbar-brand mr-auto mr-lg-0" href="#">旅程ストック</a>
    <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="home">ホーム <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="useredit">登録情報変更</a>
            </li>
            <li class="nav-item">
                <a>ようこそ、{{ Auth::user()->name }}さん</a>
            </li>

        </ul>

        <ul class="navbar-nav nav-logout">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    ログアウト
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>

    </div>
</nav>


@yield('content')


<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="http://getbootstrap.com/docs/4.1/examples/album/#">Back to top</a>
        </p>
        <p>Album example is © Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="http://getbootstrap.com/docs/4.1/">Visit the homepage</a> or read our <a href="http://getbootstrap.com/docs/4.1/getting-started/">getting started guide</a>.</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="./index_bootstrap_sanple_files/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="./index_bootstrap_sanple_files/popper.min.js"></script>
<script src="./index_bootstrap_sanple_files/bootstrap.min.js"></script>
<script src="./index_bootstrap_sanple_files/holder.min.js"></script>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
{{--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}
<script src="./list_bootstrap_sample_files/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="./list_bootstrap_sample_files/popper.min.js"></script>
<script src="./list_bootstrap_sample_files/bootstrap.min.js"></script>
<script src="./list_bootstrap_sample_files/holder.min.js"></script>
<script src="./list_bootstrap_sample_files/offcanvas.js"></script>
{{--<script type="text/javascript" src="./js/display.js"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>

@yield('script')
<svg xmlns="http://www.w3.org/2000/svg" width="348" height="225" viewBox="0 0 348 225" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="17" style="font-weight:bold;font-size:17pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text></svg></body></html>




{{--<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="2" style="font-weight:bold;font-size:2pt;font-family:Arial, Helvetica, Open Sans, sans-serif">32x32</text></svg></body></html>--}}