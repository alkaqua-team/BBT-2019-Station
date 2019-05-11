var img = new Image();
img.onload = function(){
    img.src = "../pictures/1-1.png";
}
$(function () {
    $("button").click(function () {
        window.location.href = "../html/draw.html";
    });
});