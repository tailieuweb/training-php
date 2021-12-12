<!DOCTYPE html>
<html lang="en">
<?php require "./form/head.php"; ?>
<?php
$perPage = 5;
$total = count($protype->getAllProtype()); 	// Tính tổng số dòng
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
                            <input type="hidden" value="" name="idProtype" id="id">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Bạn có chắc chắn xoá?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                            <button type="submit" name="submitDeleteProtype" class="btn btn-primary">Xóa</button>
                        </div>
                    </form>
                </div>
            </div>
         </div>
        <div id="content-header">
            <div id="breadcrumb" style="padding: 1px;background: #cbcbcb;"> <a href="index.php" title="Go to Home" class="tip-bottom current" style="font-size: 17px;"><i
                        class="icon-home"></i> Home</a></div>
            <h1>Loại Sản Phẩm</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon"> 
                                <a href="form.php?value=protype">
                                    <i class="icon-plus"></i>
                                </a>
                            </span>
                            <h5>Loại Sản Phẩm</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Mã ID</th>
                                        <th>Tên loại sản phẩm</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($protype-> getAllProtype() as $value){?>
                                    <tr class="">
                                        <td><?php echo $value['type_id']?></td>
                                        <td><?php echo $value['type_name']?></td>

                                        <td>
                                            
                                            <button type="button" class="btn btn-danger" 
                                            onclick="deleteProId(<?= $value['type_id'] ?>)" 
                                            data-toggle="modal" data-target="#delete"
                                            style="margin: 0 20px 0 20px">
                                                    Xóa <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <!-- <a href="edit.php?idProtype=<?= $value['type_id'] ?>&editProtype" class="btn btn-success">Sửa <i class="far fa-edit"></i></a> -->
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            <!-- <div class="row" style="margin-left: 18px;">
                                <ul class="pagination">
                                <div class="active">
                                        <?php echo $db->paginate($url,$total, $page, $perPage)?>
                                </div>
                                </ul>
                            </div> -->
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
 function deleteProId(delID){
        let getID = document.getElementById('id');
        let id = delID;
        getID.value = id;
    }
</script>