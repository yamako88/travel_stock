@extends('layouts.default')

@section('content')

    <main role="main" class="container">
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
            <img class="mr-3" src="./list_bootstrap_sample_files/bootstrap-outline.svg" alt="" width="48" height="48">
            <div class="lh-100">
                <h4 class="mb-0 text-white lh-100">登録情報変更</h4>
                {{--<small>Since 2011</small>--}}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4"></div>
        {{--<div class="text-center">--}}
            <div class="col-sm-4">
            <form class="form-signin" method="POST" action="userupdate">
                {{ csrf_field() }}
            {{--<img class="mb-4" src="./login_bootstrap_sample_files/bootstrap-solid.svg" alt="" width="72" height="72">--}}
            {{--<h1 class="h3 mb-3 font-weight-normal">新規登録</h1>--}}
            <label for="name" class="sr-only-">ユーザー名</label>
            <input type="text" name="name" id="inputEmail" class="form-control" placeholder="ユーザー名" autofocus="" value="{{ $user->name }}">
            <label for="inputEmail" class="sr-only-">メールアドレス</label>
            <input name="email" id="inputEmail" class="form-control border-ra" placeholder="メールアドレス" autofocus="" value="{{ $user->email }}">
            <label for="inputPassword" class="sr-only-">パスワード (6文字以上)</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="パスワードを入力してください">
            @if ($errors->has('name'))
                <span class="help-block">
            <strong class="error-color">{{ $errors->first('name') }}</strong>
                    <br>
        </span>
            @endif
            @if ($errors->has('email'))
                <span class="help-block">
            <strong class="error-color">{{ $errors->first('email') }}</strong>
                    <br>
        </span>
            @endif
            @if ($errors->has('password'))
                <span class="help-block">
            <strong class="error-color">{{ $errors->first('password') }}</strong>
                    <br>
        </span>
            @endif
            <button class="btn btn-lg btn-primary btn-block btn-userupdate" type="submit">登録情報を変更する</button>
            {{--<p class="in-up"><a href="{{ route('login') }}" class="in-up">ログインする</a></p>--}}
            {{--<p class="mt-5 mb-3 text-muted">© 2017-2018</p>--}}
        </form>
        {{--</div>--}}
            </div>
        </div>
    </main>


@endsection
