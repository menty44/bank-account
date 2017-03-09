<?php $__env->startSection('title', 'Manage Bank Account'); ?>


<?php $__env->startSection('content'); ?>

<ul class="list-group">
    <li class="list-group-item list-group-item-heading">Select Action Below</li>
    <li class="list-group-item list-group-item-heading"><a href="<?php echo e(url('/account/manage/balance/')); ?>">View Balance</a></li>
    <li class="list-group-item list-group-item-heading"><a href="<?php echo e(url('/account/manage/deposit/')); ?>">Deposit Money</a></li>
    <li class="list-group-item list-group-item-heading"><a href="<?php echo e(url('/account/manage/withdraw/')); ?>">Withdraw from Bank</a></li>
    <li class="list-group-item list-group-item-heading"><a href="<?php echo e(url('/account/manage/transactions/')); ?>">View Past Transactions</a></li>
</ul>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>