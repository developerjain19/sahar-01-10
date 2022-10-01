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
if (isset($_POST['employee_name'])) {
	$reponse= array();
	 $employee_name = mysqli_real_escape_string($conn , $_POST['employee_name']);
	 $web_employee_name = mysqli_real_escape_string($conn , $_POST['web_employee_name']);
	 $employee_tagline = mysqli_real_escape_string($conn , $_POST['employee_tagline']);
	 $employee_url = mysqli_real_escape_string($conn , $_POST['employee_url']);
	 $employee_address = mysqli_real_escape_string($conn , $_POST['employee_address']);
	 $employee_email = mysqli_real_escape_string($conn , $_POST['employee_email']);
	 $employee_contact = mysqli_real_escape_string($conn , $_POST['employee_contact']);
	 $employee_whatsapp = mysqli_real_escape_string($conn , $_POST['employee_whatsapp']);
	 $employee_website = mysqli_real_escape_string($conn , $_POST['employee_website']);
	 $employee_facebook = mysqli_real_escape_string($conn , $_POST['employee_facebook']);
	 $employee_twitter = mysqli_real_escape_string($conn , $_POST['employee_twitter']);
	 $employee_instagram = mysqli_real_escape_string($conn , $_POST['employee_instagram']);
	 $employee_google_plus = mysqli_real_escape_string($conn , $_POST['employee_google_plus']);
	 $employee_linkedin = mysqli_real_escape_string($conn , $_POST['employee_linkedin']);
	 $employee_about = mysqli_real_escape_string($conn , $_POST['employee_about']);
	 $company_id = mysqli_real_escape_string($conn , $_POST['company_id']);
	 $status = mysqli_real_escape_string($conn , $_POST['status']);


	 $employee_url=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $employee_url)));
	$check_url=$conn->query("SELECT * FROM employee WHERE `employee_web_url` = '$employee_url' AND `employee_id` != '" . $_POST['id'] . "' ");
	if (mysqli_num_rows($check_url) > 0) {
		$reponse['error'] = true;
		$reponse['message'] = "Enter employee Url Link already in Use";

	}else{

			$employee_logo_name = $_FILES['employee_logo']['name'];
		  	$employee_logo_target_file = basename($_FILES["employee_logo"]["name"]);
			$employee_logo_imageFileType = strtolower(pathinfo($employee_logo_target_file,PATHINFO_EXTENSION));
			$extensions_arr = array("jpg","jpeg","png","gif");
			  if( in_array($employee_logo_imageFileType,$extensions_arr) ){
			    $employee_logo_temp = explode(".", $_FILES["employee_logo"]["name"]);
				$employee_logo_newfilename = str_pad(mt_rand(0,1000000000),12,mt_rand(0,9),STR_PAD_LEFT).round(microtime(true)) . '.' . end($employee_logo_temp);
				$employee_logo_target_location= '../../img/employee/'.$employee_logo_newfilename;
				$employee_logo_image=$employee_logo_newfilename;
				compressImage($_FILES['employee_logo']['tmp_name'],$employee_logo_target_location,99);
			  }else{
			  	$employee_logo_image= NULL;
			  }

			$employee_banner_name = $_FILES['employee_banner']['name'];
		  	$employee_banner_target_file = basename($_FILES["employee_banner"]["name"]);
			$employee_banner_imageFileType = strtolower(pathinfo($employee_banner_target_file,PATHINFO_EXTENSION));
			$extensions_arr = array("jpg","jpeg","png","gif");
			  if( in_array($employee_banner_imageFileType,$extensions_arr) ){
			    $employee_banner_temp = explode(".", $_FILES["employee_banner"]["name"]);
				$employee_banner_newfilename = str_pad(mt_rand(0,1000000000),12,mt_rand(0,9),STR_PAD_LEFT).round(microtime(true)) . '.' . end($employee_banner_temp);
				$employee_banner_target_location= '../../img/employee/'.$employee_banner_newfilename;
				$employee_banner_image=$employee_banner_newfilename;
				compressImage($_FILES['employee_banner']['tmp_name'],$employee_banner_target_location,99);
			  }else{
			  	$employee_banner_image= NULL;
			  }

			$employee_card_background_name = $_FILES['employee_card_background']['name'];
		  	$employee_card_background_target_file = basename($_FILES["employee_card_background"]["name"]);
			$employee_card_background_imageFileType = strtolower(pathinfo($employee_card_background_target_file,PATHINFO_EXTENSION));
			$extensions_arr = array("jpg","jpeg","png","gif");
			  if( in_array($employee_card_background_imageFileType,$extensions_arr) ){
			    $employee_card_background_temp = explode(".", $_FILES["employee_card_background"]["name"]);
				$employee_card_background_newfilename = str_pad(mt_rand(0,1000000000),12,mt_rand(0,9),STR_PAD_LEFT).round(microtime(true)) . '.' . end($employee_card_background_temp);
				$employee_card_background_target_location= '../../img/employee/'.$employee_card_background_newfilename;
				$employee_card_background_image=$employee_card_background_newfilename;
				compressImage($_FILES['employee_card_background']['tmp_name'],$employee_card_background_target_location,99);
			  }else{
			  	$employee_card_background_image= NULL;
			  }    

			  
		$select_employee=$conn->query("SELECT * FROM employee WHERE employee_id='".$_POST['id']."' ");
		if(mysqli_num_rows($select_employee) > 0){
			$employee_id=$_POST['id'];
				$employee_logo_query='';
				if (!empty($employee_logo_image)) {
					$employee_logo_query= "`employee_logo`='".$employee_logo_image."' , ";
				}

				$employee_banner_query='';
				if (!empty($employee_banner_image)) {
					$employee_banner_query= "`employee_banner`='".$employee_banner_image."' , ";
				}

				$employee_card_background_image_query='';
				if (!empty($employee_card_background_image)) {
					$employee_card_background_image_query= "`employee_card_background`='".$employee_card_background_image."' , ";
				}

				$query="UPDATE `employee` SET `employee_name`='$employee_name',`employee_web_url`='$employee_url',`employee_about`='$employee_about',`employee_web_title`='$web_employee_name',`employee_tagline`='$employee_tagline',`employee_address`='$employee_address',`employee_email`='$employee_email',`employee_website_url`='$employee_website',`employee_contact`='$employee_contact',`employee_whatsapp`='$employee_whatsapp', ".$employee_logo_query." ".$employee_banner_query." ".$employee_card_background_image_query." `employee_facebook`='$employee_facebook',`employee_twitter`='$employee_twitter',`employee_instagram`='$employee_instagram',`employee_google_plus`='$employee_google_plus',`employee_linkedin`='$employee_linkedin',`employee_status`='$status' , `company_id` = '$company_id' WHERE `employee_id` = $employee_id";
				if($result=$conn->query($query)){
					$reponse['error']=false;
					$reponse['message']='Updated Succesfully';
				}else{
					$reponse['error']=true;
					$reponse['message']='Not Updated';
				}
		}else{
				$insert="INSERT INTO `employee` (`employee_id`, `employee_name`, `employee_web_url`, `employee_about`, `employee_web_title`, `employee_tagline`, `employee_address`, `employee_email`, `employee_website_url`, `employee_contact`, `employee_whatsapp`, `employee_logo`, `employee_banner`, `employee_card_background` , `employee_facebook`, `employee_twitter`, `employee_instagram`, `employee_google_plus`, `employee_linkedin`, `employee_status`, `company_id` , `created_date`, `updated_date`) VALUES (NULL, '$employee_name', '$employee_url', '$employee_about', '$web_employee_name', '$employee_tagline', '$employee_address', '$employee_email', '$employee_website', '$employee_contact', '$employee_whatsapp', '$employee_logo_image', '$employee_banner_image', '$employee_card_background_image' , '$employee_facebook', '$employee_twitter', '$employee_instagram', '$employee_google_plus', '$employee_linkedin', '$status', '$company_id' , CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
			if($conn->query($insert)){
				$reponse['error']=false;
				$reponse['message']='inserted Succesfully';
			}else{
				$reponse['error']=true;
				$reponse['message']='Not Inserted';
			}
		}
	}		

 echo json_encode($reponse);
}

?>
