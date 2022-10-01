 <?php

include ("../db/db_connect.php");

if(isset($_GET['id']))
{
	$i=$_GET['id']; 



	$q=mysqli_query($conn,"DELETE FROM `company_subcategory` WHERE `subcat_id` = '$i' ");
	if($q)
	{
	   echo '<script>window.location="../company-subactegory.php"</script>';
		
}
}

?>