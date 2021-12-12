    <?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ("../lib/session.php");
	Session::checkLogin();
	include_once ($filepath.'/../lib/database.php');
	include_once  ($filepath.'/../helpers/format.php');


 ?>


<?php 

	/**
	 * 
	 */
	class admin
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function get_Info($admin_User){
			
			$query = "SELECT * FROM tbl_admin WHERE admin_User = '$admin_User'";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_ListAdmin(){
			$query = "SELECT * FROM tbl_admin ";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_quantity_admin(){
			$query="SELECT count(*) as 'admin_User' FROM tbl_admin";
			$result=$this->db->select($query);
			return $result;
		}
		public function insert_Admin($data){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$username = mysqli_real_escape_string($this->db->link, $data['username']);
			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
			$password2 = mysqli_real_escape_string($this->db->link, md5($data['confirmpassword']));
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$level = mysqli_real_escape_string($this->db->link, $data['level']);

			if($name == "" || $username == "" ||  $password2 == ""|| $password == "" || $email == ""){
				$alert = "<span>Vui lòng không để trống thông tin</span>"; 
				return $alert;
			}else{
				if($password == $password2){
					$check = "SELECT * FROM tbl_admin WHERE admin_User= '$username'";
					$result_check = $this->db->select($check);
					if($result_check){
						$alert = "<span>Người dùng đã tồn tại</span>";
						return $alert;
					}else{
						$query = "INSERT INTO tbl_admin( admin_User , admin_Pass , admin_Name ,  admin_EMail, level ) VALUES ('$username','$password','$name','$email','$level')";
						$result = $this->db->insert($query);
						if($result){
							$alert = "<span>Đăng ký người dùng thành công</span>";
							return $alert;
						}
						else{
							$alert = "<span>Lỗi. Đăng ký người dùng thất bại</span>";
							return $alert;	
						}
					}
				}else
				{
					$alert = "<span>Mật khẩu không khớp</span>";
						return $alert;
				}
			}
		}
		// $name = $this->fm->validation($name);
			// $username = $this->fm->validation($username);
			// $password = $this->fm->validation($password);
			// $email = $this->fm->validation($email);
			// $phone = $this->fm->validation($phone);
			// $city = $this->fm->validation($city);
			// $district = $this->fm->validation($district);
			// $address = $this->fm->validation($address);
		public function delete_Admin($id){
			$query = "DELETE  FROM tbl_admin WHERE admin_User = '$id' ";
			$result = $this->db->delete($query);
			$alert = "<span>Xóa thàh công</span";
			return $alert;
		}
		public function update_admin($data,$user){
			$new_password=mysqli_real_escape_string($this->db->link, $data['changepassword']);
			$username = mysqli_real_escape_string($this->db->link, $data['username']);
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			//$email = mysqli_real_escape_string($this->db->link, $data['email']);
			//$repeat_password = mysqli_real_escape_string($this->db->link, $data['newpassword']);
			
				$query="UPDATE tbl_admin SET admin_Pass=md5('$new_password'),admin_User='$username',admin_Name='$name' WHERE admin_User = '$user'";
				$result=$this->db->update($query);
				if ($result) {
					$alert='<span class="text-success">Cập Nhật Thành Công</span>';
					return $alert;

				}else{
					$alert='<span class="text-danger">Mật Khẩu Không Khớp</span>';
					return $alert;
				}
				return $result;
		}
		public function reset_Password($user){
			$query = "UPDATE tbl_admin SET admin_Pass = 'c4ca4238a0b923820dcc509a6f75849b' WHERE admin_User = '$user'";
			$result = $this->db->update($query);
			
		 }
	}
 ?>