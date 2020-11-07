<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hack nè</title>
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <?php
        echo "Xin chào <br>";
        echo "mình là hacker nà. <3 <br>";
        echo 'Cảm ơn bạn đã đưa session cho mình nha<br>';
        echo isset($_GET['cookie']) ? $_GET['cookie'] : "";
        echo '<br>Mình phá web bạn đây.';
        ?>
    </div>

</body>

</html>