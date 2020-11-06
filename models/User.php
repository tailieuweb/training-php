<?php
class UserModel extends Db
{
    //lấy tất cả user
    public function getAll(){
        $sql = self::$connection->prepare("SELECT * FROM users");
        return $this->select($sql);
    }

    //lấy tất cả user
    public function changPass($password,$custom_id){
        $password_md5 = md5($password);
        $sql = self::$connection->prepare("UPDATE `users` SET `password`=? WHERE custom_id=?");
        $sql->bind_param('ss',$password_md5,$custom_id);
        $sql->execute();
        return true;
    }
    public function update($id){
        $custom_id = md5($id).time();
        $sql = self::$connection->prepare("UPDATE `users` SET `custom_id`=? WHERE id=?");
        $sql->bind_param('si',$custom_id,$id);
        $sql->execute();
        return true;
    }
    //Lấy thông tin user từ user_id
    public function getUserByCustomId($custom_id){
        $sql = self::$connection->prepare("SELECT * FROM users WHERE custom_id=?");
        $sql->bind_param('s',$custom_id);
        return $this->select($sql)[0];
    }

    //Lấy thông tin user từ username
    public function getUserByUsername($username){
        $sql = self::$connection->prepare("SELECT * FROM users WHERE username=?");
        $sql->bind_param('s',$username);
        return $this->select($sql);
    }

    //Trả về kết quả Login
    public function getLogin($username,$password)
    {
        $pass_md5 = md5($password);
        $sql = self::$connection->prepare("SELECT * FROM users WHERE username=? AND password=?");
        $sql->bind_param('ss',$username,$pass_md5);
        return $this->select($sql);
    }

    //Đăng Kí User và thêm user của admin
    public function addUser($username,$fullname,$email,$password,$user_type = NULL,$name_img_user)
    {
        $custom_id = "custom_id";
        $pass_md5 = md5($password);
        if ($user_type == NULL) {
            $user_type = "user";
        }
        $sql = self::$connection->prepare("INSERT INTO `users`(`username`, `fullname`, `email`, `user_type`, `password`, `image_profile`,`custom_id`) VALUES (?,?,?,?,?,?,?)");
        $sql->bind_param('sssssss',$username,$fullname,$email,$user_type,$pass_md5,$name_img_user,$custom_id);
        $user = $sql->execute();
        $sql = self::$connection->prepare("SELECT * FROM users WHERE username=?");
        $sql->bind_param('s',$username);
        return $this->select($sql);
    }

    // Cập Nhật Thông Tin User
    public function setUser($custom_id,$fullname,$email,$img_user = NULL)
    {
        if ($img_user != NULL) {
            $sql = self::$connection->prepare("UPDATE `users` SET `fullname`=?,`email`=?,`image_profile`=? WHERE custom_id=?");
            $sql->bind_param('ssss',$fullname,$email,$img_user,$custom_id);
        }else{
            $sql = self::$connection->prepare("UPDATE `users` SET `fullname`=?,`email`=? WHERE custom_id=?");
            $sql->bind_param('sss',$fullname,$email,$custom_id);
        }
        
        $sql->execute();    
        return true;
    }

    //xóa user bằng id
    public function deleteUserByCustomId($custom_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `users` WHERE custom_id=?");
        $sql->bind_param('s',$custom_id);
        $sql->execute();
        return true;
    }

    //Search
    public function Search($search_key)
    {
        $key = "%".$search_key."%";
        $sql = self::$connection->prepare("SELECT * FROM users WHERE username LIKE ? OR username LIKE ? OR fullname LIKE ? OR email LIKE ? OR user_type LIKE ?");
        $sql->bind_param('sssss',$key,$key,$key,$key,$key);
        return $this->select($sql);
    }

    // Phân Trang Load Trang
    public function loadmore($page,$ordeBy)
    {
        $per_page = 5;
        if($page == 1){
            $start = 0;
        }else{
            $start = ($page * $per_page) - $per_page;
        }
        if($ordeBy == "ASC"){
            $sql = self::$connection->prepare("SELECT * FROM users ORDER BY username ASC LIMIT ?,? ");
        }elseif($ordeBy == "DESC"){
            $sql = self::$connection->prepare("SELECT * FROM users ORDER BY username DESC LIMIT ?,? ");
        }else{
            $sql = self::$connection->prepare("SELECT * FROM users ORDER BY id ASC LIMIT ?,? ");
        }
        $sql->bind_param('ii',$start,$per_page);
        return $this->select($sql);
    }
}
