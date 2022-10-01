<?php 
include('db/db_connect.php');
require_once('include/manage_session.php');

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> User Details | <?php title(); ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
 <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

 <?php
    include('include/header.php');
    include('include/side_navbar.php');
  ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
     User Details
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"> User Details</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
          
               <table id="select_propertys" class="table table-bordered table-hover">
          <thead>
            <tr>
               <th>SNO.</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
          </thead>
        
          <tbody>
    
    <?php
    $sno =0;
    $select_contact_us=mysqli_query($conn,"SELECT * FROM `tbl_registration` ");
              while( $select_contact_us_row=mysqli_fetch_array($select_contact_us))
              
              {
    $select_company = mysqli_query($conn, "SELECT * FROM `company` WHERE rgid = ". $select_contact_us_row['rgid'] ."");
    $select_row = mysqli_fetch_array($select_company);
    
    if($select_row['rgid'] != $select_contact_us_row['rgid'] )
{
                   ++$sno;
                             echo '     <tr>
                                <td> '.$sno.' </td>
                                <td>'.$select_contact_us_row['name'].'</td>
                                <td>'.$select_contact_us_row['mobile'].'</td>
                                <td>'.$select_contact_us_row['email'].'</td>
                                <td>'.date_format(date_create($d['create_date']), "d M ,Y").'</td>
                                  <td><a href="ajax/user-del.php?id=' . $select_contact_us_row["rgid"] . '" class="btn btn-primary">Delete</td>
                            </tr>
                   ';
}
    }
?>
          </tbody>
        </table>
             
            </div>
          </div>
        </div>

      </div>
   
     
    </section>
  </div>

 <?php include('include/footer.php'); ?>
 
 
  <div class="control-sidebar-bg"></div>
</div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="bower_components/ckeditor/ckeditor.js"></script>
<script src="dist/js/demo.js"></script>


</body>
</html>
