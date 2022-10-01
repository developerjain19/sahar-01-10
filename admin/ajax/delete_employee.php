<?php  

include ("../db/db_connect.php");

$delete = "UPDATE `employee` SET `employee_status`='2' WHERE employee_id = '".$_POST["temp"]."'";  

$result=$conn->query($delete);

 ?>