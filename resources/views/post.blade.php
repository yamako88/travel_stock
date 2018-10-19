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
                        <a class="nav-link active count1" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">日目</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link add-date" id="contact-tab" data-toggle="tab" role="tab" aria-controls="contact" aria-selected="false" onclick="adddate()">＋</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">

                    {{--1日目 旅程リスト 開始--}}
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="my-3 p-3 bg-white rounded shadow-sm">
                            <h6 class="border-bottom border-gray pb-2 mb-0">1日目</h6>

                            <div class="media text-muted pt-3">
                                <div class="small">
                                <div>
                                    <strong>10:00 - 12:00</strong>
                                </div>
                                </div>
                                <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded logo-img" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16614826db5%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16614826db5%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2212.296875%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
                                <div class="media-body pb-3 border-bottom">
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">首里城<a href="#">(詳細)</a></strong>
                                        <div class="update-del">
                                        <a href="http://getbootstrap.com/docs/4.1/examples/offcanvas/#">変更</a>
                                        <a href="http://getbootstrap.com/docs/4.1/examples/offcanvas/#">削除</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-muted">
                                <h5>↓</h5>
                            </div>

                            <div class="media text-muted pt-3">
                                <div class="small">
                                    <div>
                                        <strong>12:00 - 13:40</strong>
                                    </div>
                                </div>
                                <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded logo-img" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16614826db5%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16614826db5%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2212.296875%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
                                <div class="media-body pb-3 border-bottom">
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">沖縄そば屋　花織そば<a href="#">(詳細)</a></strong>
                                        <div class="update-del">
                                            <a href="http://getbootstrap.com/docs/4.1/examples/offcanvas/#">変更</a>
                                            <a href="http://getbootstrap.com/docs/4.1/examples/offcanvas/#">削除</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-muted">
                                <h5>↓</h5>
                            </div>

                            <div class="media text-muted pt-3">
                                <div class="small">
                                    <div>
                                        <strong>14:00 - 16:00</strong>
                                    </div>
                                </div>
                                <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded logo-img" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16614826db5%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16614826db5%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2212.296875%22%20y%3D%2216.9%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 32px; height: 32px;">
                                <div class="media-body pb-3 border-bottom">
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">残波みさき<a href="#">(詳細)</a></strong>
                                        <div class="update-del">
                                            <a href="http://getbootstrap.com/docs/4.1/examples/offcanvas/#">変更</a>
                                            <a href="http://getbootstrap.com/docs/4.1/examples/offcanvas/#">削除</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--1日目 予定の追加 開始--}}
                            <div class="pt-3 one-add">
                                <button type="button" class="btn square_btn" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="hyoji1(0)">＋ 予定の追加</button>



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
                                                <div class="">
                                                <a href="#" class="square-btn-move means">{!! $categories[3]->font_awesome_html !!} {{ $categories[3]->name }}</a>
                                                    <a href="#" class="square-btn-move">{!! $categories[4]->font_awesome_html !!} {{ $categories[4]->name }}</a>
                                                <a href="#" class="square-btn-move">{!! $categories[5]->font_awesome_html !!} {{ $categories[5]->name }}</a>
                                                <a href="#" class="square-btn-move">{!! $categories[6]->font_awesome_html !!} {{ $categories[6]->name }}</a>
                                                <a href="#" class="square-btn-move">{!! $categories[7]->font_awesome_html !!} {{ $categories[7]->name }}</a>
                                                <a href="#" class="square-btn-move">{!! $categories[8]->font_awesome_html !!} {{ $categories[8]->name }}</a>
                                                </div>

                                                <div class="modal-body">
                                                        <label for="recipient-name" class="col-form-label">移動の情報を入力する（80文字まで）:</label>
                                                        <div class="form-inline">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="recipient-name" size="60" maxlength="80" placeholder="例）○○駅 → 30分">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary mb-2">追加</button>
                                                        </div>
                                                </div>
                                                </form>
                                            </div>
                                            {{--移動モーダル　終了--}}

                                            {{--最初のモーダル　開始--}}
                                            <div class="time-select" id="choice1">
                                           　　　{!! Form::selectRange('number', 00, 23, 12, ['class' => 'time-hour']) !!}
                                                <p class="time-cut">:</p>
                                                {!! Form::selectRange('number', 00, 59, null, ['class' => 'time-hour']) !!}
                                                <p class="time-cut">から</p>
                                                {!! Form::selectRange('number', 00, 23, 12, ['class' => 'time-hour']) !!}
                                                <p class="time-cut">:</p>
                                                {!! Form::selectRange('number', 00, 59, null, ['class' => 'time-hour']) !!}
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
                                                <form>
                                                    <label for="recipient-name" class="col-form-label">自由に予定を入力する（80文字まで）:</label>
                                                    <div class="form-inline">
                                                    <div class="form-group">

                                                        <input type="text" class="form-control" id="recipient-name" size="60" maxlength="80" placeholder="例）周辺を散歩">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mb-2">追加</button>
                                                    </div>
                                                </form>
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
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        ...bbbb
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...cccc</div>
                </div>

                <button class="btn btn-lg btn-primary btn-block plan-create" type="submit">この内容で作成</button>


            </div>
        </div>

    </main>


@endsection
