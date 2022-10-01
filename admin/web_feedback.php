<?php 
include('db/db_connect.php');
require_once('include/manage_session.php');

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Feedback | <?php title(); ?></title>
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
   <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

 <?php
    include('include/header.php');
    include('include/side_navbar.php');
  ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Website Feedback
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Website Feedback</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#booking_list" data-toggle="tab">Website Feedback List</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="booking_list">
                <button  class="btn btn-primary" onclick="printTable()">Print</button>
                <button class="btn btn-primary" id="export" data-export="export">CSV</button>
                <div id="live_feedback" style="overflow-x: auto;"></div>
              </div>
             
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>

      </div>
      <!-- /.row -->
      <!-- Main row -->
     
    </section>
    <!-- /.content -->
    <div id="toast"><div id="desc">A notification message..</div></div>
  </div>
  <!-- /.content-wrapper -->

 <?php include('include/footer.php'); ?>
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

  
<script src="bower_components/ckeditor/ckeditor.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script type="text/javascript">

      $(document).ready(function(){  
          fetch_data();   
     });  
          function fetch_data()  
          {         
                 $.ajax({  
                      url:"ajax/select_website_feedback.php",  
                      method:"POST",  
                      dataType:"text",
                      success:function(data){  

                           $('#live_feedback').html(data);  
                      },
                      beforeSend: function () {
                            $('#live_feedback').html("<img src='images/ajax-loader.gif'  style='padding: 10%' width=40%/> "); 
                        },

                      error:function (xhr, status, err) {
                      console.log(xhr.responseText);
                      }  
                 });  
          }
          function edit_feedback(id, text, column_name)
          {
            // console.log(id+' - '+text+' - '+column_name);
               $.ajax({
                    url:"ajax/edit_web_feedback.php",
                    method:"POST",
                    data:{id:id, text:text, column_name:column_name},
                    dataType:"text",
                    // success: function(result){
                    //   console.log(result);
                    // }

               });

          }
     
       
    </script>  
   
</body>
</html>
