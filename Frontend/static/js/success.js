var pic1 = [
    "../static/pictures/3-2.png",
    "../static/pictures/3-3.png",
    "../static/pictures/3-4.png",
    "../static/pictures/3-5.png",
    "../static/pictures/3-6.png",
];
var pic2 = [
    "../static/pictures/3-7.png",
    "../static/pictures/3-8.png",
    "../static/pictures/3-9.png",
    "../static/pictures/3-10.png",
    "../static/pictures/3-11.png",
]

//随机生成0-3的数字（用于随机生成图片）
function randomNumber(max) {
    return Math.floor(Math.random() * Math.floor(max));
}
var randomNum = randomNumber(5);
console.log(randomNum)
var img = new Image();
img.src = "../static/pictures/3-1.png";
img.onload = function () {
    $(".success-pic").css("background-image", "url(" + pic1[randomNum] + ")")
    $(".success-text").css("background-image", "url(" + pic2[randomNum] + ")")
    $(".buttons").css("display", "flex")
}
$(function () {
    $("#write-information").click(function () {
        //传列车号
        var data = {
            "code": randomNum
        }
        ticketShow(savename, data, function () {
            console.log("have it");
            window.location.href = "./index.html";
        })
    })
    $("#reselect").click(function (e) {
        e.preventDefault();
        history.back(-1);
        $(".svg").remove()
        ctx.clearRect(0, 0, width * 2, height * 2);
    })
})