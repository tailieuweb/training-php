<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Register  Password</title>
</head>
<body>
    <p>
        
        Chào mừng <?php echo e($data['username']); ?> đã đăng ký thành viên tại hotel feliciity Bạn hãy click vào đường link sau đây để hoàn tất việc đăng ký.
        </br>
        <a href="<?php echo e($data['linkreset']); ?>"><?php echo e($data['linkreset']); ?></a>
    </p>
</body>
</html><?php /**PATH C:\Users\ASUS\Music\project-nhom-C-chuyen-de-web1\project-web1\resources\views/frontend/layout/Mail/registerMail.blade.php ENDPATH**/ ?>