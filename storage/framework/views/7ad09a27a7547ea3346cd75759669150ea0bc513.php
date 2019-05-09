<?php
$key = session()->get('key');
$num = DB::table('station')->where('id', '<=', $key)->count();
$data = DB::table('station')->where('id', $key)->get();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>生成车票页面</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('static/css/ticket.css')); ?>">
    <script type="text/javascript" href="<?php echo e((asset('static/js/html2canvas.js'))); ?>"></script>
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('static/js/config.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('static/js/ticket.js')); ?>"></script>
    <meta name="description" content="生成车票页面">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="screen-orientation" content="portrait">
    <meta name="viewport" content="user-scalable=no, width=device-width">
    <meta name="full-screen" content="true">
</head>

<body>
        <canvas id="canvas" class="canvas"></canvas>
        <div class="countPassagers">恭喜你成为第<?php echo e($num); ?>位搭上列车的乘客</div>
            <div class="passager-name"><?php echo e($data->pluck('passenger1')[0]); ?> <?php echo e($data->pluck('passenger2')[0]?$data->pluck('passenger2')[0]:""); ?> <?php echo e($data->pluck('passenger3')[0]?$data->pluck('passenger3')[0]:""); ?></div>
            <div class="message-input"><?php echo e($data->pluck('comment')[0]); ?></div>
        <!-- <div class="QRcode"></div>  -->
        <div class="buttons">
            <button id="save">保存图片</button>
            <button id="update">修改信息</button>
            <button id="return">返回首页</button>
        </div>
</body>
<?php /**PATH C:\xampp\htdocs\BBT-2019-Station2\resources\views/station/ticket.blade.php ENDPATH**/ ?>