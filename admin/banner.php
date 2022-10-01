<?php
include 'db/db_connect.php';
require_once 'include/manage_session.php';


if (isset($_POST['cate_submit'])) {
    //  $terms =  $_POST['terms'];
    $company =  implode(",",$_POST['company']);
    $banner_name =  $_POST['banner_name'];
    $location =  $_POST['location'];
    
    $banner_logo_name = $_FILES['banner_logo']['name'];
    $banner_logo_target_file = basename($_FILES["banner_logo"]["name"]);
    $banner_logo_imageFileType = strtolower(pathinfo($banner_logo_target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif");
    if (in_array($banner_logo_imageFileType, $extensions_arr)) {
        $banner_logo_temp = explode(".", $_FILES["banner_logo"]["name"]);
        $banner_logo_newfilename = str_pad(mt_rand(0, 1000000000), 12, mt_rand(0, 9), STR_PAD_LEFT) . round(microtime(true)) . '.' . end($banner_logo_temp);
        $banner_logo_target_location = '../uploads/advertise/' . $banner_logo_newfilename;
        $banner_logo_image = $banner_logo_newfilename;
        move_uploaded_file($_FILES['banner_logo']['tmp_name'], $banner_logo_target_location);
    } else {
        $banner_logo_image = NULL;
    }
    $rt =  "INSERT INTO `banner`( `banner_logo`, `banner_name`, `banner_content`, `location`) VALUES ('" . $banner_logo_newfilename . "','" . $banner_name . "','" . $company . "','" . $location . "')";
    //  echo $rt;
    $sal = mysqli_query($conn, $rt);

    if ($sal) {
        echo '<script>window.location="banner.php"</script>';
    } else {
        echo '<script>swal("Something went Wrong!", "You clicked the button!", "danger")</script>';
    }
}
$select_company = $conn->query("SELECT * FROM `company` WHERE `company_status` != '2' ORDER BY `company_name` ASC");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> banner | <?php title(); ?></title>

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
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
                    banner

                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">banner</li>
                </ol>
            </section>

            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#banner_category_list" data-toggle="tab">banner List</a></li>
                                <li><a href="#create" id="edit_click" data-toggle="tab">Create banner</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="banner_category_list">
                                    <button class="btn btn-primary" onclick="printTable()">Print</button>
                                    <button class="btn btn-primary" id="export" data-export="export">CSV</button>
                                    <div id="bonner" style="overflow-x: auto"></div>
                                </div>


                                <div class="tab-pane" id="create">

                                    <!-- <form id="banner_category_form" method="POST"> -->
                                    <form id="banner_form" method="POST" enctype="multipart/form-data">
                                        <h2 class="card-inside-title"></h2>
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="form-group col-lg-6">
                                                        <div class="form-line">
                                                            <label>Show in :</label>
                                                            <input type="radio"  name="location"   value="0"  checked /> After about us
                                                            <input type="radio"  name="location"   value="1"/> After gallery
                                                            <input type="radio"  name="location"   value="2"/> After Feedback
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <div class="form-line">
                                                            <label>Link :</label>
                                                            <input type="text" maxlength="255" class="form-control" placeholder="banner link" id="banner_name" name="banner_name" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <div class="form-line">
                                                            <label>Banner img:</label>
                                                            <input type="file" class="form-control" accept="image/*" id="banner_logo" name="banner_logo" />
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
                                                            <label>Company name :</label>
                                                            <div class="row"  >
                                                                <?php
                                                                while ($select_company_row = $select_company->fetch_assoc()) {
                                                                ?>
                                                                 <div class="col-md-4"  >
                                                                    <input type="checkbox" name="company[]" value="<?= $select_company_row['company_id'] ?>"> <?= $select_company_row['company_name'] ?>
                                                                     </div>
                                                                <?php
                                                                }

                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                            <div class="col-lg-12">
                                                <button id="mySubmit" name="cate_submit" type="submit" class="btn btn-primary">Add</button> 
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

    <script src="plugins/select2/js/select2.full.min.js"></script>

    <!-- CK Editor -->
    <script src="bower_components/ckeditor/ckeditor.js"></script>
    <!-- <script src="https://cdn.ckeditor.com/4.9.2/standard-all/ckeditor.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <script>
        $(function() {
            CKEDITOR.replace('banner_about', {
                extraPlugins: 'colorbutton'
            });
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
            fetch_data();
        });

        function fetch_data() {
            $.ajax({
                url: "ajax/select_banner.php",
                method: "POST",
                dataType: "text",
                success: function(data) {
                    // console.log(data);
                    $('#bonner').html(data);
                },
                beforeSend: function() {
                    $('#bonner').html("<img src='images/ajax-loader.gif'  style='padding: 10%' width=40%/> ");
                },

                error: function(xhr, status, err) {
                    console.log(xhr.responseText);
                }
            });
        }


        function edit_category(id, text, column_name) {

            $.ajax({
                url: "ajax/edit_category.php",
                method: "POST",
                data: {
                    id: id,
                    text: text,
                    column_name: column_name
                },
                dataType: "text",

            });

        }
    </script>

    </script>
</body>

</html>