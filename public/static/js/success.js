var pic1 = [
    "../static/pictures/0.png",
    "../static/pictures/1.png",
    "../static/pictures/2.png",
    "../static/pictures/3.png",
    "../static/pictures/4.png",
];
var pic2 = [
    "../static/pictures/5.png",
    "../static/pictures/6.png",
    "../static/pictures/7.png",
    "../static/pictures/8.png",
    "../static/pictures/9.png",
]
//随机生成0-3的数字（用于随机生成图片）
function randomNumber(max) {
    return Math.floor(Math.random() * Math.floor(max));
}
var randomNum = randomNumber(5);
console.log(randomNum)
$(function () {
    $(".success-pic").css("background-image", "url(" + pic1[randomNum] + ")")
    $(".success-text").css("background-image", "url(" + pic2[randomNum] + ")")
    $("#write-information").click(function () {
        window.location.href = "index";
    })
    $("#reselect").click(function () {
        window.location.href = "draw";
    })
})
