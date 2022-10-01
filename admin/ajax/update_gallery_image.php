<?php

include ("../db/db_connect.php");
if (isset($_POST['gallery_id'])) {
error_reporting(0);
$gallery_id=$_POST["gallery_id"];

$product_gallery_image = "SELECT * FROM product_gallery where product_gallery_id='$gallery_id'";
$product_gallery_image_page_result=$conn->query($product_gallery_image); 
$product_gallery_image_page_row=$product_gallery_image_page_result->fetch_assoc();
$image=$product_gallery_image_page_row['product_gallery_url'];
$image=product_location.$image;

$temp = explode(".", $_FILES["file"]["name"]);
$newfilename = str_pad(mt_rand(0,1000000000),12,mt_rand(0,9),STR_PAD_LEFT).round(microtime(true)) . '.' . end($temp);

if ( 0 < $_FILES['file']['error'] ) {
        $reponse['error']=true;
		$reponse['message']='Error: ' . $_FILES['file']['error'];
    }
    else {
    	
    	if(move_uploaded_file($_FILES['file']['tmp_name'], product_location.$newfilename)){
    		unlink($image);
 			 $updated="UPDATE `product_gallery` SET   `product_gallery_url` ='$newfilename' WHERE `product_gallery_id` = '$gallery_id'";
			if($conn->query($updated)){
				$reponse['error']=false;
				$reponse['message']='Updated Succesfully';
			}else{
				$reponse['error']=true;
				$reponse['message']='Not Inserted';
			}
		}else{
			$reponse['error']=true;
			$reponse['message']='Image not write on server';
		}	
}
 echo json_encode($reponse);

}    
?>