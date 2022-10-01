<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta Data -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title ?></title>
	<!-- Favicon -->

	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/images/favicon.png">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
	<link href="<?= base_url() ?>assets/js/plugins/morris.js/morris.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />

	<!-- Custom CSS -->
	<link href="<?= base_url() ?>assets/css/styles.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/css/plugins/author.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <style>
        .theme-btn-light:hover, .btn-light:focus{
            background-color: #fff !important;
            color: #000 !important;
            outline: none !important;
            border: none !important;
        }

        .bootstrap-select .dropdown-toggle:focus, .bootstrap-select>select.mobile-device:focus+.dropdown-toggle{
            outline: none !important;
        }
    </style>
</head>

<body>


<div id="main-wrapper">


    <?php include 'includes/header2.php' ?>

    <?php include 'includes/dash-top-header.php' ?>

    <div class="goodup-dashboard-wrap gray px-4 py-5">
        <?php include 'includes/dash-side-header.php' ?>
        <div class="goodup-dashboard-content">
            <div class="dashboard-tlbar d-block mb-5">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <h1 class="ft-medium"><?= $tag ?> Product/Service</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                                <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="theme-cl"><?= $tag ?> Product/Service</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">
                <div class="row">
                    <div class="col-xl-12 col-lg-2 col-md-12 col-sm-12">

                        <form method="post" class="row" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-1">Item Name</label>
                                        <input type="text" class="form-control rounded" name="product_title" value="<?= (($tag == 'Edit') ? $product_list['0']['product_title'] : '') ?>" placeholder="Enter name" />
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12">
                                    <div class="form-group sagar">
                                        <label class="mb-1">Sub Category</label>
                                        <select id="product_subcate" name="product_subcate" id="browser" class="form-control" placeholder="Select Sub Category" data-live-search="true" requierd>
                                            <option disabled selected>Select Category</option>
                                            <?php
                                            foreach ($subcate as $row) {
                                            ?>
                                                <option value="<?= $row['subcategory'] ?>" <?php if ($tag == 'Edit') { ?> <?= (($row['subcategory'] == $product_list['0']['product_subcate'] ? 'selected' : '')) ?> <?php } ?>>
                                                    <?= $row['subcategory'] ?></option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-1">Image</label>

                                        <?php if ($tag == 'Edit') { ?>
                                            <input type="file" class="form-control rounded" name="product_image_temp" accept=".png,.jpg,.jpeg" />
                                            <input type="hidden" class="form-control" name="product_image" value="<?= $product_list[0]['product_image']  ?>" />
                                            <img src="<?= base_url() ?>uploads/product/<?= $product_list[0]['product_image'] ?>" width="100px" />
                                        <?php
                                        } else {
                                        ?>
                                            <input type="file" class="form-control rounded" name="product_image" accept=".png,.jpg,.jpeg" />
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-1">Price</label>
                                        <input type="text" class="form-control rounded" placeholder="Ex: ₹399" name="product_price" value="<?= (($tag == 'Edit') ? $product_list['0']['product_price'] : '') ?>" />
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-1">Offer Price</label>
                                        <input type="text" class="form-control rounded" placeholder="Ex: ₹350" name="offer_price" value="<?= (($tag == 'Edit') ? $product_list['0']['offer_price'] : '') ?>" />
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-1">discount Percent</label>
                                        <input type="number" class="form-control rounded" placeholder="Ex: 10%" name="price_discount" value="<?= (($tag == 'Edit') ? $product_list['0']['price_discount'] : '') ?>" />
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="mb-1">About Item</label>
                                        <textarea class="form-control rounded ht-80" name="product_description" placeholder="Describe your Product"><?= (($tag == 'Edit') ? $product_list['0']['product_description'] : '') ?></textarea>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <br>
                                    <div class="form-group">
                                        <button type="submit" class="btn theme-bg text-light rounded"><?= (($tag == 'Edit') ? 'Save Changes' : 'Add Product/Service') ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <a id="tops-button" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>



    <?php include 'includes/footer-bottom.php' ?>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.sagar select').selectpicker();
		});

		$(document).on('change', '#state', function() {
			var state = $(this).val();
			$.ajax({
				method: "POST",
				url: "<?= base_url('home/getcity') ?>",
				data: {
					state: state
				},
				success: function(response) {
					// console.log(response);
					$('#city').html(response);
				}
			});
		});

		$(document).on('change', '#company_category', function() {
			var company_category = $(this).val();
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
		});



		Dropzone.options.singleLogo = {
			maxFiles: 1,
			accept: function(file, done) {
				console.log("uploaded");
				done();
			},
			init: function() {
				this.on("maxfilesexceeded", function(file) {
					alert("No more files please!");
				});
			}
		};

		Dropzone.options.featuredImage = {
			maxFiles: 1,
			accept: function(file, done) {
				console.log("uploaded");
				done();
			},
			init: function() {
				this.on("maxfilesexceeded", function(file) {
					alert("No more files please!");
				});
			}
		};

		Dropzone.options.gallery = {
			accept: function(file, done) {
				console.log("uploaded");
				done();
			},
			init: function() {
				this.on("maxfilesexceeded", function(file) {
					alert("No more files please!");
				});
			}
		};
	</script>
	<!-- ============================================================== -->
	<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/js/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/js/slick.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url() ?>../assets/js/dropzone.js"></script>
	<script src="<?= base_url() ?>assets/js/counterup.js"></script>
	<script src="<?= base_url() ?>assets/js/lightbox.js"></script>
	<script src="<?= base_url() ?>assets/js/moment.min.js"></script>
	<script src="<?= base_url() ?>assets/js/daterangepicker.js"></script>
	<script src="<?= base_url() ?>assets/js/lightbox.js"></script>
	<script src="<?= base_url() ?>assets/js/jQuery.style.switcher.js"></script>
	<script src="<?= base_url() ?>assets/js/custom.js"></script>


	<!-- Morris.js charts -->
	<script src="<?= base_url() ?>assets/js/plugins/raphael/raphael.min.js"></script>
	<script src="<?= base_url() ?>assets/js/plugins/morris.js/morris.min.js"></script>

	<!-- Custom Chart JavaScript -->
	<script src="<?= base_url() ?>assets/js/plugins/dashboard-2.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

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

</body>


</html>