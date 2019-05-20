var station = [
    "秀发号", "满绩号", "暴富号", "超越号", "脱单号","暴瘦号","吃鸡号",
]
document.onselectstart = function () {
    return false;
}
document.oncopy = function () {
    return false;
}

$(function () {
    $.ajax({
        type: "POST",
        url: "http://182.254.161.213/BBT-2019-Station/Backend/grafika-master/index.php",
        xhrFields: {
            withCredentials: true
        },
        crossDomain: true,
        contentType: "application/x-www-form-urlencoded",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function () {
            var img = new Image();
            img.onload = function () {
                img.id = "img";
                $("#img").css("opacity", 0);
                $(".errmsg").show();
            };
            img.src = "http://182.254.161.213/BBT-2019-Station/Backend/grafika-master/index.php";
            document.getElementById("container").appendChild(img);
        }
    })
    $("#update").click(function () {
        window.location.href = "update.html";
    })
    $("#return").click(function () {
        window.location.href = "portal.html";
    })

    // //返回列车号（还没测试 可能有bug）
    show(returnName, function (res) {
        console.log(res);
        $(".station-name").text(station[res.code]);
    })

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
            $(".countPassagers").text("恭喜你成为第" + res1.num + "位搭上列车的乘客");
            $(".destination").text(res1.destination);
            $(".passager-name").html(res1.passenger1 + "&nbsp" + res1.passenger2 + "&nbsp" + res1.passenger3);
            $(".message-input").text(res1.comment)
        } else {
            // console.log("fails to get data.")
        }
    })
})