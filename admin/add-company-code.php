<?php
include 'db/db_connect.php';
require_once 'include/manage_session.php';

$user = "Munesh012";
        $password = "Munesh012";
        $senderid = "EKAUMB";
        $smsurl = "http://smpp.webtechsolution.co/http-api.php?";
$insert = '';

function httpRequest($url)
{
	$pattern = "/http...([0-9a-zA-Z-.]*).([0-9]*).(.*)/";
	preg_match($pattern, $url, $args);
	$in = "";
	$fp = fsockopen($args[1], 80, $errno, $errstr, 30);
	if (!$fp) {
		return ("$errstr ($errno)");
	} else {
		$args[3] = "C" . $args[3];
		$out = "GET /$args[3] HTTP/1.1\r\n";
		$out .= "Host: $args[1]:$args[2]\r\n";
		$out .= "User-agent: PARSHWA WEB SOLUTIONS\r\n";
		$out .= "Accept: */*\r\n";
		$out .= "Connection: Close\r\n\r\n";

		fwrite($fp, $out);
		while (!feof($fp)) {
			$in .= fgets($fp, 128);
		}
	}
	fclose($fp);
	return ($in);
}

function SMSSend($phone, $msg, $debug = false)
{
	global $user, $password, $senderid, $smsurl;

  $url = 'username='.$user;
            $url.= '&password='.$password;
            $url.= '&senderid='.$senderid;
            $url.= '&route='.'1';
            
            $url.= '&number='.urlencode($phone);
            $url.= '&message='.urlencode($msg);
            $url.= '&priority=1';
            $url.= '&dnd=1';
            $url.= '&unicode=0';

	$urltouse =  $smsurl . $url;
	if ($debug) {
		$rc1 = "Request: <br>$urltouse<br><br>";
	}
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $urltouse);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	//Open the URL to send the message
	// 	$response = httpRequest($urltouse);
// 	echo $urltouse;
	$response = curl_exec($ch);
	curl_close($ch);
	if ($debug) {
		$rc = "Response: <br><pre>" .
			str_replace(array("<", ">"), array("&lt;", "&gt;"), $response) .
			"</pre><br>";
	}

	return ($response);
}



if (isset($_POST['company_submit'])) {

	$company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
	$web_company_name = preg_replace('/\s+/', '-', trim(preg_replace('/[^a-zA-Z0-9- ]/s', ' ', (strtolower($_POST['web_company_name'])))));

	$company_tagline = mysqli_real_escape_string($conn, $_POST['company_tagline']);
	$company_category = mysqli_real_escape_string($conn, $_POST['company_category']);
	$company_subcategory = mysqli_real_escape_string($conn, $_POST['company_subcategory']);

	$company_address = mysqli_real_escape_string($conn, $_POST['company_address']);
	$company_address_url = mysqli_real_escape_string($conn, $_POST['company_address_url']);
	$company_email = mysqli_real_escape_string($conn, $_POST['company_email']);
	$company_contact = mysqli_real_escape_string($conn, $_POST['company_contact']);
	$company_whatsapp = mysqli_real_escape_string($conn, $_POST['company_whatsapp']);
	$company_website = mysqli_real_escape_string($conn, $_POST['company_website']);
	$company_facebook = mysqli_real_escape_string($conn, $_POST['company_facebook']);
	$company_twitter = mysqli_real_escape_string($conn, $_POST['company_twitter']);
	$company_instagram = mysqli_real_escape_string($conn, $_POST['company_instagram']);
	$company_telegram = mysqli_real_escape_string($conn, $_POST['company_telegram']);
	$company_person = mysqli_real_escape_string($conn, $_POST['company_person']);
	$company_designation = mysqli_real_escape_string($conn, $_POST['company_designation']);

	$company_linkedin = mysqli_real_escape_string($conn, $_POST['company_linkedin']);
	$company_about = mysqli_real_escape_string($conn, $_POST['company_about']);

	$company_password = "RK" . rand(50000, 1000);
	$file = $_FILES['company_logo']['name'];
	$tmpfile = $_FILES['company_logo']['tmp_name'];
	$folder = $file;
	move_uploaded_file($tmpfile, '../company/images/' . $folder);


	$file2 = $_FILES['company_banner']['name'];
	$tmpfile = $_FILES['company_banner']['tmp_name'];
	$folder2 = $file2;
	move_uploaded_file($tmpfile, '../company/images/' . $folder2);

 $company_state = mysqli_real_escape_string($conn , $_POST['company_state']);
  $company_city =  $_POST['company_city'];
  	$company_district = mysqli_real_escape_string($conn , $_POST['company_district']);

	$url = 'https://reviewkiya.com/' . $web_company_name;
	
	
		$insert = "INSERT INTO `company` ( `company_name`, `company_person`,`company_designation`, `company_about`, `company_web_title`, `company_category`, `company_subcategory`,  `company_tagline`, `company_address`, `company_address_url`, `company_email`, `company_website_url`, `company_contact`, `company_whatsapp`, `company_logo`, `company_banner`,  `company_facebook`, `company_twitter`, `company_instagram`,`company_telegram`,  `company_linkedin`,`company_password`, `company_city`, `company_district`, `company_state`)
		VALUES ( '$company_name',  '$company_person','$company_designation', '$company_about', '$web_company_name','$company_category','$company_subcategory', '$company_tagline', '$company_address','$company_address_url', '$company_email', '$company_website', '$company_contact', '$company_whatsapp', '$folder', '$folder2', '$company_facebook', '$company_twitter', '$company_instagram', '$company_telegram', '$company_linkedin','$company_password' ,'$company_city','$company_district','$company_state')";
	if ($conn->query($insert)) {

			$debug = true;
			$message = 'Hi '.$company_name.', Your Vcard link is  '.$url.'. UserID-' . $company_contact . ' and Password-' . $company_password ;
			$rf = SMSSend($company_contact, $message, $debug);

			
			$base_url = "https://reviewkiya.com/";  //change this baseurl value as per your file path


			$mail_body = 'Dear User, Your UserID is ' . $company_email . ' and Password is ' . $company_password . '.<br> Regards ReviewKiya.';

			require '../company/php/class/class.phpmailer.php';
			$mail = new PHPMailer;
			$mail->IsSMTP();								//Sets Mailer to send message using SMTP
			$mail->Host = 'smtp.reviewkiya.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
			$mail->Port = '587';								//Sets the default SMTP server port
			$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
			$mail->Username = 'info@reviewkiya.com';					//Sets SMTP username
			$mail->Password = 'uX^mP5qDhK08';					//Sets SMTP password
			$mail->SMTPSecure = '';							//Sets connection prefix. Options are "", "ssl" or "tls"
			$mail->From = 'info@reviewkiya.com';	         //Sets the From email address for the message
			$mail->FromName = 'Review Kiya';					//Sets the From name of the message
			$mail->AddAddress($company_email);		//Adds a "To" address			
			$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);							//Sets message type to HTML				
			$mail->Subject = 'Review Kiya User Login Details';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if ($mail->Send())								//Send an Email. Return true on success or false on error
			{
				echo '<script>alert("Check your mail to verify it")</script>';
			} else {
				echo '<script>alert("Check your mail to verify it,Also check in spam folder")</script>';
			}
			echo '<script>alert("Your Company Registered Successfully. Your Website URL is - ' . $url . ' <br> please check your mail to get your username and password")</script>';
		} else {
			echo '<script>alert("Server error..")</script>';
		}
	
	
		echo '<script>window.location="add-company.php"</script>';
	
}

?>