
<?php $__env->startSection('content'); ?>

<div class="content-w3ls"><br><br>

<div class="text-center icon">
    <div class="logo">
        <h1> <a style="color: white; font-size: 25px;"><span class=""></span> LOG IN</a></h1>
    </div>
    
    <!-- <h1 style="color: white;">Log In</h1> -->
    <!-- <img src="./images/bia.jpg" class="img-fluid" alt="logo"> -->
</div>
<!---728x90--->
<div class="content-bottom">
    
    <form action="<?php echo e(route('frontend.login.post')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php if(session()->has('message')): ?>
       <div class="alert alert-success">
         <?php echo e(session()->get('message')); ?>

       </div>
       <?php endif; ?>  
        <div class="field-group">
            <span ></span>
            <div class="wthree-field">
                <input name="email" id="email" type="text" value="" placeholder="Email" required>
            </div>
        </div>
        <div class="field-group">
            <span ></span>
            <div class="wthree-field">
                <input name="password" id="password" type="Password" placeholder="Password">
            </div>
        </div>
        <div class="wthree-field">
            <button type="submit" class="btn">Log In</button>
        </div>
        <ul class="list-login">
            <li class="switch-agileits">
                <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
            keep Logged in
        </label>
            </li>
            <li>
                <a href="#" class="text-right">forgot password?</a>
            </li>
            <li class="clearfix"></li>
        </ul>
        <ul class="list-login-bottom">
            <li class="">
                <a href="<?php echo e(route('frontend.register.index')); ?>" class="">Create Account</a>
            </li>
            <li class="">
                <a href="#" class="text-right">Need Help?</a>
            </li>
            <li class="clearfix"></li>
        </ul>
    </form>
</div>
</div>
<!---728x90--->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.index-login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Music\project-nhom-C-chuyen-de-web1\project-web1\resources\views/Frontend/layout/login/login.blade.php ENDPATH**/ ?>