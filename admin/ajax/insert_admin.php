<?php
session_start();

include "../db/db_connect.php";

if (isset($_POST['admin_name'])) {
	$respons = array();

	$company_id = mysqli_real_escape_string($conn, $_POST['company_id']);
	$name = mysqli_real_escape_string($conn, $_POST['admin_name']);
	$email = mysqli_real_escape_string($conn, $_POST['admin_email']);
	$position = mysqli_real_escape_string($conn, $_POST['position']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

	$select_admin = $conn->query("SELECT * FROM admin_data WHERE admin_username='$email' ");

	if (mysqli_num_rows($select_admin) > 0) {
		$respons['error'] = true;
		$respons['message'] = "User Alerdy Exist";
	} else {
		if ($password == $confirm_password) {

			$insert = "INSERT INTO `admin_data` (`admin_id`, `admin_name`, `admin_position`, `admin_username`, `admin_password`, `admin_status`, `company_id` , `admin_created_date`, `admin_updated_date`) VALUES (NULL, '$name', '$position', '$email', '".md5($password)."', 'Active', '$company_id' , CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
			if ($conn->query($insert)) {
				$respons['error'] = false;
				$respons['message'] = "Insert Succesfully";
			} else {
				$respons['error'] = true;
				$respons['message'] = "Server error";
			}
		} else {
			$respons['error'] = true;
			$respons['message'] = "Password Not Match";
		}
	}
	echo json_encode($respons);

}

?>
