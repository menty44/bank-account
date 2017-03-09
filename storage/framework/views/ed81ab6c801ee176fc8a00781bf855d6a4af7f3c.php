<?php $__env->startSection('title', 'Deposit Money'); ?>


<?php $__env->startSection('content'); ?>
<form action="<?php echo e(url('/account/manage/deposit')); ?>" method="post">
    <div class="form-group">

        <?php echo e(csrf_field()); ?>

        <label for="amount">Want to deposit money? Enter Amount</label>
        <input type='text' name='amount' class='form-control' placeholder='enter amount' >
    </div>
    <div class="btn-group-sm">
        <button name='deposit' type='submit' class='btn btn-primary'>Deposit into Account</button>

    </div>
</form>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>