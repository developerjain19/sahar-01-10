<?php

include ("../db/db_connect.php");

if(isset($_GET['id']))
{
	$i=$_GET['id']; 

	

$q=mysqli_query($conn,"DELETE tbl_registration, company FROM tbl_registration LEFT JOIN company ON (company.rgid=tbl_registration.rgid) WHERE tbl_registration.rgid = '$i' ");



	if($q)
	{
	   echo '<script>window.location="../user-details.php"</script>';
		
}
}

?>

