<?php
include 'db/db_connect.php';

require_once 'include/manage_session.php';

if (isset($_POST['mySubmit'])) {
 
  $company_login =  $_POST['company_login'];
	$employee_login =  $_POST['employee_login']; 
	$happy_customer =  $_POST['happy_customer']; 
	$feedback =  $_POST['feedback']; 
  

 
              
          $insert = "UPDATE `happy_clients` SET `company_login`='$company_login',`employee_login`='$employee_login',`happy_customer`='$happy_customer',`feedback`='$feedback' WHERE `id`=1";
          if (mysqli_query($conn,$insert)) {
              
              echo '<script>window.location="happy_clients.php"</script>';

              
            
             }
          
          
          	
  
  

	 
	}
	
	
	
	  $er = "SELECT * FROM  `happy_clients` WHERE id =1 ";
     $pro = mysqli_query($conn, $er);
    $ro = mysqli_fetch_array($pro);
	 
 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Happy Client | <?php title();?></title>
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
         Happy Client
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Happy Client</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#coupon_list" data-toggle="tab">Happy Client </a></li>
              <!-- <li><a href="#create" id="edit_click" data-toggle="tab" >Create coupon</a></li> -->
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="coupon_list">
                
                <form action="" method="POST">
                  <h2 class="card-inside-title"></h2>
                      <div class="row ">
                          <div class="col-sm-12">
                              <div class="row">
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>Register Companies :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="company login"  id="company_login" name="company_login" value="<?= $ro['company_login']; ?>" required />
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>Register Employees  :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="employee login"  id="employee_login" name="employee_login" value="<?= $ro['employee_login']; ?>" required />
 
                                    </div>
                                </div>
                               <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>Happy Clients :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="happy_customer"  id="happy_customer" name="happy_customer" value="<?= $ro['happy_customer']; ?>" required />
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>Feedbacks  :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="feedback"  id="feedback" name="feedback" value="<?= $ro['feedback']; ?>" required />
 
                                    </div>
                                </div>
                                

                                
                          <div class="col-lg-12">
                              <button name="mySubmit" class="btn btn-primary">Add</button>
                           
                          </div>
                      </div>
              </form>
             
        
                
              </div>
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
