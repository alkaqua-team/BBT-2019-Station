<?php
header('Content-Type: text/html; charset=utf-8');
$host = 'localhost';
$user = 'root';
$pass = '123Linux';
$link = mysqli_connect($host, $user, $pass);
mysqli_select_db($link, '123');
mysqli_query($link, 'SET names UTF8');
$timezone = 'Asia/Shanghai';
date_default_timezone_set($timezone);
session_start();
$key = $_SESSION['id'];
$query = mysqli_query($link, "SELECT FROM `station` WHERE id=$key");
$arr = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>修改信息页面</title>
    <link rel="stylesheet" type="text/css" href="../static/css/index.css">
    <link rel="stylesheet" type="text/css" href="../static/css/bootstrap.min.css">
    <meta name="description" content="修改信息页面">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="screen-orientation" content="portrait">
    <meta name="viewport" content="user-scalable=no, width=device-width">
    <meta name="full-screen" content="true">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="title">修改信息</br>制作专属车票</div>
    <!-- @include('common.message') -->
    <div class="container">
        <div class="input-box" id="passager1">乘客</br><input type="text" name="Station[passenger1]" id="passager-name1"
                value="<?php echo $arr['passenger1']; ?>">
        </div>
        <div class="errmsg" id="errmsg_passenger1"></div>
        <div class="input-box" id="passager2">乘客</br><input type="text" name="Station[passenger2]" id="passager-name1"
                value="<?php echo $arr['passenger2']; ?>">
        </div>
        <div class="errmsg" id="errmsg_passenger2"></div>
        <div class="input-box" id="passager3">乘客</br><input type="text" name="Station[passenger3]" id="passager-name1"
                value="<?php echo $arr['passenger3']; ?>">
        </div>
        <div class="errmsg" id="errmsg_passenger3"></div>
        <div class="input-box">目的地</br><input type="text" name="Station[destination]" id="destination" value="<?php echo $arr['destination']; ?>"></div>
        <div class="errmsg" id="errmsg_destination"></div>
        <div class="input-box">想说的话</br><textarea name="Station[comment]" rows="7" cols="50" class="message"
                id="message"><?php echo $arr['comment']; ?></textarea></div>
    </div>
    <div class="errmsg" id="errmsg_comment"></div>
    <input class="create-ticket" type="submit" id="create-ticket" value="修改车票">
</body>
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="../static/js/config.js"></script>
<script type="text/javascript" src="../static/js/index.js"></script>
<script type="text/javascript" src="../static/js/bootstrap.min.js"></script>

</html>