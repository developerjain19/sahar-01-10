<?php

function compressImage($source, $destination, $quality) {

  // $info = getimagesize($source);

  // if ($info['mime'] == 'image/jpeg') 
  //   $image = imagecreatefromjpeg($source);

  // elseif ($info['mime'] == 'image/gif') 
  //   $image = imagecreatefromgif($source);

  // elseif ($info['mime'] == 'image/png') 
  //   $image = imagecreatefrompng($source);

  // imagejpeg($image, $destination, $quality);
	move_uploaded_file($source , $destination);

}

session_start();
include ("../db/db_connect.php");
if (isset($_POST['company_name'])) {
	$reponse= array();
	 $company_name = mysqli_real_escape_string($conn , $_POST['company_name']);
	 $web_company_name = mysqli_real_escape_string($conn , $_POST['web_company_name']);
	 $company_tagline = mysqli_real_escape_string($conn , $_POST['company_tagline']);
	 $company_url = mysqli_real_escape_string($conn , $_POST['company_url']);
	 $company_address = mysqli_real_escape_string($conn , $_POST['company_address']);
	 $company_email = mysqli_real_escape_string($conn , $_POST['company_email']);
	 $company_contact = mysqli_real_escape_string($conn , $_POST['company_contact']);
	 $company_whatsapp = mysqli_real_escape_string($conn , $_POST['company_whatsapp']);
	 $company_website = mysqli_real_escape_string($conn , $_POST['company_website']);
	 $company_facebook = mysqli_real_escape_string($conn , $_POST['company_facebook']);
	 $company_twitter = mysqli_real_escape_string($conn , $_POST['company_twitter']);
	 $company_instagram = mysqli_real_escape_string($conn , $_POST['company_instagram']);
	 $company_google_plus = mysqli_real_escape_string($conn , $_POST['company_google_plus']);
	 $company_linkedin = mysqli_real_escape_string($conn , $_POST['company_linkedin']);
	 $company_about = mysqli_real_escape_string($conn , $_POST['company_about']);
	 $status = mysqli_real_escape_string($conn , $_POST['status']);



			$company_logo_name = $_FILES['company_logo']['name'];
		  	$company_logo_target_file = basename($_FILES["company_logo"]["name"]);
			$company_logo_imageFileType = strtolower(pathinfo($company_logo_target_file,PATHINFO_EXTENSION));
			$extensions_arr = array("jpg","jpeg","png","gif");
			  if( in_array($company_logo_imageFileType,$extensions_arr) ){
			    $company_logo_temp = explode(".", $_FILES["company_logo"]["name"]);
				$company_logo_newfilename = str_pad(mt_rand(0,1000000000),12,mt_rand(0,9),STR_PAD_LEFT).round(microtime(true)) . '.' . end($company_logo_temp);
				$company_logo_target_location= '../../img/company/'.$company_logo_newfilename;
				$company_logo_image=$company_logo_newfilename;
				compressImage($_FILES['company_logo']['tmp_name'],$company_logo_target_location,99);
			  }else{
			  	$company_logo_image= NULL;
			  }

			$company_banner_name = $_FILES['company_banner']['name'];
		  	$company_banner_target_file = basename($_FILES["company_banner"]["name"]);
			$company_banner_imageFileType = strtolower(pathinfo($company_banner_target_file,PATHINFO_EXTENSION));
			$extensions_arr = array("jpg","jpeg","png","gif");
			  if( in_array($company_banner_imageFileType,$extensions_arr) ){
			    $company_banner_temp = explode(".", $_FILES["company_banner"]["name"]);
				$company_banner_newfilename = str_pad(mt_rand(0,1000000000),12,mt_rand(0,9),STR_PAD_LEFT).round(microtime(true)) . '.' . end($company_banner_temp);
				$company_banner_target_location= '../../img/company/'.$company_banner_newfilename;
				$company_banner_image=$company_banner_newfilename;
				compressImage($_FILES['company_banner']['tmp_name'],$company_banner_target_location,99);
			  }else{
			  	$company_banner_image= NULL;
			  }

			$company_card_background_name = $_FILES['company_card_background']['name'];
		  	$company_card_background_target_file = basename($_FILES["company_card_background"]["name"]);
			$company_card_background_imageFileType = strtolower(pathinfo($company_card_background_target_file,PATHINFO_EXTENSION));
			$extensions_arr = array("jpg","jpeg","png","gif");
			  if( in_array($company_card_background_imageFileType,$extensions_arr) ){
			    $company_card_background_temp = explode(".", $_FILES["company_card_background"]["name"]);
				$company_card_background_newfilename = str_pad(mt_rand(0,1000000000),12,mt_rand(0,9),STR_PAD_LEFT).round(microtime(true)) . '.' . end($company_card_background_temp);
				$company_card_background_target_location= '../../img/company/'.$company_card_background_newfilename;
				$company_card_background_image=$company_card_background_newfilename;
				compressImage($_FILES['company_card_background']['tmp_name'],$company_card_background_target_location,99);
			  }else{
			  	$company_card_background_image= NULL;
			  }    

			  
		$select_company=$conn->query("SELECT * FROM company WHERE company_id='".$_POST['id']."' ");
		if(mysqli_num_rows($select_company) > 0){
			$company_id=$_POST['id'];
				$company_logo_query='';
				if (!empty($company_logo_image)) {
					$company_logo_query= "`company_logo`='".$company_logo_image."' , ";
				}

				$company_banner_query='';
				if (!empty($company_banner_image)) {
					$company_banner_query= "`company_banner`='".$company_banner_image."' , ";
				}

				$company_card_background_image_query='';
				if (!empty($company_card_background_image)) {
					$company_card_background_image_query= "`company_card_background`='".$company_card_background_image."' , ";
				}

				$query="UPDATE `company` SET `company_name`='$company_name',`company_web_url`='$company_url',`company_about`='$company_about',`company_web_title`='$web_company_name',`company_tagline`='$company_tagline',`company_address`='$company_address',`company_email`='$company_email',`company_website_url`='$company_website',`company_contact`='$company_contact',`company_whatsapp`='$company_whatsapp', ".$company_logo_query." ".$company_banner_query." ".$company_card_background_image_query." `company_facebook`='$company_facebook',`company_twitter`='$company_twitter',`company_instagram`='$company_instagram',`company_google_plus`='$company_google_plus',`company_linkedin`='$company_linkedin',`company_status`='$status' WHERE `company_id` = $company_id";
				if($result=$conn->query($query)){
					$reponse['error']=false;
					$reponse['message']='Updated Succesfully';
				}else{
					$reponse['error']=true;
					$reponse['message']='Not Updated';
				}
		}
		else
		{
			$insert="INSERT INTO `company` (`company_id`, `company_name`, `company_web_url`, `company_about`, `company_web_title`, `company_tagline`, `company_address`, `company_email`, `company_website_url`, `company_contact`, `company_whatsapp`, `company_logo`, `company_banner`, `company_card_background` , `company_facebook`, `company_twitter`, `company_instagram`, `company_google_plus`, `company_linkedin`, `company_status`, `created_date`, `updated_date`) VALUES (NULL, '$company_name', '$company_url', '$company_about', '$web_company_name', '$company_tagline', '$company_address', '$company_email', '$company_website', '$company_contact', '$company_whatsapp', '$company_logo_image', '$company_banner_image', '$company_card_background_image' , '$company_facebook', '$company_twitter', '$company_instagram', '$company_google_plus', '$company_linkedin', '$status', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
			if($conn->query($insert)){
				$reponse['error']=false;
				$reponse['message']='inserted Succesfully';
			}
			else
			{
				$reponse['error']=true;
				$reponse['message']='Not Inserted';
			}
		}

 echo json_encode($reponse);
}

?>

