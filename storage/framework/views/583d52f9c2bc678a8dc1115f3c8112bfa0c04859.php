<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>填写信息页面</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('static/css/index.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('static/css/bootstrap.min.css')); ?>">
    <meta name="description" content="填写信息页面">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="screen-orientation" content="portrait">
    <meta name="viewport" content="user-scalable=no, width=device-width">
    <meta name="full-screen" content="true">
</head>
<body>
    <div class="title">填写信息</br>制作专属车票</div>
    <div class="container">
            <div class="input-box" id="passager1">乘客</br><input type="text" id="passager-name1"><button class="add" id="add">+</button></div>
            <div class="input-box">目的地</br><input type="text" id="destination"></div>
        <div class="input-box">想说的话</br><textarea rows="7" cols="50" class="message" id="message"></textarea></div>
    </div>
        <button id="create-ticket">生成车票</button>
</body>
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('static/js/config.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('static/js/index.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('static/js/functClass.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('static/js/bootstrap.min.js')); ?>"></script>
</html><?php /**PATH D:\XAMPP\htdocs\laravel5\resources\views/common/layouts.blade.php ENDPATH**/ ?>