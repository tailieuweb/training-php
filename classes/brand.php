
<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once  ($filepath.'/../helpers/format.php');
 ?>


<?php 

	/**
	 * 
	 */
	class brand
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_brand($brandName){

			$brandName = $this->fm->validation($brandName);
			$brandName = mysqli_real_escape_string($this->db->link, $brandName);

			if(empty($brandName)){
				$alert = "Vui lòng điền thông tin brand";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_brand(brandName) VALUES ('$brandName')";
				$result = $this->db->insert($query);
				if($result){
					// $alert = "Thêm brand thành công";
					// return $alert;
					header('Location:brand.php');

				}
				else{
					$alert = "Lỗi. Thêm brand thất bại";
					return $alert;	
				}

			}
			
		}
		public function show_brand(){
			$query = "SELECT * FROM tbl_brand order by brandId desc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function getnamebyId($id){
			$query = "SELECT * FROM tbl_brand WHERE brandId = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_brand($brandName,$id){
			$brandName = $this->fm->validation($brandName);
			$brandName = mysqli_real_escape_string($this->db->link, $brandName);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($brandName)){
				$alert = "Vui lòng điền thông tin brand";
				return $alert;
			}else{
				$query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandId = '$id'";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='text-danger' >Update brand thành công</span";
					return $alert;
					header('Location:brand.php');

				}
				else{
					$alert = "Lỗi. Update brand thất bại";
					return $alert;	
				}

			}
		}
		public function delete_brand($id){
			$query = "DELETE  FROM tbl_brand WHERE brandId = '$id' ";
			$result = $this->db->delete($query);
			$alert = "<span>Xóa thàh công</span";
			return $alert;
		}
		public function show_ListAdmin(){
			$query = "SELECT * FROM tbl_admin ";
			$result = $this->db->select($query);
			return $result;
		}
	}
 ?>