const width = document.documentElement.clientWidth;
const height = document.documentElement.clientHeight;
const method = "/ticket/"
$(function () {
    $("#update").click(function () {
        window.location.href = "update.html";
    })
    $("#return").click(function () {
        window.location.href = "portal.html";
    })
    var canvas = document.getElementById("canvas");
    canvas.height = height;
    canvas.width = width;
    $("#save").click(function () {
        var node = document.getElementById("container");
        domtoimage.toPng(node)
            .then(function (dataUrl) {
                var img = new Image();
                img.src = dataUrl;
                node.appendChild(img);
                img.id = "img";
                img.onload = function () {
                    console.log(img.width + "----" + img.height);
                };
            })
            .catch(function (error) {
                console.error('oops, something went wrong!', error);
            });
    })
    
    show(method, function (res) {
        if (res.errcode == 0) {
            $(".countPassagers").text("恭喜你成为第" + res.num + "位搭上列车的乘客")
            $(".destination").text(res.destination);
            $(".passager-name").text(res.passenger1 + " " + res.passenger2 + " " + res.passenger3);
            $(".message-input").text(res.comment)
        }else{
            console.log("fails to get data.")
        }
    })
})