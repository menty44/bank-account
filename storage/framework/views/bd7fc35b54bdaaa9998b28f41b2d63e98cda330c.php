<?php $__env->startSection('title', 'Home'); ?>


<?php $__env->startSection('content'); ?>


<div class="row">        
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h3 class="center">Howdy! Welcome to your Bank Account Manager</h3>
        <p class="center">
            <a class="btn btn-info" href="<?php echo e(url('/account/manage')); ?>">Click Here To manage Bank Account</a>
        </p>
    </div>
    <div class="col-md-4"></div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>