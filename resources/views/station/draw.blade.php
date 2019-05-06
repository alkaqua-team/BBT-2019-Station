<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>一笔画页面</title>
    <link rel="stylesheet" type="text/css" href="{{asset('static/css/draw.css')}}">
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('static/js/config.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('static/js/functClass.js')}}"></script> -->
    <meta name="description" content="一笔画页面">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="screen-orientation" content="portrait">
    <meta name="viewport" content="user-scalable=no, width=device-width">
    <meta name="full-screen" content="true">
</head>

<body>
    <div class="container">
        <div class="introduction">请在下方一笔绘制图案，</br>测测会搭上哪班列车？</div>
        <div class="drawing-board"></div>
        <canvas id="canvas"></canvas>
        <div class="color-select">
            <button class="color" id="orange"></button>
            <button class="color" id="yellow"></button>
            <button class="color" id="green"></button>
            <button class="color" id="blue1"></button>
            <button class="color" id="blue2"></button>
        </div>
        <div class="buttons">
            <button class="finish" id="finish">完 成</button>
            <button class="repaint" id="repaint">重 画</button>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('static/js/draw.js')}}"></script>
</body>

</html>