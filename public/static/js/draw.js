//打算五一好好学一下canvas
const height = document.documentElement.clientHeight;
const width = document.documentElement.clientWidth;
$(function () {
    $("#finish").click(function () {
        window.location.href = "success";
    })
    $("#repaint").click(function () {
        location.reload();
    })
})

let canvas = document.getElementById("canvas");
let ctx = canvas.getContext("2d");
canvas.height = height;
canvas.width = width;
listenToUser(canvas);

function listenToUser(canvas) {
    let painting = false;
    let lastPoint = {
        x: undefined,
        y: undefined
    };
    $("#red").click(function () {
        ctx.strokeStyle = "red";
    })
    $("#blue").click(function () {
        ctx.strokeStyle = "blue";
    })
    $("#black").click(function () {
        ctx.strokeStyle = "black";
    })
    $("#purple").click(function () {
        ctx.strokeStyle = "purple";
    })
    $("#green").click(function () {
        ctx.strokeStyle = "green";
    })

    if (document.body.ontouchstart !== undefined) { //两个表达式的类型不相同
        canvas.ontouchstart = function (e) {
            painting = true;
            let x = e.touches[0].clientX;
            let y = e.touches[0].lientY;
            lastPoint = {
                "x": x,
                "y": y
            };
            ctx.save();
            drawCircle(x, y, 0);
        };
        canvas.ontouchmove = function (e) {
            if (painting) {
                let x = e.touches[0].clientX;
                let y = e.touches[0].clientY;
                let newPoint = {
                    "x": x,
                    "y": y
                };
                drawLine(lastPoint.x, lastPoint.y, newPoint.x, newPoint.y);
                lastPoint = newPoint;
            }
        };

        canvas.ontouchend = function () {
            painting = false;
            canvas.ontouchstart = function () {};
        }
    } else {
        canvas.onmousedown = function (e) {
            painting = true;
            let x = e.clientX;
            let y = e.clientY;
            lastPoint = {
                "x": x,
                "y": y
            };
            ctx.save();
            drawCircle(x, y, 0);
        };
        canvas.onmousemove = function (e) {
            if (painting) {
                let x = e.clientX;
                let y = e.clientY;
                let newPoint = {
                    "x": x,
                    "y": y
                };
                drawLine(lastPoint.x, lastPoint.y, newPoint.x, newPoint.y);
                lastPoint = newPoint;
            }
        };

        canvas.onmouseup = function () {
            painting = false;
            canvas.onmousedown = function () {}
        };

        canvas.mouseleave = function () {
            painting = false;
            canvas.onmousedown = function () {}
        }
    }
}

function drawCircle(x, y, radius) {
    ctx.save();
    ctx.beginPath();
    ctx.arc(x, y, radius, 0, Math.PI * 2);
    ctx.fill();
}

function drawLine(x1, y1, x2, y2) {
    ctx.lineWidth = 4;
    ctx.lineCap = "round";
    ctx.lineJoin = "round";
    ctx.moveTo(x1, y1);
    ctx.lineTo(x2, y2);
    ctx.stroke();
    ctx.closePath();
}
