
// モーダルの表示・非表示
function hyoji1(num)
{
    if (num == 0)
    {
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
}



// 交通手段の選択
var btn = document.getElementsByClassName('square-btn-move');

for (var i = btn.length - 1; i >= 0; i--) {
    btnAction(btn[i],i);
    }

function btnAction(btnDOM,btnId){
    btnDOM.addEventListener("click", function(){
        this.classList.toggle('means');
        for (var i = btn.length - 1; i >= 0; i--) {
            if(btnId !== i){
                if(btn[i].classList.contains('means')){
                    btn[i].classList.remove('means');
                }
            }
        }
    })
}


// 1日目の表示
function firstdate() {
        localStorage.removeItem('myTab');
}


// 日数の追加
    function adddate() {
            $('.nav-tabs :nth-last-child(1)').remove(':contains("×")');
            $('.nav-tabs :nth-last-child(2)').after('<li class="nav-item">\n' +
                '                        <a class="nav-link count1" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">日目</a>\n' +
                '                    </li>');
            $('.nav-tabs :nth-last-child(2)').append('<a href="#" class="tab_delete_btn" id="tab_delete_btn" style="display: block;" onclick="deldate()">×</a>');
    }


// 日数の削除
function deldate() {
        $('.nav-tabs :nth-last-child(2)').remove();
        $('.nav-tabs :nth-last-child(2)').append('<a href="#" class="tab_delete_btn" id="tab_delete_btn" style="display: block;" onclick="deldate()">×</a>');
}


// ローカルストレージに日数を保存
    if (localStorage.getItem('myTab')){
        $('#myTab')[0].innerHTML = localStorage.getItem('myTab');
    }

$(function() {
    (function autoSave() {
        localStorage.setItem('myTab', $('#myTab')[0].innerHTML);
        setTimeout(autoSave, 1000);
    })();
});


