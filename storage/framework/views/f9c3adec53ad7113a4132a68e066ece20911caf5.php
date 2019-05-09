<?php
$key = session()->get('key');
$data = DB::table('station')->where('id', $key)->get();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>修改信息页面</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('static/css/index.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('static/css/bootstrap.min.css')); ?>">
    <meta name="description" content="修改信息页面">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="screen-orientation" content="portrait">
    <meta name="viewport" content="user-scalable=no, width=device-width">
    <meta name="full-screen" content="true">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>

<body>
    <!-- <?php echo $__env->make('common.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
    <form name="update" method="post" action="<?php echo e(url('station/modify')); ?>" class="background">
        <?php echo e(csrf_field()); ?>

        <div class="container">
            <div class="title">填写信息</br>制作专属车票</div>
            <div class="input-box" id="passager1">乘客</br><input type="text" name="Station[passenger1]" id="passager-name1" value="<?php echo e(old('Station')['passenger1']?old('Station')['passenger1']:$data->pluck('passenger1')[0]); ?>">
            </div>
            <div class="errmsg"><?php echo e($errors->first('Station.passenger1')); ?></div>
            <div class="input-box" id="passager2">乘客</br><input type="text" name="Station[passenger2]" id="passager-name1" value="<?php echo e(old('Station')['passenger2']?old('Station')['passenger2']:$data->pluck('passenger2')[0]); ?>">
            </div>
            <div class="errmsg"><?php echo e($errors->first('Station.passenger2')); ?></div>
            <div class="input-box" id="passager3">乘客</br><input type="text" name="Station[passenger3]" id="passager-name1" value="<?php echo e(old('Station')['passenger3']?old('Station')['passenger3']:$data->pluck('passenger3')[0]); ?>">
            </div>
            <div class="errmsg"><?php echo e($errors->first('Station.passenger3')); ?></div>
            <div class="input-box">目的地</br><input type="text" name="Station[destination]" id="destination" value="<?php echo e(old('Station')['destination']?old('Station')['destination']:$data->pluck('destination')[0]); ?>"></div>
            <div class="errmsg"><?php echo e($errors->first('Station.destination')); ?></div>
            <div class="input-box" style="height: 22%;">想说的话</br><textarea name="Station[comment]" rows="7" cols="50" class="message" id="message"><?php echo e(old('Station')['comment']?old('Station')['comment']:$data->pluck('comment')[0]); ?></textarea></div>
        <div class="errmsg"><?php echo e($errors->first('Station.comment')); ?></div>
        </div>
        <input class="create-ticket create" type="submit" id="create-ticket" value="修改车票">
    </form>
</body>
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo e(asset('static/js/config.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('static/js/index.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('static/js/bootstrap.min.js')); ?>"></script>

</html><?php /**PATH C:\xampp\htdocs\BBT-2019-Station2\resources\views/station/update.blade.php ENDPATH**/ ?>