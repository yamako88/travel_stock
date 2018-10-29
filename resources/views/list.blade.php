@extends('layouts.default2')

@section('content')

    <main role="main" class="container">
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
            <img class="mr-3" src="./list_bootstrap_sample_files/bootstrap-outline.svg" alt="" width="48" height="48">
            <div class="lh-100">
                <h4 class="mb-0 text-white lh-100">ホーム</h4>

            </div>
        </div>

        <div class="album py-5 bg-light">
            <div class="container">

                <meta name="csrf-token" content="{{ csrf_token() }}">
                {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-sm-10 title-top">
                        <h1 for="colFormLabelLg" class="title col-form-label col-form-label-lg">{{ $posts->title }}</h1>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 comment-top">
                        <h3 for="colFormLabel" class="comment col-form-label">{{ $posts->comment }}</h3>
                    </div>
                </div>

                <div class="tab-content days-ryotei" id="myTabContent">

                    {{--1日目 旅程リスト 開始--}}
                    <div class="tab-pane fade show active tab-day" id="home1" role="tabpanel" aria-labelledby="home1-tab">
                        <div class="my-3 p-3 bg-white rounded shadow-sm">
                            <h6 class="border-bottom border-gray pb-2 mb-0">旅程リスト</h6>

                            {{--追加される旅程--}}
                            <div id="sort-time-ryotei">
                            </div>

                        </div>

                    </div>
                </div>
                <div class="yokomigi">
                    <a class="btn btn-lg btn-primary btn-block plan-create yoko-left" href="../update/{{ $posts->id }}">編集</a>
                </div>
                <div class="yokohidari">
                <a class="btn btn-lg btn-primary btn-block plan-create yoko-right" href="../delete/{{ $posts->id }}" onclick='return confirm("削除します。よろしいですか？");'>削除</a>
                </div>
                <div class="yokoclea"></div>
            </div>
        </div>
    </main>

    <script type="text/javascript">

            let spots = <?php echo $spots ?>;
            console.log(spots);

            if(spots) {
                // function load() {

                    let s = '';
                    sorting();

                    for (let i = 0; i < spots.length; i++) {

                        let year = 2018;
                        let month = 8;
                        let day = 31;
                        let firsthour = spots[i]['started_hour_at'];
                        let firstminute = spots[i]['started_minute_at'];
                        let finishhour = spots[i]['finished_hour_at'];
                        let finishminute = spots[i]['finished_minute_at'];

                        let firstdt = new Date(year, month, day, firsthour, firstminute);
                        let finishdt = new Date(year, month, day, finishhour, finishminute);

                        let outHour = firstdt.getHours();
                        let outMinute = firstdt.getMinutes();
                        let autHour = finishdt.getHours();
                        let autMinute = finishdt.getMinutes();

                        outHour = ('0' + outHour).slice(-2);
                        outMinute = ('0' + outMinute).slice(-2);
                        autHour = ('0' + autHour).slice(-2);
                        autMinute = ('0' + autMinute).slice(-2);

                        // datetime型

                        if (i > 0) {
                            s += '<div class="text-muted">\n' +
                                '                                <h5>↓</h5>\n' +
                                '                            </div>\n';
                        }
                        s += '<div class="media text-muted pt-3">\n' +
                            '                                <div class="small">\n' +
                            '                                <div>\n' +
                            '                                    <strong class="time-time">' + outHour + ':' + outMinute + ' - ' + autHour + ':' + autMinute + '</strong>\n' +
                            '</div>\n' +
                            '                                </div>\n' +
                            '                                <div class="media-body pb-3 border-bottom">\n' +
                            '                                    <div class="d-flex justify-content-between">';
                        if (spots[i]['icon'] == '<i class="far fa-star icon-back"></i>') {
                            s += '<strong class="text-gray-dark">' + spots[i]['icon'] + ' ' + spots[i]['name'] + '</strong>';
                        } else {
                            s += '<strong class="text-gray-dark">' + spots[i]['icon'] + ' ' + spots[i]['name'] + '<a href="' + spots[i]['url'] + '" target="_blank">(詳細)</a></strong>';
                        }
                        s += '                                    </div>\n' +
                            '                                </div>\n' +
                            '                            </div>';
                    }

                    document.getElementById("sort-time-ryotei").innerHTML = s;
                // }
            }


            function sorting() {

                spots.sort(function (a, b) {
                    return a.started_hour_at - b.started_hour_at;
                });

                for(let i = 0; i < spots.length; i++) {
                    spots[i] = JSON.stringify(spots[i]);
                }

                for(i = 0; i < spots.length; i++) {
                    spots[i] = JSON.parse(spots[i]);
                }
            }


    </script>


@endsection
