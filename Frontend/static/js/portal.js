const width = document.documentElement.clientWidth;
var img = new Image();
img.src = "../static/pictures/1-1.png";
img.onload = function(){
    $(".cloud").css("display","block");
    setTimeout(function(){
    $(".train-picture").css("display","block");
    $(".train-picture").addClass("train-picture-move");
    },6000);
    // setTimeout(function(){
    //     $("#cloud1").css("animation","slideOutLeft 6s forwards");
    //     $("#cloud2").css("animation","slideOutRight 6s forwards");
    // },10000)
    setTimeout(function(){
        $(".entrance").css("display","block");
    },8000)
}
$(function () {
    $("button").click(function () {
        window.location.href = "../html/draw.html";
    });
});