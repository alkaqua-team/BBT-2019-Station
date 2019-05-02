//打算五一好好学一下canvas
$(function () {
    $("#finish").click(function () {
        window.location.href ="success";
    })
})

function draw() {
    var canvas = document.getElementById("drawing-board")
    if (canvas.getContext) {
        var ctx = canvas.getContext("2d");
    } else {
        console.log("canvas-unsupported code here")
    }
}