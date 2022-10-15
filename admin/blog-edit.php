<?php
include 'db/db_connect.php';
require_once 'include/manage_session.php';
$id = $_GET['id'];

if (isset($_POST['cate_submit'])) {
    $blog_about =  $_POST['blog_about'];
    $blog_name =  $_POST['blog_name'];

    if (!empty($_FILES['blog_logo']['name'])) {
        $file = $_FILES['blog_logo']['name'];
        $tmpfile = $_FILES['blog_logo']['tmp_name'];
        $folder = (($file == '') ? '' : date("dmYHis") . $file);
        move_uploaded_file($tmpfile, '../uploads/blogs/' . $folder);
    } else {
        $folder = $_POST['img'];
    }

    $rt =  "UPDATE `blog` SET `blog_logo`='$folder',`blog_name`='$blog_name',`blog_content`='$blog_about' WHERE `blog_id` =" . $id;
    $sal = mysqli_query($conn, $rt);

    if ($sal) {
        echo '<script>window.location="blog.php"</script>';
    } else {
        echo '<script>swal("Something went Wrong!", "You clicked the button!", "danger")</script>';
    }
}

$fetch = mysqli_query($conn, "SELECT * FROM `blog` WHERE `blog_id` = '".$id."'");
$data = mysqli_fetch_array($fetch);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Blog | <?php title(); ?></title>

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
                    Update Blog

                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Blog</li>
                </ol>
            </section>

            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">

                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <form method="POST" enctype="multipart/form-data">
                                        <h2 class="card-inside-title"></h2>
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="form-group col-lg-6">
                                                        <div class="form-line">
                                                            <label>Name :</label>
                                                            <input type="text" maxlength="255" class="form-control" placeholder="blog Name" id="blog_name" name="blog_name" value="<?= $data['blog_name'] ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <div class="form-line">
                                                            <label>blog Logo :</label>
                                                            <input type="file" class="form-control" accept="image/*" name="blog_logo" />
                                                            <input type="hidden" class="form-control" accept="image/*" name="img" value="<?= $data['blog_logo'] ?>" />
                                                            <img src="../uploads/blogs/<?= $data['blog_logo'] ?>" width="80px">
                                                        </div>
                                                    </div>
                                                    <style type="text/css">
                                                        .bootstrap-tagsinput {
                                                            width: 100%;
                                                        }

                                                        .label-info {
                                                            font-size: 14px;
                                                        }
                                                    </style>


                                                    <div class="form-group col-lg-12">
                                                        <div class="form-line">
                                                            <label>About :</label>
                                                            <textarea class="form-control" rows="10" name="blog_about" id="blog_about" placeholder="product About"><?= $data['blog_content'] ?>
                                                            </textarea>
                                                        </div>
                                                    </div>



                                                </div>
                                                <div class="col-lg-12">
                                                    <button name="cate_submit" class="btn btn-primary">Update</button>

                                                </div>
                                            </div>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->

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

    <script src="bower_components/ckeditor/ckeditor.js"></script>
    <!-- <script src="https://cdn.ckeditor.com/4.9.2/standard-all/ckeditor.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    </script>
</body>

</html>