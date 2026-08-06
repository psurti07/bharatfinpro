<?php
$this->load->view('includes/header-apply.php');
?>

<section class="fullscreen background-alice-blue">
	<div class="container">
		<div class="text-middle w-100">
			<div class="row sm-m-t-35">
				<div class="col-lg-7 col-md-7 col-12 center">
					<?php if ($processstep == 'step1') { ?>
						
					<?php } ?>

					<div class="card border-2 border-primary">
						<div class="card-body">
							<?php if ($processstep == 'step1') { ?>
									<div class="text-center">
										<h5><i class="fa fa-minus text-secondary"></i> Unlock Best Loan Offers From Our Lending Partners</h5>

										<div class="carousel client-logos" data-margin="10" data-items="4" data-items-md="4" data-items-sm="3" data-items-xs="2" data-arrows="false" data-dots="false">
											<?php foreach ($banklist as $row) { ?>
												<div>
													<a href="#"><img alt="<?php echo $row->bank_name; ?>" src="<?php echo base_url('assets/images/bank/' . $row->bank_image); ?>"></a>
												</div>
											<?php } ?>
										</div>

										<div class="line m-t-10"></div>

										<h2 class="font-weight-700">Get up to <span class="text-secondary">Rs.15 LAKHS</span> Business Loan in Few Mins! </h2>
									</div>
									

									<?php echo form_open('digital/sendotpCode',array('id' =>'submitForm1','class' => '','novalidate' => 'novalidate')); ?>
										<h5>Start Your Loan Process With Your Few Details</h5>
										<div class="form-group">
											<label class="text-dark" for="fullname">Full name</label>
											<input type="text" aria-required="true" name="fullname" id="fullname" class="form-control"
												placeholder="Bank registered name" required
												data-validation-regex-regex="^[a-zA-z]+([\s][a-zA-Z]+)*$" />
											<div class="help-block font-small-3"></div>
										</div>

										<div class="form-group">
											<label class="text-dark" for="mobile">Mobile no.</label>
											<input type="text" aria-required="true" name="mobile" id="mobileno" class="form-control"
												placeholder="Bank registered number" required maxlength="10" minlength="10"
												inputmode="numeric" data-validation-regex-regex="^[6789]\d{9}$"
												oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
											<div class="help-block font-small-3"></div>
										</div>

										<div class="form-group">
											<label class="text-dark">
												<small>
													By submitting the form &amp; proceeding, you agree to the <a href="<?php echo site_url('terms-conditions'); ?>" target="_blank">Terms of Use</a> and <a href="<?php echo site_url('privacy-policy'); ?>" target="_blank">Privacy Policy</a> of Prayoshafincart.com
												</small>
											</label>
											<div class="help-block font-small-3"></div>
										</div>

										<div class="custom-error" id="mobilenoError"></div>

										<div class="form-group m-b-0">
											<button type="submit" id="form-submit1" class="btn btn-block new-btn-color">APPLY
												NOW</button>
										</div>
									<?php echo form_close(); ?>
							<?php } else if ($processstep == 'step2') { ?>
									<?php echo form_open('digital/checkotpCode',array('id' =>'submitForm2','class' => '','novalidate' => 'novalidate')); ?>

										<div class="form-group">
											<img src="<?php echo base_url('assets/images/icons/mobile-otp.png') ?>" alt="Mobile OTP"
												class="m-b-20" />
											<label class="text-dark" for="mobileno">
												Mobile No. :
												<strong>
												<?php echo $userdetails['mobile']; ?>
												</strong>
											</label>
											<input type="hidden" name="usernm" id="usernm"
												value="<?php echo $userdetails['fullname']; ?>" />
											<input type="hidden" name="otpmobile" id="otpmobile"
												value="<?php echo $userdetails['mobile']; ?>" />
										</div>

										<div class="form-group">
											<label for="otpcode">Please enter the OTP:</label>
											<input type="text" name="otpcode" id="otpcode" class="form-control optnumber text-center"
												required maxlength="4" inputmode="numeric" data-validation-regex-regex="[0-9]+"
												oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
											<div class="help-block font-small-3"></div>
										</div>

										<div class="p-countdown" data-delay="30">
											<div class="p-countdown-count">
												<code>New OTP code will generate in <span class="count-number"></span> Sec</code>
											</div>
											<div class="p-countdown-show">
												<code>Didn’t receive OTP? <a href="javascript:resendotp()">Resend Now</a></code>
											</div>
											<code id="resend-message"></code>
										</div>

										<div class="custom-error" id="otpcodeError"></div>

										<div class="form-group m-b-0">
											<button type="submit" id="form-submit2" class="btn btn-block new-btn-color">VERIFY</button>
										</div>
									<?php echo form_close(); ?>
							<?php } else if ($processstep == 'step3') { ?>
									<?php echo form_open('digital/registeredUser',array('id' =>'submitForm3','class' => '','novalidate' => 'novalidate')); ?>

											<div class="form-group">
												<label class="text-dark" for="username">Select Your Profile & Enter Your <strong>Details.</strong></label>
											</div>

											<div class="form-group">
												<label class="text-dark" for="username">
													Full name :
													<strong>
												<?php echo $userdetails['fullname']; ?>
													</strong>
												</label>
												<input type="hidden" name="username" id="username"
													value="<?php echo $userdetails['fullname']; ?>" />
												<input type="hidden" name="referralcode" id="referralcode"
													value="<?php echo $userdetails['referralcode']; ?>" />
												<input type="hidden" name="loantype" id="loantype" value="12" />
											</div>

											<div class="form-group">
												<label class="text-dark" for="usermobile">
													Mobile No. :
													<strong>
												<?php echo $userdetails['mobile']; ?>
													</strong>
												</label>
												<input type="hidden" name="usermobile" id="usermobile"
													value="<?php echo $userdetails['mobile']; ?>" />
											</div>

											<div class="form-group btn-group-toggle" data-toggle="buttons">
												<div class="btn-group">
													<label class="btn btn-light active">
														<input type="radio" name="usertype" value="0" autocomplete="off" checked><i
															class="icon-briefcase"></i> Small Business Person
													</label>
													<label class="btn btn-light">
														<input type="radio" name="usertype" value="1" autocomplete="off"><i
															class="icon-flag"></i> Audited Report Person
													</label>
												</div>
											</div>

											<div class="form-group">
												<label class="text-dark" for="useremail">Email id</label>
												<input type="email" aria-required="true" name="useremail" class="form-control"
													placeholder="As per your bank records" required />
												<div class="help-block font-small-3"></div>
											</div>

											<div class="form-group">
												<label class="text-dark" for="loanamount">Required loan amount </label>
												<input type="text" aria-required="true" id="loanamount" name="loanamount"
													class="form-control" placeholder="As per your requirement" required min="10000"
													max="5000000" inputmode="numeric" data-validation-regex-regex="[0-9]+"
													oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
												<div class="help-block font-small-3"></div>
											</div>

											<div class="form-group m-b-0">
												<button type="submit" id="form-submit3" class="btn btn-block new-btn-color">PROCESS</button>
											</div>
									<?php echo form_close(); ?>
							<?php } ?>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>

<?php
if ($processstep == 'step1') {
?>
<section class="background-alice-blue p-t-0 p-b-20">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="card" style="background-size:cover;background-image:url(<?php echo base_url('assets/images/slider/banner-new.png') ?>);background-position:right center;">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12"></div>
							<div class="col-lg-5 col-md-5 col-12">
								<div  class="text-center vertical-align">
									<h2 class="font-weight-700 text-secondary">#GoProWith<br/>PrayoshaFincart</h2>

									<h3 class="text-light">How It Works?</h3>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-12">
								<div class="text-light m-t-30 m-b-30">
									<h4>1. Quick Registration</h4>
									<h4>2. Check Eligibility</h4>
									<h4>3. Get Membership</h4>
									<h4>4. Document Submission</h4>
									<h4>5. Bank Verification</h4>
									<h4>6. Bank Sanction</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>

<section class="background-alice-blue p-t-30 p-b-20">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="text-center text-secondary m-b-20">Small Business Person Eligibility Criteria</h4>
						<ul class="list-icon list-icon-check list-icon-colored m-b-0">
							<li>Minimum 1 Year IT Return</li>
							<li>Minimum  1 Year Business Stability</li>
							<li>Age : 21 Years or above</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="text-center text-secondary m-b-20">Audited Report Person Eligibility Criteria</h4>
						<ul class="list-icon list-icon-check list-icon-colored m-b-0">
							<li>1 Crore Plus Yearly Turnover</li>
							<li>Minimum 2 Year Audited Report</li>
							<li>Age : 21 Years or above</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="background-alice-blue p-t-10 p-b-30">
	<div class="container">
		<?php
			$testimonialimg = array('testimonial-1.jpg', 'testimonial-2.jpg', 'testimonial-3.jpg', 'testimonial-4.jpg');
			?>

		<div class="carousel equalize testimonial testimonial-box" data-margin="20" data-arrows="false" data-dots="false" data-items="3" data-items-sm="2" data-items-xxs="1" data-equalize-item=".testimonial-item">
			<?php foreach ($testimonialimg as $row) { ?>
				<div class="">
					<img src="<?php echo base_url('assets/images/customers/' . $row); ?>" alt="testimonial">
				</div>
			<?php } ?>
		</div>
	</div>
</section>

<section class="background-alice-blue p-t-10 p-b-20">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p><small>Loan tenure ranging from a minimum of 3 months to a maximum of 72 months with Annual Interest Rates between 11% - 35%. Processing fee up to 2%. For Example: Considering a Business loan of Rs.1,00,000 availed at 11.5% interest rate for a tenure of 6 years with 2% processing fee, the APR will be 12.26%. *T&C Apply. All these numbers are tentative/indicative, the final loan specifics may vary depending upon the customer profile and NBFCs' criteria, rules & regulations, and terms & conditions. Company Registered Address: <?php echo COMPANY_ADDRESS; ?></small></p>
			</div>
		</div>
	</div>
</section>
<?php } ?>

<?php
$this->load->view('includes/footer-apply.php');
?>
<script src="<?= base_url('assets/js/processSteps.js') ?>" type="text/javascript"></script>
