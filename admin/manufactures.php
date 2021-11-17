<!DOCTYPE html>
<html lang="en">
<?php require "./form/head.php"; ?>
<?php
$perPage = 5;
$total = count($manufacture->getAllManufactures());     // Tính tổng số dòng
?>

<body>
    <?php require "./form/header_part.php"; ?>
    <?php require "./form/topHeaderMenu.php"; ?>
    <?php require "./form/startTopSerch.php"; ?>
    <?php require "./form/sidebarMenu.php"; ?>
    <!-- BEGIN CONTENT -->
    <div id="content">
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="delete.php" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                            <input type="hidden" value="" name="idManu" id="id">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Bạn có chắc chắn xoá?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submitDeleteManu" class="btn btn-primary">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
         </div>
        <div id="content-header">
            <div id="breadcrumb" style="padding: 1px;background: #cbcbcb;"> <a href="index.php" title="Go to Home" class="tip-bottom current" style="font-size: 17px;"><i class="icon-home"></i> Home</a></div>
            <h1>Hãng Sản Phẩm</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Hãng</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Mã ID</th>
                                        <th>Tên hãng</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr class="">
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href="#" class="btn btn-primary" style="margin: 0px 0px 0 100px">Thêm <i class="fas fa-plus-square"></i></a>
                                                <button type="button" class="btn btn-danger" 
                                                data-toggle="modal" data-target="#delete"
                                                style="margin: 0 20px 0 20px">
                                                    Xóa <i class="fas fa-trash-alt"></i>
                                                </button>

                                                <a href="edit.php?idManu=<?= $value['manu_id'] ?>&editManu" class="btn btn-success">Sửa <i class="far fa-edit"></i></a>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
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