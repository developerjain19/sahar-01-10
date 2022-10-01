<?php
include 'db/db_connect.php';
require_once 'include/manage_session.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Employee | <?php title();?></title>
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

    <link rel="stylesheet" href="bower_components/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">


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
        Employee
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Employee</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#employee_list" data-toggle="tab">Employee List</a></li>
              <li ><a href="#create" id="edit_click" data-toggle="tab">Create employee</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="employee_list">
                <button  class="btn btn-primary" onclick="printTable()">Print</button>
                <button class="btn btn-primary" id="export" data-export="export">CSV</button>
                <div id="live_employee" style="overflow-x: auto"></div>
              </div>
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->

              <div class="tab-pane" id="create">

                <form id="employee_form" method="POST">
                  <h2 class="card-inside-title"></h2>
                      <div class="row ">
                          <div class="col-sm-12">
                              <div class="row">
                                <div class="form-group col-lg-6">
                                  <label>Company :</label>
                                  <select class="form-control show-tick" name="company_id" id="company_id" required="" >
                                      <?php
                                          $select_company = $conn->query("SELECT * FROM company WHERE company_status='0' ");
                                          while ($select_company_row = $select_company->fetch_assoc()) {
                                            echo '<option value="' . $select_company_row["company_id"] . '">' . $select_company_row["company_name"] . ' </option>';
                                          }
                                      ?>

                                  </select>
                              </div>
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>Name :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Employee Name"  id="employee_name" name="employee_name" required />
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>Web Title :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Employee Web Title"  id="web_employee_name" name="web_employee_name"  />
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>Tagline :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Employee Tagline"  id="employee_tagline" name="employee_tagline"  />
                                    </div>
                                </div>

                                 <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>Email :</label>
                                        <input type="email" class="form-control" placeholder="Employee Email"  id="employee_email" name="employee_email"  />
                                    </div>
                                </div>
                                
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>URL :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Employee URL"  id="employee_url" name="employee_url" required />
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
                                        <label>Address :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Add Multiple Address"  id="employee_address" name="employee_address" data-role="tagsinput"   />
                                    </div>
                                </div>

                               
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>Contact :</label>
                                        <input type="number" maxlength="10" minlength="10" class="form-control" placeholder="Employee Contact"  id="employee_contact" name="employee_contact"  />
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>WhatsApp :</label>
                                        <input type="number" maxlength="10" minlength="10" class="form-control" placeholder="Employee WhatsApp"  id="employee_whatsapp" name="employee_whatsapp"  />
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>Website :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Employee Website"  id="employee_website" name="employee_website"  />
                                    </div>
                                </div>


                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>social Link Facebook :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Employee Facebook Link"  id="employee_facebook" name="employee_facebook"  />
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>social Link Twitter :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Employee Twitter Link"  id="employee_twitter" name="employee_twitter"  />
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>social Link instagram :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Employee instagram Link"  id="employee_instagram" name="employee_instagram"  />
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>social Link Google Plus :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Employee Google Plus Link"  id="employee_google_plus" name="employee_google_plus"  />
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>social Link Linkedin :</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Employee Linkedin Link"  id="employee_linkedin" name="employee_linkedin"  />
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <div class="form-line">
                                        <label>About :</label>
                                        <textarea class="form-control" rows="10" name="employee_about" id="employee_about" placeholder="product About"></textarea>
                                    </div>
                                </div>


                                <div class="form-group col-lg-12">
                                    <label>Status :</label>
                                    <select class="form-control show-tick" name="status" id="status" required="" >
                                        <option value="0">Active </option>
                                        <option value="1">Deactive</option>
                                    </select>
                                </div>

                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>Employee Logo :</label>
                                        <input type="file" class="form-control"  accept="image/*" id="employee_logo" name="employee_logo"  />
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <img id="employee_logo_display" src="#" alt="Employee Logo" width="50%" height="200px" onerror="this.src='images/default-img.gif'"/>
                                    <lable class="btn btn-danger remove_image  btn-sm" data-image_title="employee_logo"><i class="fa fa-trash"></i> Remove</lable>
                                </div> 
                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>Employee Banner :</label>
                                        <input type="file" class="form-control"  accept="image/*" id="employee_banner" name="employee_banner"  />
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <img id="employee_banner_display" src="#" alt="Employee Banner" width="80%" height="200px" onerror="this.src='images/default-img.gif'"/>
                                    <lable class="btn btn-danger remove_image  btn-sm" data-image_title="employee_banner"><i class="fa fa-trash"></i> Remove</lable>
                                </div>

                                <div class="form-group col-lg-6">
                                    <div class="form-line">
                                        <label>Employee Card Background :</label>
                                        <input type="file" class="form-control"  accept="image/*" id="employee_card_background" name="employee_card_background"  />
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <img id="employee_card_background_display" src="#" alt="Employee Banner" width="80%" height="200px" onerror="this.src='images/default-img.gif'"/>
                                    <lable class="btn btn-danger remove_image  btn-sm" data-image_title="employee_card_background"><i class="fa fa-trash"></i> Remove</lable>

                                </div>    
                          </div>
                          <div class="col-lg-12">
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

<script src="bower_components/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>

<script src="bower_components/ckeditor/ckeditor.js"></script>
<script src="dist/js/demo.js"></script>

<script>
  $(function () {
	CKEDITOR.replace( 'employee_about', {
		} );
  })
</script>

<script type="text/javascript">

      $(document).ready(function(){
        $('.remove_image').hide();

          fetch_data();
     });

      function readURL(input , set_id) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#'+set_id).attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }
      }
    $("#employee_logo").change(function(){
        readURL(this , 'employee_logo_display');
    });

    $("#employee_banner").change(function(){
        readURL(this , 'employee_banner_display');
    });

    $("#employee_card_background").change(function(){
        readURL(this , 'employee_card_background_display');
    });

    $(document).on('click', '.remove_image', function(){
               var image_title=$(this).data("image_title");
               var id=$('#id').val();
               if (id > 0) {
                if (confirm("Are you Sure you want to Remove Image")) {
                    edit_employee( id , '' , image_title);
                    $('#'+image_title+'_display').attr('src' , 'images/default-img.gif');

                }
              }
          });
          function fetch_data()
          {
                 $.ajax({
                      url:"ajax/select_employee.php",
                      method:"POST",
                      dataType:"text",
                      success:function(data){

                           $('#live_employee').html(data);
                      },
                      beforeSend: function () {
                            $('#live_employee').html("<img src='images/ajax-loader.gif'  style='padding: 10%' width=40%/> ");
                        },

                      error:function (xhr, status, err) {
                      console.log(xhr.responseText);
                      }
                 });
          }

          
      function edit_employee(id, text, column_name)
          {

               $.ajax({
                    url:"ajax/edit_employee.php",
                    method:"POST",
                    data:{id:id, text:text, column_name:column_name},
                    dataType:"text",

               });

          }
          $(document).on('click', '.btn_delete', function(){
               var id=$(this).data("sid2");

                    if (confirm("Are you Sure you want to Delete")) {
                    $.ajax({
                         url:"ajax/delete_employee.php",
                         method:"POST",
                         data:{temp:id},
                         dataType:"text",
                         success:function(data){
                              fetch_data();
                              console.log(data);
                         },error: function(error){
                            console.log(error['responseText']);
                         }
                    });
                 }
          });
      $(document).on('click', '.btn_edit', function(){
               var id=$(this).data("sid3");

                    if (confirm("Are you Sure you want to Edit")) {
                    $.ajax({
                         url:"ajax/get_employee.php",
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
                                  CKEDITOR.instances.employee_about.setData(data['employee_about']);
                                  $('#employee_address').tagsinput('removeAll');

                                  $('#company_id').val(data['company_id']);
                                  $('#employee_name').val(data['employee_name']);
                                  $('#web_employee_name').val(data['web_employee_name']);
                                  $('#employee_tagline').val(data['employee_tagline']);
                                  $('#employee_url').val(data['employee_url']);
                                  $('#employee_email').val(data['employee_email']);
                                  $('#employee_contact').val(data['employee_contact']);
                                  $('#employee_whatsapp').val(data['employee_whatsapp']);
                                  $('#employee_website').val(data['employee_website']);
                                  $('#employee_facebook').val(data['employee_facebook']);
                                  $('#employee_twitter').val(data['employee_twitter']);
                                  $('#employee_instagram').val(data['employee_instagram']);
                                  $('#employee_google_plus').val(data['employee_google_plus']);
                                  $('#employee_linkedin').val(data['employee_linkedin']);
                                  $('#employee_logo_display').attr('src', '../img/employee/'+data['employee_logo']);
                                  $('#employee_banner_display').attr('src', '../img/employee/'+data['employee_banner']);
                                  $('#employee_card_background_display').attr('src', '../img/employee/'+data['employee_card_background']);
                                  $('#status').val(data['status']);
                                  $('#id').val(data['id']);
                                  $('#mySubmit').html('Update');
                                  $('.remove_image').show();


                                  // $('#employee_address').val(data['employee_address']);

                                  var oldemployee_address=data['employee_address'].split(',');

                                  for(var i=0;i<oldemployee_address.length;i++){
                                      $('#employee_address').tagsinput('add' , oldemployee_address[i]);
                                  }
                                  $('#edit_click').click();

                              }
                         },error: function(error){
                           console.log(error['responseText']);
                         }
                    });
                 }
          });

      $("#employee_form").submit(function(e) {
            $('#mySubmit').prop('disabled', true);

              e.preventDefault();

              var employee_about = CKEDITOR.instances.employee_about.getData();

              var formData = new FormData($(this)[0]);
              formData.append("employee_about", employee_about);

              $.ajax({
                url: 'ajax/insert_employee.php',
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

                  }else{
                      CKEDITOR.instances.employee_about.setData('');
                      $('#employee_address').tagsinput('removeAll');

                      $('#employee_form')[0].reset();
                      $('#mySubmit').html('Add');
                      
                      $('.remove_image').hide();

                      $('#employee_logo_display').attr('src' , 'images/default-img.gif');
                      $('#employee_banner_display').attr('src' , 'images/default-img.gif');
                      $('#employee_card_background_display').attr('src' , 'images/default-img.gif');
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
