const height = document.documentElement.clientHeight;
const width = document.documentElement.clientWidth;
var color = "#F7A44F";
$(function () {
    $("#finish").click(function () {
        window.location.href = "../html/success.html";
    })
    $("#orange").click(function () {
        color = "#F7A44F";
    })
    $("#yellow").click(function () {
        color = "#F7ED4F";
    })
    $("#green").click(function () {
        color = "#C0F54E";
    })
    $("#blue1").click(function () {
        color = "#4DF3E5";
    })
    $("#blue2").click(function () {
        color = "#4C68F1";
    })
    $("#repaint").click(function (e) {
        e.preventDefault();
        ctx.clearRect(0, 0, width, height);
        listenToUser(canvas)
    }) 
})

let canvas = document.getElementById("canvas");
let ctx = canvas.getContext("2d");
canvas.height = height;
canvas.width = width;


ctx.beginPath();
var x = width;
var y = height*0.34
var movey = height *0.35;
// var movey = 0;
ctx.moveTo(x*0.17,y*0.45+movey);
ctx.bezierCurveTo(x*0.14,y*0.59+movey,x*0.24,y*0.71+movey,x*0.33,y*0.59+movey);
ctx.bezierCurveTo(x*0.37,movey+y*0.48,x*0.28,movey+y*0.43,x*0.24,movey+y*0.52);
ctx.bezierCurveTo(x*0.18,movey+y*0.72,x*0.27,movey+y*0.84,x*0.38,y*0.79+movey);
ctx.bezierCurveTo(x*0.48,movey+y*0.76,x*0.55,movey+y*0.48,x*0.45,movey+y*0.5);
ctx.bezierCurveTo(x*0.36,movey+y*0.55,x*0.46,movey+y*0.73,x*0.53,y*0.69+movey);
ctx.quadraticCurveTo(x*0.59,movey+y*0.66,x*0.6,movey+y*0.54);
ctx.lineWidth="4";
ctx.stroke();
ctx.closePath();











listenToUser(canvas);

function listenToUser(canvas) {
    let painting = false;
    let lastPoint = {
        x: undefined,
        y: undefined
    };

    if (document.body.ontouchstart !== undefined) { //两个表达式的类型不相同
        canvas.ontouchstart = function (e) {
            painting = true;
            let x = e.touches[0].clientX;
            let y = e.touches[0].lientY;
            ctx.rect(0.066 * width, 0.28 * height,width*0.93, 0.41 * height); 
            ctx.strokeStyle = color;
            ctx.clip()
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

