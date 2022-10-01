<?php  

include ("../db/db_connect.php");

 
 $delete = "DELETE FROM package_summary WHERE id = '".$_GET["id"]."'";  

$result=$conn->query($delete);
echo '<script>window.location="../package_summary.php"</script>';
 ?>