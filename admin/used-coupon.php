<?php
 include 'db/db_connect.php';
require_once 'include/manage_session.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Used coupon | <?php title();?></title>
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
        <li class="active">Used Coupon </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#coupon_list" data-toggle="tab">Coupon Used</a></li>
           
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="coupon_list">
                 
              <button  class="btn btn-primary" onclick="printTable()">Print</button>
                <button class="btn btn-primary" id="export" data-export="export">CSV</button>

          <table id="select_propertys" class="table table-bordered table-hover">
          <thead>
            <tr>
               <th>SNO.</th>
                <th> Coupon Used By</th>
                <th>Company/Employee</th>
                <th>Company/Employee Number</th>
                <th>Used date</th>
                
                
                 
            
           
            </tr>
          </thead>
          <tfoot>

            <tr>
               <th>SNO.</th>
                <th> Coupon Used By</th>
                <th>Company/Employee Name</th>
                <th>Company/Employee Number</th>
                <th>Used date</th>
            </tr>
          </tfoot>
          <tbody>
    <?php
    $select_contact_us=mysqli_query($conn,"SELECT * FROM `package_purchased` WHERE `coupon_id` ='".$_GET['id']."'   ");
              while( $coupon = mysqli_fetch_array($select_contact_us)){
             
     if($coupon['pur_type'] ==  'company')
     {
       $select_company = mysqli_query($conn,"SELECT * FROM `company` WHERE `company_id` ='".$coupon['company_id']."'   ");
            $company = mysqli_fetch_array($select_company);
     
                
       
        echo ' <tr>
        <td> # </td>
        <td>'.$coupon['pur_type'].'</td>
        <td>'.$company['company_name'].'</td>
        <td>'.$company['company_contact'].'</td>
       
        <td>'.$coupon['pur_date'].'</td>
        
   
        
    </tr>
    
    
'; 
    
     }
     
     
     
     else
     {
          $select_company = mysqli_query($conn,"SELECT * FROM `employee` JOIN company ON company.company_id = employee.company_id = '".$coupon['emp_id']."'   ");
            $employee = mysqli_fetch_array($select_company);
     
        echo ' <tr>
        <td> # </td>
        <td>'.$coupon['pur_type'].'</td>
        <td>'.$employee['emp_name'].' ('.$employee['company_name'].')</td>
        <td>'.$employee['emp_no'].'</td>
       
        <td>'.$coupon['pur_date'].'</td>
        
   
        
    </tr>
    
    
'; 
         
         
     }
    
       
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
 
</body>
</html>
