// エンターキーの無効化
$(function(){
    $("input"). keydown(function(e) {
        if ((e.which && e.which === 13) || (e.keyCode && e.keyCode === 13)) {
            return false;
        } else {
            return true;
        }
    });
});


// モーダルの表示・非表示
function hyoji1(num)
{
    if (num == 0)
    {
        document.getElementById("free-str").value = "";
        document.getElementById("choice").style.display="block";
        document.getElementById("choice1").style.display="block";
        document.getElementById("choice2").style.display="block";
        document.getElementById("choice3").style.display="block";
        document.getElementById("spot").style.display="none";
        document.getElementById("food").style.display="none";
        document.getElementById("move").style.display="none";
        document.getElementById("stay").style.display="none";
        document.getElementById("modoru").style.display="none";
        document.getElementById("spot1").style.display="none";
        document.getElementById("food1").style.display="none";
        document.getElementById("stay1").style.display="none";
        document.getElementById("move1").style.display="none";
    }
    else if (num == 1)
    {
        document.getElementById("choice").style.display="none";
        document.getElementById("choice1").style.display="none";
        document.getElementById("choice2").style.display="none";
        document.getElementById("choice3").style.display="none";
        document.getElementById("spot").style.display="block";
        document.getElementById("modoru").style.display="block";
        document.getElementById("spot1").style.display="block";
    }
    else if (num == 2)
    {
        document.getElementById("choice").style.display="none";
        document.getElementById("choice1").style.display="none";
        document.getElementById("choice2").style.display="none";
        document.getElementById("choice3").style.display="none";
        document.getElementById("spot").style.display="none";
        document.getElementById("food").style.display="block";
        document.getElementById("food1").style.display="block";
        document.getElementById("move").style.display="none";
        document.getElementById("stay").style.display="none";
        document.getElementById("modoru").style.display="block";
    }
    else if (num == 3)
    {
        document.getElementById("choice").style.display="none";
        document.getElementById("choice1").style.display="none";
        document.getElementById("choice2").style.display="none";
        document.getElementById("choice3").style.display="none";
        document.getElementById("spot").style.display="none";
        document.getElementById("food").style.display="none";
        document.getElementById("move").style.display="none";
        document.getElementById("stay").style.display="block";
        document.getElementById("modoru").style.display="block";
        document.getElementById("stay1").style.display="block";
    }
    else if (num == 4)
    {
        document.getElementById("choice").style.display="none";
        document.getElementById("choice1").style.display="none";
        document.getElementById("choice2").style.display="none";
        document.getElementById("choice3").style.display="none";
        document.getElementById("spot").style.display="none";
        document.getElementById("food").style.display="none";
        document.getElementById("move").style.display="block";
        document.getElementById("stay").style.display="none";
        document.getElementById("modoru").style.display="block";
        document.getElementById("move1").style.display="block";
    }
    else if (num == 5)
    {
        document.getElementById("choice").style.display="none";
        document.getElementById("choice1").style.display="none";
        document.getElementById("choice2").style.display="none";
        document.getElementById("choice3").style.display="none";
        document.getElementById("spot").style.display="none";
        document.getElementById("food").style.display="none";
        document.getElementById("move").style.display="none";
        document.getElementById("stay").style.display="none";
        document.getElementById("modoru").style.display="none";
        document.getElementById("spot1").style.display="none";
        document.getElementById("food1").style.display="none";
        document.getElementById("stay1").style.display="none";
        document.getElementById("move1").style.display="none";
    }
}



// 交通手段の選択
let btns = document.getElementsByClassName('square-btn-move');

for (let im = btns.length - 1; im >= 0; im--) {
    btnAction(btns[im],im);
    }

function btnAction(btnDOM,btnId){
    btnDOM.addEventListener("click", function(){
        this.classList.toggle('means');
        for (let im = btns.length - 1; im >= 0; im--) {
            if(btnId !== im){
                if(btns[im].classList.contains('means')){
                    btns[im].classList.remove('means');
                }
            }
        }
    })
}




// idのインクリメント
//複数のdiv要素に動的なidをつける
let moji = "#home";
let tmp = document.getElementsByClassName("lists");

let moji1 = "home";
let tab = "-tab";
let tmp1 = document.getElementsByClassName("tab-day");

// 1日目の表示
function firstdate() {
        localStorage.removeItem('myTab');
        localStorage.removeItem('myTabContent');
}

// 日数の追加
    function adddate() {

        let nissuu = tmp.length+1;

            $('.nav-tabs :nth-last-child(1)').remove(':contains("×")');
            $('.nav-tabs :nth-last-child(2)').after('<li class="nav-item">\n' +
                '                        <a class="nav-link lists" data-toggle="tab" role="tab" aria-controls="contact" aria-selected="false">' + nissuu +'日目</a>\n' +
                '                    </li>');
            $('.nav-tabs :nth-last-child(2)').append('<a href="#" class="tab_delete_btn" id="tab_delete_btn" style="display: block;" onclick="deldate()">×</a>');

            $(tmp[tmp.length-1]).attr('href', moji+tmp.length);
            $(tmp[tmp.length-1]).attr('id', "home"+tmp.length+"-tab");

            $('#myTabContent').append('<div class="tab-pane fade tab-day" role="tabpanel">\n' +
                '                        <div class="my-3 p-3 bg-white rounded shadow-sm">\n' +
                '                            <h6 class="border-bottom border-gray pb-2 mb-0">' + nissuu +'日目</h6>\n' +
                '                            <div class="pt-3 one-add">\n' +
                '                                <button type="button" class="btn square_btn" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="hyoji1(0)">＋ 予定の追加</button>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                    </div>');

            $(tmp1[tmp1.length-1]).attr('id', moji1+tmp.length);
            $(tmp1[tmp1.length-1]).attr('aria-labelledby', moji1+tmp.length+tab);
    }


// 日数の削除
function deldate() {
    let delday = '#home'+tmp.length;
    if (tmp.length == 1) {
        $('.nav-tabs :nth-last-child(2)').remove();
        $('.nav-tabs :nth-last-child(2)').append('<a href="#" class="tab_delete_btn" id="tab_delete_btn" style="display: block;" onclick="deldate()">×</a>');
    }else{
        $('.nav-tabs :nth-last-child(2)').remove();
        $(delday).remove();
        $('.nav-tabs :nth-last-child(2)').append('<a href="#" class="tab_delete_btn" id="tab_delete_btn" style="display: block;" onclick="deldate()">×</a>');
    }
}




// ローカルストレージに日数を保存
    if (localStorage.getItem('myTab')){
        $('#myTab')[0].innerHTML = localStorage.getItem('myTab');
    }
    if (localStorage.getItem('myTabContent')){
        $('#myTabContent')[0].innerHTML = localStorage.getItem('myTabContent');
    }

$(function() {
    (function autoSave() {
        localStorage.setItem('myTab', $('#myTab')[0].innerHTML);
        localStorage.setItem('myTabContent', $('#myTabContent')[0].innerHTML);
        setTimeout(autoSave, 1000);
    })();
});



let arr = new Array();

// HTML文章の読み込み完了時に実行（※１）
function load() {
    // localStoprageからキーyoteiに対する値を読み出す
    let ls = localStorage.getItem("yotei");
    if(ls != null){
        // 読み出した値をJSON.parseして配列に代入
        arr = JSON.parse(ls);
    } else {
        arr = [];
    }
    show();
}

// 「値を入れたらクリック」ボタンをクリック時に実行（※４）
function input() {

    if(document.getElementById("free-str").value == "") {
        alert("入力値が空白です");
    } else {
        arr.push({
            "first_hour" : document.getElementById("number1").value,
            "text" : document.getElementById("free-str").value,
                "first_minute": document.getElementById("number2").value,
                "finish_hour" : document.getElementById("number3").value,
                "finish_minute": document.getElementById("number4").value});
        save();

    }
}


// 「削除」ボタンがクリックされたら実行（※６）
function deleteValue(x) {
    arr.splice(x, 1);
    save();
}

// 配列aの要素を昇順に並べてテーブル形式で画面に表示（※３）
function show() {

    let s = '';
    sorting();

    for (let i = 0; i < arr.length; i++) {

        let year = 2018;
        let month = 08;
        let day = 31;
        let firsthour = arr[i]['first_hour'];
        let firstminute = arr[i]['first_minute'];
        let finishhour = arr[i]['finish_hour'];
        let finishminute = arr[i]['finish_minute'];

        let firstdt = new Date( year, month, day, firsthour, firstminute );
        let finishdt = new Date( year, month, day, finishhour, finishminute );

        let outHour = firstdt.getHours();
        let outMinute = firstdt.getMinutes();
        let autHour = finishdt.getHours();
        let autMinute = finishdt.getMinutes();

        outHour = ('0' + outHour).slice(-2);
        outMinute = ('0' + outMinute).slice(-2);
        autHour = ('0' + autHour).slice(-2);
        autMinute = ('0' + autMinute).slice(-2);

        // datetime型

        if (i>0){
        s +='<div class="text-muted">\n' +
            '                                <h5>↓</h5>\n' +
            '                            </div>\n';
        }
        s +='<div class="media text-muted pt-3">\n' +
            '                                <div class="small">\n' +
            '                                <div>\n' +
            '                                    <strong class="time-time">' + outHour + ':' + outMinute + ' - ' + autHour + ':' + autMinute + '</strong>\n' +
            '</div>\n' +
            '                                </div>\n' +
            '                                <div class="media-body pb-3 border-bottom">\n' +
            '                                    <div class="d-flex justify-content-between">\n' +
            '                                        <strong class="text-gray-dark"><i class="far fa-star"></i>' + arr[i]['text'] + '</strong>\n' +
            '                                        <div class="update-del">\n' +
            // '                                        <button type="button" onclick="deleteValue(\' + i + \')">編集</button>\n' +
            '                                        <button type="button" onclick="deleteValue(' + i + ')">削除</button>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                            </div>';
    }

    s += '<div class="pt-3 one-add">\n' +
        '                                <button type="button" class="btn square_btn" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="hyoji1(0)">＋ 予定の追加</button>';

    s += '</div>';
    document.getElementById("sort-time-ryotei").innerHTML = s;
}


// 配列arrをlocalStorageに保存した後、昇順に並べて画面に表示（※５）
function save() {
    localStorage.setItem("yotei" , JSON.stringify(arr));
    show();
}

// 配列の要素を昇順に並び替え（※２）
function sorting() {

    arr.sort(function (a, b) {
        return a.first_hour - b.first_hour;
    });

    for(let i = 0; i < arr.length; i++) {
        arr[i] = JSON.stringify(arr[i]);
    }

    for(i = 0; i < arr.length; i++) {
        arr[i] = JSON.parse(arr[i]);
    }
}
