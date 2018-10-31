<!DOCTYPE html>
<!-- saved from url=(0050)http://getbootstrap.com/docs/4.1/examples/sign-in/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./login_bootstrap_sample_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./login_bootstrap_sample_files/signin.css" rel="stylesheet">
</head>

<body class="text-center">
<form class="form-signin" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <img class="mb-4" src="./image/31102018071412A.png" alt="" width="300" height="260">
    <h1 class="h3 mb-3 font-weight-normal">ログイン</h1>
    <label for="inputEmail" class="sr-only">メールアドレス</label>
    <input name="email" id="inputEmail" class="form-control" placeholder="メールアドレス" autofocus="">
    <label for="inputPassword" class="sr-only">パスワード</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="パスワード">
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        <br>
    @endif
    @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        <br>
    @endif
    <div class="checkbox mb-3">
        <label class="remember-me">
            <input type="checkbox" value="remember-me" class="remember-me" name="remember" {{ old('remember') ? 'checked' : '' }} > ログインしたままにする
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
    <p class="in-up"><a href="{{ route('register') }}" class="in-up">新規登録する</a></p>
    <p class="mt-5 mb-3 text-muted">© copyright ©2018 travel_stock</p>
</form>

</body>
</html>
