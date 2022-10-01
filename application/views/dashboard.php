<?php include 'includes/header-link.php';
?>


<div id="main-wrapper">


	<?php include 'includes/header2.php' ?>

	<?php include 'includes/dash-top-header.php' ?>
	<div class="row gray px-4 py-5">
		<?php include 'includes/dash-side-header.php' ?>

		<div class="goodup-dashboard-content col-sm-8 ">
			<div class="dashboard-tlbar d-block mb-5">
				<div class="row">
					<div class="colxl-12 col-lg-12 col-md-12">
						<h1 class="ft-medium">Hello, <?= $profiledata[0]['name']; ?> </h1>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item text-muted"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item"><a href="#" class="theme-cl">Dashboard</a></li>
								
							</ol>
						</nav>
					</div>
				</div>
			</div>

			<div class="dashboard-widg-bar d-block">
				<div class="row">
					<div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
						<div class="dsd-boxed-widget py-5 px-4 bg-danger rounded">
							<h2 class="ft-medium mb-1 fs-xl text-light count"><?= $company_count ?></h2>
							<p class="p-0 m-0 text-light fs-md">Active Listings</p>
							<i class="lni lni-empty-file"></i>
						</div>
					</div>
					<div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
						<div class="dsd-boxed-widget py-5 px-4 bg-success rounded">
							<h2 class="ft-medium mb-1 fs-xl text-light count"><?= $vcard_count[0]['website_views'] ?></h2>
							<p class="p-0 m-0 text-light fs-md">Vcard Views</p>
							<i class="lni lni-eye"></i>
						</div>
					</div>
					<div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
						<div class="dsd-boxed-widget py-5 px-4 bg-warning rounded">
							<h2 class="ft-medium mb-1 fs-xl text-light count"><?= $review_count ?></h2>
							<p class="p-0 m-0 text-light fs-md">Total Reviews</p>
							<i class="lni lni-comments"></i>
						</div>
					</div>

				</div>

			</div>

			<div class="row">

				<!-- Area Chart -->
				<div class="col-md-12 col-sm-12">
					<div class="dash-card">
						<div class="dash-card-header">
							<h4 class="mb-0">Actions</h4>
						</div>
						<div class="dash-card-body overflow-xs" style="padding: 10px;">
						    <div class="btn_wrapper">
						        <a href="<?= base_url('product-list') ?>" class="action_button">Add Product/Service</a>
						        <a href="<?= base_url('choose-vcard') ?>" class="action_button">Vcard Theme</a>
						        <a href="<?= base_url('bank-details') ?>" class="action_button">Bank Details</a>
						        <a href="<?= base_url('gallery') ?>" class="action_button">Gallery</a>
						        <a href="<?= base_url('section-list') ?>" class="action_button">Sections</a>
						        <a href="<?= base_url('enquiry') ?>" class="action_button">Enquiry</a>
						        <a href="<?= base_url('reviews') ?>" class="action_button">Reviews</a>
						        <a href="<?= base_url('my-profile') ?>" class="action_button">My Profile</a>
						    </div>
						</div>
					</div>
				</div>

				<!-- Donut Chart -->


			</div>
			<div class="row">

				<!-- Area Chart -->
				<div class="col-md-12 col-sm-12">
					<div class="dash-card">
						<div class="dash-card-header">
							<h4 class="mb-0">Enquiry</h4>
						</div>
						<div class="dash-card-body overflow-xs" style="padding: 10px;  overflow-x: scroll;">
						<table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">S no.</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Number</th>
                                            <th scope="col">Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        if ($enquiry) {
                                            foreach ($enquiry as $row) {
                                                $i = $i + 1;
                                        ?>
                                                <tr>
                                                    <th scope="row"><?= $i ?></th>
                                                    <td><?= ($row['type'] == 0)? "Company" : "Vcard/website" ?></td>
                                                    <td><?= $row['name'] ?></td>
                                                    <td><?= $row['number'] ?></td>
                                                    <td><?= $row['msg'] ?></td>
                                                </tr>

                                        <?php
                                            }
                                        }
                                        ?>



                                    </tbody>
                                </table>
						</div>
					</div>
				</div>

				<!-- Donut Chart -->


			</div>



		</div>

	</div>


	<a id="tops-button" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>



	<?php include 'includes/footer-bottom.php' ?>

</div>
<!-- All Jquery -->
<?php include 'includes/footer-link.php' ?>