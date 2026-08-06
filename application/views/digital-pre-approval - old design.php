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

				<div class="wizard clearfix" data-style="3">
					<div class="steps clearfix m-0">
						<ul role="tablist">
							<li role="tab" class="current"><a href="#"><span class="number">1</span><span
										class="title">Quick Registration</span></a></li>
							<li role="tab" class="current"><a href="#"><span class="number">2</span><span
										class="title">Check Eligibility</span></a></li>
							<li role="tab" class="current"><a href="#"><span class="number">3</span><span
										class="title">Get Pre-Approval Offer</span></a></li>
							<li role="tab" class="disabled"><a href="#"><span class="number">4</span><span
										class="title">Buy Membership Card</span></a></li>
							<li role="tab" class="disabled"><a href="#"><span class="number">5</span><span
										class="title">Submit Documents</span></a></li>
							<li role="tab" class="disabled"><a href="#"><span class="number">6</span><span
										class="title">Get Sanctioned</span></a></li>
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
			<!-- START : GET PRE-APPROVAL -->
			<?php echo form_open('digital/getpreApproval', array('id' => 'submitForm2', 'class' => 'p-cb', 'novalidate' => 'novalidate')); ?>
			<div class="col-lg-12 col-md-12 col-sm-12 row p-0 m-0">
				<input type="hidden" name="applyid" value="<?php echo $userdetails['applyid']; ?>" class="form-control"
					required>

				<input type="hidden" name="mobile" value="<?php echo $userdetails['mobile']; ?>" class="form-control"
					required>

				<input type="hidden" name="cardtype" value="<?php echo $userdetails['cardtype']; ?>"
					class="form-control" required>

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

				<div class="form-group col-md-12 text-center">
					<hr />
					<?php
					$eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']);
					?>
					<h4 class="text-success">Congratulation! Your Rs.
						<?php echo formatePriceIndia($eligibilityamt); ?>/- Pre-Approved <span class="text-lowercase">
							<?php echo $userdetails['loanname']; ?> Offer Processing Confirmed
						</span>
					</h4>

					<h5>Select Your Suitable EMI Option:</h5>
				</div>

				<div class="form-group col-sm-12 col-md-12 text-center text-dark">
					<div class="form-check">
						<label class="form-check-label m-l-15 text-left">
							<strong>Tenure</strong> <i class="fa fa-long-arrow-alt-right m-r-20 m-l-20"></i>
							<strong>EMI</strong>
						</label>
					</div>

					<div class="form-check">
						<input type="radio" class="form-check-input" name="tenure" id="years3" value="36" checked>
						<label class="form-check-label m-l-10" for="years3">
							3 months <i class="fa fa-long-arrow-alt-right m-r-10 m-l-10"></i> Rs.
							<?php echo calPMT($userdetails['apr'], 3, $eligibilityamt); ?>
						</label>
					</div>

					<div class="form-check">
						<input type="radio" class="form-check-input" name="tenure" id="years4" value="48">
						<label class="form-check-label m-l-10" for="years4">
							48 Months <i class="fa fa-long-arrow-alt-right m-r-10 m-l-10"></i> Rs.
							<?php echo calPMT($userdetails['apr'], 4, $eligibilityamt); ?>
						</label>
					</div>

					<div class="form-check">
						<input type="radio" class="form-check-input" name="tenure" id="years5" value="60">
						<label class="form-check-label m-l-10" for="years5">
							60 Months <i class="fa fa-long-arrow-alt-right m-r-10 m-l-10"></i> Rs.
							<?php echo calPMT($userdetails['apr'], 5, $eligibilityamt); ?>
						</label>
					</div>
				</div>

				<div class="form-group col-md-12 text-center text-uppercase js-confetti">
					<button type="submit" id="form-submit2" class="btn new-btn-color">GET OFFER</button>
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
					<p class="m-b-0">
						<small>
							Note - EMI starting at Rs.
							<?php echo formatePriceIndia($userdetails['stramt']); ?> is an indicative amount on 1 lakh
							loan at
							<?php echo $userdetails['apr']; ?> interest for a 6 years tenure. Loan disbursal is at the
							sole discretion of NBFC.
						</small>
					</p>

					<hr />
					<p class="m-b-0"><small>Click here, <a class="text-primary" data-target="#modal" data-toggle="modal"
								href="#"> to know about eligibility criteria.</a></small></p>
				</div>
			</div>
			<?php echo form_close(); ?>
			<!-- END : GET PRE-APPROVAL -->
		</div>
	</div>
</section>

<section class="border-top p-t-50 p-b-30">
	<div class="container">
		<div class="text-center p-b-20">
			<h3>You’re Eligible For Pre-Approved Loan Offers From Partnered NBFCs</h3>
			<p>View the specifics of your pre-approved offers</p>
		</div>

		<div class="row d-flex align-items-center justify-content-center">
			<?php
			if (count($roipackages)) {
				foreach ($roipackages as $row) {
					?>
					<div class="col-md-3 col-12">
						<div class="card">
							<div class="card-header p-20">
								<div class="row">
									<div class="col-md-12 col-8 text-center">
									<img src="<?php echo base_url('assets/images/bank/' . $row->bank_image); ?>" alt=""
											class="img-fluid">
										<!-- <h4>
											<?php echo $row->bank_name; ?>
										</h4>
										<p class="p-b-0">
											<?php echo $userdetails['loanname']; ?>
										</p> -->
									</div>

									<!-- <div class="col-md-3 col-4 text-right">
										<img src="<?php echo base_url('assets/images/bank/' . $row->bank_image); ?>" alt=""
											class="img-fluid">
									</div> -->
								</div>
							</div>

							<div class="card-body p-20 p-b-5">
								<div class="row">
									<div class="col-md-12 col-12">
										<p><strong>Loan Amt.:</strong> Rs.
											<?php echo formatePriceIndia($eligibilityamt); ?>
										</p>
										<p><strong>EMI:</strong> Rs.
											<?php echo formatePriceIndia(calPMT($row->roi, $row->termsyears, $eligibilityamt)); ?>
										</p>
										<p><strong>ROI:</strong>
											<?php echo $row->roi . "%"; ?>
										</p>
										<p><strong>Tenure:</strong>
											<?php echo $row->termsmonths . " Months"; ?>
										</p>
									</div>

								</div>
							</div>


						</div>
					</div>
				<?php
				}
			} ?>
		</div>

	</div>
</section>
<div class="modal fade" id="modal" role="modal" aria-labelledby="modal-label" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-label">Eligibility Criteria : </h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12 text-justify">
						<p><strong>What is the calculation behind this pre-approved loan offer?</strong></p>

						<small>
							<p>It should be noted that the Pre-Approved Loan Offer and the amount mentioned in it are
								solely shown based on the software calculation done on Monthly Income and Current
								Monthly EMI entered by you. This 'Pre-Approved Loan Offer' is tentative and not the
								final loan approval. The final loan approval is given by the bank only, based on the
								bank's rules and regulations and the customer profile.</p>

							<p><strong>Reference Calculation:</strong></p>

							<p>Consider a person who has entered the following details<br />
								- Monthly Income: Rs.1,00,000<br />
								- Current Monthly EMI: Rs.30,000</p>

							<p>Based on these details, the person is left with Rs.70,000 in hand (deducting current EMI)
								every month. So, according to the general rules of the banks, the EMI of 50% of the
								in-hand amount can be approved - here it's 35,000. And based on the EMI and rate of
								interest (12.5% tentatively), the eligible amount is shown in the Pre-Approved Loan
								Offer - considering the mentioned calculation.</p>

							<p>Note: Pre-approved loan offer is tentative. It should not be considered as the final loan
								approval. The final loan approval is given by the bank only, according to their rules
								and criteria and the customer profile.</p>
						</small>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-b" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url('assets/plugins/celebration/confetti-script.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/celebration/confetti.browser.min.js'); ?>"
	type="text/javascript"></script>

<?php
$this->load->view('includes/footer-apply.php');
?>

<script type="text/javascript">
	$(function () {
		$('#submitForm2').on('submit', function (e) {
			$('#form-submit2').attr('disabled', true);
			$('#form-submit2').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESS...');
		});
	});
</script>
