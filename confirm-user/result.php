<html>

<head>
    <title>Confirm Account</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>

<body>
    <div class="container">
        <!-- notification message -->
        <?php if (isset($mess)) : ?>
            <div class="error success" style="text-align: center;">
                <h3>
                    <?php
                    echo $mess;
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <?php if (isset($mess_er)) : ?>
            <div class="error danger" style="text-align: center;">
                <h3>
                    <?php
                    echo $mess_er;
                    ?>
                </h3>
            </div>
        <?php endif ?>
    </div>
</body>

</html>