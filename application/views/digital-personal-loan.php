<?php
$this->load->view('includes/header-apply.php');
?>

<section class="fullscreen background-white">
    <div class="container">
        <div class="row align-items-center sm-m-t-35">
            <div class="col-lg-6 col-md-6 col-12 order-md-1 order-2 center sm-p-0">
                <div class="text-center">
                    <img src="<?php echo base_url('assets/images/slider/frame-7001.png'); ?>" alt="Personal Loan"
                        class="img-fluid m-b-20" />
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12 order-md-2 order-1 center sm-p-0">
                <div class="card border-2 border-2 shadow-none">
                    <div class="card-header background-honeydew" style="border-radius: 8px 8px 0 0;">
                        <div class="card-title">
                            <h6 class="font-italic">Need quick cash?</h6>
                            <h4 class="font-weight-bold">Avail up to <span class="text-orange">₹5,00,000</span>
                                personal loan instantly!</h4>
                        </div>
                    </div>

                    <div class="card-body sm-m-0">
                        <?php if ($processstep == 'step1') { ?>
                            <?php echo form_open('digital/sendotpCode', array('id' => 'submitForm1', 'class' => '', 'novalidate' => 'novalidate')); ?>
                            <div class="form-group">
                                <label>Select your required loan amount:</label>
                                <div class="range">
                                    <div class="range__slider">
                                        <input type="range" class="rangs" id="rangs" name="loanamount" step="10000">
                                    </div>

                                    <div class="row m-t-20">
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <div class="range__value">
                                                <label>Loan Amount : </label>
                                                <span></span>
                                            </div>
                                            <div class="range__emi d-none">
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="text-dark" for="mobile">Mobile no.</label>
                                <input type="text" aria-required="true" name="mobile" id="mobileno" class="form-control"
                                    placeholder="Enter mobile number" required maxlength="10" minlength="10"
                                    inputmode="numeric" data-validation-regex-regex="^[6789]\d{9}$"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                <div class="help-block font-small-3"></div>
                            </div>

                            <div class="custom-error" id="mobilenoError"></div>

                            <div class="form-group m-b-2">
                                <button type="submit" id="form-submit1" class="btn btn-block btn-lg btn-primary">APPLY
                                    NOW</button>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group mb-0 ps-0">
                                    <input type="checkbox" name="terms" id="terms" class="custom-control-input mb-0"
                                        value="1" style="width:auto;height:auto" checked required>
                                    <label class="custom-control-label" for="terms"
                                        style="display:unset;font-size:70%;color:#000;letter-spacing: 0.7px;">By submitting
                                        the
                                        form and proceeding, you agree to the <a href="<?= base_url('terms-conditions') ?>"
                                            target="_blank" style="text-decoration: none;color:#000 !important"
                                            class="text-dark">Terms of Use</a>
                                        and <a href="<?= base_url('privacy-policy') ?>" target="_blank"
                                            style="text-decoration: none;color:#000 !important" class="text-dark">Privacy
                                            Policy</a> of
                                        Bharatfinpro.com.</label>
                                    <div class="help-block ms-0 ps-0 mb-2"></div>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group mb-3 ps-0">
                                    <input type="checkbox" name="promotion" id="promotion" class="custom-control-input mb-0"
                                        value="1" style="width:auto;height:auto" checked required>
                                    <label class="custom-control-label" for="promotion"
                                        style="display:unset;font-size:70%;color:#000;letter-spacing: 0.7px;">I agree to
                                        receive
                                        promotional & informational communications from Bharatfinpro through Emails, calls
                                        or SMS
                                        Services.</label>
                                    <div class="help-block ms-0 ps-0 mb-2"></div>
                                </div>
                                <?php echo form_close(); ?>
                            <?php } else if ($processstep == 'step2') { ?>
                                <?php echo form_open('digital/checkotpCode', array('id' => 'submitForm2', 'class' => '', 'novalidate' => 'novalidate')); ?>

                                <div class="form-group">
                                    <img src="<?php echo base_url('assets/images/icons/mobile-otp.png') ?>" alt="Mobile OTP"
                                        class="m-b-20" />
                                    <label class="text-dark" for="mobileno">
                                        Mobile No. :
                                        <strong>
                                            <?php echo $userdetails['mobile']; ?>
                                        </strong>
                                    </label>
                                    <input type="hidden" name="loanamount" id="loanamount"
                                        value="<?php echo $userdetails['loanamount']; ?>" />
                                    <input type="hidden" name="otpmobile" id="otpmobile"
                                        value="<?php echo $userdetails['mobile']; ?>" />
                                </div>

                                <div class="form-group">
                                    <label for="otpcode">Please enter the OTP:</label>
                                    <input type="text" name="otpcode" id="otpcode"
                                        class="form-control optnumber text-center" required maxlength="4"
                                        inputmode="numeric" data-validation-regex-regex="[0-9]+"
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
                                    <button type="submit" id="form-submit2"
                                        class="btn btn-block btn-lg btn-primary">VERIFY</button>
                                </div>
                                <?php echo form_close(); ?>
                            <?php } else if ($processstep == 'step3') { ?>
                                <?php echo form_open('digital/registeredUser', array('id' => 'submitForm3', 'class' => '', 'novalidate' => 'novalidate')); ?>
                                <input type="hidden" name="loanamount" id="loanamount"
                                    value="<?php echo $userdetails['loanamount']; ?>">
                                <input type="hidden" name="referralcode" id="referralcode"
                                    value="<?php echo $userdetails['referralcode']; ?>">
                                <input type="hidden" name="loantype" id="loantype" value="11">

                                <div class="form-group">
                                    <label class="text-dark" for="username">Select Your Profile & Enter Your
                                        <strong>Details.</strong></label>
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
                                            Salaried </label>
                                        <label class="btn btn-light"> <input type="radio" name="usertype" value="1"
                                                autocomplete="off" /><i class="icon-flag"></i> Self Employed
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="text-dark" for="username">Full name</label>
                                    <input type="text" aria-required="true" name="username" id="username"
                                        class="form-control" placeholder="Enter you name" required
                                        data-validation-regex-regex="^[a-zA-z]+([\s][a-zA-Z]+)*$">
                                    <div class="help-block font-small-3"></div>
                                </div>

                                <div class="form-group">
                                    <label class="text-dark" for="useremail">Email id</label>
                                    <input type="email" aria-required="true" name="useremail" class="form-control"
                                        placeholder="Enter your email" required />
                                    <div class="help-block font-small-3"></div>
                                </div>

                                <div class="form-group m-b-0">
                                    <button type="submit" id="form-submit3"
                                        onclick="_tfa.push({notify: 'event', name: 'lead', id: 1779022});"
                                        class="btn btn-block btn-lg btn-primary">PROCESS</button>
                                </div>
                                <?php echo form_close(); ?>
                            <?php } ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php if ($processstep == 'step1') { ?>
    <section class="box-fancy section-fullwidth p-0">
        <div class="row text-white">
            <div class="col-lg-4 col-md-4" style="background-color: #012960;">
                <h1 class="text-lg text-uppercase">01.</h1>
                <h3>Eligibility Criteria</h3>
                <p class="text-white"><strong>NBFC Eligibility Criteria for Salaried:</strong><br />
                    <i class="fa fa-check"></i> Minimum Salary : Rs. 15,000 Monthly
                    <i class="fa fa-check"></i> Minimum Job Stability : 1 Year
                    <i class="fa fa-check"></i> Age : 21 Years or above
                </p>

                <p class="text-white"><strong>NBFC Eligibility Criteria for Self-Employed:</strong><br />
                    <i class="fa fa-check"></i> Minimum 1 Year Business Stability
                    <i class="fa fa-check"></i> Minimum 1 Year IT Return
                    <i class="fa fa-check"></i> Age : 21 Years or above
                </p>
            </div>

            <div class="col-lg-4 col-md-4" style="background-color: #012960e8;">
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

            <div class="col-lg-4 col-md-4" style="background-color: #012960e3;">
                <h1 class="text-lg text-uppercase">03.</h1>
                <h3>Trusted by millions</h3>
                <h4><i class="fa fa-chart-bar"></i> 75 k+ <span class="small">Happy Users</span></h4>
                <h4><i class="fa fa-chart-bar"></i> 10+ <span class="small">NBFC Partners</span></h4>
                <h4><i class="fa fa-chart-bar"></i> 34 million+ <span class="small">Loan Sanction</span></h4>
                <h4><i class="fa fa-chart-bar"></i> 100% <span class="small">Online Process</span></h4>
            </div>
        </div>
    </section>

    <section class="background-white p-b-40">
        <div class="container">
            <div class="heading-text heading-line text-center">
                <h4>Our Customers Testimonials</h4>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php $testimoniallist_a = array('1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png', '8.png'); ?>
                    <div class="carousel equalize testimonial testimonial-box" data-margin="20" data-arrows="true"
                        data-dots="false" data-items="3" data-items-sm="2" data-items-xxs="1"
                        data-equalize-item=".testimonial-item">
                        <?php foreach ($testimoniallist_a as $row) { ?>
                            <img src="<?php echo base_url('assets/images/' . $row); ?>" alt="customer img">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="background-white p-b-40">
        <div class="container">
            <div class="heading-text heading-line text-center">
                <h4>Frequently Asked Questions</h4>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="accordion accordion-simple">
                        <div class="ac-item">
                            <h5 class="ac-title">What is the EMI for Rs.1 Lakh Loan?</h5>
                            <div class="ac-content">
                                <p>Bharatfinpro offers loans at the lowest EMIs starting from Rs.2,224.</p>
                            </div>
                        </div>

                        <div class="ac-item">
                            <h5 class="ac-title">Which bank has the lowest interest rate for Loans?</h5>
                            <div class="ac-content">
                                <p>Bharatfinpro provides loan offers through top multiple banks in India that offer Lowest
                                    Loan Interest Rates. Loan approval is subjective to the applicant's documents.</p>
                            </div>
                        </div>

                        <div class="ac-item">
                            <h5 class="ac-title">How can I get a low-interest Loan?</h5>
                            <div class="ac-content">
                                <p>Simply by becoming a Bharatfinpro member. Get personalised consultation on getting loans
                                    at the lowest rates.</p>
                            </div>
                        </div>

                        <div class="ac-item">
                            <h5 class="ac-title">What CIBIL Score is required for a Loan?</h5>
                            <div class="ac-content">
                                <p>Bharatfinpro provides a loan if your CIBIL Score is 650 or higher.</p>
                            </div>
                        </div>

                        <div class="ac-item">
                            <h5 class="ac-title">How long will it take for my Loan to be processed?</h5>
                            <div class="ac-content">
                                <p>Once your application is submitted along with your documents, it can take anywhere
                                    between 1-7 days for your loan to get approved and a couple of days after that for the
                                    disbursement. Bharatfinpro helps to get instant loan approvals.</p>
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
                    <p class="mb-1"><small>Disclosure: Loan tenure ranges from a minimum of 6 months to a maximum of 60
                            months (5 years), depending on the lender’s policies. The Annual Percentage Rate (APR) will be
                            between 11.5% to 34% per annum, inclusive of interest rate and applicable charges. Processing
                            fees may apply up to 2% of the approved loan amount. Representative Example, for a loan amount
                            of ₹1,00,000 at an interest rate of 11.5% per annum for a tenure of 60 months (5 years), with a
                            processing fee of 2% (₹2,000), the approximate EMI would be ₹2,301, the total interest payable
                            would be approximately ₹38,059, and the total repayment amount would be approximately ₹1,38,059,
                            resulting in an APR of approximately 14.41% including applicable charges. *T&C Apply. All these
                            numbers are tentative/indicative, the final loan specifics may vary depending upon the customer
                            profile and NBFCs’ criteria, rules & regulations, and terms & conditions. Bharatfinpro Private
                            Limited does not guarantee loan approval or disbursal. Terms & Conditions apply. The amount paid
                            is only for the service charge. We are not lenders and do not guarantee any loan
                            approval.</small></p>

                    <p class="mb-1"><small>Important Note: BE AWARE! We ask our customers to make payments ONLY on our
                            website <a class="text-dark" href="<?php echo COMPANY_SITE; ?>">bharatfinpro.com</a> and NOT
                            through any other source, directly or indirectly. Thanks!</small></p>

                    <p class="mb-1"><small>Company Registered Address: <?php echo COMPANY_ADDRESS; ?></small></p>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<script src="<?php echo base_url('assets/js/loanscript.js'); ?>" type="text/javascript"></script>

<?php
$this->load->view('includes/footer-apply.php');
?>

<script type="text/javascript">
    function resendotp() {
        loanamount = document.getElementById('loanamount').value;
        mobile = document.getElementById('otpmobile').value;

        $.ajax({
            url: '<?php echo base_url("onlineprocess/resendotpCode"); ?>',
            type: "POST",
            data: 'mobile=' + mobile + '&loanamount=' + loanamount,
            dataType: "JSON",
            cache: false,
            processData: false,
            success: function(response) {
                if (response['success'] == true) {
                    $('#resend-message2').html(response['message']);
                    toastr.success(response['message']);
                } else {
                    toastr.error(response['message']);
                }
            },
            error: function(jXHR, textStatus, errorThrown) {
                toastr.error(errorThrown, 'ERROR');
            }
        });
    }
</script>

<script type="text/javascript">
    $(function() {
        $('#submitForm1').on('submit', function(e) {

            e.preventDefault();

            $.ajax({
                url: $(this).attr('action') || window.location.pathname,
                type: "POST",
                data: $(this).serialize(),
                dataType: "JSON",
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#form-submit1').html(
                        'Applying... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>'
                    );
                    $('#form-submit1').attr('disabled', true);
                },
                success: function(response) {
                    console.log(response);
                    if (response['success'] == true) {
                        if (response['redirect_url'] != "") {
                            window.location.href = response['redirect_url'];
                        } else {
                            window.location = "./personalLoan/s2/" + response['mobile'];
                        }
                    } else {
                        $('#mobilenoError1').html(response['message']);
                        toastr.error(response['message']);
                    }

                    $('#form-submit1').html('Apply Now');
                    $('#form-submit1').attr('disabled', false);
                },
                error: function(jXHR, textStatus, errorThrown) {
                    toastr.error(errorThrown, 'ERROR');
                    $('#form-submit1').html('Apply Now');
                    $('#form-submit1').attr('disabled', false);
                }
            });
        });

        $('#submitForm2').on('submit', function(e) {
            e.preventDefault();
            $('#resend-message2').html('');
            $('#otpcodeError').html('');

            $.ajax({
                url: $(this).attr('action') || window.location.pathname,
                type: "POST",
                data: $(this).serialize(),
                dataType: "JSON",
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#form-submit2').html(
                        'Verifying... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>'
                    );
                    $('#form-submit2').attr('disabled', true);
                },
                success: function(response) {
                    if (response['success'] == true) {
                        window.location = "../../personalLoan/s3/" + response['mobile'];
                    } else {
                        $('#otpcodeError').html(response['message']);
                        toastr.error(response['message']);
                    }

                    $('#form-submit2').html('Verify OTP');
                    $('#form-submit2').attr('disabled', false);
                },
                error: function(jXHR, textStatus, errorThrown) {
                    toastr.error(errorThrown, 'ERROR');
                    $('#form-submit2').html('Verify OTP');
                    $('#form-submit2').attr('disabled', false);
                }
            });
        });


        $('#submitForm3').on('submit', function(e) {
            e.preventDefault();
            $('#resend-message2').html('');
            $('#otpcodeError').html('');

            $.ajax({
                url: $(this).attr('action') || window.location.pathname,
                type: "POST",
                data: $(this).serialize(),
                dataType: "JSON",
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#form-submit3').html(
                        'Processing... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>'
                    );
                    $('#form-submit3').attr('disabled', true);
                },
                success: function(response) {
                    if (response['success'] == true) {
                        window.location.href = response['redirect_url'];
                    } else {
                        $('#otpcodeError').html(response['message']);
                        toastr.error(response['message']);
                    }

                    $('#form-submit3').html('Process');
                    $('#form-submit3').attr('disabled', false);
                },
                error: function(jXHR, textStatus, errorThrown) {
                    toastr.error(errorThrown, 'ERROR');
                    $('#form-submit3').html('Process');
                    $('#form-submit3').attr('disabled', false);
                }
            });
        });


    });
</script>