<?php

include ("../db/db_connect.php");
$reponse= array();

if (isset($_POST['temp'])) {
	$select_product=$conn->query("SELECT * FROM product WHERE product_id='".$_POST['temp']."' ");
	if ($select_product_row=$select_product->fetch_assoc()) {
		$reponse['error']=false;
		$reponse['id']=$select_product_row['product_id'];
		$reponse['name']=$select_product_row['product_title'];
		$reponse['description']=$select_product_row['product_description'];
		$reponse['status']=$select_product_row['product_status'];
		$reponse['company_id']=$select_product_row['company_id'];
	}else{
		$reponse['error']=true;
		$reponse['message']='Server Not Found Entry';
	}

  }

  echo json_encode($reponse);

?>
