//禁用微信橡皮筋功能
document.body.addEventListener('touchmove', function (e) {
    e.preventDefault();
}, {
    passive: false
});

// var vconsole = new VConsole();
var station = [
    "秀发号", "满绩号", "暴富号", "超越号", "脱单号", "暴瘦号", "吃鸡号",
]
// document.onselectstart = function () {
//     return false;
// }
// document.oncopy = function () {
//     return false;
// }

//获取设备高度宽度
const height = document.documentElement.clientHeight;
const width = document.documentElement.clientWidth;

//动态设置div高度和大小

//目的地
$(".destination").css("top",height*0.44);
$(".destination").css("left",width*0.517);
$(".destination").css("font-size",width*0.06);

//列车名
$(".station-name").css("top",height*0.436);
$(".station-name").css("left",width*0.39);
$(".station-name").css("font-size",width*0.0346);

//乘客名
$(".passager-name").css("top",height*0.532);
$(".passager-name").css("left",width*0.245);
$(".passager-name").css("font-size",width*0.04);

//留言
$(".message-input").css("top",height*0.574);
$(".message-input").css("left",width*0.245);
$(".message-input").css("font-size",width*0.04);

$(function () {


    // //活动时间检查
    // var time = checkTime();
    // if (time != 0) {
    //     $(".err-box").show();
    //     $(".err-text").html("活动时间<br>2019/5/28	到 2019/5/31");
    //     $("#update").attr("disabled", true);
    //     $("#return").attr("disabled", true);
    //     $("#img").click(function () {
    //         return false;
    //     })
    // }

    $("#update").click(function () {
        window.location.href = "update.html";
    })
    $("#return").click(function () {
        window.location.href = "portal.html";
    })

    // //返回列车号（还没测试 可能有bug）
    show(returnName, function (res) {
        var code = res.code;
        $(".station-name").text(station[code]);
    })

    //展示信息
    show(ticket, function (res) {
        var res1 = res;
        console.log(res1)
        if (res1.errcode == 0) {
            console.log(res1);
            if (res1.passenger2 == null) {
                res1.passenger2 = "";
            }
            if (res1.passenger3 == null) {
                res1.passenger3 = "";
            }
            console.log(res1);
            $(".countPassagers").text("恭喜你成为第" + res1.num + "位搭上列车的乘客");
            $(".destination").text(res1.destination);
            $(".passager-name").html(res1.passenger1 + "&nbsp" + res1.passenger2 + "&nbsp" + res1.passenger3);
            $(".message-input").text(res1.comment)
        } else {
            // console.log("fails to get data.")
        }
    })

    //传图片
    var img = new Image();
    img.id = "img";
    img.onload = function () {
        $(".errmsg").show();
    };
    img.src = host + '/img/';
    document.getElementById("container").appendChild(img);
})

//7 缩小 12
function text(str) {
    if (str.length >= 7) {
        $(".destination").css("font-size", "12px");
    }
    if (str.length < 7) {
        $(".destination").css("font-size", "19px");
    }
}