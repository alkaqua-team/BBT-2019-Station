<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>生成车票页面</title>
    <link rel="stylesheet" type="text/css" href="{{asset('static/css/ticket.css')}}">
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('static/js/config.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/js/functClass.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/js/ticket.js')}}"></script>
    <meta name="description" content="生成车票页面">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="screen-orientation" content="portrait">
    <meta name="viewport" content="user-scalable=no, width=device-width">
    <meta name="full-screen" content="true">
</head>

<body>
    <div class="container">
        <div class="ticket-picture"></div>
        <div class="events-introduction">
            <div class="text">可凭此车票到指定地点换取活动票哦</div>
            <button class="more-information">。。。</button>
        </div>
        <div class="buttons">
            <button>保存图片</button>
            <button>修改车票信息</button>
            <button>返回首页</button>
        </div>
    </div>
</body>