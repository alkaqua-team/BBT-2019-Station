var pic = [
    "../static/pictures/0.jpg",
    "../static/pictures/1.jpg",
    "../static/pictures/2.jpg",
    "../static/pictures/3.jpg",
];
$(function () {
    $(".success-pic").css("background-image", "url(" + pic[randomNumber(4)] + ")")
    $("#write-information").click(function () {
        window.location.href = "index";
    })
    $("#reselect").click(function () {
        window.location.href = "draw";
    })
})