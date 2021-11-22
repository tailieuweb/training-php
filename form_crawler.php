

<?php
$htmlWebContent = !empty($_POST['html_web_content']) ? $_POST['html_web_content'] : '';
$pattern = !empty($_POST['pattern']) ? $_POST['pattern'] : '';

$matches = null;
if (!empty($pattern) && !empty($htmlWebContent)) {
    preg_match_all($pattern, $htmlWebContent, $matches);

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Form crawler</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">

        <div class="alert alert-warning" role="alert">
            <button type="submit" name="submit" value="submit" class="btn btn-primary">
                <a href="Crawler.php" style="color: white;">Crawler site</a>
            </button>
        </div>
        <form method="POST">
            <div class="form-group">
                <label for="name">Pattern</label>
                <input class="form-control" name="pattern" placeholder="Pattern" value="<?php if (!empty($_POST['pattern'])) echo htmlentities($_POST['pattern']) ?>">
            </div>
            <div class="form-group">
                <label for="name">HTML web content</label>
                <textarea class="form-control" name="html_web_content" placeholder="HTML web content" rows="10"><?php if (!empty($_POST['html_web_content'])) echo $_POST['html_web_content'] ?></textarea>
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            <div class="form-group">
                <pre>
                <?php var_dump($matches); ?>
                </pre>
            </div>

        </form>
    </div>
</body>
</html>