<?php
session_start();
include ("../db/db_connect.php");
if (isset($_POST['product_name'])) {
$reponse= array();
	$product_name= mysqli_real_escape_string($conn , $_POST['product_name']);
	$status= mysqli_real_escape_string($conn , $_POST['status']);
	$description= mysqli_real_escape_string($conn , $_POST['description']);
	$company_id= mysqli_real_escape_string($conn , $_POST['company_id']);
	$select_product=$conn->query("SELECT * FROM product WHERE product_id='".$_POST['id']."' ");
		if(mysqli_num_rows($select_product) > 0){
			$product_id=$_POST['id'];
				$query="UPDATE `product` SET `product_title`='$product_name' , `product_description`='$description' ,  `product_status`='$status'  WHERE `product_id` = $product_id";
				if($result=$conn->query($query)){
					$reponse['error']=false;
					$reponse['message']='Updated Succesfully';

				}else{
					$reponse['error']=true;
					$reponse['message']='Not Updated';
				}
		}else{

				$insert="INSERT INTO `product` (`product_id`, `product_title`, `product_description`, `product_status`, `company_id`, `product_created_date`, `product_update_date`) VALUES (NULL, '$product_name', '$description', '$status', '$company_id', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
			if($conn->query($insert)){
				$reponse['error']=false;
				$reponse['message']='inserted Succesfully';
			}else{
				$reponse['error']=true;
				$reponse['message']='Not Inserted';
			}
		}	

 echo json_encode($reponse);
}

?>
