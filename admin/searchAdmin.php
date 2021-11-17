<?php
    include 'form/head.php';
    include 'form/header_part.php';
    include 'form/topHeaderMenu.php';
    include 'form/startTopSerch.php';
    include 'form/sidebarMenu.php';
    $key = "";
    $perPage = 3;
    if (isset($_GET['key'])) {
        $key = ($_GET['key']);
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        $page = $_GET['page'];
        $total = count($product->getProductsByKey($key));
        $url = $_SERVER['PHP_SELF']; 
?>

<div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
            <h1>Result</h1>
    </div>
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="delete.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                        <input type="hidden" value="" name="id" id="id">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có chắc chắn xoá?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submitDelete" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><a href="form.php?value=product"> <i class="icon-plus"></i>
                                </a></span>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>ID</th>
                                        <th>Manufactures</th>
                                        <th>Product type</th>
                                        <th>Description</th>
                                        <th>Price (VND)</th>
                                        <th>Feature</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($product->getProductsByPageAndByResult($page, $perPage, $key) as $value){?>
                                    <tr class="">
                                        <td width="250"><img src="../images/<?= $value['pro_image']?>" />
                                        </td>
                                        <td><?php echo $value['name']?></td>
                                        <td><?php echo $value['ID']?></td>
                                        <td><?php echo $value['manu_name']?></td>
                                        <td><?php echo $value['type_name']?></td>
                                        <td><?php echo substr($value['description'],0,100) ?></td>
                                        <td><?php echo number_format($value['price'])?></td>
                                        <td><?php echo $value['feature']?></td>
                                        <td><?php echo $value['created_at']?></td>
                                        <td>
                                             <a href="edit.php?idProduct=<?= $value['ID']?>&edit=product" class="btn btn-success btn-mini">Edit</a>

                                            <button type="button" class="btn btn-danger btn-mini" onclick="deleteID(<?= $value['ID'] ?>)" data-toggle="modal" data-target="#delete">Delete</button>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            <div class="row" style="margin-left: 18px;">
                                <ul class="pagination">
                                    <div class="active">
                                        <?php echo $product->paginateForResult($url, $total, $page, $perPage, $key)?>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
    <?php require "./form/footer_part.php"; ?>
    <?php require "./form/script.php"; ?>
</body>

</html>
<script>
    function deleteID(delID){
        let getID = document.getElementById('id');
        let id = delID;
        getID.value = id;
    }
</script>
<?php }?>
