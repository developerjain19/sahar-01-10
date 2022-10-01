<?php
include 'db/db_connect.php';
require_once 'include/manage_session.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Product | <?php title();?></title>
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

  <!-- <link rel="stylesheet" href="notification/css/style.css"> -->


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
        Product

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#product_list" data-toggle="tab">Product List</a></li>
              <li ><a href="#create" id="edit_click" data-toggle="tab">Create Product</a></li>
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
                                  <label>Company :</label>
                                  <select class="form-control show-tick" name="company_id" id="company_id" required="" >
                                      <?php
                                          if ($_SESSION['ecard_company_id'] == "0") {
                                            $select_company = $conn->query("SELECT * FROM company WHERE company_status='0' ");
                                          }else{
                                            $select_company = $conn->query("SELECT * FROM company WHERE company_status='0' AND `company_id` = '".$_SESSION['ecard_company_id']."' ");
                                          }
                                          while ($select_company_row = $select_company->fetch_assoc()) {
                                            echo '<option value="' . $select_company_row["company_id"] . '">' . $select_company_row["company_name"] . ' </option>';
                                          }
                                      ?>

                                  </select>
                              </div>
                              <div class="form-group">
                                  <div class="form-line">
                                      <label>Title :</label>
                                      <input type="text" class="form-control" placeholder="product Title"  id="product_name" name="product_name" required />
                                  </div>
                              </div>
                              
                              <div class="form-group">
                                  <div class="form-line">
                                      <label>Description :</label>
                                      <textarea class="form-control" rows="10" name="description" id="description" placeholder="product Description"></textarea>
                                  </div>
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
     <div id="toast"><div id="desc">A notification message..</div></div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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


<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<!-- <script src="https://cdn.ckeditor.com/4.9.2/standard-all/ckeditor.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script>
  $(function () {
	CKEDITOR.replace( 'description', {
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
                      url:"ajax/select_product.php",
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
      function edit_product(id, text, column_name)
          {

               $.ajax({
                    url:"ajax/edit_product.php",
                    method:"POST",
                    data:{id:id, text:text, column_name:column_name},
                    dataType:"text",

               });

          }
          $(document).on('click', '.btn_delete', function(){
               var id=$(this).data("sid2");

                    if (confirm("Are you Sure you want to Delete")) {
                    $.ajax({
                         url:"ajax/delete_product.php",
                         method:"POST",
                         data:{temp:id},
                         dataType:"text",
                         success:function(data){
                              fetch_data();
                         }
                    });
                 }
          });
      $(document).on('click', '.btn_edit', function(){
               var id=$(this).data("sid3");

                    if (confirm("Are you Sure you want to Edit")) {
                    $.ajax({
                         url:"ajax/get_product.php",
                         method:"POST",
                         data:{temp:id},

                         dataType:"json",
                         success:function(data){
                              if (data['error']) {
                                $('#desc').html(data['message']);
                          var x = document.getElementById("toast");
                          x.className = "show";
                          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
                              }else{
                                  CKEDITOR.instances.description.setData(data['description']);
                                  $('#product_name').val(data['name']);
                                  $('#company_id').val(data['company_id']);
                                  $('#status').val(data['status']);
                                  $('#id').val(data['id']);
                                  $('#mySubmit').html('Update');
                                  $('#edit_click').click();

                              }
                         },error: function(error){
                           console.log(error['responseText']);
                         }
                    });
                 }
          });

      $("#product_form").submit(function(e) {
            $('#mySubmit').prop('disabled', true);

              e.preventDefault();

              var description = CKEDITOR.instances.description.getData();

              var formData = new FormData($(this)[0]);
              formData.append("description", description);

              $.ajax({
                url: 'ajax/insert_product.php',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success: function (data) {
                  // alert(data);
                  if (data['error']) {

                    $('#desc').html(data['message']);
                    var x = document.getElementById("toast");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);

                  }else{
                    CKEDITOR.instances.description.setData('');
                      $('#product_form')[0].reset();
                      $('#mySubmit').html('Add');

                      $('#desc').html(data['message']);
                      var x = document.getElementById("toast");
                      x.className = "show";
                      setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);

                      fetch_data();
                    }
                },error : function(error){
                  console.log(error['responseText']);
                }
              });
               $('#mySubmit').prop('disabled', false);
              return false;
            });
    </script>
</body>
</html>
