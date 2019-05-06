<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>填写信息页面</title>
    <link rel="stylesheet" type="text/css" href="{{asset('static/css/index.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('static/css/bootstrap.min.css')}}">
    <meta name="description" content="填写信息页面">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="screen-orientation" content="portrait">
    <meta name="viewport" content="user-scalable=no, width=device-width">
    <meta name="full-screen" content="true">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @include('common.message')
    <form name="create" method="post" class="background" action="{{url('station/save')}}">
        {{ csrf_field() }}
        <div class="containerr">
        <div class="title">快来填写信息</br>制作专属车票吧</div>
            <div class="input-box" id="passager1">乘客</br><input type="text" name="Station[passenger1]" id="passager-name1" value="{{old('Station')['passenger1']}}">
                <div class="add create-ticket" id="add"></div>
            </div>
            <div class="input-box">目的地</br><input type="text" name="Station[destination]" id="destination" value="{{old('Station')['destination']}}"></div>
            <div class="input-box">想说的话</br><textarea name="Station[comment]" rows="7" cols="50" class="message" id="message">{{old('Station')['comment']}}</textarea></div>
        </div>
        <input class="create-ticket create" type="submit" id="create-ticket" value="生成车票">
    </form>
</body>
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('static/js/config.js')}}"></script>
<script type="text/javascript" src="{{asset('static/js/index.js')}}"></script>
<!-- <script type="text/javascript" src="{{asset('static/js/functClass.js')}}"></script> -->
<script type="text/javascript" src="{{asset('static/js/bootstrap.min.js')}}"></script>

</html>