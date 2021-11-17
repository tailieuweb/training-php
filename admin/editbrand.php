<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

?>
<?php include '../classes/brand.php'?>


<?php 
    $brand = new brand();
    if(!isset($_GET['brandid']) || $_GET['brandid']==NULL){
        echo "<script>window.location = 'brandlist.php'</script>";
        
    }else{
        $id = $_GET['brandid'];
    }
    if(isset($_POST["edit"])){

        $brandName = $_POST['brandName'];
       

        $updateBrand = $brand->update_brand($brandName,$id);
    }
?>
 





<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
      <button onclick="location.href='brand.php'" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Back 
            </button>
      EDIT BRAND  
      
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
    <?php
                    if(isset($update_brand)){
                        echo $update_brand;
                    }
                ?>
                <?php 
                    $get_Name= $brand->getnamebyId($id);
                    if($get_Name){
                        while($result = $get_Name->fetch_assoc()){
                ?>   
     <form action="" method="POST">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Brand name </th>
           
            <th>EDIT </th>
            
          </tr>
        </thead>
        <tbody>
          
          <tr>
            <td> 2 </td>
            <td> <input type="text" name="brandName" value="<?php echo $result['brandName'] ?>" class="form-control"></td>
            
            <td>
                <form action="" method="post">
                   
                     <input type="hidden" name="edit" value="<?php echo $result['brandId']?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success" >SAVE</button>
                </form>
            </td>
            
          </tr>
           <?php 
                }
            }
                ?>  
        </tbody>
      </table>
       </form>
     
    </div>
  </div>
</div>

</div>


<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>