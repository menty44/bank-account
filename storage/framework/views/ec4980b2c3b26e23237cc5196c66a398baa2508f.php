<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $__env->yieldContent('title'); ?> - Bank Account</title>
        <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/css/style.css" rel="stylesheet" type="text/css">

    </head>

    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="/" class="navbar-brand">Bank Account</a>
                </div>
                <div id="navbar">
                    <ul class="nav navbar-nav">

                    </ul>                
                </div>
            </div>
        </nav>        
        <div class="container">
            <div class="main-page">  
                <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> <?php echo e(session('success')); ?>

                </div>
                <?php endif; ?>
                <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong> <?php echo e(session('error')); ?>

                </div>
                <?php endif; ?>
                <?php if(session('info')): ?>
                <div class="alert alert-info alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Info!</strong> <?php echo e(session('info')); ?>

                </div>
                <?php endif; ?>                
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>

    </body>

    <script src="/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="/js/bootstrap.min.js" type="text/javascript"></script>
</html>
