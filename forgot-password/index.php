<?php

?>
<html>

<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>

<body>
    <div class="container">
        <!-- notification message -->
        <?php if (isset($_SESSION['forgot_pass'])) : ?>
            <div class="error danger" style="text-align: center;">
                <h3>
                    <?php
                    echo $_SESSION['forgot_pass'];
                    unset($_SESSION['forgot_pass']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <?php if (isset($_SESSION['forgot_pass_suc'])) : ?>
            <div class="error success" style="text-align: center;">
                <h3>
                    <?php
                    echo $_SESSION['forgot_pass_suc'];
                    unset($_SESSION['forgot_pass_suc']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <div class="header">
            <h2>Forgot Password</h2>
        </div>
        <form action="request.php" method="post" style="text-align: center;">
            <div class="input-group">
                <label>Please enter your email to verify your new password!</label><br>
                <input required type="email" name="email" placeholder="Enter Email" autofocus />
            </div>
            <br>
            <button type="button" class="btn btn-info" onClick="javascript:history.go(-1)">Back</button>
            <button type="submit" class="btn btn-info">Send Request</button>
        </form>
    </div>
</body>

</html>