
<?php
include ("../db/db_connect.php");
  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $update = "UPDATE `company_category` SET ".$column_name."='".$text."' WHERE `cate_id`='".$id."'";  
 
 $result=$conn->query($update);
 
?>