<?php $__env->startSection('title', 'Withdraw Money'); ?>


<?php $__env->startSection('content'); ?>

<form action="<?php echo e(url('/account/manage/withdraw')); ?>" method="POST">
    <?php echo e(csrf_field()); ?>

    <div class="form-group">
        <label for="amount">Enter Amount to Withdraw</label>
        <input type='text' name='amount' class='form-control' placeholder='enter amount' >
    </div>
    <div class="btn-group-sm">
        <button name='withdraw' type='submit' class='btn btn-primary'>Withdraw from Account</button>
                
            </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>