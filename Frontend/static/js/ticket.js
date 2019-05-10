const width = document.documentElement.clientWidth;
const height = document.documentElement.clientHeight;

$(function () {
    $("#update").click(function () {
        window.location.href = "update";
    })
    $("#return").click(function () {
        window.location.href = "portal";
    })
    var canvas = document.getElementById("canvas");
    var ctx = canvas.getContext("2d");
    canvas.height = height;
    canvas.width = width;
})
