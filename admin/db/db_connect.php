<?php

session_start();
// $conn = mysqli_connect("localhost", "root", "", "sahar") or die("Error " . mysqli_error($conn));
$conn = mysqli_connect("localhost", "sahardir_sahar", "d?Ec(YNe,d}h", "sahardir_sahar") or die("Error " . mysqli_error($conn));

date_default_timezone_set("Asia/Kolkata");


define('product_url', 'http://SaharDirectory.com/img/product/');
define('product_location', '../../img/product/');
define('website_url', 'https://sahardirectory.com//');




function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

?>