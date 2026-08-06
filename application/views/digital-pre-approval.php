<?php
$this->load->view('includes/header-apply.php');

$eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']);
?>

<section>
	<div class="container">
		<div class="row">
			<!-- START : PRE APPROVAL -->
			<div class="col-lg-8 col-md-8 col-12 sm-p-0">
				<div class="card border-2 border-primary shadow-none">
					<div class="card-body">
						<h3>Digital <?php echo $userdetails['loanname']; ?> Application Process</h3>
						
						<p>Congratulation! Your <strong class="text-secondary h4">Rs. <?php echo formatePriceIndia($eligibilityamt); ?>/-</strong> Pre-Approved<?php echo $userdetails['loanname']; ?> Offer Processing Confirmed.</p>

						<div class="seperator"></div>
						
						<h5>Select Your Suitable EMI Option:</h5>

						<?php echo form_open('digital/getpreApproval', array('id' => 'submitForm2', 'class' => 'row', 'novalidate' => 'novalidate')); ?>
							<input type="hidden" name="applyid" value="<?php echo $userdetails['applyid']; ?>" class="form-control" required>

							<input type="hidden" name="userid" value="<?php echo $userdetails['userid']; ?>" class="form-control" required>

							<input type="hidden" name="mobile" value="<?php echo $userdetails['mobile']; ?>" class="form-control" required>

							<input type="hidden" name="cardtype" value="<?php echo $userdetails['cardtype']; ?>" class="form-control" required>

							<div class="form-group col-md-12 p-0 text-dark">
								<ul class="product-size">
									<li>
										<label>
											<input type="radio" checked="checked" name="tenure" id="years1" value="12">
											<span><strong><i class="icon-calendar"></i>
												12 Months</strong><br/>
												Rs. <?php echo calPMT($userdetails['apr'], 1, $eligibilityamt); ?></span>
										</label>
									</li>
							
									<li>
										<label>
											<input type="radio" name="tenure" id="years2" value="24">
											<span><strong><i class="icon-calendar"></i>
													24 Months</strong><br />
												Rs. <?php echo calPMT($userdetails['apr'], 2, $eligibilityamt); ?>
											</span>
										</label>
									</li>
							
									<li>
										<label>
											<input type="radio" name="tenure" id="years3" value="36">
											<span><strong><i class="icon-calendar"></i>
													36 months</strong><br />
												Rs. <?php echo calPMT($userdetails['apr'], 3, $eligibilityamt); ?>
											</span>
										</label>
									</li>
							
									<li>
										<label>
											<input type="radio" name="tenure" id="years4" value="48">
											<span><strong><i class="icon-calendar"></i>
													48 Months</strong><br />
												Rs. <?php echo calPMT($userdetails['apr'], 4, $eligibilityamt); ?>
											</span>
										</label>
									</li>
							
									<li>
										<label>
											<input type="radio" name="tenure" id="years5" value="60">
											<span><strong><i class="icon-calendar"></i>
													60 Months</strong><br />
												Rs. <?php echo calPMT($userdetails['apr'], 5, $eligibilityamt); ?>
											</span>
										</label>
									</li>

									<li>
										<label>
											<input type="radio" name="tenure" id="years6" value="72">
											<span><strong><i class="icon-calendar"></i>
													72 Months</strong><br />
												Rs. <?php echo calPMT($userdetails['apr'], 6, $eligibilityamt); ?>
											</span>
										</label>
									</li>
								</ul>
							</div>

							<div class="form-group col-md-12 js-confetti">
								<button type="submit" id="form-submit2" class="btn btn-lg btn-primary">GET OFFER</button>
							</div>

							<div class="form-group col-md-12 m-b-0">
								<hr />
								<p class="m-b-0">
									<small>
										Note - EMI starting at Rs. <?php echo formatePriceIndia($userdetails['stramt']); ?> is an indicative amount on 1 lakh loan at <?php echo $userdetails['apr']; ?> interest for a 6 years tenure. Loan disbursal is at the sole discretion of NBFC. Click here, <a class="text-primary" data-target="#modal" data-toggle="modal" href="#"> to know about eligibility criteria.</a>
									</small>
								</p>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
			<!-- END : PRE APPROVAL -->

			<div class="col-lg-4 col-md-4 col-sm-12 sm-p-0">
				<div class="card shadow-none">
					<div class="card-body">
						<div class="wizard clearfix" data-style="1">
							<p class="small m-b-0">Process Steps: </p>
							<div class="steps clearfix m-0">
								<ul role="tablist">
									<li role="tab" class="current"><a href="#"><span class="number">1</span><span class="title">Quick Registration</span></a></li>

									<li role="tab" class="current"><a href="#"><span class="number">2</span><span class="title">Check Eligibility</span></a></li>

									<li role="tab" class="current"><a href="#"><span class="number">3</span><span class="title">Get Pre-Approval Offer</span></a></li>

									<li role="tab" class="disabled"><a href="#"><span class="number">4</span><span class="title">Buy Membership Card</span></a></li>
								</ul>
							</div>
						</div>

						<ul class="list-group list-group-flush">
							<li class="list-group-item"><strong>User Details : </strong></li>
							<li class="list-group-item">Loan : <?php echo $userdetails['loanname']; ?></li>
							<li class="list-group-item">Loan Amount : <?php echo formatePriceIndia($userdetails['loanamount']); ?></li>
							<li class="list-group-item">Name : <?php echo $userdetails['fullname']; ?></li>
							<li class="list-group-item">Mobile no. : <?php echo $userdetails['mobile']; ?></li>
						</ul>
					</div>
				</div>

				<div class="card shadow-none">
					<div class="card-body background-pattern-1 rounded-lg">
						<h3 class="m-b-20 text-medium">Personal Loan</h3>
						<p class="m-b-0 text-muted">Get up to</p>
						<h4><span style="border-bottom: 4px solid #37c893">₹10 Lac in 30 mins</span></h4>
					</div>
					<div class="card-footer p-20 background-grey">
						<ul class="list-icon list-icon-colored m-b-0">
							<li><i class="fa fa-arrow-right"></i> Simple Online Process</li>
							<li><i class="fa fa-arrow-right"></i> ⁠Lowest Interest Rate</li>
							<li><i class="fa fa-arrow-right"></i> ⁠Flexible EMI Options</li>
							<li><i class="fa fa-arrow-right"></i> ⁠Minimal Documentation</li>
						</ul>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

<?php if (count($roipackages)) { ?>
<section class="background-grey">
	<div class="container">
		<div class="text-center p-b-20">
			<h3>You’re Eligible For Pre-Approved Loan Offers From Partnered NBFCs</h3>
			<p>View the specifics of your pre-approved offers</p>
		</div>

		<div class="row d-flex align-items-center justify-content-center">
			<?php
			foreach ($roipackages as $row) {
				?>
				<div class="col-md-3 col-12">
					<div class="card">
						<div class="card-header p-20">
							<div class="row">
								<div class="col-md-12 col-8 text-center">
									<img src="<?php echo base_url('assets/images/bank/' . $row->bank_image); ?>" alt=""
										class="img-fluid">
								</div>
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
			} ?>
		</div>
		<div class="text-left">
                <p class=""><small>Disclaimer - The above data is tentative and purely on the information provided
                        by
                        you. Final EMI, loan sanction, loan approval, and loan amount depend on customer profile and
                        NBFCs
                        criteria and rules & regulations.</small></p>
	</div>
</section>
<?php } ?>

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
<script src="<?php echo base_url('assets/plugins/celebration/confetti.browser.min.js'); ?>" type="text/javascript"></script>

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
