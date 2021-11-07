<!DOCTYPE html>
<html lang="zxx">


<head>
    <title>Login</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo e(url('frontend/css/style1.css')); ?>" type="text/css" media="all">
    <link rel="stylesheet" href="<?php echo e(url('frontend/css/register.css')); ?>" type="text/css" media="all">
    <link rel="stylesheet" href="<?php echo e(url('frontend/css/font-awesome.min.css')); ?>" type="text/css" media="all">
   
    
   
</head>

    <!-- <meta name="robots" content="noindex"> -->

    <body> 
        </div>
        <section class="main">
        <?php echo $__env->make('frontend.partial.header-login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('frontend.partial.footer-login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </section>
    </body>

</html><?php /**PATH C:\wamp64\www\project-nhom-C-chuyen-de-web1\project-web1\resources\views/frontend/index-login.blade.php ENDPATH**/ ?>