<?php if(count($errors)): ?>
<div class="alert alert-danger alert-dismissible" role="alert"style="height:auto;">
<button type="button" class="close"data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<ul>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li><?php echo e($error); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\BBT-2019-Station2\resources\views/common/message.blade.php ENDPATH**/ ?>