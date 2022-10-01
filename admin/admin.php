<?php
session_start();
require_once 'include/manage_session.php';
include 'db/db_connect.php';
if ($_SESSION['ecard_company_id'] != "0") {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Admin Management | <?php title();?></title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

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
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Management

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin Setting</a></li>
        <li class="active">Admin Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#sub_category_list" data-toggle="tab">Admin</a></li>
              <li><a href="#create" data-toggle="tab">Add Admin</a></li>

            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="sub_category_list">
                <div class="table-responsive">
                  <button  class="btn btn-primary" onclick="printTable()">Print</button>
                  <button class="btn btn-primary" id="export" data-export="export">CSV</button>
                  <div id="live_admin"></div>
                </div>
              </div>
              <div class="tab-pane" id="create">
                <form id="add_new_admin" method="POST">
                    <h2 class="card-inside-title"></h2>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Company :</label>
                                    <select class="form-control show-tick" name="company_id" id="company_id" required="" >
                                        <option value="0">Main Admin</option>
                                        <?php
                                            $select_company = $conn->query("SELECT * FROM company WHERE company_status='0' ");
                                            while ($select_company_row = $select_company->fetch_assoc()) {
                                              echo '<option value="' . $select_company_row["company_id"] . '">' . $select_company_row["company_name"] . ' </option>';
                                            }
                                        ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Name"  id="admin_name" name="admin_name" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="user name"  id="admin_email" name="admin_email" required />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Position"  id="position" name="position" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" class="form-control" placeholder="Password"  id="password" name="password" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" class="form-control" placeholder="Confirm Password"  id="confirm_password" name="confirm_password" required />
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <button id="mySubmit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                </form>
              </div>
            </div>

            </div>
           </div>
        </div>

      </div>

      <div id="toast"><div id="desc">A notification message..</div></div>

    </section>
    <!-- /.content -->
   </div>
  <!-- /.content-wrapper -->

 <?php include 'include/footer.php'?>

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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
          fetch_data();
     });
          function fetch_data()
          {
                 $.ajax({
                      url:"ajax/select_admin.php",
                      method:"POST",
                      dataType:"text",
                      success:function(data){
                           $('#live_admin').html(data);
                      },
                      beforeSend: function () {
                            $('#live_admin').html("<img src='images/ajax-loader.gif'  style='padding: 10%' width=40%/> ");
                        },

                      error:function (xhr, status, err) {
                      console.log(xhr.responseText);
                      }
                 });
          }

          function edit_admin(id, text, column_name)
          {

               $.ajax({
                    url:"ajax/edit_admin.php",
                    method:"POST",
                    data:{id:id, text:text, column_name:column_name},
                    dataType:"text",
                      success: function (data) {
                        // alert(data);
                      }
               });

          }

           $("#add_new_admin").submit(function(e) {
            $('#mySubmit').prop('disabled', true);
              e.preventDefault();
              var formData = new FormData($(this)[0]);

              $.ajax({
                url: 'ajax/insert_admin.php',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success: function (data) {
                  if (data['error']) {
                      $('#desc').html(data['message']);
                    var x = document.getElementById("toast");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
                    }
                    else{
                      $('#desc').html(data['message']);
                    var x = document.getElementById("toast");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
                      $('#add_new_admin')[0].reset();
                      fetch_data();
                    }
                }
              });
               $('#mySubmit').prop('disabled', false);
              return false;
            });
    </script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
