<?php
include ("../db/db_connect.php");
  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $update = "UPDATE `company` SET ".$column_name."='".$text."' WHERE `company_id`='".$id."'";  
 
 $result=$conn->query($update);
 
?>