<?php
	$this->load->view('includes/header-plan-apply.php');
?>

<section class="fullscreen background-white">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12 text-center m-b-30">
				<div class="card border-2 border-secondary shadow-none">
					<div class="card-body">
						<!-- START : SUCCESS -->
						<?php if($status == "true") { ?>
							<div class="m-t-30 m-b-30">
								<h1 class="icon pulse infinite text-success m-0" data-animate="pulse infinite"><i class="icon-check-circle"></i></h1>
								<h2 class="text-success">Congratulations!</h2>
								<p>Your application has been successfully submitted. Our company executive call you back soon!</p>

								<a href="<?php echo site_url(); ?>" class="btn btn-primary btn-sm m-t-10 text-uppercase">Go to Homepage</a>
							</div>
						<?php } ?>
						<!-- END : SUCCESS -->

						<!-- START : FAIL -->
						<?php if($status == "false") { ?>
							<div class="m-t-30 m-b-30">
								<h1 class="icon pulse infinite text-danger m-0" data-animate="pulse infinite"><i class="icon-x-circle"></i></h1>
								<h2 class="text-danger">Payment Unsuccessful</h2>
								<p>Your special membership card offer payment process has failed. Please try again. If you have any questions you can contact on our customer care number.</p>
								
								<a href="<?php echo site_url('superoffer'); ?>" class="btn btn-primary btn-sm m-t-10 text-uppercase">Try another payment method</a>
							</div>
						<?php } ?>
						<!-- END : FAIL -->
					</div>
				</div>

			</div>

		</div>
	</div>
</section>

<?php
	$this->load->view('includes/footer-plan-apply.php');
?>