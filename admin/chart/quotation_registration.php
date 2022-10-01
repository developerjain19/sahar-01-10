<?php
session_start();
$current_date = date("Y-m-d");
include('../db/db_connect.php');

$array = array();

 $sql="SELECT DATE_FORMAT(`quotation_created_date`, '%Y-%m-%d') as YYYYMMDD , COUNT(quotation_id) as NumUsers FROM  `quotation`   GROUP BY YYYYMMDD ORDER BY YYYYMMDD;";
            $result= $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
array_push(
        $array,
        array(
             'user_count' => $row['NumUsers'],
             'date' => $row['YYYYMMDD'],
           
				)	
			);		

}
echo json_encode($array);




?> 