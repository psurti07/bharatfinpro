<?php
$this->load->view('includes/header-apply.php');
?>

<section class="fullscreen background-alice-blue">
	<div class="container">
		<div class="text-middle w-100">
			<div class="row sm-m-t-35">
				<div class="col-lg-7 col-md-7 col-12 center sm-p-0">
					<div class="card border-2 border-primary shadow-none">
						<div class="card-body m-20 sm-m-0">
							<?php if ($processstep == 'step1') { ?>
									<div class="text-center">
										<h5>Unlock Best Loan Offers From Our Lending Partners</h5>

										<div class="carousel client-logos" data-margin="0" data-items="4" data-items-md="4" data-items-sm="3" data-items-xs="2" data-arrows="false" data-dots="false">
											<?php foreach ($banklist as $row) { ?>
												<div>
													<a href="#"><img alt="<?php echo $row->bank_name; ?>" src="<?php echo base_url('assets/images/bank/' . $row->bank_image); ?>"></a>
												</div>
											<?php } ?>
										</div>

										<div class="line m-t-20 m-b-20"></div>
									</div>

									<h2 class="font-weight-700" style="font-style: italic;">Get up to <span class="text-warning">Rs.5 Lakhs</span> Personal Loan in few mins! </h2>

									<p class="text-muted">Start Your Loan Process With Your Few Details</p>
									
									<?php echo form_open('digital/sendotpCode',array('id' =>'submitForm1','class' => '','novalidate' => 'novalidate')); ?>	
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
										<div class="custom-error" id="mobilenoError"></div>

										<div class="form-group m-b-2">
											<button type="submit" id="form-submit1" class="btn btn-block btn-lg new-btn-color" >APPLY
												NOW</button>
										</div>
										<div class="form-group mb-2">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" name="terms" id="terms" class="custom-control-input"
												value="1" checked required>
											<label class="custom-control-label" for="terms" style="display:inline"><small>By
													submitting the form &amp; proceeding, you agree to the <a
														href="<?php echo site_url('terms-conditions'); ?>"
														target="_blank">Terms of Use</a> and <a
														href="<?php echo site_url('privacy-policy'); ?>"
														target="_blank">Privacy Policy</a> of PrayoshaFincart.com</small></label>
											<div class="help-block font-small-3"></div>
										</div>
									</div>

									<div class="form-group mb-2">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" name="promotion" id="promotion"
												class="custom-control-input" value="1" checked required>
											<label class="custom-control-label" for="promotion"
												style="display:inline"><small>I agree that my data will be used for processing and receive promotional & informational communications from Prayosha Fincart through Emails, calls, SMS or other mediums.</small></label>
											<div class="help-block font-small-3"></div>
										</div>
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
											<button type="submit" id="form-submit2" class="btn btn-block btn-lg new-btn-color" >VERIFY</button>
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
													<label class="btn btn-light active"> <input type="radio" name="usertype" value="0"
															autocomplete="off" checked /><i class="icon-briefcase"></i>
														Small Business Person</label>
													<label class="btn btn-light"> <input type="radio" name="usertype" value="1"
															autocomplete="off" /><i class="icon-flag"></i> Audited Report Person
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
												<button type="submit" id="form-submit3" class="btn btn-block btn-lg new-btn-color" >PROCESS</button>
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


<section class="box-fancy section-fullwidth p-0">
	<div class="row text-white">
		<div class="col-lg-4 col-md-4" style="background-color: #144835;">
			<h1 class="text-lg text-uppercase">01.</h1>
			<h3>Business Loan Criteria</h3>
			<p class="text-white"><strong>NBFC Business Loan Criteria for Small Business:</strong><br/>
			<i class="fa fa-check"></i> Minimum 1 Year IT Return
			<i class="fa fa-check"></i> Minimum  1 Year Business Stability
			<i class="fa fa-check"></i> Age : 21 Years or above</p>

			<p class="text-white"><strong>NBFC Business Loan Criteria for Audited Business:</strong><br/>
			<i class="fa fa-check"></i> 1 Crore Plus Yearly Turnover 
			<i class="fa fa-check"></i> Minimum 2 Year Audited Report
			<i class="fa fa-check"></i> Age : 21 Years or above</p>
		</div>

		<div class="col-lg-4 col-md-4" style="background-color: #247658;">
			<h1 class="text-lg text-uppercase">02.</h1>
			<h3>How It Works?</h3>
			<ul class="list-icon list-icon-check m-b-0 text-white">
				<li>Quick Registration</li>
				<li>Check Eligibility</li>
				<li>Get Membership</li>
				<li>Document Submission</li>
				<li>Bank Verification</li>
				<li>Bank Sanction</li>
			</ul>
		</div>

		<div class="col-lg-4 col-md-4" style="background-color: #289b70;">
			<h1 class="text-lg text-uppercase">03.</h1>
			<h3>Trusted by millions</h3>
			<h4><i class="fa fa-chart-bar"></i> 10 millions+ <span class="small">Happy Users</span></h4>
			<h4><i class="fa fa-chart-bar"></i> 20+ <span class="small">NBFC Partners</span></h4>
			<h4><i class="fa fa-chart-bar"></i> 34 millions+ <span class="small">Loan Sanction</span></h4>
			<h4><i class="fa fa-chart-bar"></i> 100% <span class="small">Online Process</span></h4>
		</div>
	</div>
</section>


<section class="background-white p-b-40">
	<div class="container-fullwidth">
		<div class="heading-text heading-line text-center">
			<h4>Trusted by millions</h4>
		</div>

		<div class="row align-items-center">
			<div class="col-12 p-b-30">
				<?php
				$testimonialimg = array('testimonial-1.jpg', 'testimonial-2.jpg', 'testimonial-3.jpg', 'testimonial-4.jpg');
				?>
				<div class="carousel equalize testimonial testimonial-box" data-margin="20" data-arrows="false" data-dots="false" data-items="4" data-items-sm="2" data-items-xxs="1" data-equalize-item=".testimonial-item">
					<?php foreach ($testimonialimg as $row) { ?>
						<div class="">
							<img src="<?php echo base_url('assets/images/customers/' . $row); ?>" alt="testimonial">
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="background-white p-t-20 p-b-40">
	<div class="container">
		<div class="heading-text heading-line text-center">
			<h4>Frequently Asked Questions</h4>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="accordion accordion-simple">
					<div class="ac-item">
						<h5 class="ac-title">What is the EMI for Rs.1 Lakh Business Loan?</h5>
						<div class="ac-content">
							<p>Prayosha Fincart offers business loans at the lowest EMIs starting from Rs.2,224.</p>
						</div>
					</div>
					
					<div class="ac-item">
						<h5 class="ac-title">Which bank has the lowest interest rate for Business Loans?</h5>
						<div class="ac-content">
							<p>Prayosha Fincart provides business loan offers through top multiple banks in India that offer Lowest Business Loan Interest Rates. Loan approval is subjective to the applicant's documents.</p>
						</div>
					</div>

					<div class="ac-item">
						<h5 class="ac-title">How can I get a low-interest Business Loan?</h5>
						<div class="ac-content">
							<p>Simply by becoming a Prayosha Fincart member. Get personalised consultation on getting loans at the lowest rates.</p>
						</div>
					</div>

					<div class="ac-item">
						<h5 class="ac-title">What CIBIL Score is required for a Business Loan?</h5>
						<div class="ac-content">
							<p>Prayosha Fincart provides a business loan if your CIBIL Score is 650 or higher.</p>
						</div>
					</div>

					<div class="ac-item">
						<h5 class="ac-title">How long will it take for my Business Loan to be processed?</h5>
						<div class="ac-content">
							<p>Once your application is submitted along with your documents, it can take anywhere between 1-7 days for your business loan to get approved and a couple of days after that for the disbursement. Prayosha Fincart helps to get instant loan approvals.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="background-titan-white p-t-20 p-b-20">
	<div class="container">
		<div class="row">
			<div class="col-12 text-dark">
				<p class="m-b-0"><small>Loan tenure ranging from a minimum of 3 months to a maximum of 72 months with Annual Interest Rates between 11% - 35%. Processing fee up to 2%. For Example: Considering a business loan of Rs.1,00,000 availed at 11.5% interest rate for a tenure of 6 years with 2% processing fee, the APR will be 12.26%. *T&C Apply. All these numbers are tentative/indicative, the final loan specifics may vary depending upon the customer profile and NBFCs' criteria, rules & regulations, and terms & conditions. Company Registered Address: <?php echo COMPANY_ADDRESS; ?></small></p>
			</div>
		</div>
	</div>
</section>

<?php
$this->load->view('includes/footer-apply.php');
?>

<script src="<?= base_url('assets/js/processSteps.js') ?>" type="text/javascript"></script>
