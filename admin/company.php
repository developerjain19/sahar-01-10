<?php
include 'db/db_connect.php';
require_once 'include/manage_session.php';

// if ($_SESSION['ecard_company_id'] != "0") {
//     header('location: index.php');
// }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Company | <?php title();?></title>
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Company
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Company</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#company_list" data-toggle="tab">Company List</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="company_list">
                <button  class="btn btn-primary" onclick="printTable()">Print</button>
                <button class="btn btn-primary" id="export" data-export="export">CSV</button>
                <div id="live_company" style="overflow-x: auto"></div>
              </div>
          

              <div class="tab-pane" id="create">

               
            </div>
            
          </div>
          
        </div>

      </div>
    
     <div id="toast"><div id="desc">A   message..</div></div>
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


<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<!-- <script src="https://cdn.ckeditor.com/4.9.2/standard-all/ckeditor.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script>
  $(function () {
	CKEDITOR.replace( 'company_about', {
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
    $("#company_logo").change(function(){
        readURL(this , 'company_logo_display');
    });

    $("#company_banner").change(function(){
        readURL(this , 'company_banner_display');
    });

    $("#company_card_background").change(function(){
        readURL(this , 'company_card_background_display');
    });

          $(document).on('click', '.remove_image', function(){
               var image_title=$(this).data("image_title");
               var id=$('#id').val();
               if (id > 0) {
                if (confirm("Are you Sure you want to Remove Image")) {

                    edit_company( id , '' , image_title);
                    $('#'+image_title+'_display').attr('src' , 'images/default-img.gif');

                }
              }
          });

        
          function fetch_data()
          {
                 $.ajax({
                      url:"ajax/select_company.php",
                      method:"POST",
                      dataType:"text",
                      success:function(data){

                           $('#live_company').html(data);
                      },
                      beforeSend: function () {
                            $('#live_company').html("<img src='images/ajax-loader.gif'  style='padding: 10%' width=40%/> ");
                        },

                      error:function (xhr, status, err) {
                      console.log(xhr.responseText);
                      }
                 });
          }
          
      function edit_company(id, text, column_name)
          {

               $.ajax({
                    url:"ajax/edit_company.php",
                    method:"POST",
                    data:{id:id, text:text, column_name:column_name},
                    dataType:"text",

               });

          }
          $(document).on('click', '.btn_delete', function(){
               var id=$(this).data("sid2");

                    if (confirm("Are you Sure you want to Delete")) {
                    $.ajax({
                         url:"ajax/delete_company.php",
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
                         url:"ajax/get_company.php",
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
                                  CKEDITOR.instances.company_about.setData(data['company_about']);
                                  $('#company_address').tagsinput('removeAll');

                                  $('#company_name').val(data['company_name']);
                                  $('#web_company_name').val(data['web_company_name']);
                                  $('#company_tagline').val(data['company_tagline']);
                                  $('#company_url').val(data['company_url']);
                                  $('#company_email').val(data['company_email']);
                                  $('#company_contact').val(data['company_contact']);
                                  $('#company_whatsapp').val(data['company_whatsapp']);
                                  $('#company_website').val(data['company_website']);
                                  $('#company_facebook').val(data['company_facebook']);
                                  $('#company_twitter').val(data['company_twitter']);
                                  $('#company_instagram').val(data['company_instagram']);
                                  $('#company_google_plus').val(data['company_google_plus']);
                                  $('#company_linkedin').val(data['company_linkedin']);
                                  $('#company_logo_display').attr('src', '../img/company/'+data['company_logo']);
                                  $('#company_banner_display').attr('src', '../img/company/'+data['company_banner']);
                                  $('#company_card_background_display').attr('src', '../img/company/'+data['company_card_background']);
                                  $('#status').val(data['status']);
                                  $('#id').val(data['id']);
                                  $('#mySubmit').html('Update');
                                  $('.remove_image').show();

                                  // $('#company_address').val(data['company_address']);

                                  var oldcompany_address=data['company_address'].split(',');

                                  for(var i=0;i<oldcompany_address.length;i++){
                                      $('#company_address').tagsinput('add' , oldcompany_address[i]);
                                  }
                                  $('#edit_click').click();

                              }
                         },error: function(error){
                           console.log(error['responseText']);
                         }
                    });
                 }
          });

      $("#company_form").submit(function(e) {
            $('#mySubmit').prop('disabled', true);

              e.preventDefault();

              var company_about = CKEDITOR.instances.company_about.getData();

              var formData = new FormData($(this)[0]);
              formData.append("company_about", company_about);

              $.ajax({
                url: 'ajax/insert_company.php',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success: function (data) {
                  // console.log(data);
                  if (data['error']) {

                    $('#desc').html(data['message']);
                    var x = document.getElementById("toast");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);

                  }else{
                      CKEDITOR.instances.company_about.setData('');
                      $('#company_address').tagsinput('removeAll');

                      $('#company_form')[0].reset();
                      $('#mySubmit').html('Add');
                      $('.remove_image').hide();
                      

                      $('#company_logo_display').attr('src' , 'images/default-img.gif');
                      $('#company_banner_display').attr('src' , 'images/default-img.gif');
                      $('#company_card_background_display').attr('src' , 'images/default-img.gif');
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
