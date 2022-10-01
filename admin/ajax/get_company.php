<?php

include ("../db/db_connect.php");
$reponse= array();

if (isset($_POST['temp'])) {
	$select_company=$conn->query("SELECT * FROM company WHERE company_id='".$_POST['temp']."' ");
	if ($select_company_row=$select_company->fetch_assoc()) {
		$reponse['error']=false;
		$reponse['id']=$select_company_row['company_id'];
		$reponse['status']=$select_company_row['company_status'];

		 $reponse['company_name'] =$select_company_row['company_name'];
		 $reponse['web_company_name'] =$select_company_row['company_web_title'];
		 $reponse['company_tagline'] =$select_company_row['company_tagline'];
		 $reponse['company_url'] =$select_company_row['company_web_title'];
		 $reponse['company_address'] =$select_company_row['company_address'];
		 $reponse['company_email'] =$select_company_row['company_email'];
		 $reponse['company_contact'] =$select_company_row['company_contact'];
		 $reponse['company_whatsapp'] =$select_company_row['company_whatsapp'];
		 $reponse['company_website'] =$select_company_row['company_website_url'];
		 $reponse['company_facebook'] =$select_company_row['company_facebook'];
		 $reponse['company_twitter'] =$select_company_row['company_twitter'];
		 $reponse['company_instagram'] =$select_company_row['company_instagram'];
		//  $reponse['company_google_plus'] =$select_company_row['company_google_plus'];
		 $reponse['company_linkedin'] =$select_company_row['company_linkedin'];
		 $reponse['company_about'] =$select_company_row['company_about'];
		 $reponse['company_logo'] =$select_company_row['company_logo'];
		 $reponse['company_banner'] =$select_company_row['company_banner'];
		 $reponse['company_card_background'] =$select_company_row['company_card_background'];
	}
	else
	{
		$reponse['error']=true;
		$reponse['message']='Server Not Found Entry';
	}

  }

  echo json_encode($reponse);

?>
