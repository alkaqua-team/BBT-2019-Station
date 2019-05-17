const method = "/ticket/";
document.onselectstart = function(){
    return false;
}
document.oncopy = function(){
    return false;
}
window.onload = function(){
var node = document.getElementById("container");
domtoimage.toPng(node)
    .then(function (dataUrl) {
        var img = new Image();
        img.src = dataUrl;
        node.appendChild(img);
        img.onload = function () {
            $(".errmsg").show();
            img.id = "img";
            $("#img").css("opacity",0);
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
    show(method, function (res) {
        var res1;
        if ((typeof res == 'object') && res.constructor == Object) {
            res1 = res;
        } else {
            res1 = eval("(" + res + ")");
        }
        if (res1.errcode == 0) {
            console.log(res1);
            $(".countPassagers").text("恭喜你成为第" + res1.num + "位搭上列车的乘客")
            $(".destination").text(res1.destination);
            $(".passager-name").text(res1.passenger1 + "&nbsp" + res1.passenger2 + "&nbsp" + res1.passenger3);
            $(".message-input").text(res1.comment)
        } else {
            console.log("fails to get data.")
            console.log(res);
        }
    })
})