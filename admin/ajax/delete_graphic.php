<?php  

include ("../db/db_connect.php");


$product_gallery_image = "SELECT * FROM company_graphics where id='".$_POST["id"]."'";
$product_gallery_image_page_result=$conn->query($product_gallery_image); 
$product_gallery_image_page_row=$product_gallery_image_page_result->fetch_assoc();

$image=$product_gallery_image_page_row['graphics'];
$image= '../graphicsuploads/'.$image;
unlink($image);

 $delete = "DELETE FROM company_graphics WHERE id = '".$_POST["id"]."'";  

$result=$conn->query($delete);

 ?>