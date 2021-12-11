<?php
require_once 'BaseModel.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class HomeModel extends BaseModel
{
    protected static $_instance;
    //   ------------ User ---------------//
    //Login
    public function login($username, $password)
    {
        if (is_null($username) && is_null($password)) {
            return "Not Null";
        } elseif (empty($username) || empty($password)) {
            return "Not Empty";
        } elseif (is_array($username) || is_array($password)) {
            return "Not Array";
        } elseif (is_object($username) || is_object($password)) {
            return "Not Object";
        } elseif (is_bool($username) || is_bool($password)) {
            return "Not Boolean";
        } elseif (is_numeric($username)) {
            return "Not Number";
        }
        $md5Password = md5($password);
        $sql = 'SELECT * FROM users WHERE username = "' . $username . '" AND password = "' . $md5Password . '"';

        $user = $this->select($sql);
        return $user;
    }
    public function lastUserId()
    {
        $sql = "SELECT MAX(id) FROM users";
        $paged = $this->select($sql);
        return $paged[0]['MAX(id)'];
    }
    //Forget Password
    public function checkMail($email)
    {
        if (empty($email)) {
            return "Not Empty";
        } elseif (is_numeric($email) || is_array($email) || is_object($email) || is_bool($email)) {
            return "The field you entered is wrong";
        }
        $sql = 'SELECT * FROM users WHERE email = "' . $email . '"';
        $user = $this->select($sql);
        return $user;
    }
    //Update password cho user: 
    public function UpdatePassword($password, $email)
    {
        if (empty($email) || empty($password)) {
            return "name is empty";
        } elseif (
            is_numeric($email) || is_array($email) || is_array($password) || is_object($email) || is_object($password)
            || is_bool($email) || is_bool($password)
        ) {
            return "Enter the wrong field name";
        }
        $sql = 'UPDATE users SET 
        password = "' . md5($password) . '"
        WHERE email = "' . $email . '" ';
        $user = $this->update($sql);
        return $user;
    }
    // Tìm id của người dùng:
    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = $id";
        return $this->select($sql);
    }
    // Kiểm tra mật khẩu cũ:
    public function checkOldPassword($name, $oldPassword)
    {
        if (empty($name) || empty($oldPassword)) {
            return "name is empty";
        } elseif (
            is_array($name) || is_array($oldPassword) || is_object($name) || is_object($oldPassword) ||
            is_bool($name) || is_bool($oldPassword) || is_numeric($name)
        ) {
            return "enter the wrong field";
        }
        $sql = 'SELECT * FROM users WHERE username = "' . $name . '" AND password = "' . md5($oldPassword) . '"';
        return $this->select($sql);
    }
    // Change Password:
    public function changePassword($name, $newPassword)
    {
        if (empty($name) || empty($newPassword)) {
            return false;
        }
        if (!is_string($newPassword) || strlen($newPassword) < 6) {
            return false;
        } else {
            $md5Password = md5($newPassword);
            $sql = 'UPDATE users SET 
            password = "' . $md5Password . '"
            WHERE username = "' . $name . '" ';

            $user = $this->update($sql);
            return $user;
        }
    }
    // Mã khuyến mãi:
    public function getCouponByID($id)
    {
        if (empty($id)) {
            return "Not Empty";
        }elseif (is_array($id)) {
            return "Not Array";
        } elseif (is_object($id)) {
            return "Not Object";
        } elseif (is_bool($id)) {
            return "Not Boolean";
        }
        $sql = 'SELECT  zipcode.status,zipcode.discount,zipcode.created_at,zipcode.zipcode FROM zipcode , users WHERE zipcode.user_id = users.id AND zipcode.user_id = ' . $id;
        $coupon = $this->select($sql);
        return $coupon;
    }
    public function getWhishlist()
    {
        $sql = 'SELECT * FROM `whishlist` ORDER BY `id` DESC;';
        $whishlist = $this->select($sql);
        return $whishlist;
    }
    public function getWhishlistExist($userid, $pro_id)
    {
        if(!empty($userid) && !is_double($userid) && !is_bool($userid) && !is_object($userid) && !is_array($userid)
             && $userid > 0 && !empty($pro_id) && !is_double($pro_id) && !is_bool($pro_id) && !is_object($pro_id) && !is_array($pro_id)
             && $pro_id > 0){
            $sql = "SELECT * FROM `whishlist` WHERE `user_id` = $userid and `pro_id` = $pro_id";
            $whishlist = $this->select($sql);
            return $whishlist;
        }else{
            return false;
        }
    }
    public function getWhishlistByUserID($userid)
    {
        if(!empty($userid) && !is_double($userid) && !is_bool($userid) && !is_object($userid) && !is_array($userid)
        && $userid > 0){
            $sql = "SELECT whishlist.id as whishlistId,products.pro_image,products.name,products.price 
            FROM `whishlist`,products 
            WHERE whishlist.pro_id = products.id 
            AND whishlist.user_id = $userid ORDER BY `whishlist`.`id` DESC";
            $whishlist = $this->select($sql);
            return $whishlist;
        }else{
            return false;
        }
        
    }
    public function insertWhishList($paged, $userId)
    {
        if(!empty($paged) && !empty($userId)){
            $allProduct = $this->getProducts();
            foreach ($allProduct as $value) {
                if (md5($value['id'] . 'chuyen-de-web-2') == $paged && !is_bool($paged) ) {
                    $sql = "INSERT INTO `webbanhkem`.`whishlist` (`user_id` ,`pro_id`) VALUES (" .
                        "'" . $userId
                        . "','" . $value['id'] . "')";
                    $allWhishlist = $this->getWhishlistExist($userId, $value['id']);
                    if (empty($allWhishlist)) {
                        $products = $this->insert($sql);
                        return $products;
                    }
                }
            }
        }else{
             return false;
        }
        
    }
    public function deleteWhishList($paged)
    {
        if(!empty($paged)){
            $allWhishlist = $this->getWhishlist();
            foreach ($allWhishlist as $value) {
                $md5 = md5($value['id'] . "chuyen-de-web-2");
                if ($md5 == $paged && !is_bool($paged)) {
                    $sql = "DELETE FROM whishlist WHERE id =  " . $value['id'];
                    $whishlist = $this->delete($sql);
                    return $whishlist;
                }
            }
        }else{
            return false;
        }
    }
    // Xem đơn hàng của khách hàng:
    public function getCheckoutsByUserId($userID)
    {
        if (!is_numeric($userID) || $userID < 0 || is_double($userID)) {
            return 'Not invalid';
        } else {
            $sql = 'SELECT checkouts.id , checkouts.user_id , checkouts.addedDate, checkouts.address ,checkouts.phone , checkouts.sum,checkouts.status FROM `checkouts` ,users WHERE checkouts.user_id = users.id AND checkouts.user_id = ' . $userID;
            $order = $this->select($sql);
            return $order;
        }
        // $sql = 'SELECT checkouts.id , checkouts.addedDate, checkouts.address ,checkouts.phone , checkouts.sum,checkouts.status FROM `checkouts` ,users WHERE checkouts.user_id = users.id AND checkouts.user_id = '.$userID;
    }
    // Lấy sản phẩm trong giỏ hàng:
    public function getOrderItemById($id)
    {
        if (!is_numeric($id) || $id < 0 || is_double($id)) {
            return 'Not invalid';
        } else {
            $sql = 'SELECT carts.pro_id , products.name , products.price, carts.quantity FROM carts INNER JOIN products ON carts.pro_id = products.id WHERE carts.order_id = ' . mysqli_real_escape_string(self::$_connection, $id) . ' ';
            $user = $this->select($sql);
            return $user;
        }
    }
    // Thêm danh sách giỏ hàng
    public function insertOrderItem($OrderID, $ProductID, $Quantity)
    {
        if (empty($OrderID) || empty($ProductID) || empty($Quantity)) {
            return 'Invalid';
        }
        if (!is_numeric($OrderID) || $OrderID < 0 || is_double($OrderID)) {
            return 'Invalid';
        }
        if (!is_numeric($ProductID) || $ProductID < 0 || is_double($ProductID)) {
            return 'Invalid';
        }
        if (!is_numeric($Quantity) || $Quantity < 0 || is_double($Quantity)) {
            return 'Invalid';
        } else {
            $sql = "Insert into carts (order_id,pro_id,quantity) values($OrderID,$ProductID,$Quantity)";
            //var_dump($sql);
            $product = $this->insert($sql);
            return $product;
        }
    }
    // -------------- Checkout ---------------- //
    public function insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes)
    {
        if (
            !is_array($userID) && !is_array($Firstname) && !is_array($Lastname)
            && !is_array($address)  && !is_array($email) && !is_array($phone) && !is_array($notes)
        ) {
            if (
                !is_numeric($userID) && !is_string($Firstname) && !is_string($Lastname)
                && !is_string($address)  && !is_string($email) && !is_numeric($phone) && !is_string($notes)
            ) {
                return 0;
            }
            if (is_object($userID) || is_object($phone) || is_bool($userID)) {
                return 0;
            }
            if (intval($userID) <= 0) {
                return 0;
            }
            $sql = "Insert into checkouts(user_id,firstname,lastname,addedDate,address,email,phone,notes) values('$userID','$Firstname','$Lastname',now(),'$address','$email','$phone','$notes')";
            $product = $this->insert($sql);
            return $product;
        } else {
            return 0;
        }
    }
    // Cập nhập Tổng tiền:
    public function updateSum($OrderID, $Sum)
    {
        if (!is_numeric($OrderID) && !is_numeric($Sum)) {
            return false;
        }
        if($OrderID <= 0 || $Sum <= 0){
            return false;
        }
        $sql = "Update checkouts set sum = $Sum where id = $OrderID";
        $checkout = $this->update($sql);
        return $checkout;
    }
    public function searchProduct($search = null)
    {
        if (is_array($search) || is_object($search)) {
            return false;
        }
        if ($search === null) {
            return false;
        } else {
            $sql = 'SELECT * FROM products WHERE name LIKE "%' . mysqli_real_escape_string(self::$_connection, $search) . '%"';
            $searchResult = $this->select($sql);
            return $searchResult;
        }
    }
    // Hàm tìm kiếm theo tên của category(manufacture)
    public function searchCategories($search)
    {
        if (is_string($search)) {
            $sql = 'SELECT * FROM products,manufactures WHERE products.manu_id=manufactures.manu_id 
            AND manufactures.manu_name LIKE "%' . mysqli_real_escape_string(self::$_connection, $search) . '%"';
            $searchResult = $this->select($sql);
            return $searchResult;
        } else {
            return false;
        }
    }
    public function insertComment($lgUserID, $id, $input)
    {
        $comments = 'SELECT id FROM products';
        $comment = $this->select($comments);
        $insert_comment = null;
        if (isset($lgUserID) && count($comment) != 0 && isset($input)) {
            if (!is_array($lgUserID) && !is_array($id) && is_array($input) && !is_bool($lgUserID) && !is_bool($id) && !is_bool($input)) {
               
                foreach ($comment as $commen) {
                    $md5 = md5($commen['id'] . 'chuyen-de-web-2');
                    // var_dump($md5);
                    // var_dump($id);
                    if ($md5 == $id) {
                        $sql = "INSERT INTO `comment`(`user_id`, `id_product`, `username`, `content`) VALUES ('$lgUserID'," . "'" . $commen['id'] . "', " . "'" . $input['name'] . "'," . "'" . $input['content'] . "')";
                        // var_dump($sql).die();
                        $insert_comment = $this->insert($sql);
                    }
                }
            }
        }
        return $insert_comment;
    }
    public function getUserByMonth($month)
    {
        if (!is_numeric($month) || $month < 0 || is_double($month)) {
            return 'Not invalid';
        } else {
            $sql = "SELECT * from users where MONTH(date) = $month";
            $id = $this->select($sql);
            return $id;
        }
    }
    public function findOrderById($id)
    {
        $sql = 'SELECT * FROM carts WHERE id = ' . $id;
        $order = $this->select($sql);
        return $order;
    }
    public function getAllOrderByMonth($month)
    {
        if(!empty($month) && !is_string($month) && !is_object($month) && !is_array($month) 
        && !is_double($month) && $month > 0 && !is_bool($month)){
            $sql = "SELECT * 
            FROM checkouts  
            WHERE MONTH(addedDate) = $month;";
            $id = $this->select($sql);
            return $id;
        }else{
            return false;
        }
        
    }
    // Lấy id mới nhất của đơn hàng:
    public function getOrderMaxById()
    {
        $sql = "SELECT MAX(id) FROM checkouts";
        $paged = $this->select($sql);
        return $paged[0]['MAX(id)'];
    }
    public static function getInstance()
    {
        if (self::$_instance != null) {

            return self::$_instance;
        }
        self::$_instance = new self();
        return self::$_instance;
    }





    // Chưa test PHPUnit
    //   Register:
    public function insertUserDecorator($pagenput, $zipcode)
    {
        $allUser = $this->getAllUser();
        foreach ($allUser as  $value) {
            if ($pagenput['email'] == $value['email']) {
                return false;
            }
        }
        $sql = "INSERT INTO `users`(`username`, `email`, `password`,`otp`,`permission`) 
        VALUES ('" . $pagenput['username'] . "','" . $pagenput['email'] . "','" . md5($pagenput['password']) . "','" . $pagenput['otp'] . "','" . 'User' . "')";
        $user = $this->insert($sql);

        $lastUserId = $this->lastUserId();

        $data = [
            'zipcode' => $this->getToken(8),
            'user_id' => $lastUserId
        ];
        $sql1 = "INSERT INTO `webbanhkem`.`zipcode` (`zipcode`, `user_id` ,`discount`,`status`)
         VALUES (" .
            "'" . $this->getToken(8)
            . "','" . $lastUserId
            . "','" . 25
            . "','" . 1 . "')";
        $zipcode = $this->insert($sql1);

        return $user;
    }
    public function getToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet);
        for ($page = 0; $page < $length; $page++) {
            $token .= $codeAlphabet[random_int(0, $max - 1)];
        }
        return $token;
    }
    public function getAllUser()
    {
        $sql = 'SELECT * FROM users';
        $users = $this->select($sql);
        return $users;
    }
   
    // Lay id
    public function getid()
    {
        $sql = 'SELECT * FROM users ORDER BY ID DESC LIMIT 1';
        $protypes = $this->select($sql);
        return $protypes;
    }
    // Lay mã otp
    public function getOtp()
    {
        $sql1 = 'SELECT * FROM users ORDER BY ID DESC LIMIT 1';
        $userid = $this->select($sql1);
        // var_dump($userid[0]['id']).die();
        $sql = 'SELECT otp FROM users WHERE id = ' . $userid[0]['id'];
        $protypes = $this->select($sql);
        return $protypes;
    }
    //Cap nhap trang thai đăng ký
    public function getOtpAsAction()
    {
        $sql1 = 'SELECT * FROM users ORDER BY ID DESC LIMIT 1';
        $userid = $this->select($sql1);
        // var_dump($userid[0]['id']).die();
        $sql = 'UPDATE `users` SET `action`= 1 WHERE id = ' . $userid[0]['id'];
        $protypes = $this->update($sql);
        return $protypes;
    }
    //   ---------------------- Protype ---------------- //
    public function getProtype()
    {
        $sql = 'SELECT * FROM protypes';
        $protypes = $this->select($sql);
        return $protypes;
    }
    public function getByIdProtype()
    {
        $sql = 'SELECT type_id FROM protypes';
        $protypes = $this->select($sql);
        return $protypes;
    }
    public function getprotypeOnProduct($typeid)
    {
        $protypes = 'SELECT type_id FROM protypes';
        $protype = $this->select($protypes);
        $proty = null;
        foreach ($protype as $pagedproty) {
            $md5 = md5($pagedproty['type_id'] . 'chuyen-de-web-2');
            if ($md5 == $typeid) {
                $sql = 'SELECT * FROM `protypes`,products WHERE protypes.type_id = products.type_id AND protypes.type_id = ' . $pagedproty['type_id'] . ' ORDER BY products.id DESC';
                $proty = $this->select($sql);
            }
        }
        return $proty;
    }
    // --------------------- Manufacture ------------------ //
    // Hien thi data bang manufactures:
    public function getManufactures()
    {
        $sql = "SELECT * FROM manufactures";
        $manufactures = $this->select($sql);
        return $manufactures;
    }
    // Hien thi san pham theo danh 
    public function getManufactureById($paged)
    {
        $manufacture = 'SELECT manu_id FROM manufactures';
        $manufactures = $this->select($manufacture);
        $manu = null;
        foreach ($manufactures as $manufac) {
            $md5 = md5($manufac['manu_id'] . 'chuyen-de-web-2');
            if ($md5 == $paged) {
                $sql = 'SELECT * FROM `products` , manufactures WHERE products.manu_id = manufactures.manu_id AND products.manu_id =  ' . $manufac['manu_id'] . ' ';
                $manu = $this->select($sql);
            }
        }


        return $manu;
    }
    // --------------------- Products ------------------ //
    public function getProducts()
    {
        $sort = '';
        if (isset($_GET['sort'])) {
            if ($_GET['sort'] == 'desc') {
                $sort = 'DESC';
            } elseif ($_GET['sort'] == 'asc') {
                $sort = 'ASC';
            }
        }

        $sql = 'SELECT * FROM `products` WHERE detele_at IS NULL ORDER BY products.price ' . $sort;
        $products = $this->select($sql);
        return $products;
    }
    // Dem so san pham theo danh muc:
    public function countProductWithManufacture($paged)
    {
        $sql = 'SELECT * FROM `products` WHERE products.manu_id = ' . $paged;
        $manufactures = $this->select($sql);
        return $manufactures;
    }
    // Trang Home :
    public function getProductFeature()
    {
        $sql = 'SELECT * FROM `products` WHERE feature = 2 ORDER BY id DESC';
        $products = $this->select($sql);
        return $products;
    }
    // Trang Home Menu :
    public function getDiscoverDescProducts()
    {
        $sql = 'SELECT * FROM `products` ORDER BY id DESC LIMIT 5';
        $products = $this->select($sql);
        return $products;
    }
    public function getDiscoverAscProducts()
    {
        $sql = 'SELECT * FROM `products` ORDER BY id ASC LIMIT 5';
        $products = $this->select($sql);
        return $products;
    }
    // Bánh của tôi : bánh host nhất:
    public function getProductHosts()
    {
        $sql = 'SELECT * FROM `products` WHERE feature = 1 ORDER BY id DESC LIMIT 8';
        $products = $this->select($sql);
        return $products;
    }
    // Các sản phẩm host nhất:
    public function getProductLasters()
    {
        $sql = 'SELECT * FROM `products` WHERE feature = 1 ORDER BY price ASC LIMIT 4';
        $products = $this->select($sql);
        return $products;
    }
    // Chi tiết sản phẩm :
    public function firstProductDetail($paged)
    {
        $allProduct = $this->getProducts();
        foreach ($allProduct as  $value) {
            if (md5($value['id'] . 'chuyen-de-web-2') == $paged) {
                $sql = 'SELECT * FROM `products`  WHERE id =  ' . $value['id'] . ' ';
                $product = $this->select($sql);
                return $product;
            }
        }
    }

    // Các sản phẩm có liên quan thuộc danh mục:
    public function getProductManufactures($paged, $ManuID)
    {
        $allProduct = $this->getProducts();
        foreach ($allProduct as  $value) {
            if (md5($value['id'] . 'chuyen-de-web-2') == $paged) {
                $sql = 'Select * from products where id <> ' . $value['id'] . '  and manu_id = ' . $ManuID . ' LIMIT 4';
                $products = $this->select($sql);
                return $products;
            }
        }
    }
    // ------------------ Giỏ hàng -------------------- //
  
    // Thêm vào giỏ hàng:
    public function getOrderItemByOrder($paged)
    {
        $sql = 'SELECT carts.pro_id , products.name , products.price , carts.quantity FROM `carts` INNER JOIN products ON carts.pro_id = products.id WHERE carts.order_id = ' . $paged;
        $cart = $this->select($sql);
        return $cart;
    }
   
   
  
    public function getCouponByZipcode($coupon)
    {

        $sql = "SELECT zipcode.zipcode , zipcode.discount , zipcode.user_id FROM zipcode WHERE zipcode.zipcode = '$coupon'";
        $zipcode = $this->select($sql);
        return $zipcode;
    }
    public function updateCouponByCheckout($OrderID, $Coupon)
    {
        $sql = "Update checkouts set coupon = $Coupon where id = $OrderID";
        $checkout = $this->update($sql);
        return $checkout;
    }
   
   
    public function pagination($sql, $page, $num)
    {

        if (!is_numeric($page)) {
            return false;
        } else {
            if ($page < 2) {
                $star = 0;
            } else {
                $star = ($page * $num) - $num;
            }
            $sql = $sql . ' LIMIT ' . $star . ',' . $num;
            return $this->select($sql);
        }
    }
    public function paginationProtype($typeid, $page, $num)
    {
        if ($page < 2) {
            $star = 0;
        } else {
            $star = ($page * $num) - $num;
        }
        $protypes = 'SELECT type_id FROM protypes';
        $protype = $this->select($protypes);
        foreach ($protype as $pagedproty) {
            $md5 = md5($pagedproty['type_id'] . 'chuyen-de-web-2');
            if ($md5 == $typeid) {
                $sql = 'SELECT * FROM `protypes`,products WHERE protypes.type_id = products.type_id AND protypes.type_id = ' . $pagedproty['type_id'] . ' ORDER BY products.id DESC';
            }
        }
        $sql = $sql . ' LIMIT ' . $star . ',' . $num;
        return $this->select($sql);
    }


    // ------------------------- Comment --------------------//

    public function getAllCommentById($id)
    {
        // var_dump($input['name']).die();
        $comments = 'SELECT id FROM products';
        $comment = $this->select($comments);
        $insert_comment = null;
        foreach ($comment as $commen) {
            $md5 = md5($commen['id'] . 'chuyen-de-web-2');
            if ($md5 == $id) {
                $sql = 'SELECT * FROM `comment` WHERE `id_product` = ' . $commen['id'];
                $insert_comment = $this->select($sql);
                return $insert_comment;
            }
        }
        // $sql = 'SELECT * FROM `comment` WHERE `id_product` = ' . $id;
        // $comment = $this->select($sql);
    }
    public function getNameUserByComment($lgUserID)
    {
        $sql = 'SELECT users.username FROM `comment`, `users` WHERE comment.user_id = users.id AND comment.user_id = ' . $lgUserID;
        $comment = $this->select($sql);
        return $comment;
    }
   
    public function updateComment($lgUserName, $input)
    {

        $sql = "UPDATE `comment` SET `name_replide`='$lgUserName', `replied_comment`='Cảm ơn bạn đã đánh giá.', `update_at` = now() WHERE id = " . $input['id_comment'];

        $insert_comment = $this->update($sql);
        // var_dump($insert_comment).die();
        return $insert_comment;
    }
    // ------------------------- panigation --------------------//
    public function paginationManu($manuid, $page, $num)
    {
        if ($page < 2) {
            $star = 0;
        } else {
            $star = ($page * $num) - $num;
        }
        $manufacture = 'SELECT manu_id FROM manufactures';
        $manufactures = $this->select($manufacture);
        foreach ($manufactures as $manufac) {
            $md5 = md5($manufac['manu_id'] . 'chuyen-de-web-2');
            if ($md5 == $manuid) {
                $sql = 'SELECT * FROM `products` , manufactures WHERE products.manu_id = manufactures.manu_id AND products.manu_id =  ' . $manufac['manu_id'] . ' ';
                $sql = $sql . ' LIMIT ' . $star . ',' . $num;
                return $this->select($sql);
            }
        }
    }
    public function paginationSearchCate($searchCate, $page, $num)
    {
        if ($page < 2) {
            $star = 0;
        } else {
            $star = ($page * $num) - $num;
        }
        if (empty($searchCate) || !is_string($searchCate)) {
            return false;
        } else {
            $sql = 'SELECT * FROM products,manufactures WHERE products.manu_id=manufactures.manu_id 
        AND manufactures.manu_name LIKE "%' . mysqli_real_escape_string(self::$_connection, $searchCate) . '%"';
            $sql = $sql . ' LIMIT ' . $star . ',' . $num;
            return $this->select($sql);
        }
    }
    public function paginationSearchProduct($search, $page, $num)
    {
        if (!empty($search)) {
            if ($page < 2) {
                $star = 0;
            } else {
                $star = ($page * $num) - $num;
            }
            $sqlF = 'SELECT * FROM products WHERE name LIKE "%' . mysqli_real_escape_string(self::$_connection, $search) . '%"';
            $sql = $sqlF . ' LIMIT ' . $star . ',' . $num;
            return $this->select($sql);
        } else {
            return false;
        }
    }

    
}