<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>一笔画页面</title>
    <link rel="stylesheet" type="text/css" href="{{asset('static/css/draw.css')}}">
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('static/js/config.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/js/functClass.js')}}"></script>
    <meta name="description" content="一笔画页面">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="screen-orientation" content="portrait">
    <meta name="viewport" content="user-scalable=no, width=device-width">
    <meta name="full-screen" content="true">
</head>
<body onload="draw()">
    <div class="container">
        <div class="introduction">请在下方一笔绘制图案，</br>测测会搭上哪班列车？</div>
        <canvas id="drawing-board" width="160" height="160" style="border: 1px solid burlywood;"></canvas>
        <div class="buttons">
            <button class="repaint">重画</button>
            <button class="finish" id="finish">完成</button>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('static/js/draw.js')}}"></script>
</body>
</html>