<?php
$this->load->view('includes/header-plan-apply.php');
?>

<!-- Header -->
<div class="header">
    <h3 class="text-light">Get Loan Offers Tailored To Your Needs</h3>
    <p class="text-success fs-5 mb-0" style="font-weight:800">From Trusted Partner NBFCs</p>

	<div class="col-12">
		<img class="d-sm-block d-md-none img-fluid" alt="" src="<?php echo base_url('assets/images/privylege_finance/lending-page-image2.png'); ?>">
		<div class="carousel d-sm-block d-md-none" data-margin="20" data-arrows="false" data-dots="false"
     data-items="6" data-items-lg="6" data-items-md="4" data-items-sm="4" data-items-xs="4">
			<?php foreach ($banklist as $row) { ?>
					<img src="<?php echo base_url('assets/images/bank/'.$row->bank_image)?>" class="bank-offer">
			<?php } ?>
		</div>
	</div>
</div>

<!-- Main Card -->
<div class="container">
    <div class="card shadow card-main">
        
        <div class="container-fluid mobile-container">
				<div class="card text-center">
					<div class="card-header" style="border-radius: 8px 8px 0 0;">
						<div class="card-title">
							<h6 class="font-weight-bold">Check Personal Loan Options Up to <span class="text-secondary">₹10,00,000</span></h6>
						</div>
					</div>
				</div>
				<div class="step active">
            <?php if ($processstep == 'step1') { ?>
							
								<?php echo form_open('plan/sendotpCode',array('id' =>'submitForm1','class' => '','novalidate' => 'novalidate')); ?>	
									<div class="form-group">
										<label>Select your required loan amount:</label>
									</div>

									 <!-- Options -->
								<div class="row g-3 mb-2">
										
									<div class="col-md-3 mb-3">
										<div class="loan-option">
											<input type="radio" name="loanamount" id="op1" value="50000">
											Min 50 k
										</div>
									</div>

									<div class="col-md-3 mb-3">
										<div class="loan-option active">
											<input type="radio" name="loanamount" id="op2" value="250000" checked>
											1L - 5 Lakh
										</div>
									</div>

									<div class="col-md-3 mb-3">
										<div class="loan-option">
											<input type="radio" name="loanamount" id="op3"  value="750000">
											5L - 10 Lakh
										</div>
									</div>

									<div class="col-md-3 mb-3">
										<div class="loan-option">
											<input type="radio" name="loanamount" id="op4" value="1250000" >
											Above 10 Lakh
										</div>
									</div>

								</div>

									<div class="col-lg-12 col-md-6 col-12 p-0">
                                        <div class="form-group">
                                            <label for="mobile" class="">Mobile No.:</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">+91</span>

                                                <input type="text" class="form-control"
                                                    placeholder="Enter Your Mobile No." id="mobile" name="mobile"
                                                    required minlength="10" maxlength="10" inputmode="numeric"
                                                    data-validation-regex-regex="^[6789]\d{9}$"
                                                    data-validation-regex-message="Enter valid mobile number">
                                            </div>
                                            <div class="help-block"></div>
                                        </div>
                                       <div class="custom-error" id="mobilenoError"></div>
                                    </div>

									<div class="form-group m-b-2 d-flex justify-content-center">
										<button type="submit" id="form-submit1" class="btn btn-block btn-lg btn-primary btn-process" >APPLY NOW</button>
									</div>
									
									<div class="col-12 mb-2">
										<div class="form-group mb-0 ps-0">
											<input type="checkbox" name="terms" id="terms" class="custom-control-input mb-0" value="1"
											style="width:auto;height:auto" checked required>
											<label class="custom-control-label" for="terms"
											style="display:unset;font-size:70%;color:#000;letter-spacing: 0.7px;">By submitting the
											form and proceeding, you agree to the <a href="<?= base_url('terms-conditions') ?>"
												target="_blank" style="text-decoration: none;color:#000 !important" class="text-dark">Terms of Use</a>
											and <a href="<?= base_url('privacy-policy') ?>" target="_blank"
												style="text-decoration: none;color:#000 !important" class="text-dark">Privacy Policy</a> of
											Bharatfinpro.com.</label>
											<div class="help-block ms-0 ps-0 mb-2"></div>
											</div>
									</div>
									<div class="col-12 mb-2">
											<div class="form-group mb-3 ps-0">
											<input type="checkbox" name="promotion" id="promotion" class="custom-control-input mb-0"
											value="1" style="width:auto;height:auto" checked required>
											<label class="custom-control-label" for="promotion"
											style="display:unset;font-size:70%;color:#000;letter-spacing: 0.7px;">I agree to receive
											promotional & informational communications from Bharatfinpro through Emails, calls or SMS
											Services.</label>
											<div class="help-block ms-0 ps-0 mb-2"></div>
									</div>
								<?php echo form_close(); ?>
							
							</div>
							<div class="step">
						<?php } else if ($processstep == 'step2') { ?>
						
								<?php echo form_open('plan/checkotpCode',array('id' =>'submitForm2','class' => '','novalidate' => 'novalidate')); ?>

									<div class="form-group">
										<img src="<?php echo base_url('assets/images/icons/mobile-otp.png') ?>" alt="Mobile OTP"
											class="m-b-20" />
										<label class="text-dark" for="mobileno">
											Mobile No. :
											<strong>
											<?php echo $userdetails['mobile']; ?>
											</strong>
										</label>
										<input type="hidden" name="loanamount" id="loanamount" value="<?php echo $userdetails['loanamount']; ?>" />
										<input type="hidden" name="otpmobile" id="otpmobile" value="<?php echo $userdetails['mobile']; ?>" />
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

									<div class="form-group m-b-0 d-flex justify-content-center">
										<button type="submit" id="form-submit2" class="btn btn-block btn-lg btn-primary w-25 btn-process" >VERIFY</button>
									</div>
								<?php echo form_close(); ?>
							</div>
						<div class="step">
						<?php } else if ($processstep == 'step3') { ?>
						
								<?php echo form_open('plan/registeredUser',array('id' =>'submitForm3','class' => '','novalidate' => 'novalidate')); ?>
										<input type="hidden" name="loanamount" id="loanamount" value="<?php echo $userdetails['loanamount']; ?>">
										<input type="hidden" name="referralcode" id="referralcode" value="<?php echo $userdetails['referralcode']; ?>">
										<input type="hidden" name="loantype" id="loantype" value="21">

										<div class="form-group">
											<label class="text-dark" for="username">Select Your Profile & Enter Your <strong>Details.</strong></label>
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

										<div class="row">	
											<!-- Salaried -->
											<div class="col-md-4 mt-2">
												<label class="w-100">
													<input type="radio" checked="checked" name="usertype" id="salaried" value="0">
													<div class="radio-card">
													
														<h5>Salaried</h5>
													</div>
												</label>
											</div>

											<!-- Business -->
											<div class="col-md-4 mt-2">
												<label class="w-100">
													<input type="radio" name="usertype" id="selfemployed" value="1">
													<div class="radio-card">
														
														<h5>Self Employed</h5>
													</div>
												</label>
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-12 mb-3 p-0">
											<div class="form-group">
												<label for="username" class="">Full Name *</label>
												<div class="input-group mb-3">
													<span class="input-group-text" id="basic-addon1"><i
															class="fa fa-user"></i></span>
													<input id="username" type="text" name="username" class="form-control"
														placeholder="Bank Registered Name" required
														data-validation-regex-regex="^[a-zA-Z ]*$">
												</div>
												<div class="help-block font-small-3"></div>
											</div>
										</div>

										<div class="col-lg-12 col-md-12 col-12 mb-3 p-0">
											<div class="form-group">
												<label for="useremail" class="">Email id *</label>
												<div class="input-group mb-3">
													<span class="input-group-text" id="basic-addon1"><i
															class="fa fa-envelope"></i></span>
													<input id="useremail" type="email" name="useremail" class="form-control"
														placeholder="Email Id" required>
												</div>
												<div class="help-block font-small-3"></div>
											</div>
										</div>
								

										<div class="form-group m-b-0 d-flex justify-content-center">
											<button type="submit" id="form-submit3" onclick="_tfa.push({notify: 'event', name: 'priv_lead', id: 1779022});" class="btn btn-block btn-lg btn-primary w-25 btn-process" >PROCESS</button>
										</div>
								<?php echo form_close(); ?>

						<?php } ?>
						</div>

        </div>

    </div>
</div>
<div class="container p-t-20 p-b-20">
	<div class="col-md-12 p-0">
		<h3 class="text-dark text-center mb-5">Our Lending Partners</h3>

		<div class="carousel client-logos" data-margin="0" data-items="6" data-autoplay="true" data-items-md="6" data-items-sm="2" data-items-xs="2" data-arrows="false" data-dots="false">
			<?php foreach ($banklist as $row) { ?>
					<img class="img-fluid" alt="<?php echo $row->bank_name;?>" src="<?php echo base_url('assets/images/bank/' . $row->bank_image); ?>">
			<?php } ?>
		</div>
	</div>
</div>
<div class="container my-4">
	<h3 class="text-dark text-center mb-5">Why Privylege Finance?</h3>
    <div class="row g-3 text-center">
		
        <div class="col-md-3 mt-2">
            <div class="stat-card">
                <div>
                    <h4>5000+ </h4>
                    <p>Happy Customers</p>
                </div>
                <div class="icon">😊</div>
            </div>
        </div>

        <div class="col-md-3 mt-2">
            <div class="stat-card">
                <div>
                    <h4>Rs. 4000+ crore</h4>
                    <p>Loans Disbursed</p>
                </div>
                <div class="icon">💼</div>
            </div>
        </div>

        <div class="col-md-3 mt-2">
            <div class="stat-card">
                <div>
                    <h4>8+</h4>
                    <p>NBFCs Partners</p>
                </div>
                <div class="icon">⬜</div>
            </div>
        </div>

        <div class="col-md-3 mt-2">
            <div class="stat-card">
                <div>
                    <h4>100%</h4>
                    <p>Online Process</p>
                </div>
                <div class="icon">👍</div>
            </div>
        </div>

    </div>
</div>
<section class="container background-titan-white p-t-20 p-b-20">
	<div class="col-md-12 p-0">
		<?php  $offer = array('1.jpeg','2.jpeg','3.jpeg');?>
		<div class="carousel client-logos" data-margin="0" data-items="3" data-autoplay="false" data-items-md="3" data-items-sm="1" data-items-xs="1" data-arrows="false" data-dots="false">
			<?php foreach ($offer as $row) { ?>
				
					<a href="#"><img class="img-fluid" alt="<?php echo $row;?>" src="<?php echo base_url('assets/images/privylege_finance/' . $row); ?>"></a>
				
			<?php } ?>
		</div>
	</div>
</section>
<section class="container background-titan-white p-t-20 p-b-20">
	
		<div class="row">
			<div class="col-12 text-dark">
				<p class="mb-1"><small>Disclosure: Loan tenure ranges from a minimum of 6 months to a maximum of 60 months (5 years), depending on the policies and eligibility criteria of the respective lending partner. The Maximum Annual Percentage Rate (APR) is 34% per annum, inclusive of applicable interest rates, processing fees, and other charges. Processing fees may apply up to 2% of the approved loan amount.</small></p>

				<p class="mb-1"><small>Representative Example: For a loan amount of ₹1,00,000 at an interest rate of 11.5% per annum for a tenure of 60 months (5 years), with a processing fee of 2% (₹2,000), the approximate EMI would be ₹2,301. The total interest payable would be approximately ₹38,059, and the total cost of the loan / total repayment amount would be approximately ₹1,38,059. The resulting APR, including applicable charges, would be approximately 14.41%.</small></p>

				<p class="mb-1"><small>All figures provided above are illustrative, indicative, and subject to change. Actual loan approval, interest rate, APR, loan amount, tenure, processing fees, charges, and disbursement timelines are determined solely by the respective lending partner based on the applicant's profile, credit assessment, internal policies, regulatory requirements, and applicable terms and conditions.</small></p>

				<p class="mb-1"><small>Bharatfinpro Private Limited is a financial services consultancy and loan facilitation platform and is not a lender. We do not provide loans, make credit decisions, guarantee loan approval, or guarantee loan disbursal. Loan products are offered by authorized Banks, NBFCs, and regulated financial institutions subject to their eligibility criteria and approval processes.</small></p>

				<p class="mb-1"><small>The amount paid is only for the service charge. We are not lenders and do not guarantee any loan approval.</small></p>

				<p class="mb-1"><small>Important Note: BE AWARE! We ask our customers to make payments ONLY on our website <a class="text-dark" href="<?php echo COMPANY_SITE; ?>">bharatfinpro.com</a> and NOT through any other source, directly or indirectly. Thanks!</small></p>

				<p class="mb-0"><small><strong>Registered Office Address:</strong> <?php echo COMPANY_ADDRESS; ?></small></p>

				<p class="mb-0"><small><strong>Phone: </strong> <?php echo COMPANY_MOBILE;?> </small></p>

				<p class="mb-0"><small><strong>Email: </strong> <?php echo COMPANY_EMAIL;?></small></p>
			</div>
		</div>
</section>

<script src="<?php echo base_url('assets/js/loanscript.js'); ?>" type="text/javascript"></script>

<?php
$this->load->view('includes/footer-plan-apply.php');
?>

<script src="<?= base_url('assets/js/processSteps.js') ?>" type="text/javascript"></script>
<script>
/* Active selection effect */
document.querySelectorAll('.loan-option').forEach(option => {
    option.addEventListener('click', () => {
        document.querySelectorAll('.loan-option').forEach(o => o.classList.remove('active'));
        option.classList.add('active');
        option.querySelector('input').checked = true;
    });
});

/* Active selection effect */
document.querySelectorAll('.usertype').forEach(option => {
    option.addEventListener('click', () => {
        document.querySelectorAll('.usertype').forEach(o => o.classList.remove('active'));
        option.classList.add('active');
        option.querySelector('input').checked = true;
    });
});
</script>
<script>
/*let current = 0;
const steps = document.querySelectorAll(".step");

document.querySelectorAll(".btn-process").forEach(btn => {

    btn.addEventListener("click", function (e) {

        const currentStep = steps[current];

        // all fields in current step
        const fields = currentStep.querySelectorAll("input, select, textarea");

        let isValid = true;

        fields.forEach(field => {

            // trigger browser validation
            if (!field.checkValidity()) {

                isValid = false;

                // show validation message
                field.reportValidity();

                field.classList.add("is-invalid");
            } else {
                field.classList.remove("is-invalid");
            }

        });

        // stop here if validation fails
        if (!isValid) {
            return false;
        }

        // move next step
        steps[current].classList.remove("active");
        steps[current].classList.add("exit-left");

        current++;

        if (steps[current]) {
            steps[current].classList.add("active");
        }

    });

});*/
</script>