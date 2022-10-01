 <?php

include ("../db/db_connect.php");

if(isset($_GET['id']))
{
	$i=$_GET['id']; 



	$q=mysqli_query($conn,"DELETE FROM `company_category` WHERE `cate_id` = '$i' ");
	if($q)
	{
	   echo '<script>window.location="../company_category.php"</script>';
		
}
}

?>