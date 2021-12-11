<?php
$search  = '';
if (!empty($_GET['search'])) {
    $search = $_GET['search'];
}
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
?>
<form method="get" action="./shop.php" class="search_area zoom-anim-dialog mfp-hide" id="test-search">
    <div class="search_box_inner">
        <h3>Search</h3>
        <div class="input-group">
            <input name="search" type="text" value="<?= $search ?>" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-default" name="submit" type="submit" value="submit"><i class="icon icon-Search"></i></button>
            </span>
            <?php if($page > 1){ ?>
                <input name="page" type="hidden" value="<?= $page ?>" class="form-control">
            <?php } ?>
        </div>
    </div>
</form>