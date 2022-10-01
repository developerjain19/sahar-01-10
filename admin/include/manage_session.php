<?php 
if(empty($_SESSION['Ekaumbharat'])){
    header('location: index.php');
    }

function title(){
	echo "Ekaumbharat";
}
 
?>