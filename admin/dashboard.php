<?php 
 include('db/db_connect.php');
require_once('include/manage_session.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard  | <?php title(); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">



  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php
    include('include/header.php');
    include('include/side_navbar.php');
  ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <div class="row">
       
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php $select_company=$conn->query("SELECT * FROM company  ");
                            $company_count = mysqli_num_rows($select_company); ?>
                 <?php $select_emp=$conn->query("SELECT * FROM employee  ");
                $select_emp_count = mysqli_num_rows($select_emp); ?>
              <h3><?php echo $company_count; ?> / <?= $select_emp_count ?></h3>

              <p>Total Company / Total Employee</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
               <?php $select_contact_us = $conn->query("SELECT * FROM inquiry  ");
                            $contact_us_count = mysqli_num_rows($select_contact_us); ?>
                            <?php $select_fee=$conn->query("SELECT * FROM feedback  ");
                            $feedback = mysqli_num_rows($select_fee); ?>
              <h3><?php echo $contact_us_count; ?> / <?php echo $feedback; ?></h3>
              <p>Total Enquiry / Total Feedback</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
         </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">

            <div class="inner">
             <?php 
             $r = "SELECT * FROM `inquiry` WHERE cast(`date` as Date) = cast(DATE(NOW()) as Date) ";
            //  echo $r;
             $select_contact_us=$conn->query($r);
            $contact_us_count = mysqli_num_rows($select_contact_us); ?>
            <?php $select_fee = $conn->query("SELECT * FROM feedback WHERE cast(`date` as Date) = cast(DATE(NOW()) as Date) ");
            $feedback = mysqli_num_rows($select_fee); ?>
              <h3><?php echo $contact_us_count; ?> / <?php echo $feedback; ?></h3>
              <p>Today  Enquiry  / Today Feedback </p>
            </div>
            <div class="icon">
              <i class="ion ion-android-cart"></i>
            </div>
           
          </div>
        </div>
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">

            <div class="inner">
             <?php 
             $r = "SELECT * FROM `inquiry` WHERE MONTH(`date`) = MONTH(CURRENT_DATE())  ";
            //  echo $r;
             $select_contact_us=$conn->query($r);
            $contact_us_count = mysqli_num_rows($select_contact_us); ?>
            <?php $select_fee=$conn->query("SELECT * FROM feedback WHERE   MONTH(`date`) = MONTH(CURRENT_DATE())  ");
            $feedback = mysqli_num_rows($select_fee); ?>
              <h3><?php echo $contact_us_count; ?> / <?php echo $feedback; ?></h3>
              <p>Monthly  Enquiry / Monthly  Feedback </p>
            </div>
            <div class="icon">
              <i class="ion ion-android-cart"></i>
            </div>
           
          </div>
        </div>
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">

            <div class="inner">
             <?php 
             $r = "SELECT * FROM `company` WHERE cast(`created_date` as Date) = cast(DATE(NOW()) as Date) ";
            //  echo $r;
             $select_contact_us=$conn->query($r);
            $contact_us_count = mysqli_num_rows($select_contact_us); ?>
            <?php $select_fee=$conn->query("SELECT * FROM employee WHERE cast(`create_date` as Date) = cast(DATE(NOW()) as Date) ");
            $feedback = mysqli_num_rows($select_fee); ?>
              <h3><?php echo $contact_us_count; ?> / <?php echo $feedback; ?></h3>
              <p>Today New Company / Today New Employee </p>
            </div>
            <div class="icon">
              <i class="ion ion-android-cart"></i>
            </div>
           
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">

            <div class="inner">
             <?php 
             $r = "SELECT * FROM `company` INNER JOIN `package_purchased` ON `company`.`company_id`=`package_purchased`.`company_id` WHERE `package_purchased`.`status` = '0' AND `pur_type`='company' ";
            //  echo $r;
             $select_contact_us=$conn->query($r);
            $contact_us_count = mysqli_num_rows($select_contact_us); ?>
            <?php $select_fee=$conn->query("SELECT * FROM `employee` INNER JOIN `package_purchased` ON `employee`.`emp_id`=`package_purchased`.`emp_id` WHERE `package_purchased`.`status` = '0' AND `pur_type`='employee'  ");
            $feedback = mysqli_num_rows($select_fee); ?>
              <h3><?php echo $contact_us_count; ?> / <?php echo $feedback; ?></h3>
              <p>Total member Company / Total member Employee </p>
            </div>
            <div class="icon">
              <i class="ion ion-android-cart"></i>
            </div>
           
          </div>
        </div>
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">

            <div class="inner">
             <?php 
             $r = "SELECT * FROM `company` INNER JOIN `package_purchased` ON `company`.`company_id`=`package_purchased`.`company_id` 
                WHERE `package_purchased`.`status` = '0' AND `pur_type`='company' AND MONTH(`package_purchased`.`pur_date`) = MONTH(CURRENT_DATE()) ";
            //  echo $r;
             $select_contact_us=$conn->query($r);
            $contact_us_count = mysqli_num_rows($select_contact_us); ?>
            <?php $select_fee=$conn->query("SELECT * FROM `employee` INNER JOIN `package_purchased` ON `employee`.`emp_id`=`package_purchased`.`emp_id` 
                WHERE `package_purchased`.`status` = '0' AND `pur_type`='employee' AND MONTH(`package_purchased`.`pur_date`) = MONTH(CURRENT_DATE()) ");
            $feedback = mysqli_num_rows($select_fee); ?>
              <h3><?php echo $contact_us_count; ?> / <?php echo $feedback; ?></h3>
              <p>Monthly member Company / Monthly member Employee </p>
            </div>
            <div class="icon">
              <i class="ion ion-android-cart"></i>
            </div>
           
          </div>
        </div>
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">

            <div class="inner">
             <?php 
             $r = "SELECT * FROM `company` INNER JOIN `package_purchased` ON `company`.`company_id`=`package_purchased`.`company_id` 
                WHERE `package_purchased`.`status` = '0' AND `pur_type`='company' AND cast(`package_purchased`.`pur_date` as Date) = cast(DATE(NOW()) as Date)   ";
            //  echo $r;
             $select_contact_us=$conn->query($r);
            $contact_us_count = mysqli_num_rows($select_contact_us); ?>
            <?php $select_fee=$conn->query("SELECT * FROM `employee` INNER JOIN `package_purchased` ON `employee`.`emp_id`=`package_purchased`.`emp_id` 
                WHERE `package_purchased`.`status` = '0' AND `pur_type`='employee' AND cast(`package_purchased`.`pur_date` as Date) = cast(DATE(NOW()) as Date) ");
            $feedback = mysqli_num_rows($select_fee); ?>
              <h3><?php echo $contact_us_count; ?> / <?php echo $feedback; ?></h3>
              <p>Today member Company / Today member Employee </p>
            </div>
            <div class="icon">
              <i class="ion ion-android-cart"></i>
            </div>
           
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">

            <div class="inner">
             <?php 
             $r = "SELECT SUM(`amount`) as sum FROM  `package_purchased` WHERE `payment_status`  = 'TXN_SUCCESS' ";
            //  echo $r;
             $select_contact_us=$conn->query($r);
            $contact_us_count = mysqli_fetch_array($select_contact_us); ?>
             
              <h3>Rs. <?php echo number_format((float)$contact_us_count['sum'], 2, '.', ''); ?>  /- </h3>
              <p>Total Turnover </p>
            </div>
            <div class="icon">
              <i class="ion ion-android-cart"></i>
            </div>
           
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">

            <div class="inner">
             <?php 
             $r = "SELECT SUM(`amount`) as sum FROM  `package_purchased` WHERE `payment_status`  = 'TXN_SUCCESS' AND  YEAR(`pur_date`) = YEAR(CURRENT_DATE())  ";
            //  echo $r;
             $select_contact_us=$conn->query($r);
            $contact_us_count = mysqli_fetch_array($select_contact_us); ?>
             
              <h3>Rs. <?php echo number_format((float)$contact_us_count['sum'], 2, '.', ''); ?>  /- </h3>
              <p>Yearly Turnover </p>
            </div>
            <div class="icon">
              <i class="ion ion-android-cart"></i>
            </div>
           
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">

            <div class="inner">
             <?php 
             $r = "SELECT SUM(`amount`) as sum FROM  `package_purchased` WHERE `payment_status`  = 'TXN_SUCCESS' AND  MONTH(`pur_date`) = MONTH(CURRENT_DATE())  ";
            //  echo $r;
             $select_contact_us=$conn->query($r);
            $contact_us_count = mysqli_fetch_array($select_contact_us); ?>
             
              <h3>Rs. <?php echo number_format((float)$contact_us_count['sum'], 2, '.', ''); ?>  /- </h3>
              <p>Monthy Turnover </p>
            </div>
            <div class="icon">
              <i class="ion ion-android-cart"></i>
            </div>
           
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">

            <div class="inner">
             <?php 
             $r = "SELECT SUM(`amount`) as sum FROM  `package_purchased` WHERE `payment_status`  = 'TXN_SUCCESS' AND  cast(`pur_date` as Date) = cast(DATE(NOW()) as Date)  ";
            //  echo $r;
             $select_contact_us=$conn->query($r);
            $contact_us_count = mysqli_fetch_array($select_contact_us); ?>
             
              <h3>Rs. <?php echo number_format((float)$contact_us_count['sum'], 2, '.', ''); ?>  /- </h3>
              <p>Today Turnover </p>
            </div>
            <div class="icon">
              <i class="ion ion-android-cart"></i>
            </div>
           
          </div>
        </div>
        
       
      </div>
      
    </section>
    <!-- /.content -->  
  </div>
<?php include('include/footer.php') ?>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
