<?php
 
include('../../config.php');

	$sql = "SELECT admin_password FROM admin_data where admin_id = '".$_SESSION['Ekaumbharat']."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	
	//check current password
	if($_POST['old_password'] == $row['admin_password']) {
		
		//match new password with re entered new password
		if($_POST['new_password'] == $_POST['confirm_password']) {
			$sql = "UPDATE admin_data SET admin_password='".$_POST['new_password']."' WHERE admin_id='".$_SESSION['Ekaumbharat']."'";

			$result = $conn->query($sql);
			
			echo "Password Change Successfully";
		}	else {
			echo "Password don't  match";
		}

	}
	else {
		
		echo "Invalide Password";
	}


?>