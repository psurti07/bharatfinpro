<?php
$this->load->view('includes/header-plan-apply.php');
?>

<section class="wrapper loan-application-section background-alice-blue">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-7 order-md-1 order-2">
                <div class="text-start">
                    <span
                        class="badge rounded-pill text-main-top text-wrap text-start success-card mb-4  background-titan-white border text-success">
                        <i class="fa fa-dot-circle text-success"></i>
                        100% digital · instant disbursal
                    </span>
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-8 col-8">
                            <h1 class="font-weight-600 text-dark-navy mb-4"> Instant <span
                                    class="text-sky">loans</span>,<br>
                                built for India.</span>
                                </h3>
                                <p class="text-gray">Get pre-approved offers from our NBFC partners, ranging from
                                    ₹50,000 to
                                    ₹10,00,000, delivered in minutes.</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-4">
                            <img src="<?php echo base_url('assets/images/bharatpro_finance/instant-loan.png'); ?>"
                                class="img-fluid" alt="" />
                        </div>
                    </div>
                    <div class="row  mb-4">
                        <div class="col-md-6 col-6 p-1">
                            <div class="staticts-card-wrap border p-3 mt-0 bg-white">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div class="">
                                        <p class="stat-val mb-2 mt-1 text-uppercase text-gray">From</p>
                                        <h3 class="mb-0 card-content font-weight-bold text-dark-navy">₹50,000
                                        </h3>
                                    </div>
                                    <div class="ms-3">
                                        <i class="fa fa-bolt text-info fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6 p-1">
                            <div class="staticts-card-wrap border p-3 mt-0 bg-white">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div class="">
                                        <p class="stat-val mb-2 mt-1 text-uppercase text-gray">up to</p>
                                        <h3 class="mb-0 card-content font-weight-bold text-dark-navy">₹10,00,000
                                        </h3>
                                    </div>
                                    <div class="ms-3">
                                        <i class="icon-shield text-info fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6 p-1">
                            <div class="staticts-card-wrap border p-3 mt-0 bg-white">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div class="">
                                        <p class="stat-val mb-2 mt-1 text-uppercase text-gray">Starts at</p>
                                        <h3 class="mb-0 card-content font-weight-bold text-dark-navy">10.5% p.a.
                                        </h3>
                                    </div>
                                    <div class="ms-3">
                                        <i class="fa fa-percentage text-info fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6 p-1">
                            <div class="staticts-card-wrap border p-3 mt-0 bg-white">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div class="">
                                        <p class="stat-val mb-2 mt-1 text-uppercase text-gray">Disbursal</p>
                                        <h3 class="mb-0 card-content font-weight-bold text-dark-navy">Instant
                                        </h3>
                                    </div>
                                    <div class="ms-3">
                                        <i class="fa fa-mobile-alt text-info fa-lg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center counter-wrapper text-center pt-4 border-top">
                        <div class="col-md-4 col-4 mt-0 p-0">
                            <div class="counter-wrap text-left position-relative">
                                <h3 class="counter counter-lg text-dark-navy font-weight-600 mb-0">
                                    2M+</h3>
                                <div class="text-start position-relative">
                                    <p class="text-gray fa-xs">Happy borrowers</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4 col-4 mt-0 p-0">
                            <div class="counter-wrap text-left position-relative">
                                <h3 class="counter counter-lg text-dark-navy font-weight-600 mb-0">
                                    ₹500Cr+</h3>
                                <div class="text-start position-relative">
                                    <p class="text-gray fa-xs">Disbursed</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4 col-4 mt-0 p-0">
                            <div class="counter-wrap text-left position-relative">
                                <h3 class="counter counter-lg text-dark-navy font-weight-600 mb-0">
                                    4.8 <i class="fa fa-star text-primary"></i></h3>
                                <div class="text-start position-relative">
                                    <p class="text-gray fa-xs">Customer rating</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-5 order-md-1 order-1 mb-lg-0 mb-4">
                <?php if($processstep == 'step1') { ?>
                <div class="loan-form-right p-md-6 p-4 mb-md-0 mb-5 ms-lg-10 m-0 card">
                    <div class="">
                        <?php echo form_open('plan/sendotpCode', array('id'=>'submitForm1', 'class'=>'text-start', 'novalidate'=>'novalidate')); ?>
                        <h3 class="font-weight-bold pb-4 mb-1 text-dark-navy-navy">Apply for <span
                                class="text-primary">₹10,00,000
                            </span>personal
                            loan
                            in minutes
                        </h3>
                        <div class="background-alice-blue border counter-wrapper-main mb-3">
                            <div class="row counter-wrapper p-3">
                                <div class="col-sm-4 col-4">
                                    <div class="counter-wrap text-center position-relative">
                                        <h3 class="counter counter-lg text-primary font-weight-600 mb-0">
                                            ₹4,823</h3>
                                        <div class=" text-start position-relative">
                                            <p class="text-gray fa-sm mb-0">Monthly EMI</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-4">
                                    <div class="counter-wrap text-center position-relative">
                                        <h3 class="counter counter-lg text-dark-navy font-weight-600 mb-0">
                                            11.5%</h3>
                                        <div class=" text-start position-relative">
                                            <p class="text-gray fa-sm mb-0">Interest rate</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-4">
                                    <div class="counter-wrap text-center position-relative">
                                        <h3 class="counter counter-lg text-dark-navy font-weight-600 mb-0">
                                            72</h3>
                                        <div class=" text-start position-relative">
                                            <p class="text-gray fa-sm mb-0">Months tenure</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-floating mb-0">
                            <div class="range text-center">
                                <div class="d-flex justify-content-between required-amount align-items-center">
                                    <h6 class="mb-0 text-dark-navy">Loan amount</h6>

                                    <div class="range__value text-center mb-0">
                                        <span
                                            class="text-uppercase mb-0 text-primary loan-price px-3 py-1">₹2,50,000</span>
                                    </div>
                                </div>
                                <div class="range__slider">
                                    <input type="range" class="rangs" id="rangs" name="loanamount" step="10000">
                                </div>
                                <div class="d-flex justify-content-between required-price mb-4">
                                    <h6 class="text-uppercase text-gray mb-0">₹50,000</h6>
                                    <h6 class="text-uppercase text-gray mb-0">₹10,00,000</h6>
                                </div>
                            </div>
                        </div>
                        <div class="form-step active" data-step="1">
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="form-group">
                                        <label class="text-dark-navy">Mobile number</label>
                                        <div class="input-group mb-0 border">
                                            <span
                                                class="input-group-text text-dark-navy background-alice-blue border-right"
                                                id="basic-addon1">+91</span>
                                            <input id="mobile" type="text" name="mobile"
                                                class="form-control text-dark-navy border-0 background-alice-blue"
                                                placeholder="Bank-registered number" required minlength="10"
                                                maxlength="10" inputmode="numeric"
                                                data-validation-regex-regex="^[6789]\d{9}$"
                                                data-validation-regex-message="Enter valid mobile number">
                                        </div>

                                        <div class="help-block font-small-3"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="terms" id="terms"
                                                class="custom-control-input mb-0" value="1"
                                                style="width:auto;height:auto" checked required>

                                            <label class="custom-control-label" for="terms">By submittingthe form, you
                                                agree to the <a href="<?= base_url('terms-conditions') ?>"
                                                    target="_blank" style="text-decoration: none;color:#000 !important"
                                                    class="text-dark-navy">Terms
                                                    of
                                                    Use</a>
                                                and <a href="<?= base_url('privacy-policy') ?>" target="_blank"
                                                    style="text-decoration: none;color:#000 !important"
                                                    class="text-dark-navy">Privacy
                                                    Policy</a> of
                                                Bharatfinpro.com.</label>
                                        </div>
                                        <div class="help-block ms-0 ps-0 mb-2"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="form-group mb-0 ps-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="promotion" id="promotion"
                                                class="custom-control-input mb-0" value="1"
                                                style="width:auto;height:auto" checked required>
                                            <label class="custom-control-label" for="promotion">I agree to receive
                                                promotional & informational communications from IndiaPro Finance
                                                via Email, SMS and RCS.</label>
                                        </div>
                                        <div class="help-block ms-0 ps-0 mb-2"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button type="submit" id="form-submit1"
                                            class="btn btn-block btn-lg btn-primary">Start
                                            Process <i class="icon-arrow-right"></i></button>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <p class="text-gray fa-sm text-center mb-0 mt-3">Get your <span
                                            class="text-dark-navy bottom-text "><strong>personal loan in just 3
                                                steps</strong></span> from
                                        our
                                        NBFC/lending partners.</p>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <?php } else if($processstep == 'step2') { ?>
                        <?php echo form_open('plan/sendotpCode', array('id'=>'submitForm2', 'class'=>'text-start', 'novalidate'=>'novalidate')); ?>
                        <div class="otp-verification card">
                            <div class="form-step active" data-step="2">
                                <div class="otp-details">
                                    <div class="p-4">
                                        <span class="text-info text-uppercase mb-1">Almost there</span>
                                        <h3 class="text-dark-navy font-weight-bold">Verify it's really <span
                                                class="text-primary">you</span>.
                                        </h3>
                                        <p class="text-gray mb-3">We sent a 4-digit code to your mobile
                                            to
                                            keep
                                            your
                                            <br>
                                            application secure.
                                        </p>
                                        <div class="step-details mb-0 background-alice-blue border p-3">
                                            <p class="step-label text-gray mb-1 mt-0">Mobile</p>
                                            <p class="text-dark-navy font-weight-bold step-number mb-1">
                                                <?php echo $userdetails['mobile']; ?>
                                            </p>
                                            <p class="text-primary number-change mb-0">Change Number</p>
                                        </div>

                                    </div>
                                    <div class="otp-details-wrap p-4 border-top">
                                        <div class="row align-items-center mb-3">
                                            <div class="col-lg-1">
                                                <div class="background-alice-blue icon-image-wraper">
                                                    <i class="fa fa-mobile-alt"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 ml-lg-4 ml-0">
                                                <h4 class="text-dark-navy font-weight-bold mb-0">Please enter the OTP
                                                </h4>
                                                <h5 class="text-gray">Mobile no.: +91 9809809870
                                                </h5>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <input type="hidden" name="otpmobile" id="otpmobile"
                                                value="<?php echo $userdetails['mobile']; ?>">
                                            <input type="hidden" name="loanamount" id="loanamount"
                                                value="<?php echo $userdetails['loanamount']; ?>">
                                            <input type="hidden" name="usertype" id="usertype"
                                                value="<?php echo $userdetails['usertype']; ?>">
                                            <input type="hidden" name="username" id="username"
                                                value="<?php echo $userdetails['username']; ?>">
                                            <input type="hidden" name="referralcode" id="referralcode"
                                                value="<?php echo $userdetails['referralcode']; ?>">

                                            <div class="col-lg-12">
                                                <div class="form-group form-floating mb-4">
                                                    <label for="mobile"
                                                        class="position-static ps-0 text-uppercase fw-bold pt-0">Enter
                                                        OTP</label>
                                                    <div class="input-field input-field text-start">
                                                        <input type="number" maxlength="1" inputmode="numeric"
                                                            pattern="[0-9]*" id="otpcode" name="otpcode[]"
                                                            class="me-md-0 me-2 otp-input">
                                                        <input type="number" maxlength="1" inputmode="numeric"
                                                            pattern="[0-9]*" id="otpcode" name="otpcode[]"
                                                            class="me-md-0 me-2 otp-input">
                                                        <input type="number" maxlength="1" inputmode="numeric"
                                                            pattern="[0-9]*" id="otpcode" name="otpcode[]"
                                                            class="me-md-0 me-2 otp-input">
                                                        <input type="number" maxlength="1" inputmode="numeric"
                                                            pattern="[0-9]*" id="otpcode" name="otpcode[]"
                                                            class="me-md-0 me-2 otp-input">
                                                    </div>
                                                    <div class="help-block font-small-3"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="p-countdown">
                                                        <div class="p-countdown-count" id="counttime">
                                                            <code>New OTP code will generate in <span id="timer">30</span> Sec</code>
                                                        </div>
                                                        <div id="resendBtn" class="d-none">
                                                            <code>Didn’t receive OTP? <a href="javascript:resendotp()">Resend OTP</a></code>
                                                        </div>
                                                        <code id="resend-message"></code>
                                                        <div class="custom-error" id="otpcodeError"></div>
                                                    </div>
                                                </div>
                                                <div class="custom-error" id="mobilenoError2"></div>
                                            </div>
                                            <div class="col-lg-12">

                                                <button type="submit" id="form-submit2"
                                                    class="btn btn-block btn-lg btn-primary btn-send">Verify
                                                    OTP <i class="icon-arrow-right"></i></button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <?php } else if($processstep == 'step3') { ?>
                        <?php echo form_open('plan/registeredUser', array('id'=>'submitForm3', 'class'=>'text-start', 'novalidate'=>'novalidate')); ?>
                        <div class="loan-profile-section loan-form-right">
                            <div class="profile-details p-md-6 p-4 card loan-form-right">
                                <h3 class="text-dark-navy mb-1">Select your profile </h3>
                                <p class="text-gray mb-3">A few details to personalise your offers.
                                </p>


                                <input type="hidden" name="loanamount" id="loanamount"
                                    value="<?php echo $userdetails['loanamount']; ?>">

                                <input type="hidden" name="referralcode" id="referralcode"
                                    value="<?php echo $userdetails['referralcode']; ?>">
                                <input type="hidden" name="usermobile" id="usermobile"
                                    value="<?php echo $userdetails['mobile']; ?>">
                                <input type="hidden" name="usertype" id="usertype"
                                    value="<?php echo $userdetails['usertype']; ?>">
                                <div class="form-group form-floating mb-4">
                                    <div class="step-details mb-0 background-alice-blue border p-3">
                                        <div class="row">
                                            <div class="col-lg-6 col-6">
                                                <p class="step-label text-gray text-uppercase mb-0 mt-0 fa-xs">
                                                    Loan
                                                    amount</p>
                                                <p class="text-dark-navy mb-0 step-price font-weight-bold">₹<?php echo $userdetails['loanamount']; ?></p>
                                            </div>

                                            <div class="col-lg-6 col-6">
                                                <p class="step-label text-gray text-uppercase mb-0 mt-0 fa-xs">
                                                    Mobile
                                                </p>
                                                <p class="text-dark-navy mb-0 step-price font-weight-bold">+91
                                                    7048313607</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4 mb-4">
                                        <div
                                            class="col-lg-6 col-md-6 col-sm-6 col-12 mt-0 state-card mb-sm-0 mb-2 px-lg-3 px-md-1 px-3">
                                            <fieldset class="picker1">
                                                <label for="plan-1">
                                                    <input type="radio" name="loantype" id="plan-1" value="21"
                                                        class="d-none" checked="" data-gtm-form-interact-field-id="1">
                                                    <span class="p-3 background-alice-blue">
                                                        <div class="subscription-price pb-0 pt-0">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="icon staticts-card-btn btn btn-block pe-none background-honeydew  border-0">
                                                                    <i class="icon-briefcase text-primary fa-lg"></i>
                                                                </div>
                                                                <div class="ml-lg-3 ml-2">
                                                                    <h5 class="mb-0 text-dark-navy">
                                                                        Salaried
                                                                    </h5>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </label>
                                            </fieldset>
                                        </div>
                                        <div
                                            class="col-lg-6 col-md-6 col-sm-6 col-12 mt-0 state-card px-lg-3 px-md-1 px-3">
                                            <fieldset class="picker1">
                                                <label for="plan-2">
                                                    <input type="radio" name="loantype" id="plan-2" value="22"
                                                        class="d-none" checked="" data-gtm-form-interact-field-id="2">
                                                    <span class="p-3 background-alice-blue">
                                                        <div class="subscription-price pb-0 pt-0">
                                                            <div class="d-flex align-items-center">
                                                                <div
                                                                    class="icon staticts-card-btn btn btn-block background-honeydew pe-none border-0">
                                                                    <i class="icon-flag text-primary fa-lg"></i>
                                                                </div>
                                                                <div class="ml-lg-3 ml-2">
                                                                    <h5 class="mb-0 text-dark-navy">
                                                                        Self-Emp.
                                                                    </h5>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </label>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="username" class="text-dark-navy">Full
                                                    Name</label>
                                                <input id="username" type="text" name="username" class="form-control"
                                                    placeholder="Full Name" required
                                                    data-validation-regex-regex="^[a-zA-Z ]*$">
                                                <div class="help-block font-small-3"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="email" class="text-dark-navy">Email
                                                    ID</label>
                                                <input id="email" type="email" name="useremail" placeholder="Email id"
                                                    class="form-control" required>
                                                <div class="help-block font-small-3"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">

                                            <button type="submit" id="form-submit2"
                                                class="btn btn-primary btn-send mt-2 mt-md-0 w-100 btn-lg">Submit<i
                                                    class="icon-arrow-right"></i></button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<section class=" p-t-20 p-b-20">
    <div class="container">
        <div class="row">
            <div class="col-12 text-dark-navy">
                <p class="mb-1"><small><strong>Disclosure:</strong>Loan tenure ranges from minimum 6 months to maximum
                        60
                        months, with annual interest rates starting at 11% and going up to 34%. A processing fee up to
                        2%
                        may be applicable. Representative example
                        loan of ₹1,00,000 at 12.5% p.a. for 12 months with a 2% processing fee — interest payable ≈
                        ₹6,720,
                        processing fee ₹2,000, total cost ≈ ₹1,08,720, APR ≈ 14.27%. *T&C apply. All numbers are
                        indicative;
                        final loan
                        specifics may vary by customer profile and NBFC criteria. We are not lenders and do not
                        guarantee
                        approval.</small></p>

                <p class="mb-0"><small><strong>Registered Office Address:</strong>
                        <?php echo COMPANY_ADDRESS; ?></small></p>

                <p class="mb-0"><small><strong>Phone: </strong> <?php echo COMPANY_MOBILE; ?> </small></p>

                <p class="mb-0"><small><strong>Email: </strong> <?php echo COMPANY_EMAIL; ?></small></p>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo base_url('assets/js/loanscript-plan.js'); ?>" type="text/javascript"></script>

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

$('.otp-input').on('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
    if (this.value.length === 1) {
        $(this).next('.otp-input').focus();
    }
});
$('.otp-input').on('keydown', function(e) {
    if (e.key === "Backspace" && this.value === '') {
        $(this).prev('.otp-input').focus();
    }
});
</script>