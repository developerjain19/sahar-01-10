<?php
include 'db/db_connect.php';
require_once 'include/manage_session.php';
$id = $_GET['id'];

if (isset($_POST['cate_submit'])) {
  $category =  $_POST['category'];


  $sal = mysqli_query($conn, "UPDATE `company_category` SET `category`='$category' WHERE `cate_id` = '".$id."' ");

  if ($sal) {
    echo '<script>window.location="company_category.php"</script>';
  } else {
    echo '<script>swal("Something went Wrong!", "You clicked the button!", "danger")</script>';
  }
}

$fetch = mysqli_query($conn, "SELECT * FROM `company_category` WHERE `cate_id` = '".$id."'");
$data = mysqli_fetch_array($fetch);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Company Category edit | <?php title(); ?></title>

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
          Company Category edit

        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">Company Category edit</li>
        </ol>
      </section>

      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            <div class="nav-tabs-custom">
              
              <div class="tab-content">
               

                <div class="tab-pane active" id="create">

                  <form id="company_category_form" method="POST">
                    <h2 class="card-inside-title"></h2>
                    <div class="row ">

                      <div class="form-group col-sm-12">
                        <label>Category Name :</label>
                        <input type="text" class="form-control" name="category" value="<?= $data['category'] ?>">
                      </div>

                      <div class="col-sm-12">
                        <button class="btn btn-primary" name="cate_submit">Update</button>
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
 
    <?php include 'include/footer.php'; ?>
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
</body>

</html>