<?php
$num = DB::table('station')->count();
$key = session()->get('key');
$data = DB::table('station')->where('id', $key)->get();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>生成车票页面</title>
    <link rel="stylesheet" type="text/css" href="{{asset('static/css/ticket.css')}}">
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('static/js/config.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('static/js/functClass.js')}}"></script> -->
    <script type="text/javascript" src="{{asset('static/js/ticket.js')}}"></script>
    <meta name="description" content="生成车票页面">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="screen-orientation" content="portrait">
    <meta name="viewport" content="user-scalable=no, width=device-width">
    <meta name="full-screen" content="true">
</head>

<body>
    <div class="container">
        <div class="countPassagers">恭喜你成为第{{$num}}位搭上列车的乘客</div>
        <div class="stationName">
            <div class="start"></div>
            <div class="startEnglish"></div>
            <div class="trainName"></div>
            <div class="arrow1"></div>
            <div class="arrow2"></div>
            <div class="destination"></div>
            <div class="destinationEnglish"></div>
        </div>
        <div class="trainR"></div>
        <div class="Passagermessage">
            <div class="passager"></div>{{$data->pluck('passenger1')[0]}} {{$data->pluck('passenger2')[0]?$data->pluck('passenger2')[0]:""}} {{$data->pluck('passenger3')[0]?$data->pluck('passenger3')[0]:""}}
            <div class="message"></div>{{$data->pluck('comment')[0]}}
        </div>
        <div class="trainL"></div>
        <div class="QRcode"></div>
        <div class="buttons">
            <button id="save">保存图片</button>
            <button id="update">修改信息</button>
            <button id="return">返回首页</button>
        </div>
    </div>
</body>
