<?php $__env->startSection('title', 'Check Bank Balance'); ?>


<?php $__env->startSection('content'); ?>
<h3>Your account balance</h3>
&#x24; <?php echo e($balance); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>