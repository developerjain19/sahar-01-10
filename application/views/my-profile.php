<?php include 'includes/header-link.php'; ?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5eG5oC5cOUcQ3qPkjPE7vlmnrTOmI05A&sensor=false&libraries=places"></script>
<div id="main-wrapper">
	<style>
		.theme-btn-light:hover,
		.btn-light:focus {
			background-color: #fff !important;
			color: #000 !important;
			outline: none !important;
			border: none !important;
		}

		.bootstrap-select .dropdown-toggle:focus,
		.bootstrap-select>select.mobile-device:focus+.dropdown-toggle {
			outline: none !important;
		}
	</style>


	<?php include 'includes/header2.php' ?>

	<?php include 'includes/dash-top-header.php' ?>

	<style>
		.theme-btn-light:hover,
		.btn-light:focus {
			background-color: #fff !important;
			color: #000 !important;
			outline: none !important;
			border: none !important;
		}

		.bootstrap-select .dropdown-toggle:focus,
		.bootstrap-select>select.mobile-device:focus+.dropdown-toggle {
			outline: none !important;
		}
	</style>




	<div class="goodup-dashboard-wrap gray px-4 py-5 row mobile_author">
		<?php include 'includes/dash-side-header.php' ?>
		<div class="goodup-dashboard-content px-4 py-5 col-xl-9 col-lg-12 col-md-12 col-sm-12">
			<div class="dashboard-tlbar d-block mb-5">
				<div class="row">
					<div class="colxl-12 col-lg-12 col-md-12">
						<h1 class="ft-medium"><?= sessionId('sahar') ? "My" : "Complete Your"; ?> Profile</h1>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
								<li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
								<li class="breadcrumb-item"><a href="#" class="theme-cl">My Profile</a></li>
							</ol>
						</nav>
					</div>
				</div>
			</div>

			<div class="dashboard-widg-bar d-block">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<form method="POST" id="myform" enctype="multipart/form-data">
							<?php if ($msg = $this->session->flashdata('msg')) :
								$msg_class = $this->session->flashdata('msg_class') ?>
                          
                           <?php
                                        if ($this->session->has_userdata('imgmsg')) {
                                            echo $this->session->userdata('imgmsg');
                                            $this->session->unset_userdata('imgmsg');
                                        }

                                        if ($this->session->has_userdata('vermsg')) {
                                            echo $this->session->userdata('vermsg');
                                            $this->session->unset_userdata('vermsg');
                                        }
                                        ?>
                                       
								<div class="row">
									<div class="col-lg-12">
										<div class="alert  <?= $msg_class; ?>"><?= $msg; ?></div>
									</div>
								</div>
							<?php
								$this->session->unset_userdata('msg');
							endif; ?>

							<input type="hidden" name="rgid" value="<?= sessionId('login_user_id') ?>">

							<div class="submit-form">
								<!-- Listing Info -->
								<div class="dashboard-list-wraps bg-white rounded mb-4">
									<div class="dashboard-list-wraps-head br-bottom py-3 px-3">
										<div class="dashboard-list-wraps-flx">
											<h4 class="mb-0 ft-medium fs-md"><i class="fa fa-file me-2 theme-cl fs-sm"></i>Company Info</h4>
										</div>
									</div>

									<div class="dashboard-list-wraps-body py-3 px-3">
										<div class="row">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Company Name</label>
													<input type="text" class="form-control rounded" placeholder="Enter your company name" value="<?= (($datacomrow != '') ? $datacomrow['0']['company_name'] : '') ?>" name="company_name" required />
												</div>
											</div>
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Company Tagline</label>
													<input type="text" class="form-control rounded" placeholder="Enter Your company tagline " name="company_tagline" value="<?= (($datacomrow != '') ? $datacomrow['0']['company_tagline'] : '') ?>" required />
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Your Name</label>
													<input type="text" class="form-control rounded" placeholder="Enter your name " name="company_person" value=" <?= (($datacomrow != '') ? $datacomrow['0']['company_person'] : sessionId('login_user_name')) ?>" required />
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Your Designation</label>
													<input type="text" class="form-control rounded" placeholder="Enter your destignation" name="company_designation" value="<?= (($datacomrow != '') ? $datacomrow['0']['company_designation'] : '') ?>" required />
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Mobile</label>
													<input type="text" class="form-control rounded" placeholder="Enter your number" name="company_contact" maxlength="10" required value="<?= (($datacomrow != '') ? $datacomrow['0']['company_contact'] : sessionId('login_user_contact')) ?>" readonly />
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Email</label>
													<input type="text" class="form-control rounded" placeholder="Enter your email" name="company_email" value="<?= (($datacomrow != '') ? $datacomrow['0']['company_email'] : sessionId('login_user_emailid')) ?>" required />
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Whatsapp</label>
													<input type="text" class="form-control rounded" placeholder="Enter your whatsapp number" name="company_whatsapp" value="<?= (($datacomrow != '') ? $datacomrow['0']['company_whatsapp'] : '') ?>" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required />
												</div>
											</div>
											<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Website (Optional)</label>
													<input type="text" class="form-control rounded" placeholder="Your website link" value="<?= (($datacomrow != '') ? $datacomrow['0']['company_website_url'] : '') ?>" name="company_website_url" />
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Location Info -->
								<div class="dashboard-list-wraps bg-white rounded mb-4">
									<div class="dashboard-list-wraps-head br-bottom py-3 px-3">
										<div class="dashboard-list-wraps-flx">
											<h4 class="mb-0 ft-medium fs-md"><i class="fas fa-map-marker-alt me-2 theme-cl fs-sm"></i>Company Category</h4>
										</div>
									</div>

									<div class="dashboard-list-wraps-body py-3 px-3">
										<div class="row">
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group search-select_box sagar" id="sagar">
													<label class="mb-1">Category</label>

													<select class="form-control" data-live-search="true" name="company_category" id="company_category" required>
														<option>Select Category</option>
														<?php
														if (!empty($category)) {
															foreach ($category as $cat_row) {

														?>
																<option value="<?= $cat_row['cate_id'] ?>" <?php if ($datacomrow != '') { ?> <?= (($datacomrow['0']['company_category'] ==  $cat_row['cate_id']) ? 'Selected' : '') ?> <?php } ?>>
																	<?= $cat_row['category'] ?></option>
														<?php
															}
														}
														?>
													</select>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group sagar">
													<label class="form-label">Sub Category <span style="color:red;font-size:12px;" id="company_city_msg"></span></label>




													<select name="company_subcategory" class="form-control" id="company_subcategory" required>
														<option value="">Select Sub Category</option>
													</select>


												</div>
											</div>
                                          <p class=""> If you didn’t find your category or sub category,  Please Chat with us on <a target="_blank" href="https://api.whatsapp.com/send?phone=+917419272427&text=Hi, I Want to add my category" class="commonbutton text-success"><i class="lni lni-whatsapp"></i> Whatsapp</a></p>
										</div>
									</div>
								</div>




								<!-- Image & Gallery Option -->
								<div class="dashboard-list-wraps bg-white rounded mb-4">
									<div class="dashboard-list-wraps-head br-bottom py-3 px-3">
										<div class="dashboard-list-wraps-flx">
											<h4 class="mb-0 ft-medium fs-md"><i class="fa fa-camera me-2 theme-cl fs-sm"></i>Image (Optional)</h4>
										</div>
									</div>

									<div class="dashboard-list-wraps-body py-3 px-3">
										<div class="row">
											<!-- Logo -->
											<div class="col-lg-6 col-md-6">
												<div class="form-group">
													<label for="formFileLg" class="form-label">Upload Company Logo (Only: JPG PNG and JPEG)</label>



													<?php
													if ($datacomrow != '') {
													?>
														<input type="file" class="form-control rounded" name="company_logo_temp" accept=".png,.jpg,.jpeg" />
														<input type="hidden" class="form-control" name="company_logo" value="<?= $datacomrow[0]['company_logo']  ?>" />

														<img src="<?= base_url() ?>uploads/company/<?= $datacomrow[0]['company_logo'] ?>" class="logo-preview" alt="company-logo">
													<?php
													} else {
													?>
														<input class="form-control rounded" type="file" name="company_logo" accept=".png,.jpg,.jpeg">
													<?php }
													?>

												</div>
											</div>
											<div class="col-lg-6 col-md-6">
                                       
												<div class="form-group">
													<label for="formFileLg" class="form-label">Upload Company Banner (Only: JPG PNG and JPEG)</label>
													<?php
													if ($datacomrow != '') {
													?>
														<input type="file" class="form-control rounded" name="company_banner_temp" accept="image/x-png,image/jpg,image/jpeg" />
														<input type="hidden" class="form-control" name="company_banner" value="<?= $datacomrow[0]['company_banner']  ?>" />

														<img src="<?= base_url() ?>uploads/company/<?= $datacomrow[0]['company_banner'] ?>" class="logo-preview" alt="company-logo">
													<?php
													} else {
													?>
														<input class="form-control rounded" type="file" name="company_banner" accept="image/x-png,image/jpg,image/jpeg">
													<?php }
													?>
												</div>
											</div>

										</div>
									</div>
								</div>

								<!-- Location Info -->
								<div class="dashboard-list-wraps bg-white rounded mb-4">
									<div class="dashboard-list-wraps-head br-bottom py-3 px-3">
										<div class="dashboard-list-wraps-flx">
											<h4 class="mb-0 ft-medium fs-md"><i class="fas fa-map-marker-alt me-2 theme-cl fs-sm"></i>Location Info</h4>
										</div>
									</div>

									<div class="dashboard-list-wraps-body py-3 px-3">
										<div class="row">
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group sagar">
													<label class="mb-1">State</label>

													<select class="form-control" name="company_state" id="state" placeholder="select" required>
														<option>Select State</option>
														<?php
														if (!empty($state_list)) {
															foreach ($state_list as $state_row) {
														?>
																<option value="<?= $state_row['state_id'] ?>" <?php if ($datacomrow != '') { ?> <?= (($datacomrow['0']['company_state'] ==  $state_row['state_id']) ? 'Selected' : '') ?> <?php } ?>>

																	<?= $state_row['state_name'] ?></option>
														<?php
															}
														}
														?>
													</select>



												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group sagar">
													<label class="form-label">City <span style="color:red;font-size:12px;" id="company_city_msg"></span></label>





													<select name="company_city" class="form-control" id="city" required>
														<option value="">Select State first</option>
													</select>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Address<span class="text-danger"> (Add full address for map location) </span></label>
													<input type="text" class="form-control rounded heighthm" id="txtPlaces" placeholder="Enter Your address here" value="<?= (($datacomrow != '') ? $datacomrow['0']['company_address'] : '') ?>" name="company_address" required />
													<datalist id="browsers"></datalist>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1">Pin Code</label>
													<input type="tel" class="form-control rounded" placeholder="Pin code" value="<?= (($datacomrow != '') ? $datacomrow['0']['pin_code'] : '') ?>" name="pin_code" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required />
												</div>
											</div>

										</div>
									</div>
								</div>




								<div class="dashboard-list-wraps bg-white rounded mb-4">
									<div class="dashboard-list-wraps-head br-bottom py-3 px-3">
										<div class="dashboard-list-wraps-flx">
											<h4 class="mb-0 ft-medium fs-md"><i class="fa fa-user-friends me-2 theme-cl fs-sm"></i>Social Links (Optional)</h4>
										</div>
									</div>

									<div class="dashboard-list-wraps-body py-3 px-3">
										<div class="row">
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1"><i class="ti-facebook theme-cl me-1"></i>Facebook</label>

													<input type="text" class="form-control rounded" placeholder="https://www.facebook.com/sahardirectory/" value="<?= (($datacomrow != '') ? $datacomrow['0']['company_facebook'] : '') ?>" name="company_facebook" />

												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1"><i class="ti-twitter theme-cl me-1"></i>Twitter</label>
													<input type="text" class="form-control rounded" placeholder="https://twitter.com/SaharDirectory/" value="<?= (($datacomrow != '') ? $datacomrow['0']['company_twitter'] : '') ?>" name="company_twitter" />

												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1"><i class="ti-instagram theme-cl me-1"></i>Instagram</label>

													<input type="text" class="form-control rounded" placeholder="https://www.instagram.com/sahardirectory/" value="<?= (($datacomrow != '') ? $datacomrow['0']['company_instagram'] : '') ?>" name="company_instagram" />

												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1"><i class="ti-linkedin theme-cl me-1"></i>Linkedin</label>

													<input type="text" class="form-control rounded" placeholder="https://www.linkedin.com/company/sahar-directory/" value="<?= (($datacomrow != '') ? $datacomrow['0']['company_linkedin'] : '') ?>" name="company_linkedin" />

												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1"><i class="ti-youtube theme-cl me-1"></i>Youtube</label>

													<input type="text" class="form-control rounded" placeholder="https://www.youtube.com/SaharDirectory" value="<?= (($datacomrow != '') ? $datacomrow['0']['company_youtube'] : '') ?>" name="company_youtube" />

												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
												<div class="form-group">
													<label class="mb-1"><i class="icofont-telegram theme-cl me-1"></i>Telegram</label>

													<input type="text" class="form-control rounded" placeholder="https://www.telegram.com/sahardirectory" value="<?= (($datacomrow != '') ? $datacomrow['0']['company_telegram'] : '') ?>" name="company_telegram" />

												</div>
											</div>
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
												<div class="form-group">
													<button type="submit" class="btn theme-bg rounded text-light">Update Profile</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>

	</div>





</div>

<script>
	$('input').attr('autocomplete', 'off');

	$(function() {
		$("input[name='pin_code']").on('input', function(e) {
			$(this).val($(this).val().replace(/[^0-9]/g, ''));
		});
	});

	$(function() {
		$("input[name='company_whatsapp']").on('input', function(e) {
			$(this).val($(this).val().replace(/[^0-9]/g, ''));
		});
	});
</script>
<script>
	$(document).ready(function() {
		load_defaults();

		function load_defaults() {

			var state = $('#state').val();

			//  	alert(state);
			$.ajax({
				method: "POST",
				url: "<?= base_url('home/getcity') ?>",
				data: {
					state: state
				},
				success: function(response) {
					console.log(response);
					$('#city').html(response);
				}
			});

			var company_category = $('#company_category').val();

			$.ajax({
				method: "POST",
				url: "<?= base_url('home/select_subcat') ?>",
				data: {
					company_category: company_category
				},
				success: function(datas) {
					// console.log(response);
					$('#company_subcategory').html(datas);
				}
			});

		}

		$(document).on('change', '#state', function() {
			load_defaults();
		});

		$(document).on('change', '#company_category', function() {
			load_defaults();
		});

	});


	var _URL = window.URL || window.webkitURL;
	$("#bannerfile").change(function(e) {
		var file, img;
		if ((file = this.files[0])) {
			img = new Image();
			var objectUrl = _URL.createObjectURL(file);
			img.onload = function() {
				if (this.width == '1586' && this.height == '375') {} else {
					alert('Please upload banner with given width and height');
					// document.getElementById("bannermsg").innerHTML='<span class="text-danger">Banner Size: W - 1586px, H - 375px.Make sure to fulfill banner size to make your profile more precise.</span>';

				}
				// alert(this.width + " " + this.height);
				_URL.revokeObjectURL(objectUrl);
			};
			img.src = objectUrl;
		}
	});
</script>
<a id="tops-button" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

<?php include 'includes/footer-bottom.php' ?>

</div>

<?php include 'includes/footer-link.php' ?>

<script>
	window.setTimeout(function() {
		$(".alert").fadeTo(200, 0).slideUp(200, function() {
			$(this).remove();
		});
	}, 4000);


	if (window.history.replaceState) {
		window.history.replaceState(null, null, window.location.href);
	}


	CKEDITOR.replace('editor1');
</script>

<script>
	google.maps.event.addDomListener(window, 'load', function() {
		var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces'));
		google.maps.event.addListener(places, 'place_changed', function() {
			var place = places.getPlace();
			var address = place.formatted_address;
			var latitude = place.geometry.location.lat();
			var longitude = place.geometry.location.lng();

		});
	});
</script>

</body>


</html>