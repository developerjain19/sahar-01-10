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
$error='';
if (isset($_POST['mySubmit'])) {
 
  $coupon_nm =  $_POST['coupon_nm'];
	$coupon_off =  $_POST['coupon_off']; 
	$type =  $_POST['type']; 
	$coupon_message =  $_POST['coupon_message']; 
  $status =  $_POST['status'];

  $cid =  $_POST['cid']; 
 
  for($i=0;$i < count($cid);$i++)
  {
    $s ="SELECT * FROM `coupon` WHERE `coupon_nm`='$coupon_nm' AND `company_id` = '".$cid[$i]."'";
    // echo $s;
    $select_admin = mysqli_query($conn,$s);
    if (mysqli_num_rows($select_admin) > 0) {
      $error .= "Coupon Already Exist for this company";
    } else { 
              
          $insert = "INSERT INTO `coupon`(`coupon_nm`, `coupon_off`, `coupon_message`, `company_id`,  `status`,`type`) VALUES ('$coupon_nm', '$coupon_off', '$coupon_message', '$cid[$i]',  '$status',  '$type' )";
          if (mysqli_query($conn,$insert)) {
              $select_employee=mysqli_query($conn,"SELECT * FROM `company` WHERE `company_id` = '".$cid[$i]."'");
              $select_employee_row=mysqli_fetch_array($select_employee);
              $phonenum = $select_employee_row['company_contact'];
              $message =$coupon_message;
              $debug = true;      
              SMSSend($phonenum,$message,$debug);
          }
          $error .= "Insert Succesfully";
          
        }  	
  }
  

echo '<script>window.location="coupon_view.php"</script>';
	 
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
                
                <form action="" method="POST">
                  <h2 class="card-inside-title"></h2>
                      <div class="row ">
                          <div class="col-sm-12">
                              <div class="row">
                                <div class="form-group col-lg-4">
                                    <div class="form-line">
                                        <label>Name :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="coupon Name"  id="coupon_name" name="coupon_nm" required />
                                    </div>
                                </div>

                                <div class="form-group col-lg-4">
                                    <div class="form-line">
                                        <label>Discount Percent :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder=""  id="web_coupon_name" name="coupon_off" required />
 
                                    </div>
                                </div>
                                <div class="form-group col-lg-3">
                                    <div class="form-line">
                                        <label>Coupon Generate for :</label><br>
                                        <input type="radio"    name="type" required value="company"/> Company<br>
                                        <input type="radio"  name="type" required value="employee" /> Employee
                                       
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <div class="form-line">
                                        <label>Message :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="SMS Format"  id="editor1" name="coupon_message" required />
                                        <input type="hidden"  value="new" name="status" required />
                                    </div>
                                </div>
                                

                                 <div class="form-group col-lg-4">
                                    <div class="form-line">
                                        <label>Select Company :</label>
                                        </div>
                                  </div>
                                  <div class="form-group col-lg-12">
                                  <table  class="table table-bordered table-hover">
                                    <thead>
                                      <tr>
                                          <th>Select.</th>
                                          <th>SNO.</th>
                                          <th>Company Name</th>
                                          <th>State</th>
                                          <th>City</th>
                                          <th>Place</th>
                                          
                                          <th>Category</th>
                                          <th>SubCategory</th>
                                          <th>Total Employee</th>
                                          <th>Joined Date</th>
                                          <th>Last Login</th>
                                      </tr>
                                    </thead>
                                    <tfoot>
                                      <tr>
                                          <th>Select.</th>
                                          <th>SNO.</th>
                                          <th>Company Name</th>
                                          <th>State</th>
                                          <th>City</th>
                                          <th>Place</th>
                                          
                                          <th>Category</th>
                                          <th>SubCategory</th>
                                          <th>Total Employee</th>
                                          <th>Joined Date</th>
                                          <th>Last Login</th>
                                      </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $select_contact_us=mysqli_query($conn,"SELECT * FROM `company`   ");
                                        while( $select_contact_us_row=mysqli_fetch_array($select_contact_us)){
                                        
                                          $select_cat=mysqli_query($conn,"SELECT * FROM `company_category` WHERE `cate_id`= '".$select_contact_us_row['company_category']."' ");
                                          $select_cat_row=mysqli_fetch_array($select_cat);

                                          $select_subcat=mysqli_query($conn,"SELECT * FROM `company_subcategory` WHERE `subcat_id`= '".$select_contact_us_row['company_subcategory']."' ");
                                          $select_subcat_row=mysqli_fetch_array($select_subcat);
                                          $now = time(); // or your date as well
                                          $your_date = strtotime($select_contact_us_row['last_login']);
                                          $datediff = $now - $your_date;

                                          // echo round($datediff / (60 * 60 * 24));
                                          echo '<tr>
                                        <td> <input type="checkbox" name="cid[]" value="'.$select_contact_us_row['company_id'].'" checked /></td>
                                        <td> '.$sno.'  </td>
                                        <td>'.$select_contact_us_row['company_name'].'</td>
                                        <td>'.$select_contact_us_row['company_state'].'</td>
                                        <td>'.$select_contact_us_row['company_city'].'</td>
                                        <td>'.$select_contact_us_row['company_address'].' </td>
                                       
                                       
                                        <td>'.$select_cat_row['category'].'</td> 
                                        <td>'.$select_subcat_row['subcategory'].'</td> 
                                        <td>'.$select_subcat_row['subcategory'].'</td> 
                                        <td>'.date('d/m/Y',strtotime($select_contact_us_row['created_date'])).'</td> 
                                        <td>'.round($datediff / (60 * 60 * 24)).' days ago</td> 
                                    </tr>
                                '; 
                                        $sno++;
                                    }?>
                          
                                    </tbody>
                                  </table>
                                    </div>
                                    </div>
                                </div>
                          <div class="col-lg-12">
                              <button name="mySubmit" class="btn btn-primary">Add</button>
                              <!-- <input type="text" id="id" name="id" style="display: none"> -->
                          </div>
                      </div>
              </form>
             
        
                
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
 
 <script>
  $(function () {
	CKEDITOR.replace( 'editor1', {
	    extraPlugins: 'colorbutton'
		} );
  })
</script>

<script type="text/javascript">

      $(document).ready(function(){
        $('.remove_image').hide();
          fetch_data();
     });

    </script>
</body>
</html>
