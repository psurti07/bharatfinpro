<?php
$this->load->view('includes/header-apply.php');
?>

<section id="section1" class="fullscreen background-grey"
	style="background-size: cover;background-image:url(<?php echo base_url() ?>assets/images/slider/personal-loan-family.webp);padding:0px;padding-top:50px">
	<div class="bg-overlay"></div>
	<div class="container">
		<div class="row text-middle">
			<div class="col-lg-6"></div>
			<div class="col-lg-6">
				<div class="p-cb">
					<?php if ($processstep == 'step1') { ?>
						<h3 class="">Get up to Rs.10 LAKHS Personal Loan in just 3 Clicks! </h3>

						<ul class="list-icon list-icon-check">
							<li>Instant NBFC Pre-Approval</li>
							<li>Starting @ 10.5%</li>
							<li>Tenure up to 72 Months</li>
						</ul>
						<hr />

						<div class="">
							<?php echo form_open(
								'digital/sendotpCode',
								array(
									'id' =>
										'submitForm1',
									'class' => 'col-md-12 col-sm-12',
									'novalidate' => 'novalidate'
								)
							); ?>
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
										By submitting the form &amp; proceeding, you agree to the <a
											href="<?php echo site_url('terms-conditions'); ?>" target="_blank">Terms
											of Use</a> and
										<a href="<?php echo site_url('privacy-policy'); ?>" target="_blank">Privacy
											Policy</a> of Prayoshafincart.com
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
						</div>
					<?php } else if ($processstep == 'step2') { ?>
							<h3 class=""></h3>
							<div class="">
							<?php echo form_open(
								'digital/checkotpCode',
								array(
									'id' =>
										'submitForm2',
									'class' => 'col-md-12 col-sm-12',
									'novalidate' => 'novalidate'
								)
							); ?>

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
							</div>
					<?php } else if ($processstep == 'step3') {
						?>
								<div class="">
							<?php echo form_open(
								'digital/registeredUser',
								array(
									'id' =>
										'submitForm3',
									'class' => 'col-md-12 col-sm-12',
									'novalidate' => 'novalidate'
								)
							); ?>

									<div class="form-group">
										<label class="text-dark" for="username">Select Your Profile & Enter Your
											<strong>Details.</strong></label>
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
										<input type="hidden" name="loantype" id="loantype" value="11" />
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
											<label class="btn btn-light active"> <input type="radio" name="usertype" value="0"
													autocomplete="off" checked /><i class="icon-briefcase"></i>
												Salaried Person </label>
											<label class="btn btn-light"> <input type="radio" name="usertype" value="1"
													autocomplete="off" /><i class="icon-flag"></i> Self Employed Person
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
								</div>
					<?php } ?>

					<div class="p-t-5 text-center">
						<hr>
						<span>"Loan facility is provided by Our NBFC/Lending Partners"</span>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>


<section class="p-t-30 p-b-20">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-12 m-b-20">
				<h6 class="text-theme">Salaried Person Eligibility Criteria</h6>
				<p><small>(1) Minimum salary Rs. 15,000/- per month (2) 1 year job stability (3) Minimum age 21
						years</small></p>

				<h6 class="text-theme">Self-Employed Person Eligibility Criteria</h6>
				<p><small>(1) Minimum 1 year IT return (2) 1 year business stability (3) Minimum age 21 years</small>
				</p>

				<h6 class="text-theme">How it Works?</h6>
				<p><small>(1) Easy Registration Process (2) Check Eligibility (3) Buy Membership Card (4) Upload
						Documents (5) Bank Verification (6) Loan Sanction</small></p>
			</div>

			<div class="col-md-6 col-12 m-b-20">
				<h6 class="text-theme">Membership Card Benefits</h6>
				<p><small>(1) Apply for personal loan in multiple banks (2) Get loan assistance for 6 months (3) Get 35%
						referral payout as reward (4) Get loan approval within 9 business days (5) On call support to
						clear all doubts & query (6) Bank verification does not affect to CIBIL Score</small></p>

				<h6 class="text-theme">Why Prayosha Fincart?</h6>
				<p><small>When it comes to aiding people with fast-paced and professional online loan services, Prayosha
						Fincart is an ace! With a humongous customer base that is ever-growing, Prayosha Fincart is
						racing ahead with its innovative Membership Cards for Instant Personal & Business Loan
						experience.</small></p>
			</div>

		</div>
		<div class="row">
			<p><small>Loan tenure ranging from a minimum of 3 months to a maximum of 72 months with Annual Interest Rates between 11% - 35%. Processing fee up to 2%. For Example: Considering a personal loan of Rs.1,00,000 availed at 11.5% interest rate for a tenure of 6 years with 2% processing fee, the APR will be 12.26%. *T&C Apply. All these numbers are tentative/indicative, the final loan specifics may vary depending upon the customer profile and NBFCs' criteria, rules & regulations, and terms & conditions. Company registered</small></p>
		</div>
	</div>
</section>
<?php
$this->load->view('includes/footer-apply.php');
?>
<script src="<?= base_url('assets/js/processSteps.js') ?>" type="text/javascript"></script>
