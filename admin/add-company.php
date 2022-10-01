<?php
include 'db/db_connect.php';
require_once 'include/manage_session.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Company | <?php title();?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet">
  <link href="dist/tokenfield/dist/css/tokenfield-typeahead.css" type="text/css" rel="stylesheet">
  <link href="dist/tokenfield/dist/css/bootstrap-tokenfield.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="bower_components/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="plugins/cities.js"></script>
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
      Add  Company
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add Company</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
             
              <li class="active"><a href="#create" id="edit_click" data-toggle="tab">Add Company</a></li>
            </ul>
            <div class="tab-content">
              

              <div class="active tab-pane" id="create">

                 <form method="post" id="myform" action="add-company-code.php" enctype="multipart/form-data">
                            <div class="row mrg-r-10 mrg-l-10">
                                <div class="col-sm-12">
                                    <label>Company Name : <i><span style="color:red;font-size:12px;" id="company_name_msg"></span></i></label>
                                    <input type="text" maxlength="255" class="form-control " placeholder="Company Name" id="company_name" name="company_name" value="" required />


                                </div>
                                <div class="col-sm-12">
                                    <label>Create Web Title : ( Note : Only Use (A-Z),(a-z),(0-9),(_) ) <i><span style="color:red;font-size:12px;" id="web_company_name_msg"></span><span style="color:green;font-size:12px;" id="web_company_name_msgs"></span></i></label>
                                    <input type="text" maxlength="255" class="form-control" placeholder="Ex: yourcompany-name" name="web_company_name" id="web_company_name" required />


                                </div>
                                <div class="col-sm-12">
                                    <label>Company Tagline</label>
                                    <input typr="text" class="h-100 form-control" placeholder="Company Tagline" id="company_tagline" name="company_tagline" />
                                </div>

                                <div class="col-sm-12">
                                    <label>Company Logo :</label>
                                    <input type="file" class="form-control" accept="image/*" id="company_logo" name="company_logo" />
                                </div>
                                <div class="col-sm-12">
                                    <label>Company Banner :</label>
                                    <input type="file" class="form-control" accept="image/*" id="company_banner" name="company_banner" />
                                </div>

                                <div class="col-sm-12">
                                    <label>Person Name: <i><span style="color:red;font-size:12px;" id="person"></span></i></label>
                                    <input type="text" class=" form-control" placeholder="Company Person name (Like : Name of CEO)" id="company_person_nm" value="" name="company_person" />


                                </div>

                                <div class="col-sm-12">
                                    <label>Designation: <i><span style="color:red;font-size:12px;" id="designation"></span></i></label>
                                    <input type="text" class="  form-control" placeholder="Company designation (like : CEO)" id="company_designation" value="" name="company_designation" />


                                </div>
                                <div class="col-sm-12" style="display:none">
                                    <label>Company Card Background :</label>
                                    <input type="file" class="form-control" accept="image/*" id="company_card_background" name="company_card_background" />
                                </div>
                                <div class="col-sm-12">
                                    <label>Email : <i><span style="color:red;font-size:12px;" id="cmp_email_err" style="color:red"></span></i></label>
                                    <input type="email" class="form-control" placeholder="Company Email (like : abc@gmail.com)" id="company_email" name="company_email" value="" required />


                                </div>
                                <div class="col-sm-12">
                                    <label>Phone No. <i><span style="color:red;font-size:12px;" id="mainphone"></span></i></label>
                                    <input type="text" class="numbers form-control" maxlength="10" placeholder="Company Contact (like : 9876543210)" id="company_contact" value="" name="company_contact" required />



                                </div>
                                <div class="col-sm-12">
                                    <label>WhatsApp No. : <i><span style="color:red;font-size:12px;" id="whatsappphone"></span></i></label>
                                    <input type="text" maxlength="10" minlength="10" class=" numbers2 form-control" placeholder="Company WhatsApp (like : 9876543210)" id="company_whatsapp" value="" name="company_whatsapp" />


                                </div>
                                <div class="col-sm-12">
                                    <div class="form-line">
                                        <label>Company Website URL:</label>
                                        <input type="text" maxlength="255" class="form-control" placeholder="Company Website (like : https://abc.com)" value="" id="company_website" name="company_website" />
                                    </div>
                                </div>
                                <div class="col-sm-12" style="display:none">
                                    <label>Category</label>
                                    <select data-placeholder="Choose Category" class="form-control chosen-select" tabindex="2" name="company_category" id="cate_id"="">
                                        <option value="">Select</option>
                                        <?php
                                        $select_category = $conn->query("SELECT * FROM company_category WHERE category_status='0' ");
                                        while ($select_category_row = $select_category->fetch_assoc()) {
                                            echo '<option value="' . $select_category_row['cate_id'] . '">' . $select_category_row["category"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-12" style="display:none">
                                    <label>Subcategory</label>
                                    <select class="form-control" name="company_subcategory" id="company_subcategory">
                                        <option value="">Choose </option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <!-- End General Information -->
                    <!-- Add Location -->
                    <div class="add-listing-box add-location mrg-bot-25 padd-bot-30 padd-top-25">
                        <div class="listing-box-header">

                            <h3> <i class="ti-location-pin theme-cl" style="font-size:1em;"></i>Add Location</h3>
                            <p>Write Address Information about your Comapany</p>
                        </div>


                        <div class="row mrg-r-10 mrg-l-10">
                            <div class="col-sm-12">
                                <label>Address : <i><span style="color:red;font-size:12px;" id="addressmsg"></span></i></label>
                                <input type="text" class="form-control" placeholder="Enter  Address" id="company_address" name="company_address" value="" />

                            </div>
                            
                            
                            <div class="col-sm-12">
									<label>District :</label>
                                        <input type="text"  class="form-control" placeholder="Add District"  id="company_district" name="company_district"  />
								
								
										</div>
										<div class="col-sm-12">
									<label>State :</label>
                                       
								
								<select onchange="print_city('state', this.selectedIndex);" id="sts" name ="company_state" class="form-control" ></select>
										</div>
										<div class="col-sm-12">
									<label>City :</label>
								        <select id ="state" class="form-control" name="company_city"></select>
                                        <script language="javascript">print_state("sts");</script>
								
										</div>


                            <div class="col-sm-12">
                                <label>Google link for address :</label>
                                <input type="text" class="form-control" placeholder="Enter address url" id="company_add_url" name="company_address_url" />
                               
                                
                            </div>
                        </div>
                    </div>
                    <!-- End Add Location -->
                    <!-- Full Information -->
                    <div class="add-listing-box full-detail mrg-bot-25 padd-bot-30 padd-top-25">
                        <div class="listing-box-header">

                            <h3> <i class="ti-write theme-cl" style="font-size:1em;"></i>Social Details</h3>
                        </div>
                        <div class="row mrg-r-10 mrg-l-10">
                            <div class="col-sm-12">
                                <label><i class="fa fa-facebook mrg-r-5" aria-hidden="true"></i>Facebook Link</label>
                                <input type="text" maxlength="255" class="form-control" placeholder="Company Facebook Link" id="company_facebook" name="company_facebook" />
                            </div>
                            <div class="col-sm-12">
                                <label><i class="fa fa-twitter mrg-r-5" aria-hidden="true"></i>Twitter Link</label>
                                <input type="text" maxlength="255" class="form-control" placeholder="Company Twitter Link" id="company_twitter" name="company_twitter" />
                            </div>
                            <div class="col-sm-12">
                                <label><i class="fa fa-instagram mrg-r-5" aria-hidden="true"></i>Instagram Link</label>
                                <input type="text" maxlength="255" class="form-control" placeholder="Company instagram Link" id="company_instagram" name="company_instagram" />
                            </div>

                            <div class="col-sm-12">
                                <label><i class="fa fa-linkedin-square mrg-r-5" aria-hidden="true"></i>Linked In</label>
                                <input type="text" maxlength="255" class="form-control" placeholder="Company Linkedin Link" id="company_linkedin" name="company_linkedin" />
                            </div>
                            <div class="col-sm-12">
                                <label><i class="fa fa-telegram mrg-r-5" aria-hidden="true"></i>Telegram</label>
                                <input type="text" maxlength="255" class="form-control" placeholder="Company telegram Link" id="company_telegram" name="company_telegram" />
                            </div>


                           <div class="col-sm-12" style="display:none;" id="pr">
                        <input type="submit" class="btn btn-primary" name="company_submit" value="Create Profile" />
                    </div>
                    <div class="col-sm-12" id="pr2">
                        <span id="allerr" style="color:red;"></span><br>
                        <p class="btn btn-primary" id="check">Create Profiles</p>
                    </div>

                        </div>

                    </div>
                   
                </div>
                </form>
            </div>
          </div>
        </div>

      </div>
     <div id="toast"><div id="desc">A notification message..</div></div>
    </section>
    <!-- /.content -->
  </div>

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

<script src="bower_components/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>

<script src="bower_components/ckeditor/ckeditor.js"></script>
<script src="dist/js/demo.js"></script>

<script>
  $(function () {
	CKEDITOR.replace( 'Company_about', {
		} );
  })
</script>

  <script>
            var err = [];
            $('.form-control').keyup(function() {
                runval();
            });
            $('#check').click(function() {
                runval();
            });


            function IsEmail(email) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!regex.test(email)) {
                    return false;
                } else {
                    return true;
                }
            }

            function IsMobile(contact,type) {
                if(type == "m"){
                    contact = contact.replace(/\D/g,'');
                    $('#company_contact').val(contact);
                }else if(type == "w"){
                    contact = contact.replace(/\D/g,'');
                    $('#company_whatsapp').val(contact);
                }
                var regex = /^(\+\d{1,3}[- ]?)?\d{10}$/;
                if (!regex.test(contact)) {
                    return false;
                } else {
                    return true;
                }
            }

             
            // $('#company_email').keyup(function() {

            //     var email = $('#company_email').val();
            //     $('#cmp_email').text(email);


            //     var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            //     if (!emailReg.test(email)) {
            //         // $("#company_email").after('<span>Enter a valid email address.</span>');
            //         $('#cmp_email_err').text('Enter a valid email address.');
            //     } else {
            //         $('#cmp_email_err').text(' ');
            //     }


            // });
            $('#company_website').keyup(function() {
                var web = $('#company_website').val();
                $('#cmp_web').text(web);
            });

            $("#company_logo").change(function() {
                readURL(this);
            });
            $("#company_banner").change(function() {
                readURL2(this);
            });

            $("#company_facebook").change(function() {
                var web = $('#company_facebook').val();
                $('#company_facebook1').attr("href", web);
            });
            $("#company_twitter").change(function() {
                var web = $('#company_twitter').val();
                $('#company_twitter1').attr("href", web);
            });
            $("#company_instagram").change(function() {
                var web = $('#company_instagram').val();
                $('#company_instagram1').attr("href", web);
            });
            $("#company_linkedin").change(function() {
                var web = $('#company_linkedin').val();
                $('#company_linkedin1').attr("href", web);
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#cmp_logo').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            function readURL2(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#cmp_banner').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
 
            $(document).ready(function() {
                $('#cate_id').change(function() {
                    var cate_id = $('#cate_id').val();
                    console.log(cate_id);
                    if (cate_id != '') {

                        $.ajax({
                            url: "select_sub_category.php",
                            method: "POST",
                            data: {
                                cate_id: cate_id
                            },
                            success: function(data) {

                                $('#company_subcategory').html(data);
                            }
                        });
                    } else {
                        $('#company_subcategory').html('<option value="">Select subcategory</option>');
                    }
                });

            });
 
            function runval() {
                // console.log('kl');
                err=[];
                if (!$('#company_name').val()) {
                    err.push('true');
                    $('#company_name_msg').text('Company Name is required');
                } else {
                    var nm = $('#company_name').val();
                    $('#company_name_msg').text('');
                    $('#cmp_nm').html('<u>' +nm+ '</u>');
                }
                if (!$('#web_company_name').val()) {
                    err.push('true');
                    $('#web_company_name_msg').text('Company web name is required');
                } else {
                    var str = $('#web_company_name').val();
                    // str = str.replace('--', '-');
                    str = str.replace(/\W$/, '-');
                    $('#web_company_name').val(str);
                    
                    $('#web_company_name_msg').text('');
                     $.ajax({
                            url: "../company/getvalue.php",
                            method: "POST",
                            data: {
                                nm: str
                            },
                            success: function(data) {
                                 console.log(data)
                                if(data == 'Y'){
                                    $('#web_company_name_msgs').text('Username is Available');
                                    $('#web_company_name_msg').text('');
                                }else{
                                    err.push('true');
                                    $('#web_company_name_msg').text('Username Not Available');
                                    $('#web_company_name_msgs').text('');
                                }
                                
                            }
                        });

                }
                var email = $('#company_email').val();
                if (!$('#company_email').val()) {
                    err.push('true');
                    $('#cmp_email_err').text('Company Email is required');
                    $('#cmp_email').text(email);
                } else if (IsEmail(email) == false) {
                    err.push('true');
                    $('#cmp_email_err').text('Company Email is Invalid ');
                    $('#cmp_email').text(email);
                } else {
                    $.ajax({
                            url: "search_email.php",
                            method: "POST",
                            data: {
                                contact: email
                            },
                            success: function(data) {
                                 
                                if(data == ''){
                                    
                                }else{
                                    err.push('true');
                                     $('#cmp_email_err').text(data);
                                }
                                
                            }
                        });
                    $('#cmp_email_err').text('');
                    $('#cmp_email').text(email);
                }

                var contact = $('#company_contact').val();
                if (!$('#company_contact').val()) {
                    err.push('true');
                    $('#cmp_main').text(contact);
                    $('#mainphone').text('Company Contact is required');
                } else if (IsMobile(contact,"m") == false) {
                    err.push('true');
                    $('#mainphone').text('Company Contact is Invalid. Should contain 10 digit contact no.');
                    $('#cmp_main').text(contact);

                } else {
                     $.ajax({
                            url: "search_contact.php",
                            method: "POST",
                            data: {
                                contact: contact
                            },
                            success: function(data) {
                                 
                                if(data == ''){
                                    
                                }else{
                                    err.push('true');
                                    $('#mainphone').text(data);
                                }
                                
                            }
                        });
                    // $('#mobilecall').text(contact);
                    $('#cmp_main').text(contact);
                    $('#mainphone').text('');
                }

                
                var whatsappcontact = $('#company_whatsapp').val();
                if (!$('#company_whatsapp').val()) {
                    err.push('true');
                    $('#cmp_alt').text(whatsappcontact);
                    $('#whatsappphone').text('Company Whatsapp is required');
                } else if (IsMobile(whatsappcontact,"w") == false) {
                    err.push('true');
                    $('#whatsappphone').text('Company Whatsapp is Invalid. Should contain 10 digit Whatsapp no.');
                     $('#cmp_alt').text(whatsappcontact);

                } else {
                    $('#company_whatsapp1').attr("href", "https://api.whatsapp.com/send?phone=" + whatsappcontact + "&amp;text=Hi there! I have a question :)");
                    $('#cmp_alt').text(whatsappcontact);
                     
                    $('#whatsappphone').text('');
                }

                if (!$('#company_address').val()) {
                    err.push('true');
                    $('#addressmsg').text('Company Address is required');
                }else{ 
                    var add = $('#company_address').val();
                    $('#addressmsg').text(' ');
                    $('#cmp_add').text(add);
                }
                var co = jQuery.inArray('true', err );
                // console.log(err);
                if (co >= 0) {
                    $('#pr2').show();
                    $('#pr').hide();
                    $('#allerr').text('Please fill all details');

                } else {
                    $('#pr').show();
                    $('#pr2').hide();
                    $('#allerr').text(' ');
                }
            }
            // $('#company_name').keyup(function() {
            //     var nm = $('#company_name').val();
            //     $('#cmp_nm').text(nm);
            // });
            $('#company_person_nm').keyup(function() {
                var nm = $('#company_person_nm').val();
                $('#cmp_per_nm').html('<u>'+nm+'</u>');
            });
            $('#company_designation').keyup(function() {
                var nm = $('#company_designation').val();
                $('#cmp_desig').text('('+nm+')');
            });
            $('#company_tagline').keyup(function() {
                var tag = $('#company_tagline').val();
                $('#cmp_tag').text('(' + tag +')');
            });
            // $('#company_address').keyup(function() {
            //     var add = $('#company_address').val();
            //     $('#cmp_add').text(add);
            // });
            // $('#company_contact').keyup(function() {
            //     var main = $('#company_contact').val();
            //     var mobile = $('#company_contact');
            //     var goodColor = "#0C6";
            //     var badColor = "#FF9B37";

            //     // if(main.length!=10){

            //     //     mobile.style.backgroundColor = badColor;
            //     //     message.style.color = badColor;
            //     //     message.innerHTML = "required 10 digits, match requested format!"
            //     // }}
            //     $('#cmp_main').text(main);
            // });
            // $('#company_whatsapp').keyup(function() {
            //     var app = $('#company_whatsapp').val();
            //     $('#cmp_alt').text(app);
            // });
            // $('#mainphone').keyup(function() {
            //     var mobile = $('#mainphone').val();
            //     $('#mobilecall').text(main);
            // });
        </script>
</body>
</html>
