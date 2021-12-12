<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

?>
<?php include '../classes/product.php'?>


<?php 
    $prod = new product();
    
    if(!isset($_GET['porid']) || $_GET['porid']==NULL){
        echo "<script>window.location = 'product.php'</script>";
        
    }else{
        $id = $_GET['porid'];
    }
    if(isset($_POST["edit"])){

        $quantity = $_POST['quantity'];
        $update = $prod->updateQuantity($id,$quantity);
    }
?>

<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
      <button onclick="location.href='product.php'" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Back 
            </button>
      UPDATE QUANTITY 
      
    </h6>
  </div>

  <div class="card-body">
    <?php 
    if(isset($update)){
                        echo $update;
                    }
                ?> 

    <div class="table-responsive">
    
                <?php 
                    $get_Name= $prod->getproductByid($id);
                    if($get_Name){
                        while($result = $get_Name->fetch_assoc()){
                ?> 
     <form action="" method="POST">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            
            <th> Quantity </th>
           
            <th>UPDATE </th>
            
          </tr>
        </thead>
        <tbody>
          
          <tr>
            
            <td>  <input type="text" name="quantity" value="<?php echo $result['quantity'] ?>" class="form-control"></td>
            
            <td>
                <form action="" method="post">
                   
                     <input type="hidden" name="edit" value="<?php echo $result['productId']?>">
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