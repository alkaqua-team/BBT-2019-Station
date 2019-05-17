const method1 = "/checkTime/";
const method2 = "/checkOpenid/";
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
    show(method1, function (res) {
        var res1;
        if ((typeof res == 'object') && res.constructor == Object) {
            res1 = res;
        } else {
            res1 = eval("(" + res + ")");
        }
        if (res1.errcode == 440) {
            window.location.href = "../../html/checktime.html";
        if(res1.errcode== 441){
            window.location.href = "#"
        }
        if (res1.errcode == 0) {
            show(method2, function (res) {
                var res1;
                if ((typeof res == 'object') && res.constructor == Object) {
                    res1 = res;
                } else {
                    res1 = eval("(" + res + ")");
                }
                if (res1.errcode == 540) {
                    alert("未授权")
                    // window.location.href = "#BBT微信后台#/Home/Index/index?state=";
                }
            })
        }
    })
    $("button").click(function () {
        window.location.href = "../html/draw.html";
    });
});