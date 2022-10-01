
<?php
include ("../db/db_connect.php");
  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $update = "UPDATE `company_subcategory` SET ".$column_name."='".$text."' WHERE `subcat_id`='".$id."'";  
 echo $update;
 $result=mysqli_query($conn,$update);
 
?>