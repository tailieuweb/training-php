<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once  ($filepath.'/../helpers/format.php');
 ?>




<?php 

	/**
	 * 
	 */
	class User
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_Customer($data){
			// $name = $this->fm->validation($name);
			// $username = $this->fm->validation($username);
			// $password = $this->fm->validation($password);
			// $email = $this->fm->validation($email);
			// $phone = $this->fm->validation($phone);
			// $city = $this->fm->validation($city);
			// $district = $this->fm->validation($district);
			// $address = $this->fm->validation($address);


			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$username = mysqli_real_escape_string($this->db->link, $data['username']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			$password = mysqli_real_escape_string($this->db->link, $data['password']);
			$repeatpassword = mysqli_real_escape_string($this->db->link, $data['repeatpassword']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			

			if($name == "" || $username == ""  || $address == "" || $phone == "" || $password == "" || $email == ""){
				$alert = '<span class="text-danger">Vui lòng không để trống thông tin</span>'; 
				return $alert;
			}else{
				$check = "SELECT * FROM tbl_customer ";
				$result_check = $this->db->select($check);
					$data=mysqli_fetch_array($result_check);
					$check_mail=$data['emailCus'];
					$check_username=$data['username'];
					$check_phone=$data['phone'];
				if($username==$check_username){
					$alert = '<span class="text-danger">Username Tồn Tại</span>';
					return $alert;
				}elseif ($email==$check_mail) {
					$alert = '<span class="text-danger">Email Tồn Tại</span>';
					return $alert;
				}elseif ($phone==$check_phone) {
					$alert = '<span class="text-danger">Phone Tồn Tại</span>';
					return $alert;
				}
				if ($password!=$repeatpassword) {
						$alert='<span class="text-danger">Mật Khẩu Không Trùng Khớp</span>';
						return $alert;
				}else{
						$password=md5($password);
						$query = "INSERT INTO tbl_customer( username ,  password ,  nameCus ,  emailCus ,    address ,  phone ) VALUES ('$username','$password','$name','$email','$address','$phone')";
						$result = $this->db->insert($query);
						if($result){
							$alert = '<span class="text-success">Đăng ký khách hàng thành công</span>';
							return $alert;
						}
						else{
							$alert = '<span class="text-danger">Lỗi. Đăng ký khách hàng thất bại</span>';
								return $alert;	
						}
					}
					
				
				}

			return $result;
		}
		 // 
		public function Login_Customer($data){
			$username = mysqli_real_escape_string($this->db->link, $data['username']);
			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));	
			$check = "SELECT * FROM tbl_customer WHERE (username= '$username' OR emailCus= '$username' OR phone= '$username')  AND password ='$password' limit 1";
				$result_check = $this->db->select($check);
				if($result_check){
					$value = $result_check-> fetch_assoc();
					Session::set('customer_login',true);
					Session::set('customer_user',$value['username']);
					Session::set('customer_name',$value['nameCus']);
					header('location:index.php');
				
				}else{
					$alert = '<span class="text-danger" > Sai tài khoản hoặc mật khẩu</span>'; 
					return $alert; 	
				}

			
		}

		public function Get_User($username){
			$query = "SELECT *
					  FROM tbl_customer 
					  WHERE username = '$username'";
			$result_check = $this->db->select($query);
			return $result_check;
		}

		public function Update_Customer($data,$userr){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$password= mysqli_real_escape_string($this->db->link, $data['password']);
			if($name == ""   || $address == "" || $phone == ""  || $email == ""){
				$alert = "<span>Vui lòng không để trống thông tin</span>"; 
				return $alert;
			}else{
				if ($password=="") {
					$query = "UPDATE tbl_customer SET nameCus='$name',emailCus='$email',address='$address',phone='$phone' WHERE username = '$userr'";
					$result = $this->db->update($query);
					
					if($result){
						$alert = '<span class="text-success" >Cập nhật thông tin thành công</span>';
						return $alert;
					}else{
						$alert = '<span class="text-danger">Lỗi. Cập nhật thông tin không thành công</span>';
						return $alert;	
					}
				}else{
					$query = "UPDATE tbl_customer SET nameCus='$name',emailCus='$email',address='$address',phone='$phone',password=md5('$password') WHERE username = '$userr'";
					$result = $this->db->update($query);
					if($result){
						$alert = '<span class="text-success" >Cập nhật thông tin thành công </span>';						return $alert;
					}
					else{
						$alert = '<span class="text-danger">Lỗi. Cập nhật thông tin không thành công</span>';
						return $alert;	
					}
				}
			}
		}
		



	}

 ?>