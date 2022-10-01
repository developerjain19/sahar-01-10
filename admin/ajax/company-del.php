<?php

include ("../db/db_connect.php");

if(isset($_GET['id']))
{
	$i=$_GET['id']; 

$q=mysqli_query($conn,"DELETE company, tbl_registration FROM company LEFT JOIN tbl_registration ON (tbl_registration.rgid=company.rgid) WHERE company.rgid = '$i' ");
	
	if($q)
	{
	   echo '<script>window.location="../company.php"</script>';
		
}
}

?>

