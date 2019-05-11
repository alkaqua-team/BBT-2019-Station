var img = new Image();
img.src = "../static/pictures/1-1.png";
img.onload = function(){
    console.log("lllll")
    $(".train-picture").css("display","block");
    $(".train-picture").addClass("train-picture-move");
}
$(function () {
    $("button").click(function () {
        window.location.href = "../html/draw.html";
    });
});