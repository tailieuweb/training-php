<?php
require_once 'BaseTwoAdmin.php'; 
class WhishListModel extends BaseTwoAdmin {
    
   public function getAllWhishList()
   {
    $sql = 'SELECT whishlist.id as id,products.id as pro_id,whishlist.created_at,products.name,products.pro_image,users.username,users.email FROM `whishlist`,users,products WHERE whishlist.user_id=users.id AND whishlist.pro_id=products.id;';
    $whishList = $this->select($sql);
    return $whishList;
   }
   public function getAllUser()
   {
    $sql = 'SELECT * FROM users';
    $users = $this->select($sql);
    return $users;
   }
   public function getAllProduct()
   {
    $sql = 'SELECT * FROM `products` WHERE detele_at IS NULL';
    $products = $this->select($sql);
    return $products;
   }
   public function insertWhishList($paged, $userId)
   {
       if(!empty($paged) && !empty($userId)){
        $allProduct = $this->getAllProduct();
        foreach ($allProduct as $value) {
            if (md5($value['id'] . 'chuyen-de-web-2') == $paged) {
                $sql = "INSERT INTO `webbanhkem`.`whishlist` (`user_id` ,`pro_id`) VALUES (" .
                    "'" . $userId
                    . "','" . $value['id'] . "')";
                $allWhishlist = $this->getWhishlistExist($userId, $value['id']);
                if (empty($allWhishlist)) {
                    $products = $this->insert($sql);
                    return $products;
                } else {
                    return 2;
                }
            }
        }
       }else{
            return 3;
       }
      
   }
   public function getWhishlistExist($userid, $pro_id)
   {
       $sql = "SELECT * FROM `whishlist` WHERE `user_id` = $userid and `pro_id` = $pro_id";
       $whishlist = $this->select($sql);
       return $whishlist;
   }
   public function deleteWhishList($paged)
    {
        $allWhishlist = $this->getWhishlist();
        foreach ($allWhishlist as $value) {
            $md5 = md5($value['id'] . "chuyen-de-web-2");
            if ($md5 == $paged) {
                $sql = "DELETE FROM whishlist WHERE id =  " . $value['id'];
                $whishlist = $this->delete($sql);
                return $whishlist;
            }
        }
        return false;
    }
   public function getWhishlist()
   {
    $sql = 'SELECT * FROM `whishlist` ';
    $whishList = $this->select($sql);
    return $whishList;
   }
   public function findWhishListById($id)
   {
    $allWhishlist = $this->getWhishlist();
    foreach ($allWhishlist as $value) {
        $md5 = md5($value['id'] . "chuyen-de-web-2");
        if ($md5 == $id) {
            $sql = "SELECT * FROM `whishlist` WHERE `id` = ".$value['id'];
            $whishlist = $this->select($sql);
            return $whishlist;
        }
    }
    return false;
   }
   public function updateWhishList($input)
   {
        $allProduct = $this->getAllProduct();
        $allWhishlist  = $this->getWhishlist();
        $versionNew = null;
        $error = false;
        foreach ($allWhishlist as  $item) {
          if($input['version'] == md5($item['version'].'chuyen-de-web-2')){
              $versionNew = $item['version'];
          }
          if($input['user_id'] == $item['user_id'] && $input['pro_id'] == md5($item['pro_id'].'chuyen-de-web-2')){
             return $error;
          }
        }
        if($versionNew != null){
            $version = (int)$versionNew + 1;
            foreach ($allProduct as $value) {
                
                if(md5($value['id'].'chuyen-de-web-2') == $input['pro_id']){
                    $sql = 'UPDATE whishlist SET 
                    user_id = "' . $input['user_id'] . '", 
                    pro_id = "' . $value['id'] . '",
                    version = "' .$version . '"
                    WHERE id = ' . $input['id'];
                    $whistlist = $this->update($sql);
                    return $whistlist;
                }
            }
        }else{
            return false;
        }
   }
}