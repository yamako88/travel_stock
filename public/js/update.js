// モーダルを閉じる
$(function () {
    $('#closeModal , #modalBg , #closeModal1 , #food-add').click(function(){
        $('#modalArea').fadeOut();
    });
});

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
function display2(num)
{
    if (num === 0)
    {
        $('#modalArea').fadeIn();
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
    else if (num === 1)
    {
        aboutTime();
        document.getElementById("choice").style.display="none";
        document.getElementById("choice1").style.display="none";
        document.getElementById("choice2").style.display="none";
        document.getElementById("choice3").style.display="none";
        document.getElementById("spot").style.display="block";
        document.getElementById("modoru").style.display="block";
        document.getElementById("spot1").style.display="block";
    }
    else if (num === 2)
    {
        aboutTime();
        document.getElementById("key").value = "";
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
        $('.food-list').remove();
    }
    else if (num === 3)
    {
        aboutTime();
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
    else if (num === 4)
    {
        aboutTime();
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
    else if (num === 5)
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



// 登録時間を一時的にローカルストレージに保存
function aboutTime() {
    let abouttime = {
        "about_first_hour":document.getElementById("number1").value,
        "about_first_minute": document.getElementById("number2").value,
        "about_finish_hour" : document.getElementById("number3").value,
        "about_finish_minute": document.getElementById("number4").value,
    };
    localStorage.setItem('aboutTime', JSON.stringify(abouttime));
}


// タイトルとコメントの表示・保存
if (localStorage.getItem('title')){
    $('#title').val(localStorage.getItem('title'));
}
if (localStorage.getItem('comment')){
    $('#comment').val(localStorage.getItem('comment'));
}

$(function() {
    (function autoSave() {
        localStorage.setItem('title', $('#title').val());
        localStorage.setItem('comment', $('#comment').val());
        setTimeout(autoSave, 1000);
    })();
});


// 予定の追加
let arr = new Array();

if (localStorage.getItem('yotei')){
    let yotei = JSON.parse(localStorage.getItem('yotei'));
    for (let i = 0; i < yotei.length; i++) {
        arr.push({
            "first_hour": yotei[i].first_hour,
            "text": yotei[i].text,
            "first_minute": yotei[i].first_minute,
            "finish_hour": yotei[i].finish_hour,
            "finish_minute": yotei[i].finish_minute,
            "icon": yotei[i].icon,
            "url": yotei[i].url,
        });
    }
    show();
}


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
    $('#modalArea').fadeOut();

    if(document.getElementById("free-str").value == "") {
        alert("入力値が空白です");
    } else {
        arr.push({
            "first_hour" : document.getElementById("number1").value,
            "text" : document.getElementById("free-str").value,
            "first_minute": document.getElementById("number2").value,
            "finish_hour" : document.getElementById("number3").value,
            "finish_minute": document.getElementById("number4").value,
            "icon": '<i class="far fa-star icon-back"></i>'});
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
        let month = 8;
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
            '                                    <div class="d-flex justify-content-between">';
        if (arr[i]['icon'] == '<i class="far fa-star icon-back"></i>') {
            s +='<strong class="text-gray-dark">' + arr[i]['icon'] + ' ' + arr[i]['text'] + '</strong>';
        }else{
            s +='<strong class="text-gray-dark">' + arr[i]['icon'] + ' ' + arr[i]['text'] + '<a href="' + arr[i]['url'] +'" target="_blank">(詳細)</a></strong>';
        }
        s += '                                        <div class="update-del">\n' +
            '                                        <button type="button" onclick="deleteValue(' + i + ')">削除</button>\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                            </div>';
    }

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


// 食のapiの検索

// 食のapiの検索（検索結果の表示）
function showResult(result,foodwords) {
    if (result.total_hit_count > 0){
        let allHit = Math.ceil(result.total_hit_count/10);

        $("#search-word-food").append("<h6 class='food-list'>全" + result.total_hit_count + "件　検索ワード：<span id='foodwords'>" + foodwords + "</span></h6>");
        $("#table").append("<tr class='food-list'><th>店舗名</th><th>住所</th><th>詳細</th><th>登録する</th>");
        for ( let i in result.rest ) {
            $("#table").append("<tr class='food-list'><td id='food-name" + i + "'>" + result.rest[i].name + "</td><td id='food-adress" + i + "'>" + result.rest[i].address + "</td><td><a href='" + result.rest[i].url + "' target='_blank'>詳細</a></td><td><button data-dismiss='modal' onClick='foodList(" + i + ")'>登録</button></td></tr>" );
        }

        if (result.page_offset == 1 && allHit == 1) {
            $("#pageing").append("<div class='food-list'>\n" +
                "                    <a id='page-number'></a>\n" +
                "                </div>");
        } else if (allHit == result.page_offset){
            $("#pageing").append("<div class='food-list'>\n" +
                "                    <button id='page-modoru' type='button'><　</button><a id='page-number'>" + result.page_offset + "</a>\n" +
                "                </div>");
        }else if (result.page_offset == 1){
            $("#pageing").append("<div class='food-list'>\n" +
                "                    <a id='page-number'>" + result.page_offset + "</a><button id='page-susumu' type='button'>　></button>\n" +
                "                </div>");
        }else{
            $("#pageing").append("<div class='food-list'>\n" +
                "                    <button id='page-modoru' type='button'><　</button><a id='page-number'>" + result.page_offset + "</a><button id='page-susumu' type='button'>　></button>\n" +
                "                </div>");
        }
    }else{
        $("#pageing").append("<div class='food-list'>\n" +
            "            <h4 id='page-number'>該当するお店はありませんでした</h4>\n" +
            "            </div>");
    }

    let url = "https://api.gnavi.co.jp/RestSearchAPI/20150630/?callback=?";
    let params = {
        keyid: "bdf4db50503f96da1974138bb77f4863",
        format: "json",
        freeword: "",
        freeword_condition: 1,
        offset_page: "",
    };

    // ページング（戻る）
    $("#page-modoru").on("click", function () {
        let pageNumber = parseInt($("#page-number").text()) - parseInt(1);
        let foodwords = $("#foodwords").text();
        params.freeword = foodwords;
        params.offset_page = pageNumber;
        $(".food-list").remove();
        $.getJSON( url, params, function( result ) {
            showResult(result,foodwords)
        })
    });

// ページング（進む）
    $("#page-susumu").on("click", function () {
        let pageNumber = parseInt($("#page-number").text()) + parseInt(1);
        let foodwords = $("#foodwords").text();
        params.freeword = foodwords;
        params.offset_page = pageNumber;
        $(".food-list").remove();
        $.getJSON( url, params, function( result ) {
            showResult(result,foodwords)
        })
    });

}

// 食のapiの検索（ローカルホストに登録）
function foodList(num) {
    $('#modalArea').fadeOut();
    let tables = document.getElementById("table");
    let cells = tables.rows[num+1].cells[0].innerText;
    let foodURL = tables.rows[num+1].cells[2].getElementsByTagName('a')[0].getAttribute('href');
    let aboutTime = JSON.parse(localStorage.getItem("aboutTime"));
    arr.push({
        "first_hour" : aboutTime.about_first_hour,
        "text" : cells,
        "first_minute": aboutTime.about_first_minute,
        "finish_hour" : aboutTime.about_finish_hour,
        "finish_minute": aboutTime.about_finish_minute,
        "url": foodURL,
        "icon": '<i class="fas fa-utensils icon-back"></i>'});
    save();
}

// api検索結果取得
$( function () {

    let url = "https://api.gnavi.co.jp/RestSearchAPI/20150630/?callback=?";
    let params = {
        keyid: "bdf4db50503f96da1974138bb77f4863",
        format: "json",
        freeword: "",
        freeword_condition: 1,
        offset_page: "",
    };

// 検索する最初の10件取得
    $("#submit").on("click", function () {
        if($("#key").val() == "") {
            alert("入力値が空白です");
        } else {
            let pageNumber = 1;
            $(".food-list").remove();
            let words = $("#key").val();
            let foodwords = words.replace(/\s+/g, ",");
            params.freeword = foodwords;
            params.offset_page = pageNumber;
            $.getJSON(url, params, function (result) {
                showResult(result, foodwords)
            })
        }
    })
});

// ajaxで値をpostする
$(function () {

    $('#ajax').on("click", function () {

        $(".errors-post").remove();

        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        let title = localStorage.getItem('title');
        let comment = localStorage.getItem('comment');
        let yotei = JSON.parse(localStorage.getItem('yotei'));
        let post_id = document.getElementById("update-id").value;

        $.ajax({

            type: "POST",
            datatype: 'json',
            url: "../post/update/" + post_id,
            data:{
                '_token': CSRF_TOKEN,
                'title':title,
                'comment':comment,
                'yotei':yotei,
            }
        })
            .done(function(){ //ajaxの通信に成功した場合
                window.location.href = "../home";
                alert("編集した旅程を保存しました！");
            })
            .fail(function(data){ //ajaxの通信に失敗した場合

                let errors = $.parseJSON(data.responseText);
                if(errors['errors']['title']){
                    $("#errors").append("<span class='help-block errors-post'>\n" +
                        "                            <strong class='error-color'>" + errors['errors']['title'] + "</strong>\n" +
                        "                            <br>\n" +
                        "                        </span>");
                }
                if(errors['errors']['comment']){
                    $("#errors").append("<span class='help-block errors-post'>\n" +
                        "                            <strong class='error-color'>" + errors['errors']['comment'] + "</strong>\n" +
                        "                            <br>\n" +
                        "                        </span>");
                }
                if(errors['errors']['yotei']){
                    $("#errors").append("<span class='help-block errors-post'>\n" +
                        "                            <strong class='error-color'>" + errors['errors']['yotei'] + "</strong>\n" +
                        "                            <br>\n" +
                        "                        </span>");
                }
            });
    });
});



