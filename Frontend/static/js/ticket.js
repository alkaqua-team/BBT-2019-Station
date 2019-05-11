const width = document.documentElement.clientWidth;
const height = document.documentElement.clientHeight;
// var domtoimage = require('dom-to-image');
console.log(passagers);
$(function () {
    $("#update").click(function () {
        window.location.href = "update.php";
    })
    $("#return").click(function () {
        window.location.href = "portal.html";
    })
    var canvas = document.getElementById("canvas");
    canvas.height = height;
    canvas.width = width;
    $("#save").click(function(){
    var node = document.getElementById("container");
    domtoimage.toPng(node)
        .then(function (dataUrl) {
            var img = new Image();
            img.src = dataUrl;
            node.appendChild(img);
            img.id = "img";
            img.onload = function () {
                console.log(img.width + "----" + img.height);
            };
        })
        .catch(function (error) {
            console.error('oops, something went wrong!', error);
        });
    })
})