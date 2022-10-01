 <?php

include ("../db/db_connect.php");

if(isset($_GET['id']))
{
	$i=$_GET['id']; 



	$q=mysqli_query($conn,"DELETE FROM `website_feedback` WHERE `id` = '$i' ");
	if($q)
	{
	   echo '<script>window.location="../web_feedback.php"</script>';
		
}
}

?>