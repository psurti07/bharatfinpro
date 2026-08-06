<?php
$this->load->view('includes/header-apply.php');
?>

<section class="background-light-green p-t-20">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 pb-4 text-center">
				<h2>Digital
					<?php echo $userdetails['loanname']; ?> Application Process
				</h2>
				<p>Your Instant Pre-Approved Loan Offer is Few Steps Away!</p>

				<div class="wizard clearfix" data-style="3">
					<div class="steps clearfix m-0">
						<ul role="tablist">
							<li role="tab" class="current"><a href="#"><span class="number">1</span><span class="title">Quick Registration</span></a></li>

							<li role="tab" class="current"><a href="#"><span class="number">2</span><span class="title">Check Eligibility</span></a></li>

							<li role="tab" class="disabled"><a href="#"><span class="number">3</span><span class="title">Get Pre-Approval Offer</span></a></li>

							<li role="tab" class="disabled"><a href="#"><span class="number">4</span><span class="title">Buy Membership Card</span></a></li>

							<li role="tab" class="disabled"><a href="#"><span class="number">5</span><span class="title">Submit Documents</span></a></li>

							<li role="tab" class="disabled"><a href="#"><span class="number">6</span><span class="title">Get Sanctioned</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="reservation-form-over no-padding">
	<div class="container">
		<div class="row">
			<!-- START : CHECK ELIGIBLITY -->
			<?php echo form_open('digital/userApply', array('id' => 'submitForm1', 'class' => 'p-cb', 'novalidate' => 'novalidate')); ?>
			<div class="col-lg-12 col-md-12 col-sm-12 row p-0 m-0">
				<input type="hidden" name="applyid" value="<?php echo $userdetails['applyid']; ?>" class="form-control" required>

				<input type="hidden" name="userid" value="<?php echo $userdetails['userid']; ?>" class="form-control" required>

				<input type="hidden" name="cardtype" value="<?php echo $userdetails['cardtype']; ?>" class="form-control" required>

				<div class="form-group col-md-4">
					<h5 class="text-dark" for="fullname"><strong>Name :</strong>
						<?php echo $userdetails['fullname']; ?>
					</h5>
				</div>

				<div class="form-group col-md-4">
					<h5 class="text-dark" for="mobile"><strong>Mobile no. :</strong>
						<?php echo $userdetails['mobile']; ?>
					</h5>
				</div>

				<div class="form-group col-md-4">
					<h5 class="text-dark" for="loanamount"><strong>Loan Amount :</strong>
						<?php echo formatePriceIndia($userdetails['loanamount']); ?>
					</h5>
				</div>

				<div class="form-group col-md-12">
					<hr />
				</div>

				<div class="form-group col-md-4">
					<label class="text-dark" for="cibilscore">CIBIL Score</label>
					<select name="cibilscore" aria-required="true" id="cibilscore" class="form-control" required>
						<option value="">Select Score</option>
						<option value="Below 650">Below 650</option>
						<option value="650 - 700">650 - 700</option>
						<option value="700 - 750">700 - 750</option>
						<option value="750 - 800">750 - 800</option>
						<option value="800 - 850">800 - 850</option>
						<option value="850 - 900">850 - 900</option>
					</select>
					<div class="help-block font-small-3"></div>
				</div>

				<div class="form-group col-md-4">
					<label class="text-dark" for="monincome">Monthly Income</label>
					<input type="text" aria-required="true" id="monincome" name="monincome" class="form-control" placeholder="As per your requirement" required min="10000" max="5000000" inputmode="numeric" data-validation-regex-regex="[0-9]+">
					<div class="help-block font-small-3"></div>
				</div>

				<div class="form-group col-md-4">
					<label class="text-dark" for="monemi">Monthly EMI You are Already Paying</label>
					<input type="text" aria-required="true" id="monemi" name="monemi" class="form-control" placeholder="As per your requirement" required inputmode="numeric" data-validation-regex-regex="[0-9]+">
					<div class="help-block font-small-3"></div>
				</div>

				<div class="form-group col-md-4">
					<label class="text-dark" for="loanpurpose">Loan Purpose</label>					
					<select name="loanpurpose" aria-required="true" id="loanpurpose" class="form-control" required>
						<?php  if ($userdetails['loantype'] == 12) { ?>
							<option value="">Select Loan Purpose</option>
							<option value="Business Expansion">Business Expansion</option>
							<option value="Maintain Cash Flow">Maintain Cash Flow</option>
							<option value="Supplier Payments">Supplier Payments</option>
							<option value="Setup Manufacturing Unit">Setup Manufacturing Unit</option>
							<option value="Hiring Budget">Hiring Budget</option>
							<option value="Other">Other</option>
						<?php } else { ?>
							<option value="">Select Loan Purpose</option>
							<option value="Personal Use">Personal Use</option>
							<option value="Property Renovation">Property Renovation</option>
							<option value="Marriage Purpose">Marriage Purpose</option>
							<option value="Education Purpose">Education Purpose</option>
							<option value="Medical Emergency">Medical Emergency</option>
							<option value="Other">Other</option>
						<?php } ?>

					</select>
					<div class="help-block font-small-3"></div>
				</div>

				<div class="form-group col-md-4">
					<label class="text-dark" for="city">City</label>
					<input type="text" aria-required="true" name="city" id="city" class="form-control" required>
					<div class="help-block font-small-3"></div>
				</div>

				<div class="form-group col-md-4">
					<label class="text-dark" for="state">State</label>
					<select name="state" aria-required="true" id="state" class="form-control" required>
						<option value="">Select State</option>
						<?php echo getStateOption(); ?>
					</select>
					<div class="help-block font-small-3"></div>
				</div>

				<div class="form-group col-md-12 text-center text-uppercase">
					<button type="submit" id="form-submit1" class="btn new-btn-color">CHECK ELIGIBILITY</button>
				</div>

				<div class="form-group col-md-12 text-center">
					<p class="m-b-0">
						<small>By submitting the form &amp; proceeding, you agree to the
							<a href="<?php echo site_url('terms-conditions'); ?>" target="_blank">Terms of Use</a>
							and
							<a href="<?php echo site_url('privacy-policy'); ?>" target="_blank">Privacy Policy</a>
							of Prayoshafincart.com
						</small>
					</p>
				</div>
			</div>
			<?php echo form_close(); ?>
			<!-- END : CHECK ELIGIBLITY -->

		</div>
	</div>
</section>

<?php
$this->load->view('includes/footer-apply.php');
?>

<script type="text/javascript">
	$(function() {
		$('#submitForm1').on('submit', function(e) {
			$('#form-submit1').attr('disabled', true);
			$('#form-submit1').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESS...');
		});
	});
</script>
