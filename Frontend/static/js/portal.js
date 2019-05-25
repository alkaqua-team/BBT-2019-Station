//var checktime = checkTime();
var img = new Image();
img.src = "../static/pictures/1-1.png";
img.onload = function () {
    $(".cloud").css("display", "block");
    // $(".entrance").css("display", "block");
    setTimeout(function () {
        $(".train-picture").css("display", "block");
        $(".train-picture").addClass("train-picture-move");
    }, 4000);
    setTimeout(function () {
        $(".entrance").css("display", "block");
    }, 2000)
}
$(function () {
    switch (checkTime()) {
        case 440:
            $(".entrance").hide();
            $(".time").text("活动还未开始噢~")
            $(".time").show();
            break;
        case 441:
            $(".entrance").hide();
            $(".time").text("活动已经结束啦~");
            $(".time").show();
            break;
        case 0:
            $(".entrance").css("display", "block");
            break;
        default:
            $(".entrance").hide();
            $(".time").text("有些繁忙~请刷新试试噢~");
            $(".time").show();
    }
    $("button").click(function () {
        window.location.href = "../html/draw.html";
    });
});