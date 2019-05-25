//var checktime = checkTime();
var img = new Image();
var fn;
img.src = "../static/pictures/1-1.png";
img.onload = function(){
    $(".cloud").css("display", "block");
    $(".entrance").css("display", "block");
    setTimeout(function () {
        $(".train-picture").css("display", "block");
        $(".train-picture").addClass("train-picture-move");
    }, 4000);
    setTimeout(function () {
        $(".entrance").css("display", "block");
    }, 2000)
}
$(function () {
    var time = checkTime();
    console.log(time);
    $("button").click(function () {
        window.location.href = "../html/draw.html";
    });
});


//活动时间检查
//是否授权检查