var pic = [
    "../static/pictures/0.jpg",
    "../static/pictures/1.jpg",
    "../static/pictures/2.jpg",
    "../static/pictures/3.jpg",
];
//随机生成0-3的数字（用于随机生成图片）
function randomNumber(max) {
    return Math.floor(Math.random() * Math.floor(max));
}
$(function () {
    $(".success-pic").css("background-image", "url(" + pic[randomNumber(4)] + ")")
    $("#write-information").click(function () {
        window.location.href = "index";
    })
    $("#reselect").click(function () {
        window.location.href = "draw";
    })
})