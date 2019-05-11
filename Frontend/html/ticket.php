<?php
header('Content-Type: text/html; charset=utf-8');
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$link = mysqli_connect($host, $user, $pass);
mysqli_select_db($link, '123');
mysqli_query($link, 'SET names UTF8');
$timezone = 'Asia/Shanghai';
date_default_timezone_set($timezone);
session_start();
$key = $_SESSION['id'];
$query1 = mysqli_query($link, "SELECT count(*) as num FROM `station` WHERE id<=$key");
$arr1 = mysqli_fetch_array($query1);
$query = mysqli_query($link, "SELECT * FROM `station` WHERE id=$key");
$arr = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>生成车票页面</title>
    <link rel="stylesheet" type="text/css" href="../static/css/ticket.css">
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/dom-to-image/2.6.0/dom-to-image.js"></script>
    <script type="text/javascript" src="../static/js/config.js"></script>
    <script type="text/javascript" src="../static/js/index.js"></script>
    <script type="text/javascript" src="../static/js/ticket.js"></script>
    <meta name="description" content="生成车票页面">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="screen-orientation" content="portrait">
    <meta name="viewport" content="user-scalable=no, width=device-width">
    <meta name="full-screen" content="true">
</head>

<body>
    <canvas id="canvas" class="canvas"></canvas>
    <div class="countPassagers">恭喜你成为第<?php echo $arr1['num']; ?>位搭上列车的乘客</div>
    <div class="station-name"></div>
    <div class="destination"><?php echo $arr['destination']; ?></div>
        <div class="passager-name"><?php echo $arr['passenger1']; echo $arr['passenger2']; echo $arr['passenger3']; ?></div>
        <div class="message-input"><?php echo $arr['comment']; ?></div>
    <div class="QRcode"></div> 
    <div class="buttons">
        <button id="save">保存图片</button>
        <button id="update">修改信息</button>
        <button id="return">返回首页</button>
    </div>
</body>
