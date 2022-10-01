<?php
include 'db/db_connect.php';

$user = "ekaumotp794454";
$password = "6337";
$senderid = "JOBSMS";
$smsurl = "https://kit19.com/ComposeSMS.aspx?";

function httpRequest($url){
    $pattern = "/http...([0-9a-zA-Z-.]*).([0-9]*).(.*)/";
    preg_match($pattern,$url,$args);
    $in = "";
    $fp = fsockopen($args[1],80, $errno, $errstr, 30);
    if (!$fp) {
    return("$errstr ($errno)");
    } else {
        $args[3] = "C".$args[3];
        $out = "GET /$args[3] HTTP/1.1\r\n";
        $out .= "Host: $args[1]:$args[2]\r\n";
        $out .= "User-agent: PARSHWA WEB SOLUTIONS\r\n";
        $out .= "Accept: */*\r\n";
        $out .= "Connection: Close\r\n\r\n";

        fwrite($fp, $out);
        while (!feof($fp)) {
        $in.=fgets($fp, 128);
        }
    }
    fclose($fp);
    return($in);
}

function SMSSend($phone, $msg, $debug=false){
    global $user,$password,$senderid,$smsurl;

    $url = 'username='.$user;
    $url.= '&password='.$password;
    $url.= '&sender='.$senderid;
    $url.= '&to='.urlencode($phone);
    $url.= '&message='.urlencode($msg);
    $url.= '&priority=1';
    $url.= '&dnd=1';
    $url.= '&unicode=0';

    $urltouse =  $smsurl.$url;
    if ($debug) { $rc1 = "Request: <br>$urltouse<br><br>"; }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urltouse);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //Open the URL to send the message
    //$response = httpRequest($urltouse);
    $response = curl_exec($ch);
    curl_close($ch);
    if ($debug) {
        $rc = "Response: <br><pre>".
        str_replace(array("<",">"),array("&lt;","&gt;"),$response).
        "</pre><br>"; }

    return($response);
}
require_once 'include/manage_session.php';
$sno=1;

if (isset($_POST['mySubmit'])) {
    
    $coupon_nm =  $_POST['coupon_nm'];
	$coupon_off =  $_POST['coupon_off']; 
	$company_id =  $_POST['company_id']; 
	$status =  $_POST['status']; 

	$select_admin = mysqli_query($conn,"SELECT * FROM `coupon` WHERE `coupon_nm`='$coupon_nm'");

	if (mysqli_num_rows($select_admin) > 0) {
		 
		$error = "User Already Exist";
	} else { 
            if($company_id == 'all')
            {
                $insert = "INSERT INTO `coupon`(`coupon_nm`, `coupon_off`, `company_id`,  `status`) VALUES ('$coupon_nm', '$coupon_off', '0',  '$status' )";
                if (mysqli_query($conn,$insert)) {
                    $select_employee=mysqli_query($conn,"SELECT * FROM `company`  ");
                    while($select_employee_row=mysqli_fetch_array($select_employee))
                    {
                        $phonenum = $select_employee_row['company_contact'];
                        $message ='Hi '.$select_employee_row['company_name'].', Use coupon code "'.$coupon_nm.'" to get discount upto '.$coupon_off.' % ';
                        $debug = true;      
                        SMSSend($phonenum,$message,$debug);
                    }
                    
                }
            }else{
                $insert = "INSERT INTO `coupon`(`coupon_nm`, `coupon_off`, `company_id`,  `status`) VALUES ('$coupon_nm', '$coupon_off', '$company_id',  '$status' )";
                if (mysqli_query($conn,$insert)) {
                    $select_employee=mysqli_query($conn,"SELECT * FROM `company` WHERE `company_id` = '".$company_id."'");
                    $select_employee_row=mysqli_fetch_array($select_employee);
                    $phonenum = $select_employee_row['company_contact'];
                    $message ='Hi '.$select_employee_row['company_name'].', Use coupon code "'.$coupon_nm.'" to get discount upto '.$coupon_off.' % ';
                    $debug = true;      
                    SMSSend($phonenum,$message,$debug);
                }

            }
			
				$error = "Insert Succesfully";
			}  		 
	}
	 
 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> coupon | <?php title();?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet">
  <link href="dist/tokenfield/dist/css/tokenfield-typeahead.css" type="text/css" rel="stylesheet">
  <link href="dist/tokenfield/dist/css/bootstrap-tokenfield.css" type="text/css" rel="stylesheet">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
   <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="bower_components/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 <script src="js/tabletoCSV.js" type="text/javascript" charset="utf-8"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

 <?php
include 'include/header.php';
include 'include/side_navbar.php';
?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Coupon
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Coupon</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#coupon_list" data-toggle="tab">coupon Details</a></li>
              <!-- <li><a href="#create" id="edit_click" data-toggle="tab" >Create coupon</a></li> -->
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="coupon_list">
                 
              <button  class="btn btn-primary" onclick="printTable()">Print</button>
                <button class="btn btn-primary" id="export" data-export="export">CSV</button>

          <table id="select_propertys" class="table table-bordered table-hover">
          <thead>
            <tr>
               <th>SNO.</th>
                <th>Name</th>
                <th>Discount Percent</th>
                <th>Company</th>
                <th>For</th>
                
                 
                <th>Status</th>
                <th>Date</th>
                <th> Coupon Used By</th>
            </tr>
          </thead>
          <tfoot>

            <tr>
                <th>SNO.</th>
                <th>Name</th>
                <th>Discount Percent</th>
                <th>Company</th>
                <th>For</th>
                
                 
                <th>Status</th>
                <th>Date</th>
                <th> Coupon Used By</th>
            </tr>
          </tfoot>
          <tbody>
    <?php
    $select_contact_us=mysqli_query($conn,"SELECT * FROM `coupon` GROUP BY `coupon_nm`   ");
              while( $select_contact_us_row=mysqli_fetch_array($select_contact_us)){
             
     $nm =array();
     $select_coupon=mysqli_query($conn,"SELECT * FROM `coupon` WHERE `coupon_nm` ='".$select_contact_us_row['coupon_nm']."'  ");
     while( $select_coupon2=mysqli_fetch_array($select_coupon)){
      $select_employee=mysqli_query($conn,"SELECT * FROM `company` WHERE `company_id` = '".$select_coupon2['company_id']."' ");
        $select_employee_row=mysqli_fetch_array($select_employee);
        array_push($nm,$select_employee_row['company_name']);
     }  
                
        $b=implode(', ',$nm);

        echo '     <tr>
        <td> '.$sno.' </td>
        <td>'.$select_contact_us_row['coupon_nm'].'</td>
        <td>'.$select_contact_us_row['coupon_off'].' %</td>
        <td>'.$b.'</td>
        <td>'.$select_contact_us_row['type'].'</td>
        
        <td>'.$select_contact_us_row['status'].'</td>
        
        <td>'.$select_contact_us_row['date'].'</td>
           <td><a href="used-coupon.php?id='.$select_contact_us_row['id'].'" class="btn btn-primary" target="_blank">View Detail</a></td>
        
    </tr>
'; 
        $sno++;
    }?>
 
          </tbody>
        </table>
        
 
     
 


                
              </div>
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->
 
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>

      </div>
      <!-- /.row -->
 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include 'include/footer.php';?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="bower_components/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>


<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<!-- <script src="https://cdn.ckeditor.com/4.9.2/standard-all/ckeditor.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
 

<script type="text/javascript">

      $(document).ready(function(){
        $('.remove_image').hide();
          fetch_data();
     });

    </script>
</body>
</html>
