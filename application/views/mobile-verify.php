<?php include 'includes/header-link.php' ?>
<div id="main-wrapper">


	<!-- Start Navigation -->
	<?php include 'includes/header2.php' ?>
	<!-- End Navigation -->

	<section class="gray">
		<div class="container">
			<div class="row align-items-start justify-content-center">
				<div class="col-xl-5 col-lg-8 col-md-12">

					<div class="signup-screen-wrap">
						<div class="signup-screen-single">
							<div class="text-center mb-4">
								<h4 class="m-0 ft-medium">Please enter your Phone number to get OTP</h4>
							</div>
							 <p><?php
                            if ($this->session->has_userdata('forget')) {
                                echo $this->session->userdata('forget');
                                $this->session->unset_userdata('forget');
                            }
                            ?>
                        </p>
							<?php
							echo $this->session->userdata('loginError');
							$this->session->unset_userdata('loginError');
							?>
							<form class="submit-form" action="" method="POST">
								<div class="form-group">
									<label class="mb-1">Your Registered Phone Number</label>
									<input type="tel" class="form-control" name="mobile" placeholder="" maxlength="10" required>
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-md full-width theme-bg text-light rounded ft-medium" value="Verify" />
								</div>
								
								<div class="form-group text-center mt-4 mb-0">
									<p class="mb-0">You Don't have any account? <a href="<?= base_url('signup') ?>" class="ft-medium text-success">Sign Up</a></p>
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<?php include 'includes/footer.php' ?>

</div>






<script>
	$('input').attr('autocomplete', 'off');

	$(function() {
		$("input[name='mobile']").on('input', function(e) {
			$(this).val($(this).val().replace(/[^0-9]/g, ''));
		});
	});
	
</script>

<?php include 'includes/footer-link.php' ?>