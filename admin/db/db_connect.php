<?php

session_start();
// $conn = mysqli_connect("localhost", "root", "", "sahar-new") or die("Error " . mysqli_error($conn));
$conn = mysqli_connect("localhost", "exzpblvz_sahar_user", "d?Ec(YNe,d}h", "exzpblvz_sahar_db") or die("Error " . mysqli_error($conn));

date_default_timezone_set("Asia/Kolkata");


define('product_url', 'http://SaharDirectory.com/img/product/');
define('product_location', '../../img/product/');
define('website_url', 'https://webangeltech.com/sahardirectory/');




function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

?>