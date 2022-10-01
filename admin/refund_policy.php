<?php
 include 'db/db_connect.php';
require_once 'include/manage_session.php';


if(isset($_POST['cate_submit'])) 
  {
 $refunds =  $_POST['refunds'];
  
  $sal=mysqli_query($conn, "UPDATE `refunds` SET `terms`= '$refunds' WHERE id = 4 ");

      if($sal)
      {
echo '<script>window.location="refund_policy.php"</script>';
    
}

else
{
  echo '<script>swal("Something went Wrong!", "You clicked the button!", "danger")</script>';
}
}
 $qx=mysqli_query($conn,"select * from `refunds` WHERE id = 4 ");
$up = mysqli_fetch_array($qx);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> refunds Policy | <?php title();?></title>

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

  <link rel="stylesheet" type="text/css" href="plugins/dropzone/dropzone.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
 <?php
include 'include/header.php';
include 'include/side_navbar.php';
?>
  
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Refunds Policy

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Refunds Policy</li>
      </ol>
    </section>

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#company_category_list" data-toggle="tab">Refunds Policy List</a></li>
              <li ><a href="#create" id="edit_click" data-toggle="tab">Create Refunds Policy</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="company_category_list">
                <button  class="btn btn-primary" onclick="printTable()">Print</button>
                <button class="btn btn-primary" id="export" data-export="export">CSV</button>
                <div id="live_category" style="overflow-x: auto"></div>
              </div>
      

              <div class="tab-pane" id="create">

                <form id="company_category_form" method="POST">
                  <h2 class="card-inside-title"></h2>
                      <div class="row ">
                        
                              <div class="form-group col-sm-12">
                                  <label>Refunds Policy Point :</label>
                                <textarea id="editor1" name="refunds" required="">
                                     <?= $up['terms'] ?>

									</textarea>
                              </div>
                        
                          <div class="col-sm-12">
                              <button id="mySubmit" class="btn btn-primary" name="cate_submit">Add</button>
                          </div>
                      </div>
              </form>

              </div>
              <!-- /.tab-pane -->
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
  </div>

  <!-- /.content-wrapper -->
<div id="toast"><div id="desc">A notification message..</div></div>
 <?php include 'include/footer.php';?>
  <div class="control-sidebar-bg"></div>
</div>

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
<script src="plugins/dropzone/dropzone.js"></script>
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
          fetch_data();
     });
          function fetch_data()
          {
                 $.ajax({
                      url:"ajax/select_refund.php",
                      method:"POST",
                      dataType:"text",
                      success:function(data){

                           $('#live_category').html(data);
                      },
                      beforeSend: function () {
                            $('#live_category').html("<img src='images/ajax-loader.gif'  style='padding: 10%' width=40%/> ");
                        },

                      error:function (xhr, status, err) {
                      console.log(xhr.responseText);
                      }
                 });
          }


          function edit_category(id, text, column_name)
          {

               $.ajax({
                    url:"ajax/edit_category.php",
                    method:"POST",
                    data:{id:id, text:text, column_name:column_name},
                    dataType:"text",

               });

          }
          

    </script>
          
</script>
</body>
</html>
