<?php
 

include('db/db_connect.php');

 if (isset($_POST["submit"]))
{
    // print_r($_POST);
    // exit;
    $name = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);
	$fg =  "SELECT * FROM `admin_data` WHERE `admin_username`='".$name."' ";
	$result = mysqli_query($conn,$fg);
	if($row = mysqli_fetch_array($result))
	{
	    if ($row['admin_password'] == $password) 
    	{
    		$_SESSION['Ekaumbharat'] = $row['admin_id'];
			$_SESSION['admin_username'] = $row['admin_username'];
			echo'<script>window.location="dashboard.php"</script>';
    	} 
    	else 
    	{
				echo'<script>alert("Incorrect Username  or Password ! ! !"); </script>';
				echo'<script>window.location="index.php"</script>';
    	}	
	}
	else
	{
	   
		echo'<script>alert("no user with register name ! ! ! "); </script>';
		echo'<script>window.location="index.php"</script>';
	   
	}
}
echo'<script>window.location="index.php"</script>';
?> 
