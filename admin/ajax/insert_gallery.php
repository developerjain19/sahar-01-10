<?php
session_start();

include "../db/db_connect.php";

if (isset($_POST['product'])) {

	$reponse = array();

	$product = mysqli_real_escape_string($conn, $_POST['product']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);

	foreach ($_FILES["product_image"] as $key => $arrDetail) {
		foreach ($arrDetail as $index => $detail) {

			$temp = explode(".", $_FILES["product_image"]["name"][$index]);
			$newfilename = str_pad(mt_rand(0, 1000000000), 12, mt_rand(0, 9), STR_PAD_LEFT) . round(microtime(true)) . '.' . end($temp);

			if (0 < $_FILES['product_image']['error'][$index]) {
				// $reponse['error'] = true;
				// $reponse['message'] = 'Error: ' . $_FILES['product_image']['error'][$index];
			} else {

				if (move_uploaded_file($_FILES['product_image']['tmp_name'][$index], product_location . $newfilename)) {

					$insert = "INSERT INTO `product_gallery` (`product_gallery_id`, `product_gallery_url`, `product_id` , `product_gallery_status`, `product_gallery_created_date`, `product_gallery_updated_date`) VALUES (NULL, '$newfilename', '$product' ,'$status', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
					if ($conn->query($insert)) {
						// $reponse['error'] = false;
						// $reponse['message'] = 'inserted Succesfully';
					} else {
						// $reponse['error'] = true;
						// $reponse['message'] = 'Not Inserted';
					}
				} else {
					// $reponse['error'] = true;
					// $reponse['message'] = 'Image not write on server';
				}
			}
		}
	}
	// echo json_encode($reponse);
}

?>
