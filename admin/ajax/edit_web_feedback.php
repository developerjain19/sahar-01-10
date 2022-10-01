<?php
include ("../db/db_connect.php");
  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
  $update = "UPDATE website_feedback SET ".$column_name."='".$text."' WHERE id='".$id."'";  
 
 $result=$conn->query($update);
 
?>