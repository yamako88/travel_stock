@extends('layouts.default')

@section('content')

    <main role="main" class="container">

        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
            <img class="mr-3" src="./list_bootstrap_sample_files/bootstrap-outline.svg" alt="" width="48" height="48">
            <div class="lh-100">
                <h4 class="mb-0 text-white lh-100">旅程作成</h4>

            </div>
        </div>

        <div class="album py-5 bg-light">
            <div class="container">

                <form>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">タイトル</label>
                            <input type="text" class="form-control form-control-lg" id="colFormLabelLg" placeholder="例）沖縄〜グルメ旅〜">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <label for="colFormLabel" class="col-sm-2 col-form-label">コメント</label>
                            <textarea type="text" class="form-control" id="colFormLabel" cols="20" rows="4" placeholder="例）二日間かけて沖縄のグルメを食べ尽くそう！"></textarea>
                        </div>
                    </div>
                </form>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item not-del">
                        <a class="nav-link active lists" id="home1-tab" data-toggle="tab" data-day="1" href="#home1" role="tab" aria-controls="home" aria-selected="true">1日目</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link add-date" id="contact-tab" data-toggle="tab" role="tab" aria-controls="contact" aria-selected="false" onclick="adddate()">＋</a>
                    </li>
                </ul>
                <ul></ul>
                <div class="tab-content days-ryotei" id="myTabContent">

                    {{--1日目 旅程リスト 開始--}}
                    <div class="tab-pane fade show active tab-day" id="home1" role="tabpanel" aria-labelledby="home1-tab">
                        <div class="my-3 p-3 bg-white rounded shadow-sm">
                            <h6 class="border-bottom border-gray pb-2 mb-0">1日目</h6>

                            {{--追加される旅程--}}
                            <div id="sort-time-ryotei">
                            </div>




                            <div class="pt-3 one-add">
                                {{--モーダル表示 1日目 開始--}}
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            {{--共通モーダル　タイトル--}}
                                            <div class="modal-header">
                                                <a href="#" class="square-btn-back" id="modoru" onclick="hyoji1(0)">
                                                    <i class="fas fa-angle-left"></i> 戻る
                                                </a>
                                                <h5 class="modal-title" id="choice">予定の追加</h5>
                                                <h5 class="modal-title" id="spot">観光する場所を探す</h5>
                                                <h5 class="modal-title" id="food">食べる場所を探す</h5>
                                                <h5 class="modal-title" id="stay">泊まる場所を探す</h5>
                                                <h5 class="modal-title" id="move">移動の情報を追加する</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            {{--観光地モーダル--}}
                                            <div class="modal-body" id="spot1">
                                                    <form class="form-inline">
                                                        <div class="form-inline">
                                                            <div class="form-group">
                                                                <i class="fas fa-archway icon-category"></i>
                                                                <input class="form-control mr-sm-2 form-control1" type="search" size="60" maxlength="80" placeholder="例）沖縄 那覇" aria-label="Search">
                                                            </div>
                                                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                                        </div>
                                                    </form>
                                            </div>

                                            {{--食モーダル--}}
                                            <div class="modal-body" id="food1">
                                                <form class="form-inline">
                                                    <div class="form-inline">
                                                        <div class="form-group">
                                                            <i class="fas fa-utensils icon-category"></i>
                                                            <input class="form-control mr-sm-2 form-control1" type="search" size="60" maxlength="80" placeholder="例）沖縄そば" aria-label="Search">
                                                        </div>
                                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                                    </div>
                                                </form>
                                            </div>

                                            {{--宿泊モーダル--}}
                                            <div class="modal-body" id="stay1">
                                                <form class="form-inline">
                                                    <div class="form-inline">
                                                        <div class="form-group">
                                                            <i class="fas fa-bed icon-category"></i>
                                                            <input class="form-control mr-sm-2 form-control1" type="search" size="60" maxlength="80" placeholder="例）沖縄 那覇" aria-label="Search">
                                                        </div>
                                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                                    </div>
                                                </form>
                                            </div>

                                            {{--移動モーダル　開始--}}
                                            <div class="modal-body" id="move1">
                                                <form>
                                                    <label for="recipient-name" class="col-form-label" style="font-size: 24px; margin-bottom: 20px;">何で移動しますか？</label>
                                                {{--<div class="">--}}
                                                    <a href="#" class="square-btn-move means">{!! $categories[3]->font_awesome_html !!} {{ $categories[3]->name }}</a>
                                                    <a href="#" class="square-btn-move">{!! $categories[4]->font_awesome_html !!} {{ $categories[4]->name }}</a>
                                                    <a href="#" class="square-btn-move">{!! $categories[5]->font_awesome_html !!} {{ $categories[5]->name }}</a>
                                                    <a href="#" class="square-btn-move">{!! $categories[6]->font_awesome_html !!} {{ $categories[6]->name }}</a>
                                                    <a href="#" class="square-btn-move">{!! $categories[7]->font_awesome_html !!} {{ $categories[7]->name }}</a>
                                                    <a href="#" class="square-btn-move">{!! $categories[8]->font_awesome_html !!} {{ $categories[8]->name }}</a>
                                                {{--</div>--}}

                                                <div class="modal-body">
                                                        <label for="recipient-name" class="col-form-label">移動の情報を入力する（80文字まで）:</label>
                                                        <div class="form-inline">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="recipient-name1" size="60" maxlength="80" placeholder="例）○○駅 → 30分">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary mb-2">追加</button>
                                                        </div>
                                                </div>
                                                </form>
                                            </div>
                                            {{--移動モーダル　終了--}}

                                            {{--最初のモーダル　開始--}}
                                            <div class="time-select" id="choice1">
                                           　　　{!! Form::selectRange('number1', 00, 23, 12, ['class' => 'time-hour','id' => 'number1']) !!}
                                                <p class="time-cut">:</p>
                                                {!! Form::selectRange('number2', 00, 59, null, ['class' => 'time-hour','id' => 'number2']) !!}
                                                <p class="time-cut">から</p>
                                                {!! Form::selectRange('number3', 00, 23, 12, ['class' => 'time-hour','id' => 'number3']) !!}
                                                <p class="time-cut">:</p>
                                                {!! Form::selectRange('number4', 00, 59, null, ['class' => 'time-hour','id' => 'number4']) !!}
                                                <p class="time-cut">までの予定</p>
                                            </div>

                                            <div class="choices" id="choice2">
                                                <a href="#" class="choice-btn" onclick="hyoji1(1)">
                                                    {!! $categories[0]->font_awesome_html !!} {{ $categories[0]->name }}
                                                </a>
                                                <a href="#" class="choice-btn" onclick="hyoji1(2)">
                                                    {!! $categories[1]->font_awesome_html !!} {{ $categories[1]->name }}
                                                </a>
                                                <a href="#" class="choice-btn" onclick="hyoji1(3)">
                                                    {!! $categories[2]->font_awesome_html !!} {{ $categories[2]->name }}
                                                </a>
                                                <a href="#" class="choice-btn" onclick="hyoji1(4)">
                                                    <i class="fas fa-car"></i> 移動
                                                </a>
                                            </div>

                                            <div class="modal-body" id="choice3">
                                                {{--<form>--}}
                                                    <label for="recipient-name" class="col-form-label">自由に予定を入力する（80文字まで）:</label>
                                                    <div class="form-inline">
                                                    <div class="form-group">
                                                        {{--<input type="text" class="form-control" id="recipient-name2" size="60" maxlength="80" placeholder="例）周辺を散歩">--}}
                                                        <input type="text" class="form-control" id="free-str" size="60" maxlength="80" placeholder="例）周辺を散歩">
                                                        {{--<input type="text" name="dummy" style="display:none;">--}}
                                                    </div>
                                                    <input onClick="input()" type="button" class="btn btn-primary mb-2" id="free-save" data-dismiss="modal" value="追加">
                                                    </div>
                                                {{--</form>--}}
                                            </div>
                                            {{--最初のモーダル　終了--}}

                                            {{--共通モーダル　閉じるボタン--}}
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--モーダル 表示 終了--}}
                            </div>
                        </div>

                    </div>
                </div>

                <button class="btn btn-lg btn-primary btn-block plan-create" type="submit">この内容で作成</button>


            </div>
        </div>

    </main>


@endsection
