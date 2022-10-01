<?php  

include ("../db/db_connect.php");

 $delete = "DELETE FROM product WHERE product_id = '".$_POST["temp"]."'";  

$result=$conn->query($delete);

 ?>