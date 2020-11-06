<?php 
    $page = 1;
    $title = "Danh Sách User";
    require_once("./autoload.php");
    
    if (isset($_GET['detete'])) {
            array_push($success, "Xóa User Thành Công!!!");
    }
    // Check isLogin
    if(isset($_SESSION['user_type'])){
        if ($_SESSION['user_type'] == "user") {
            header("location: index.php");
        }
    }
    
    $userModel = new UserModel();
    $count_user = $userModel->getAll();
    $arr_id = [];
    foreach ($count_user as $user) {
        array_push($arr_id,$user['id']);
    }
    $_SESSION['arr_id'] = $arr_id;
    $num_page = ceil(count($count_user) / 5);
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page / $page != 1 || $page > $num_page) {
            header("location: listUser.php");
        }
    }
    
    if (isset($_POST['search'])) {
       $key =  strip_tags($_POST['search_key']);
       $users = $userModel->Search($key);
       $num_page = ceil(count($users) / 5);
       
    }
    elseif (isset($_POST['sort'])) {
        $orderBY =  $_POST['sort_name'];
        if ($orderBY == "ASC") {
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $users = $userModel->loadmore($page,"ASC");
            }else{
                $page = 1;
                $users = $userModel->loadmore($page,"ASC");
            }
        }elseif($orderBY == "DESC"){
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $users = $userModel->loadmore($page,"DESC");
            }else{
                $page = 1;
                $users = $userModel->loadmore($page,"DESC");
            }
        }else{
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $users = $userModel->loadmore($page,"None");
            }else{
                $page = 1;
                $users = $userModel->loadmore($page,"None");
            }
        }
    }else{
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $users = $userModel->loadmore($page,"None");
        }else{
            $page = 1;
            $users = $userModel->loadmore($page,"None");
        }
    }
    // include header
    require_once("./header.php");
?>
<!-- Content -->
<link rel="stylesheet" href="./public/css/listUser.css">
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <div class="col-md-12">
                <div class=" rounded bg-white  mh-100 shadow  overflowY-scroll">
                    <div class="title-login  text-center text-white pt-2 pb-2 rounded-top "><h1><?php echo $title ?></h1></div>
                    <br>
                    <?php get_eroors($errors); get_success($success)?>
                    <form action="" method="POST">
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                                </div>
                                <input type="text" class="form-control" name="search_key" placeholder=" Tìm kiếm...">
                                <input class="btn btn-info" name="search" type="submit" value="Tìm Kiếm">
                                <select class="form-control" name="sort_name" id="sort">
                                    <option value="None">Sắp Xếp</option>
                                    <option value="ASC">A - Z</option>
                                    <option value="DESC">Z - A</option>
                                </select>
                                <input class="btn btn-info" name="sort" type="submit" value="Sắp Xếp">
                            </div>
                            
                        </div>
                    </form>
                    <div class="row  main">
                        <div class="col-md-12">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Full name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">User Type</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="data-user">
                                    <?php 
                                    // $i= 1 + (5 *($page - 1));
                                    foreach ($users as $user) {
                                    ?>
                                    <tr>
                                        <td><?php echo $user['id'] ?></td>
                                        <td><img src="./public/images/<?php echo $user['image_profile'] ?>" alt=""></td>
                                        <td><?php echo $user['username'] ?></td>
                                        <td><?php echo $user['fullname'] ?></td>
                                        <td><?php echo $user['email'] ?></td>
                                        <td><?php echo $user['user_type'] ?></td>
                                        <td>
                                            <a title="Xem Chi Tiết" class="btn btn-success" href="view.php?view=<?php echo $user['custom_id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i> Xem</a>
                                        
                                            <a title="Sửa user" class="btn btn-warning" href="edit.php?edit=<?php echo $user['custom_id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>
                                            
                                            <a title="Xóa user" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger" href="delete.php?delete=<?php echo $user['custom_id'] ?>"><i class="fa fa-times" aria-hidden="true"></i> Xóa</a>
                                        </td>
                                    </tr>
                                    <?php
                                    // $i++;     
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php 
                    ?>
                    <div class="text-center">
                    <?php
                    for ($i=1; $i <= $num_page; $i++) { 
                    ?>
                        <a href="listUser.php?page=<?php echo $i ?>" id="first-page" class="btn btn-info mb-3 <?php if ($page == $i) {echo "btn-dark";}?>"><?php echo $i ?></a>
                    <?php 
                    }
                    ?>
                        <a href="index.php" class="btn btn-info mb-3">Trang Chủ</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
<!-- Content -->
<!-- include footer -->
<?php require_once("./footer.php"); ?>



