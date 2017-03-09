<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $__env->yieldContent('title'); ?> - Bank Account</title>
        <link href="<?php echo e(url('/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo e(url('/css/style.css')); ?>" rel="stylesheet" type="text/css">

    </head>

    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="<?php echo e(url('/')); ?>" class="navbar-brand">Bank Account</a>
                </div>
                <div id="navbar">
                    <ul class="nav navbar-nav">
                        <li class=""><a href="<?php echo e(url('/account/manage')); ?>">Home</a></li>
                    </ul>                
                </div>
            </div>
        </nav>        
        <div class="container">
            <div class="main-page">  
                <?php if(isset($success)): ?>
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> <?php echo e($success); ?>

                </div>
                <?php endif; ?>
                <?php if(isset($error)): ?>
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong> <?php echo e($error); ?>

                </div>
                <?php endif; ?>
                <?php if(isset($info)): ?>
                <div class="alert alert-info alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Info!</strong> <?php echo e($info); ?>

                </div>
                <?php endif; ?>                
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>

    </body>

    <script src="<?php echo e(url('/js/jquery-3.1.1.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(url('/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
</html>
