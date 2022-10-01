<?php
 include 'db/db_connect.php';
require_once 'include/manage_session.php';


if(isset($_POST['cate_submit'])) 
  {
//  $terms =  $_POST['terms'];
    $blog_about =  $_POST['blog_about'];
    $blog_name =  $_POST['blog_name'];

    $blog_logo_name = $_FILES['blog_logo']['name'];
    $blog_logo_target_file = basename($_FILES["blog_logo"]["name"]);
    $blog_logo_imageFileType = strtolower(pathinfo($blog_logo_target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif");
    if(in_array($blog_logo_imageFileType,$extensions_arr) ){
    $blog_logo_temp = explode(".", $_FILES["blog_logo"]["name"]);
    $blog_logo_newfilename = str_pad(mt_rand(0,1000000000),12,mt_rand(0,9),STR_PAD_LEFT).round(microtime(true)) . '.' . end($blog_logo_temp);
    $blog_logo_target_location= '../img/blog/'.$blog_logo_newfilename;
    $blog_logo_image=$blog_logo_newfilename;
    move_uploaded_file($_FILES['blog_logo']['tmp_name'],$blog_logo_target_location);
 }else{
     $blog_logo_image= NULL;
 }
 $rt =  "INSERT INTO `blog`( `blog_logo`, `blog_name`, `blog_content`) VALUES ('".$blog_logo_newfilename."','".$blog_name."','".$blog_about."')";
//  echo $rt;
  $sal=mysqli_query($conn,$rt);

      if($sal)
      {
echo '<script>window.location="blog.php"</script>';
    
}

else
{
  echo '<script>swal("Something went Wrong!", "You clicked the button!", "danger")</script>';
}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Blog | <?php title();?></title>

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
        Blog

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
            <ul class="nav nav-tabs">
              <li class="active"><a href="#blog_category_list" data-toggle="tab">Blog List</a></li>
              <li ><a href="#create" id="edit_click" data-toggle="tab">Create Blog</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="blog_category_list">
                <button  class="btn btn-primary" onclick="printTable()">Print</button>
                <button class="btn btn-primary" id="export" data-export="export">CSV</button>
                <div id="live_category" style="overflow-x: auto"></div>
              </div>
      

              <div class="tab-pane" id="create">

                <!-- <form id="blog_category_form" method="POST"> -->
                <form id="blog_form" method="POST" enctype="multipart/form-data">
                  <h2 class="card-inside-title"></h2>
                      <div class="row ">
                          <div class="col-sm-12">
                              <div class="row">
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>Name :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="blog Name"  id="blog_name" name="blog_name" required />
                                    </div>
                                </div> 
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>blog Logo :</label>
                                        <input type="file" class="form-control"  accept="image/*" id="blog_logo" name="blog_logo"  />
                                    </div>
                                </div>
                                <style type="text/css">
                                  .bootstrap-tagsinput{
                                    width: 100%;
                                  }
                                  .label-info{
                                    font-size: 14px;
                                  }
                                </style>
                                

                                <div class="form-group col-lg-12">
                                    <div class="form-line">
                                        <label>About :</label>
                                        <textarea class="form-control" rows="10" name="blog_about" id="blog_about" placeholder="product About"></textarea>
                                    </div>
                                </div>


                               
                          </div>
                          <div class="col-lg-12">
                              <button id="mySubmit" name="cate_submit" class="btn btn-primary">Add</button>
                              <input type="text" id="id" name="id" style="display: none">
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



<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<!-- <script src="https://cdn.ckeditor.com/4.9.2/standard-all/ckeditor.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script>
  $(function () {
	CKEDITOR.replace( 'blog_about', {
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
                      url:"ajax/select_blog.php",
                      method:"POST",
                      dataType:"text",
                      success:function(data){
                            // console.log(data);
                           $('#live_category').html(data);
                      } ,
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
