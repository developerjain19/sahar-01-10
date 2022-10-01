<?php  

include ("../db/db_connect.php");

$delete = "UPDATE `company` SET `company_status`='2' WHERE company_id = '".$_POST["temp"]."'";  

$result=$conn->query($delete);

 ?>