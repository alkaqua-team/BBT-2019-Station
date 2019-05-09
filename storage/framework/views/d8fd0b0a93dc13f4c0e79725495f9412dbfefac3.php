<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>成功页面</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('static/css/success.css')); ?>">
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('static/js/config.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('static/js/functClass.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('static/js/success.js')); ?>"></script>
    <meta name="description" content="成功页面">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="screen-orientation" content="portrait">
    <meta name="viewport" content="user-scalable=no, width=device-width">
    <meta name="full-screen" content="true">
</head>

<body>
    <div class="container">
        <div class="success-pic"></div>
        <div class="success-text">恭喜你成功搭乘XX号</div>
        <div class="buttons">
            <button class="write-information" id="write-information">填写信息</button>
            <button class="reselect" id="reselect">重新选择</button>
        </div>
    </div>
</body>

</html><?php /**PATH D:\XAMPP\htdocs\laravel5\resources\views/station/success.blade.php ENDPATH**/ ?>