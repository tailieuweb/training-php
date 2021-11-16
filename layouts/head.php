<?php
require urlPage . 'config/database.php';
require urlPage . 'models/Database.php';
require urlPage . 'models/FactoryPattern.php';

//Component
require urlPage . 'layouts/components/DateUp.php';
require urlPage . 'layouts/components/PostNormal.php';
require urlPage . 'layouts/components/CarouselItem.php';
require urlPage . 'layouts/components/CarouselInner.php';
require urlPage . 'layouts/components/PostSmall.php';
require urlPage . 'layouts/components/PostLarge.php';
require urlPage . 'layouts/components/ListPost.php';
require urlPage . 'layouts/components/PostBig.php';
require urlPage . 'layouts/components/PostBasic.php';
require urlPage . 'layouts/components/PagePostDepCate.php';
require urlPage . 'layouts/components/CommentItem.php';
require urlPage . 'layouts/components/ListComment.php';

?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="<?php echo urlPage ?>public/images/icon-title.PNG" type="image/x-icon">

<!-- Style CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<script src="https://kit.fontawesome.com/c776f8e511.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo urlPage ?>public/css/style.css">