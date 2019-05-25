var img = new Image();
img.src = "../static/pictures/1-1.png";
img.onload = function () {
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

    //活动时间检查 等提示框
    // var time = checkTime();
    // if (time == 0) {
    $("button").click(function () {
        window.location.href = "../html/draw.html";
    });
    // } else {
    //     $("button").attr("disabled", true);
    // }
});