// const width = document.documentElement.clientWidth;
// const height = document.documentElement.clientHeight;
// $(".background").css("height",height);
// $(".background").css("width",width);
var img = new Image();
img.src = "../static/pictures/1-1.png";
img.onload = function(){
    $(".cloud").css("display","block");
    $(".entrance").css("display","block");
    setTimeout(function(){
    $(".train-picture").css("display","block");
    $(".train-picture").addClass("train-picture-move");
    },4000);
    setTimeout(function(){
        $(".entrance").css("display","block");
    },2000)
}
$(function () {
    $("button").click(function () {
        window.location.href = "../html/draw.html";
    });
});