<?php $__env->startSection('title', 'All Transactions Balance'); ?>


<?php $__env->startSection('content'); ?>
<?php if($transactions): ?>
<ul class="list-group">
<?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
<li class="list-group-item list-group-item-info">
<?php
if($transaction['type'] ===1){
$type = 'deposited';
$a = 'into';
}elseif($transaction['type'] === 0){
$type = 'withdrew';
$a = 'from';
}
echo "You $type &#x24;<strong>". abs($transaction['amount'])."</strong> ". $a;
?>
 your bank account on date <strong> <?php echo e($transaction['created_at']); ?></strong> 
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<ul>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>