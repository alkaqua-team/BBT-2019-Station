//阻止微信橡皮筋效果
document.body.addEventListener('touchmove', function (e) {
    e.preventDefault();
}, {
    passive: false
});
//设置高宽、默认颜色
const height = document.documentElement.clientHeight;
const width = document.documentElement.clientWidth;
var color = "#F7A44F";

var img = new Image();
var draw = false;
img.src = "../static/pictures/2-1.png";
img.onload = function () {
    $(".svg").css("display", "block");
    setTimeout(function () {
        $(".svg").css("display", "none");
    }, 6000)
    listenToUser(canvas);
}
var colors = [
    "orange", "yellow", "green", "blue1", "blue2"
];

$(function () {
    //listenToUser(canvas);
    $(".svg").on("touchstart", function () {
        $(".svg").css("display", "none");
        listenToUser(canvas);
    })
    $("#canvas").on("touchstart", function () {
        $(".svg").css("display", "none");
    })
    $("#finish").click(function () {
        if (draw == false) {
            alert("你还没有画画噢")
        } else {
            window.location.href = "../html/success.html";
        }
    })
    //设置画笔颜色
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
    //重画
    $("#repaint").click(function (e) {
        e.preventDefault();
        ctx.clearRect(0, 0, width * 2, height * 2);
        draw = false;
        listenToUser(canvas)
    })
})

let canvas = document.getElementById("canvas");
let ctx = canvas.getContext("2d");
canvas.height = height;
canvas.width = width;


ctx.beginPath();

function listenToUser(canvas) {
    //设置x,y
    let painting = false;
    let lastPoint = {
        "x": undefined,
        "y": undefined
    };

    if (document.body.ontouchstart !== undefined) { //两个表达式的类型不相同
        canvas.ontouchstart = function (e) {
            painting = true;
            draw = true;
            let x = e.touches[0].clientX;
            let y = e.touches[0].lientY;

            if(x<0.066*width||x>0.996*width||y<0.28*height||y>0.69*height){
                alert("你出界了噢")
                ctx.clearRect(0, 0, width * 2, height * 2);
                draw = false;
                listenToUser(canvas)        

            }
            //截取绘图区域
            ctx.rect(0.066 * width, 0.28 * height, width * 0.93, 0.41 * height);
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
            $(".container").css("position", "fixed");
            //如果为true 画画
            if (painting) {
                let x = e.touches[0].clientX;
                let y = e.touches[0].clientY;
                let newPoint = {
                    "x": x,
                    "y": y
                };
                //画出线条
                drawLine(lastPoint.x, lastPoint.y, newPoint.x, newPoint.y);
                lastPoint = newPoint;
            }
        };

        canvas.ontouchend = function () {
            $(".container").css("position", "static");
            painting = false;
            draw = true;
            canvas.ontouchstart = function () {};
        }
    } 
    // else {
    //     canvas.onmousedown = function (e) {
    //         painting = true;
    //         let x = e.clientX;
    //         let y = e.clientY;
    //         lastPoint = {
    //             "x": x,
    //             "y": y
    //         };
    //         ctx.save();
    //         drawCircle(x, y, 0);
    //     };
    //     canvas.onmousemove = function (e) {
    //         $(".container").css("position", "fixed");
    //         if (painting) {
    //             let x = e.clientX;
    //             let y = e.clientY;
    //             let newPoint = {
    //                 "x": x,
    //                 "y": y
    //             };
    //             drawLine(lastPoint.x, lastPoint.y, newPoint.x, newPoint.y);
    //             lastPoint = newPoint;
    //         }
    //     };

    //     canvas.onmouseup = function () {
    //         $(".container").css("position", "static");
    //         painting = false;
    //         canvas.onmousedown = function () {}
    //     };

    //     canvas.mouseleave = function () {
    //         $(".container").css("position", "static");
    //         painting = false;
    //         canvas.onmousedown = function () {}
    //     }
    // }
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
