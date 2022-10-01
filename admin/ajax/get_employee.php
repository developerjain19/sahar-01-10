<?php

include ("../db/db_connect.php");
$reponse= array();

if (isset($_POST['temp'])) {
	$select_employee=$conn->query("SELECT * FROM employee WHERE employee_id='".$_POST['temp']."' ");
	if ($select_employee_row=$select_employee->fetch_assoc()) {
		$reponse['error']=false;
		$reponse['id']=$select_employee_row['employee_id'];
		$reponse['status']=$select_employee_row['employee_status'];

		 $reponse['employee_name'] =$select_employee_row['employee_name'];
		 $reponse['web_employee_name'] =$select_employee_row['employee_web_title'];
		 $reponse['employee_tagline'] =$select_employee_row['employee_tagline'];
		 $reponse['employee_url'] =$select_employee_row['employee_web_url'];
		 $reponse['employee_address'] =$select_employee_row['employee_address'];
		 $reponse['employee_email'] =$select_employee_row['employee_email'];
		 $reponse['employee_contact'] =$select_employee_row['employee_contact'];
		 $reponse['employee_whatsapp'] =$select_employee_row['employee_whatsapp'];
		 $reponse['employee_website'] =$select_employee_row['employee_website_url'];
		 $reponse['employee_facebook'] =$select_employee_row['employee_facebook'];
		 $reponse['employee_twitter'] =$select_employee_row['employee_twitter'];
		 $reponse['employee_instagram'] =$select_employee_row['employee_instagram'];
		 $reponse['employee_google_plus'] =$select_employee_row['employee_google_plus'];
		 $reponse['employee_linkedin'] =$select_employee_row['employee_linkedin'];
		 $reponse['employee_about'] =$select_employee_row['employee_about'];
		 $reponse['employee_logo'] =$select_employee_row['employee_logo'];
		 $reponse['employee_banner'] =$select_employee_row['employee_banner'];
		 $reponse['employee_card_background'] =$select_employee_row['employee_card_background'];
		 $reponse['company_id'] =$select_employee_row['company_id'];
	}else{
		$reponse['error']=true;
		$reponse['message']='Server Not Found Entry';
	}

  }

  echo json_encode($reponse);

?>
