var station = [
    "秀发号", "满绩号", "暴富号", "超越号", "托单号"
]
document.onselectstart = function () {
    return false;
}
document.oncopy = function () {
    return false;
}
window.onload = function () {
    var node = document.getElementById("container");
    domtoimage.toPng(node)
        .then(function (dataUrl) {
            var img = new Image();
            img.src = dataUrl;
            node.appendChild(img);
            img.onload = function () {
                $(".errmsg").show();
                img.id = "img";
                $("#img").css("opacity", 0);
            };
        })
        .catch(function (error) {
            console.error('oops, something went wrong!', error);
        });
}
$(function () {
    $("#update").click(function () {
        window.location.href = "update.html";
    })
    $("#return").click(function () {
        window.location.href = "portal.html";
    })

    // //返回列车号（还没测试 可能有bug）
    // show(returnName, function (res) {
    //     console.log(res);
    //     $(".station-name").text(station[res.code]);
    // })

    //展示信息
    show(ticket, function (res) {
        var res1 = res;
        if (res1.errcode == 0) {
            console.log(res1);
            if (res1.passenger2 == null) {
                res1.passenger2 = "";
            }
            if (res1.passenger3 == null) {
                res1.passenger3 = "";
            }
            $(".countPassagers").text("恭喜你成为第" + res1.num + "位搭上列车的乘客")
            $(".destination").text(res1.destination);
            $(".passager-name").html(res1.passenger1 + "&nbsp" + res1.passenger2 + "&nbsp" + res1.passenger3);
            $(".message-input").text(res1.comment)
        } else {
            // console.log("fails to get data.")
        }
    })
})