<?php  

include ("../db/db_connect.php");


$product_gallery_image = "SELECT * FROM product_gallery where product_gallery_id='".$_POST["id"]."'";
$product_gallery_image_page_result=$conn->query($product_gallery_image); 
$product_gallery_image_page_row=$product_gallery_image_page_result->fetch_assoc();

$image=$product_gallery_image_page_row['product_gallery_url'];
$image= propert_location.$image;
unlink($image);

 $delete = "DELETE FROM product_gallery WHERE product_gallery_id = '".$_POST["id"]."'";  

$result=$conn->query($delete);

 ?>