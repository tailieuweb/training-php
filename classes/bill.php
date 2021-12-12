<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once  ($filepath.'/../helpers/format.php');
 ?>




<?php 

	/**
	 * 
	 */
	class bill
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
				public function insert_Order($data,$buyerr){
			
			$name = mysqli_real_escape_string($this->db->link, $data['name']);	
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$total = 0;
			$session_id = session_id();
			$query = "SELECT * FROM tbl_cart WHERE ssId = '$session_id'";
			$get_cart = $this->db->select($query);
			if($get_cart){
				while ($result = $get_cart->fetch_assoc()) {
					$quantity = $result['quantity'];
					$price = $result['price'];
					$totalprice = $quantity * $price;
					$total +=$totalprice;
				}

			}
			
			$query_order = "INSERT INTO tbl_order ( buyer, receiver, phone, email, address, totalprice,status) VALUES ('$buyerr','$name','$phone','$email','$address','$total','0')";
			$insertOder = $this->db->insert($query_order);
			return $insertOder;
			}
		
		
		public function get_Bill_by_Customer($cus){

			$query = "SELECT * FROM tbl_order  WHERE buyer = '$cus' ORDER BY order_Id DESC";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_Bill(){

			$query = "SELECT * FROM tbl_order ORDER BY order_Id DESC";
			$result = $this->db->select($query);
			return $result;
		}

		public function delete_Order($id){
			$query = "DELETE  FROM tbl_order WHERE order_Id = '$id' ";
			$result = $this->db->delete($query);
			return $result;		
		}

		public function get_BillDetails($bill){

			$query = "SELECT * FROM tbl_orderdetails WHERE id_order = '$bill'";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_Bill_by_Id($id){

			$query = "SELECT a.order_Id, a.date , a.buyer, a.receiver, a.phone,a.email,a.totalprice,a.address, b.name as 'city', c.name as 'dis' FROM tbl_order a, tbl_city b, tbl_district c WHERE a.city=b.matp AND a.district=c.maqh AND order_Id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function insert_OrderDetail($MaxId){
			$session_id = session_id();
			$query = "SELECT * FROM tbl_cart WHERE ssId = '$session_id'";
			$get_cart = $this->db->select($query);
			if($get_cart){
				while ($result = $get_cart->fetch_assoc()) {
					$productName = $result['productName'];
					$size = $result['size'];
					$quantity = $result['quantity'];
					$image = $result['image'];
					$price = $result['price'];
					$query = "INSERT INTO tbl_orderdetails(id_order, productName, size, quantity, image, price) VALUES ('$MaxId','$productName','$size','$quantity','$image','$price')";
					$insertOrderDetails = $this->db->insert($query);
					

				}
			}
			return $insertOrderDetails;
		}
		public function get_Bill_Max(){
			
			$query = "SELECT * FROM tbl_order WHERE order_Id= (SELECT max(order_Id) FROM tbl_order)";
			
			$get = $this->db->select($query);
			return $get;
		}
		public function show_Discount(){
			
			$query = "SELECT * FROM tbl_discount ";
			$result = $this->db->select($query);
			if($result){
				return $result;
			}
		}
		public function update_Status($status,$id){
			
			$id = mysqli_real_escape_string($this->db->link, $id);
			$status = mysqli_real_escape_string($this->db->link, $status);

			
			$query = "UPDATE tbl_order SET status = '$status' WHERE order_Id = '$id'";
			$result = $this->db->update($query);
			if($result){
				$alert = "<span class='text-danger' >Update status thành công</span";
				return $alert;
				

			}
			else{
				$alert = "Lỗi. Update staus thất bại";
				return $alert;	
			}
			
		}
		public function totalprice(){
			$query = "SELECT SUM(totalprice)  as 'total' FROM tbl_order ";
			$result = $this->db->select($query);
			if($result){
				return $result;
			}
		}

		public function getPending(){
			$query = "SELECT Count(status)  as 'status' FROM tbl_order WHERE status = '0'";
			$result = $this->db->select($query);
			if($result){
				return $result;
			}
		}
		public function deleteBill($id){
			$query = "DELETE  FROM tbl_order WHERE order_Id = '$id' ";
			$result = $this->db->delete($query);
			return $result;		
		}
		public function CountProduct(){
			$query = "SELECT COUNT(quantity) as A FROM tbl_orderdetails";
			$insert = $this->db->insert($query);

		}

	}
 ?>