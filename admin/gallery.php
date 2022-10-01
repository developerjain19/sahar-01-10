<?php
include 'db/db_connect.php';
require_once 'include/manage_session.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> product | <?php title();?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- jQuery UI CSS -->
  <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet">
  <!-- Bootstrap styling for Typeahead -->
  <link href="dist/tokenfield/dist/css/tokenfield-typeahead.css" type="text/css" rel="stylesheet">
  <!-- Tokenfield CSS -->
  <link href="dist/tokenfield/dist/css/bootstrap-tokenfield.css" type="text/css" rel="stylesheet">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
   <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
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
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gallery

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Gallery</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#product_list" data-toggle="tab">Gallery List</a></li>
              <li ><a href="#create" id="edit_click" data-toggle="tab">Create Gallery</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="product_list">
                <button  class="btn btn-primary" onclick="printTable()">Print</button>
                <button class="btn btn-primary" id="export" data-export="export">CSV</button>
                <div id="live_product" style="overflow-x: auto"></div>
              </div>
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->

              <div class="tab-pane" id="create">

                <form id="product_form" method="POST">
                  <h2 class="card-inside-title"></h2>
                      <div class="row ">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <div class="form-line">
                                      <label>Image :</label>
                                      <!-- <input type="file" class="form-control" placeholder="product Gallery" accept="image/gif, image/jpeg, image/png"  id="product_image" name="product_image" required /> -->
                                      <div id="myDropzone" class="dropzone"></div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label>product :</label>
                                  <select class="form-control show-tick" name="product" id="product" required="" >
                                      <?php
                                          if ($_SESSION['ecard_company_id'] == "0") {
                                          $select_product = $conn->query("SELECT `product`.* , `company`.`company_name` FROM `product` , `company` WHERE `product`.`company_id`=`company`.`company_id` AND `product`.`product_status`='Active' ");
                                          }else{
                                           $select_product = $conn->query("SELECT `product`.* , `company`.`company_name` FROM `product` , `company` WHERE `product`.`company_id`=`company`.`company_id` AND `product`.`product_status`='Active' AND `product`.`company_id` = '".$_SESSION['ecard_company_id']."' ");
                                          }
                                        while ($select_product_row = $select_product->fetch_assoc()) {
                                        	echo '<option value="' . $select_product_row["product_id"] . '">' . $select_product_row["product_title"] . ' - ' . $select_product_row["company_name"] . ' </option>';
                                        }
                                      ?>

                                  </select>
                              </div>
                              <div class="form-group">
                                  <label>Status :</label>
                                  <select class="form-control show-tick" name="status" id="status" required="" >
                                      <option value="Active">Active </option>
                                      <option value="Deactive">Deactive</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-sm-12">
                              <button id="mySubmit" class="btn btn-primary">Add</button>
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
<script src="plugins/dropzone/dropzone.js"></script>


<!-- CK Editor -->
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
                      url:"ajax/select_gallery.php",
                      method:"POST",
                      dataType:"text",
                      success:function(data){

                           $('#live_product').html(data);
                      },
                      beforeSend: function () {
                            $('#live_product').html("<img src='images/ajax-loader.gif'  style='padding: 10%' width=40%/> ");
                        },

                      error:function (xhr, status, err) {
                      console.log(xhr.responseText);
                      }
                 });
          }
      function edit_product_gallery(id, text, column_name)
          {

               $.ajax({
                    url:"ajax/edit_product_gallery.php",
                    method:"POST",
                    data:{id:id, text:text, column_name:column_name},
                    dataType:"text",

               });

          }
          $(document).on('click', '.btn_delete', function(){
               var id=$(this).data("sid2");
                    if (confirm("Are you Sure you want to Delete")) {
                    $.ajax({
                         url:"ajax/delete_gallery.php",
                         method:"POST",
                         data:{id:id},
                         dataType:"text",
                         success:function(data){
                              fetch_data();
                         }
                    });
                 }
          });


    function change_image(gallery_id)
                  {
                    upload_image.click();


                    $("#upload_image").change(function () {
                        var fsize = $('#upload_image')[0].files[0].size;
                           if(fsize<1048576){

                                var file_data = $("#upload_image").prop("files")[0];
                                var form_data = new FormData();
                                form_data.append("file", file_data);
                                form_data.append("gallery_id", gallery_id);

                                $.ajax({
                                    url: "ajax/update_gallery_image.php",
                                    dataType: "script",
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: form_data,
                                    type: "post",
                                    dataType: 'json',
                                    success: function(data){
                                      // alert(data);
                                      if (data['error']) {
                                        $('#desc').html(data['message']);
                          var x = document.getElementById("toast");
                          x.className = "show";
                          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
                                      }else{
                                        $('#desc').html(data['message']);
                          var x = document.getElementById("toast");
                          x.className = "show";
                          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
                                        fetch_data();
                                      }
                                    }
                                 });
                                 }else{
                              alert("upload Image size less then 1 MB");
                            }
                      });
                  }



      // $("#product_form").submit(function(e) {
      //       $('#mySubmit').prop('disabled', true);
      //         e.preventDefault();
      //         var formData = new FormData($(this)[0]);

      //         $.ajax({
      //           url: 'ajax/insert_gallery.php',
      //           type: 'POST',
      //           data: formData,
      //           async: false,
      //           cache: false,
      //           contentType: false,
      //           processData: false,
      //            dataType:"json",
      //           success: function (data) {

      //              if (data['error']) {
      //               $('#desc').html(data['message']);
      //                     var x = document.getElementById("toast");
      //                     x.className = "show";
      //                     setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
      //             }else{
      //               $("#upload_gallery").trigger("click");
      //               $('#desc').html(data['message']);
      //                     var x = document.getElementById("toast");
      //                     x.className = "show";
      //                     setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
      //                $('#product_form')[0].reset();

      //                fetch_data();
      //                }
      //           }
      //         });
      //          $('#mySubmit').prop('disabled', false);
      //         return false;
      //       });

    </script>
<script type="text/javascript">
  var variable;
  // disable auto discover
Dropzone.autoDiscover = false;
// init dropzone on id (form or div)
$(document).ready(function() {

    var myDropzone = new Dropzone("#myDropzone", {
        url: "ajax/insert_gallery.php",
        paramName: "product_image",
        autoProcessQueue: false,
        uploadMultiple: true, // uplaod files in a single request
        parallelUploads: 100, // use it with uploadMultiple
        maxFilesize: 2, // MB
        maxFiles: 50,
        acceptedFiles: ".jpg, .jpeg, .png, .gif",
        addRemoveLinks: true,
        // Language Strings
        dictFileTooBig: "File is to big ({{filesize}}mb). Max allowed file size is {{maxFilesize}}mb",
        dictInvalidFileType: "Invalid File Type",
        dictCancelUpload: "Cancel",
        dictRemoveFile: "Remove",
        dictMaxFilesExceeded: "Only {{maxFiles}} files are allowed",
        dictDefaultMessage: "Drop files here to upload",
    });

});

Dropzone.options.myDropzone = {
    // The setting up of the dropzone
    init: function() {
        var myDropzone = this;

        // First change the button to actually tell Dropzone to process the queue.
        $("#mySubmit").on("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
                // myDropzone.processQueue();

            if (myDropzone.files != "") {
                myDropzone.processQueue();
            } else {
                 // $('.LockOn').css('visibility', 'hidden');

            }

        });
        this.on("sending", function(file, xhr, formData) {
          product=$("#product").val();
          status=$("#status").val();
          formData.append("product", product);
          formData.append("status", status);

        });

        // on add file
        this.on("addedfile", function(file) {
            // console.log(file);
        });
        // on error
        this.on("error", function(file, response) {
            console.log(response);

        });
        // on start
        this.on("sendingmultiple", function(file) {
             // console.log(file);

        });
        // on success
        this.on("successmultiple", function(file , response) {
            // submit form
            // console.log(response);
            $('#desc').html("Uploaded Successfully");
             var x = document.getElementById("toast");
              x.className = "show";
              setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
              this.removeAllFiles();
              fetch_data();

        });
    }
};
</script>
</body>
</html>
