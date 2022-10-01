<?php
include ("../db/db_connect.php");
  
 $id = $_POST["id"];  
 $text = $_POST['text'];
 $update = "UPDATE `company_graphics` SET `status`='".$text."' WHERE `id`='".$id."'";  
 
 $result=$conn->query($update);
 
?>