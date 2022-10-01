<?php
   include 'db/db_connect.php';
   
    
   require_once 'include/manage_session.php';
   $sno=1;



 if (isset($_POST['mySubmitemp'])) {
       
   
       $package_nm =  $_POST['package_nm'];
   	$package_price =  $_POST['package_price']; 
   	$package_day =  $_POST['package_day']; 
   	$description =  $_POST['description']; 
   	
   
                 
                   $insert = "UPDATE `emp_package` SET  `package_price`='$package_price',`package_name`='$package_nm',`package_day`='$package_day',`package_description`='$description' WHERE id = '".$_GET['id']."'";
                   if (mysqli_query($conn,$insert)) {
                       echo'<script>window.location="package.php"</script>';
                   }
   	}
   	 
   	 
   	   $select_package=mysqli_query($conn,"SELECT * FROM `emp_package` WHERE 
   	   id = '".$_GET['id']."' ");
       $select_package_row=mysqli_fetch_array($select_package);
     
    
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title> package | <?php title();?></title>
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
      <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
      <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <script src="js/tabletoCSV.js" type="text/javascript" charset="utf-8"></script>
   </head>
   <body class="hold-transition skin-blue sidebar-mini">
      <!-- Site wrapper -->
      <div class="wrapper">
      <?php
         include 'include/header.php';
         include 'include/side_navbar.php';
         ?>
      <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <h1>
            Edit Employee package
         </h1>
         <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Edit package</li>
         </ol>
      </section>
      <!-- Main content -->
      <section class="content">
         <!-- Small boxes (Stat box) -->
         <div class="row">
         <div class="col-md-12">
         <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              
               <li class="active"><a href="#create" id="edit_click" data-toggle="tab" >Employee package Details</a></li>
            </ul>
            <div class="tab-content">
          
                  <div class="active tab-pane"  id="create">
                  
                  <form action="" method="POST">
                  <h2 class="card-inside-title"></h2>
                  <div class="row ">
                  <div class="col-sm-12">
                  <div class="row">
                  <div class="form-group col-lg-4">
                  <div class="form-line">
                  <label>Package Name :</label>
                  <input type="text" class="form-control" name="package_nm" value="<?= $select_package_row['package_name']; ?>" />
                  </div>
                  </div>
                  <div class="form-group col-lg-4">
                  <div class="form-line">
                  <label>Package Price :</label>
                  <input type="text" class="form-control" name="package_price" value="<?php echo $select_package_row['package_price'] ; ?>"  />
                  </div>
                  </div>
                  <div class="form-group col-lg-4">
                  <div class="form-line">
                  <label>No. of days :</label>
                  <input type="text" class="form-control" name="package_day" value="<?= $select_package_row['package_day']; ?>" />
                  </div>
                  </div>
                  <div class="form-group col-lg-12">
                  <div class="form-line">
                  <label>Package Description:</label>
                  <textarea name="description" class="form-control" id="editor2"  ><?= $select_package_row['package_description']; ?></textarea>
                  </div>
                  </div>
                  <div class="col-lg-12">
                  <button name="mySubmitemp" class="btn btn-primary">Update</button>
                 
                  </div>
                  </div>
                  </form>
                 
                  </div>
                  </div>
                  </div>
               </div>
               <!-- /.row -->
      </section>
      <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php include 'include/footer.php';?>
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
      <script src="bower_components/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>
      <!-- CK Editor -->
      <script src="bower_components/ckeditor/ckeditor.js"></script>
      <!-- <script src="https://cdn.ckeditor.com/4.9.2/standard-all/ckeditor.js"></script> -->
      <!-- AdminLTE for demo purposes -->
      <script src="dist/js/demo.js"></script>
      <script>
      
         CKEDITOR.replace( 'editor2', {
            extraPlugins: 'colorbutton'
         } );
        
      </script> 
      <script type="text/javascript">
         $(document).ready(function(){
           $('.remove_image').hide();
             fetch_data();
         });
         
      </script>
   </body>
</html>
