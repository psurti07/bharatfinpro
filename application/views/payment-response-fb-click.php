<?php
$this->load->view('includes/header-apply.php');

if ($responsedata['loantype'] == 11) {
	$loantype = "Personal Loan";
} else if ($responsedata['loantype'] == 12) {
	$loantype = "Business Loan";
} else {
	$loantype = "Loan";
}
?>

<section class="fullscreen">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card border-2 border-primary">
					<div class="card-body text-center">
						<?php if ($responsedata['status'] == "true") { ?>
							<!-- START : SUCCESS -->
							<h1 class="icon pulse infinite text-success m-0" data-animate="pulse infinite"><i
									class="icon-check-circle "></i></h1>
							<h2 class="text-success">Congratulations!</h2>
							<p>Your <?php echo $loantype; ?> application has been successfully submmited. <br />Please check
								your email and submit required documents and company executive call you back soon!</p>
							<p><small><strong>In case you've any query or issue, you can raise a request here: <a
											href="<?php echo site_url('support/raise_request'); ?>"
											class="hover text-dark">Click Here</a></strong></small></p>

							<p id="countdownMessage"></p>
							<a href="<?php echo site_url('customer/login'); ?>" id="autoClickButton"
								class="btn btn-primary btn-sm text-uppercase">Login Now</a>


							<!-- END : SUCCESS -->
						<?php } ?>

						<?php if ($responsedata['status'] == "false") { ?>
							<!-- START : FAIL -->
							<h1 class="icon pulse infinite text-danger m-0" data-animate="pulse infinite"><i
									class="icon-x-circle "></i></h1>
							<h2 class="text-danger">Payment Unsuccessful</h2>
							<p>Your loan application payment process has failed. Please try again. <br /> If you have any
								questions you can contact on our customer care number.</p>

							<a href="<?php echo site_url('cardoffer'); ?>"
								class="btn btn-primary btn-sm m-t-10 text-uppercase">Go to Homepage</a>
							<!-- END : FAIL -->
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	<?php if ($responsedata['status'] == "true") { ?>
		document.addEventListener('DOMContentLoaded', function () {
			const loginButton = document.getElementById('autoClickButton');
			const countdownMessage = document.getElementById('countdownMessage');

			if (localStorage.getItem('buttonClicked')) {
				loginButton.classList.add('disabled');
				window.location.href = '<?php echo site_url('customer/login'); ?>';
			} else {
				loginButton.classList.add('disabled');

				let countdown = 10;

				const interval = setInterval(function () {
					countdownMessage.textContent = `Redirecting in ${countdown} seconds...`;
					countdown--;

					if (countdown < 0) {
						clearInterval(interval);
						window.location.href = '<?php echo site_url('customer/login'); ?>';
					}
				}, 1000);

				localStorage.setItem('buttonClicked', 'true');
			}
		});
	<?php } ?>
</script>

<?php
$this->load->view('includes/footer-apply.php');
?>
