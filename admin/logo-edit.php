<?php
include 'db/db_connect.php';
require_once 'include/manage_session.php';

$id = $_GET['id'];

if (isset($_POST['submit'])) {

// $dir = website_url.'uploads/company/';
$dir = '../uploads/company/';


    if(!empty($_FILES['image']['name']))
     {
         print_r($_FILES['image']);
        $file=$_FILES['image']['name'];
        $tmpfile=$_FILES['image']['tmp_name'];
        $folder = (($file == '') ? '' : date("dmYHis") . $file);
        $fg = move_uploaded_file($_FILES['image']['tmp_name'], $dir.$folder);  
        // print_r($fg);
      }
     else
     {
        $folder = $_POST['img'];
     }
     
     echo $dir.$folder;
  $update = "UPDATE `company` SET `company_logo`= '" . $folder . "' WHERE `company_id` = '" . $id . "' "; 
//   echo $update;
$sal=$conn->query($update);
// exit();
    if ($sal) {
        // echo '<script>window.location="company.php"</script>';
    } else {
        echo '<script>alert("Something went Wrong!", "You clicked the button!", "danger")</script>';
    }
}


 $er = "SELECT * FROM `company` WHERE `company_id` = " . $id;
     $pro = mysqli_query($conn, $er);
    $company = mysqli_fetch_array($pro);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Company Graphics | <?php title(); ?></title>

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
                    Company Graphics

                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Company Graphics</li>
                </ol>
            </section>

            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#company_Subcategory_list" data-toggle="tab">Company Logo</a></li>
                            </ul>
                            <div class="tab-content">
                                  <div class="active tab-pane">

                                    <form id="company_subcategory_form" method="POST" enctype="multipart/form-data">
                                        <h2 class="card-inside-title"></h2>
                                        <div class="row">

                                            <div class="form-group col-sm-12">
                                                <label>Logo :</label>
                                                <input type="file" class="form-control" name="image" >
                                                 <input type="hidden" name="img" value="<?= $company['company_logo'] ?>">
                                            </div>
 
                                            <div class="col-sm-12">
                                                <button id="mySubmit" class="btn btn-primary" name="submit">Update Logo</button>
                                            </div>
                                            
                                            
                                            <div class="form-group col-sm-12">
                                            <img src="<?= website_url ?>uploads/company/<?= $company['company_logo'] ?>" height="100x">
                                            
                                            
                                            <a href="<?= website_url ?>uploads/company/<?= $company['company_logo'] ?>" class="btn btn-success" download /> download</a>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
              </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <div id="toast">
            <div id="desc">A notification message..</div>
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