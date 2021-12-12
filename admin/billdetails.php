<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

?>
<?php include '../classes/brand.php'?>
<?php include '../classes/category.php'?>
<?php include '../classes/product.php'?>
<?php include '../classes/bill.php'?>



<?php 
  $fm = new Format();
  $brand = new brand();
  $cat = new category();
  $prod = new product();
  $bill = new bill();
  
          if(isset($_POST["delete_id"])){
          $id = $_POST["delete_id"];
        $delbrand = $prod->delete_productName($id);
          }
   
 ?>


<style type="text/css">
  .rows {
display: flex;
flex-wrap: wrap;
margin-right: -.100rem;
margin-left: -.75rem;
}
.scroll{
  height: 400px;
  overflow: scroll;
}
h4{
  font-weight: bold;
  color: red;
}
#top{
  padding-top: 9px;
}
</style>
 
<!-- /.container-fluid -->


<?php 

  if (isset($_GET['idbill'])) {
      $id_bill=$_GET['idbill'];
    }
    
  
  

 ?>



<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">BILL DETAILS 

    </h6>
     <form action="" method="POST">
           
  </div>

  <div class="card-body">

    <div class="table-responsive">

     <form action="" method="POST">
      <h4>PRODUCT ORDER</h4>
      
      
        </tbody>
      <div class="scroll">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            
            <th> Product name </th>
            <th> Image </th>
            <th> Size </th>
            <th> Quantity </th>
            <th> Price </th>
          </tr>
        </thead>
        <tbody>
          <?php 
             


              $get_BillDetails=$bill->get_BillDetails($id_bill);
              if ($get_BillDetails){
                  while ($result=mysqli_fetch_array($get_BillDetails)) {
                      
           
             ?>
          <tr>
            
            <td> <?php echo $result['productName']; ?></td>
            <td><img src="uploads/<?php echo $result['image']?>" width="70" ></td> 
            <td> <?php echo $result['size']; ?></td>
            <td> <?php echo $result['quantity']; ?></td>
           
             <td>$<?php echo  $fm->format_currency($result['price']) ?></td>
           </tr>

        <?php
          }
            }
            ?>  
        </tbody>
      </table>
      </div>

       </form>

    </div>
      
  </div>

</div>

</div>

<script>
    $(document).ready(function(){
        $('#category').change(function(){
            var catName = $('#category option:selected').text();
            data = {
                category:1,
                catName:catName
            };
            $.ajax({
                url:"size.php",
                type:"POST",
                data:data
            }).done(function(result){
                $('#size').html(result);
                
            })
        })

    });
</script>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>