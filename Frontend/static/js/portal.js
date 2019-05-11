var img = new Image();
img.src = "../static/pictures/1-1.png";
img.onload = function(){
    console.log("lllll")
    var element = document.getElementsByClassName("train-picture")[0];
    element.style.Animation = "moveright 4s forwards";
    // $(".train-picture").
}
$(function () {
    $("button").click(function () {
        window.location.href = "../html/draw.html";
    });
});