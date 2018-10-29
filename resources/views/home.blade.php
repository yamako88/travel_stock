@extends('layouts.default')

@section('content')

<main role="main" class="container">

    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
        <img class="mr-3" src="{{ asset('./list_bootstrap_sample_files/bootstrap-outline.svg') }}" alt="" width="48" height="48">
        <div class="lh-100">
            <h4 class="mb-0 text-white lh-100">ホーム</h4>
        </div>
    </div>


    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">

                @foreach ($posts as $post)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <div class="box8">
                                    <p class="card-text ellipsis1">{{ $post->title }}</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                            <p class="btn-sm ellipsis">{{ $post->comment }}</p>
                                    </div>
                                </div>
                                <a href="{{ url('list/'.$post->id) }}"></a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-sm-4 add">
                    <div class="add-yotei">
                        <p class="name-add-yotei">予定を追加</p>

                    <div class="post-add">
                        <a onclick="firstDate()" href="{{ url('create') }}" class="btn-add">➕</a>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</main>


@endsection


@section('script')
    <script type="text/javascript" src="{{ asset('./js/display.js') }}"></script>
@endsection