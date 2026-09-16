<?php
$this->load->view('includes/header-apply.php');
?>

<section class="fullscreen background-grey">
    <div class="container mb-0">
        <div class="row align-items-start mt-5">
            <div class="col-lg-7 col-md-6 col-12 order-md-1 order-2 center pr-lg-5 pr-0">
                <div class="text-start">
                    <span
                        class="badge badge-blue rounded-pill text-blue text-main-top-main text-wrap text-left d-inline-flex bg-white border">
                        <i class="fa fa-magic text-orange mr-2"></i>RBI-registered NBFC partners · 100% paperless
                    </span>
                    <h2 class="text-blue font-weight-bold display-4 mt-3">Instant credit up to <br> <span
                            class="text-orange ">₹10 Lakhs
                        </span> <br> built for new-age <br>
                        India.</h2>
                    <p class="mb-4">
                        Compare offers from 25+ NBFCs in seconds. Sanction in minutes,
                        disbursal within 48 hours — entirely from your phone.
                    </p>
                    <ul
                        class="d-flex list-unstyled   d-flex align-items-center mb-7 align-middle flex-sm-nowrap flex-wrap justify-content-between">
                        <li class="mr-5 text-blue mb-lg-0 mb-2"><i class="fas fa-magic mr-2 text-orange"></i>Sanction in
                            5 mins</li>
                        <li class="mr-5 text-blue mb-lg-0 mb-2"><i class="fa fa-lock mr-2 text-orange"></i>Bank-grade
                            security</li>
                        <li class="text-blue"><i class="fa fa-award mr-2 text-orange"></i>2.25L+ happy customers</li>
                    </ul>
                    <div class="carousel client-logos" data-items="2" data-dots="false">
                        <div>
                            <img src="<?php echo base_url('assets/images/clients-img-1.png'); ?>"
                                alt="gold membership card" class="w-100">
                        </div>
                        <div>
                            <img src="<?php echo base_url('assets/images/client-img-2.png'); ?>"
                                alt="gold membership card" class="w-100">
                        </div>
                        <div>
                            <img src="<?php echo base_url('assets/images/clients-img-1.png'); ?>"
                                alt="gold membership card" class="w-100">
                        </div>
                        <div>
                            <img src="<?php echo base_url('assets/images/client-img-2.png'); ?>"
                                alt="gold membership card" class="w-100">
                        </div>
                        <div>
                            <img src="<?php echo base_url('assets/images/clients-img-1.png'); ?>"
                                alt="gold membership card" class="w-100">
                        </div>
                        <div>
                            <img src="<?php echo base_url('assets/images/client-img-2.png'); ?>"
                                alt="gold membership card" class="w-100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-12 order-md-2 order-1 center">
                <div class="card border overflow-auto card-form-right">
                    <div class="card-body sm-m-0">
                        <?php if ($processstep == 'step1') { ?>
                        <?php echo form_open('digital/sendotpCode', array('id' => 'submitForm1', 'class' => '', 'novalidate' => 'novalidate')); ?>
                        <div class="card-title text-center">
                            <p class="text-uppercase text-orange font-weight-bold mb-0">Start Your Loan</p>
                            <h3 class="font-weight-bold text-blue mb-3">Get Instant Credit up to   <span
                                    class="text-orange">₹10
                                    Lakhs</span>
                                in minutes</h3>
                        </div>
                        <div class="form-group">
                            <div class="range">
                                <div class="range__value text-center">
                                    <span></span>
                                </div>
                                <div class="d-flex justify-content-between required-amount">
                                    <h6 class="text-uppercase mb-0">enter required amount</h6>
                                    <h6 class="text-uppercase mb-0">₹50K – ₹10L</h6>
                                </div>
                                <div class="range__slider">
                                    <input type="range" class="rangs" id="rangs" name="loanamount" step="10000">
                                </div>
                                <div class="d-flex justify-content-between required-price">
                                    <h6 class="text-uppercase mb-0">₹50,000</h6>
                                    <h6 class="text-uppercase mb-0">₹10,00,000</h6>
                                </div>
                            </div>

                        </div>
                        <div class="switcher-block-main switcher-block-main-wrap shadow-none p-0">
                            <div class="title mt-6">
                                <h6 class="text-uppercase mb-2">Employment type</h6>
                            </div>
                            <div class="row">

                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-0 state-card mb-sm-0 mb-2 p-1">

                                    <fieldset class="picker1">
                                        <label for="plan-1">
                                            <input type="radio" name="usertype" id="plan-1" value="1" class="d-none"
                                                checked data-gtm-form-interact-field-id="1">
                                            <span class="p-3">
                                                <div class="subscription-price pb-0 pt-0">
                                                    <div class="d-flex align-items-start">
                                                        <div class="icon staticts-card-btn btn btn-block bg-orange">
                                                            <i class="icon-briefcase fa-lg"></i>
                                                        </div>
                                                        <div class="ml-2">
                                                            <h5 class="mb-0 text-blue">Salaried
                                                            </h5>
                                                            <p class="mb-0 card-content fa-xs">Earn a monthly salary
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="round-radiobox"></div>
                                            </span>
                                        </label>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-0 state-card p-1">
                                    <fieldset class="picker1">
                                        <label for="plan-2">
                                            <input type="radio" name="usertype" id="plan-2" value="2" class="d-none"
                                                data-gtm-form-interact-field-id="2">
                                            <span class="p-3">
                                                <div class="subscription-price pb-0 pt-0">
                                                    <div class="d-flex align-items-start">
                                                        <div class="icon staticts-card-btn btn btn-block pe-none background-webcolor-blue border-0">
                                                            <i class="icon-flag fa-lg"></i>
                                                        </div>
                                                        <div class="ml-2">
                                                            <h5 class="mb-0 text-blue">
                                                                Self-Emp.
                                                            </h5>
                                                            <p class="mb-0 card-content">Run your own business
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="round-radiobox"></div>
                                            </span>
                                        </label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-dark text-uppercase" for="mobile">Mobile
                                Number</label>
                            <div class="input-group mb-3 border">
                                <span class="input-group-text text-dark background-grey font-weight-bold border-right"
                                    id="basic-addon1">+91</span>
                                <input type="text" aria-required="true" name="mobile" id="mobileno"
                                    class="form-control border-0" placeholder="Bank-registered number" required
                                    maxlength="10" minlength="10" inputmode="numeric"
                                    data-validation-regex-regex="^[6789]\d{9}$"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                            </div>

                            <div class="help-block font-small-3"></div>
                        </div>
                        <div class="custom-error" id="mobilenoError"></div>
                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="terms" id="terms" class="custom-control-input mb-0"
                                    value="1" style="width:auto;height:auto" checked required>

                                <p class="custom-control-label fa-xs" for="terms">By submitting this form &
                                    proceeding,
                                    you agree to the <a href="<?= base_url('terms-conditions') ?>" target="_blank"
                                        style="text-decoration: none;color:#000 !important" class="text-dark">Terms
                                        of
                                        Use</a>
                                    and <a href="<?= base_url('privacy-policy') ?>" target="_blank"
                                        style="text-decoration: none;color:#000 !important" class="text-dark">Privacy
                                        Policy</a> of
                                    Bharatfinpro.com.</p>
                            </div>
                            <div class="help-block ms-0 ps-0 mb-2"></div>
                        </div>
                        <div class="form-group mb-0 ps-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="promotion" id="promotion" class="custom-control-input mb-0"
                                    value="1" style="width:auto;height:auto" checked required>
                                <p class="custom-control-label fa-xs" for="promotion">I agree to receive promotional &
                                    informational communications from
                                    IndiaFinPro through Emails, calls or SMS/RCS Services.</p>
                            </div>
                            <div class="help-block ms-0 ps-0 mb-2"></div>
                        </div>
                        <div class="form-group m-b-0">
                            <button type="submit" id="form-submit1"
                                class="btn btn-block btn-lg btn-orange text-uppercase">Start Process <i
                                    class="icon-arrow-right"></i></button>
                        </div>

                        <ul class="d-flex align-items-center mb-0 partner-image list-unstyled flex-wrap">
                            <li class="mr-3">
                                <h6 class="fw-light text-uppercase">Powered by</h6>
                            </li>
                            <li class="mr-3">
                                <img src="<?php echo base_url('assets/images/फटाकPAY.png'); ?>"
                                    alt="gold membership card" class="w-100">
                            </li>
                            <li class="mr-3"> <img src="<?php echo base_url('assets/images/weRize.png'); ?>"
                                    alt="gold membership card" class="w-100">
                            </li>
                            <li class="mr-3">
                                <img src="<?php echo base_url('assets/images/IIFL.png'); ?>" alt="gold membership card"
                                    class="w-100">
                            </li>
                            <li class="mr-3">
                                <img src="<?php echo base_url('assets/images/moneyview.png'); ?>"
                                    alt="gold membership card" class="w-100">
                            </li>
                        </ul>
                        <?php echo form_close(); ?>
                        <?php } else if ($processstep == 'step2') { ?>
                        <?php echo form_open('digital/checkotpCode', array('id' => 'submitForm2', 'class' => '', 'novalidate' => 'novalidate')); ?>
                        <h3 class="mb-0 text-start text-blue font-weight-bolder">Verify your mobile</h3>
                        <div class="form-group">

                            <p class="text-dark" for="mobileno">
                                We've sent a 6-digit OTP to
                                <strong>
                                    <?php echo $userdetails['mobile']; ?>
                                </strong>
                            </p>
                            <input type="hidden" name="loanamount" id="loanamount"
                                value="<?php echo $userdetails['loanamount']; ?>" />
                            <input type="hidden" name="otpmobile" id="otpmobile"
                                value="<?php echo $userdetails['mobile']; ?>" />
                        </div>

                        <div class="form-group">
                            <label for="otpcode" class="text-uppercase">Enter OTP</label>
                           
                            <div class="input-field input-field text-start d-flex">
                                <input type="number" maxlength="1" inputmode="numeric" pattern="[0-9]*" id="otpcode"
                                    name="otpcode[]" class="me-md-0 me-2 otp-input">
                                <input type="number" maxlength="1" inputmode="numeric" pattern="[0-9]*" id="otpcode"
                                    name="otpcode[]" class="me-md-0 me-2 otp-input">
                                <input type="number" maxlength="1" inputmode="numeric" pattern="[0-9]*" id="otpcode"
                                    name="otpcode[]" class="me-md-0 me-2 otp-input">
                                <input type="number" maxlength="1" inputmode="numeric" pattern="[0-9]*" id="otpcode"
                                    name="otpcode[]" class="me-md-0 me-2 otp-input">
                            </div>
                            <div class="help-block font-small-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-8">
                                <div class="form-group form-floating mb-4">
                                    <div class="p-countdown" data-delay="30">
                                        <div class="p-countdown-count">
                                            <code>New OTP in  <span class="count-number"></span> Sec</code>
                                        </div>
                                        <div class="p-countdown-show">
                                            <code>Didn’t receive OTP? <a href="javascript:resendotp()">Resend Now</a></code>
                                        </div>
                                        <code id="resend-message"></code>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-4">
                                <div class="form-group form-floating">
                                    <div class="d-flex align-items-center justify-content-end">

                                        <div class="title-text">
                                            <h6 class="fw-light mb-0 ms-1 text-success d-flex align-items-center"><i
                                                    class="fa fa-lock mr-2 text-success"></i>Encrypted</h6>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-error" id="otpcodeError"></div>

                        <div class="form-group m-b-0">
                            <button type="submit" id="form-submit2" class="btn btn-block text-uppercase btn-lg btn-orange">Verify OTP
                                <i class="icon-arrow-right"></i></button>
                        </div>
                        <div class="otp-velidation-text shadow-none border background-grey mt-3">
                            <div class="card-body py-2 px-3 ">
                                <div class="d-flex align-items-start">

                                    <i class="icon-shield mr-2 text-success mt-2"></i>
                                    <p class="mb-0 fw-light fa-xs ms-2">IndiaFinPro will never call you for
                                        your OTP. Treat
                                        your OTP like
                                        a password — do not share it with anyone. </p>
                                    <div>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        <?php echo form_close(); ?>
                        <?php } else if ($processstep == 'step3') { ?>
                        <?php echo form_open('digital/registeredUser', array('id' => 'submitForm3', 'class' => '', 'novalidate' => 'novalidate')); ?>
                        <input type="hidden" name="loanamount" id="loanamount"
                            value="<?php echo $userdetails['loanamount']; ?>">
                        <input type="hidden" name="referralcode" id="referralcode"
                            value="<?php echo $userdetails['referralcode']; ?>">
                        <input type="hidden" name="loantype" id="loantype" value="11">
                        <p class="text-uppercase text-orange font-weight-bold mb-0">Tell us about you</p>
                        <h3 class="mb-0 text-start text-blue font-weight-bolder">Select your profile & enter details
                        </h3>
                        <div class="form-group">
                            <p class="text-dark" for="username">This helps us tailor the best NBFC offers for
                                you.</strong></p>
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
                        <div class="form-group">
                            <label class="text-dark text-uppercase" for="username">Full name</label>
                            <div class="input-group mb-3 border">
                                <span class="input-group-text text-dark background-grey font-weight-bold border-right"
                                    id="basic-addon1"><i class="icon-user"></i></span>
                                <input type="text" aria-required="true" name="username" id="username"
                                    class="form-control border-0" placeholder="Enter you name" required
                                    data-validation-regex-regex="^[a-zA-z]+([\s][a-zA-Z]+)*$">
                            </div>
                            <div class="help-block font-small-3"></div>
                        </div>

                        <div class="form-group">
                            <label class="text-dark text-uppercase" for="useremail">Email id</label>
                            <div class="input-group mb-3 border">
                                <span class="input-group-text text-dark background-grey font-weight-bold border-right"
                                    id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                <input type="email" aria-required="true" name="useremail" class="form-control border-0"
                                    placeholder="Enter your email" required />
                            </div>
                            <div class="help-block font-small-3"></div>
                        </div>

                        <div class="form-group m-b-0">
                            <button type="submit" id="form-submit3"
                                onclick="_tfa.push({notify: 'event', name: 'lead', id: 1779022});"
                                class="btn btn-block btn-lg btn-orange">PROCESS<i class="icon-arrow-right"></i></button>
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
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-text text-center">
                    <p class="text-uppercase text-orange font-weight-bold mb-0">Who can apply</p>
                    <h3 class="mb-2 text-small text-blue">NBFC personal loan criteria</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow-none loan-eligibility-section">
                    <div class="card-body">
                        <div class="subscription-price pb-0 pt-0">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon staticts-card bg-orange mb-0">
                                    <i class="icon-briefcase text-white fa-lg"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="mb-0 font-weight-bold text-orange text-uppercase">Eligibility profile
                                    </p>
                                    <h3 class="mb-0 card-content text-blue font-weight-bold">Salaried
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <p class="m-b-3">For people earning a fixed monthly income.</p>
                        <div class="card">
                            <div class="subscription-price pb-0 pt-0">
                                <div class="d-flex align-items-center justify-content-between p-3">
                                    <div class="d-flex ">
                                        <div class="icon staticts-card-wrapper mb-0">

                                            <i class="icon-pocket text-orange fa-lg"></i>
                                        </div>
                                        <div class="ml-3">
                                            <p class="mb-0 text-uppercase">Minimum salary
                                            </p>
                                            <h5 class="mb-0 card-content text-blue font-weight-bold">₹15,000 per month
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="right-icon">
                                        <i class="fa fa-check text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="subscription-price pb-0 pt-0">
                                <div class="d-flex align-items-center justify-content-between p-3">
                                    <div class="d-flex ">
                                        <div class="icon staticts-card-wrapper mb-0">

                                            <i class="icon-calendar text-orange"></i>
                                        </div>
                                        <div class="ml-3">
                                            <p class="mb-0 fw-bold  text-uppercase">Job stability
                                            </p>
                                            <h5 class="mb-0 card-content text-blue font-weight-bold">Minimum 1 year
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="right-icon">
                                        <i class="fa fa-check text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-0">
                            <div class="subscription-price pb-0 pt-0">
                                <div class="d-flex align-items-center justify-content-between p-3">
                                    <div class="d-flex ">
                                        <div class="icon staticts-card-wrapper mb-0">

                                            <i class="icon-user text-orange"></i>
                                        </div>
                                        <div class="ml-3">
                                            <p class="mb-0 fw-bold  text-uppercase">Age requirement
                                            </p>
                                            <h5 class="mb-0 card-content text-blue font-weight-bold">21 years or above
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="right-icon">
                                        <i class="fa fa-check text-success"></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow-none loan-eligibility-section">
                    <div class="card-body">
                        <div class="subscription-price pb-0 pt-0">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon staticts-card bg-navy mb-0">
                                    <i class="icon-briefcase text-white"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="mb-0 font-weight-bold text-orange text-uppercase">Eligibility profile
                                    </p>
                                    <h3 class="mb-0 card-content text-blue font-weight-bold">Self-Employed
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <p class="m-b-3">For business owners and independent professionals.</p>
                        <div class="card">
                            <div class="subscription-price pb-0 pt-0">
                                <div class="d-flex align-items-center justify-content-between p-3">
                                    <div class="d-flex ">
                                        <div class="icon staticts-card-wrapper mb-0">

                                            <i class="icon-pocket text-orange"></i>
                                        </div>
                                        <div class="ml-3">
                                            <p class="mb-0 fw-bold  text-uppercase">Business stability
                                            </p>
                                            <h5 class="mb-0 card-content text-blue font-weight-bold">Minimum 1 year
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="right-icon">
                                        <i class="fa fa-check text-success"></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="subscription-price pb-0 pt-0">
                                <div class="d-flex align-items-center justify-content-between p-3">
                                    <div class="d-flex ">
                                        <div class="icon staticts-card-wrapper mb-0">

                                            <i class="icon-calendar text-orange"></i>
                                        </div>
                                        <div class="ml-3">
                                            <p class="mb-0 fw-bold  text-uppercase">Income proof
                                            </p>
                                            <h5 class="mb-0 card-content text-blue font-weight-bold">Minimum 1 year ITR
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="right-icon">
                                        <i class="fa fa-check text-success"></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card mb-0">
                            <div class="subscription-price pb-0 pt-0">
                                <div class="d-flex align-items-center justify-content-between p-3">
                                    <div class="d-flex ">
                                        <div class="icon staticts-card-wrapper mb-0">

                                            <i class="icon-user text-orange"></i>
                                        </div>
                                        <div class="ml-3">
                                            <p class="mb-0 fw-bold  text-uppercase">Age requirement
                                            </p>
                                            <h5 class="mb-0 card-content text-blue font-weight-bold">21 years or above
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="right-icon">
                                        <i class="fa fa-check text-success"></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="background-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-text text-center">
                    <p class="text-uppercase text-orange font-weight-bold mb-0">Compare lenders</p>
                    <h3 class="mb-2 text-small text-blue">The best loan offer for you — all in
                        one place.</h3>
                </div>
            </div>
        </div>
        <div class="carousel client-logos" data-items="3" data-items-sm="1" data-items-xs="1" data-items-xxs="2"
            data-margin="20" data-dots="false" data-arrows="false" data-autoplay="true" data-autoplay="3000"
            data-loop="true">
            <div>
                <img src="<?php echo base_url('assets/images/slide-img-1.png'); ?>" alt="gold membership card"
                    class="w-100">
            </div>
            <div>
                <img src="<?php echo base_url('assets/images/slide-img-2.png'); ?>" alt="gold membership card"
                    class="w-100">
            </div>
            <div>
                <img src="<?php echo base_url('assets/images/slide-img-3.png'); ?>" alt="gold membership card"
                    class="w-100">
            </div>
            <div>
                <img src="<?php echo base_url('assets/images/slide-img-1.png'); ?>" alt="gold membership card"
                    class="w-100">
            </div>
            <div>
                <img src="<?php echo base_url('assets/images/slide-img-2.png'); ?>" alt="gold membership card"
                    class="w-100">
            </div>
            <div>
                <img src="<?php echo base_url('assets/images/slide-img-3.png'); ?>" alt="gold membership card"
                    class="w-100">
            </div>
            <div>
                <img src="<?php echo base_url('assets/images/slide-img-1.png'); ?>" alt="gold membership card"
                    class="w-100">
            </div>
            <div>
                <img src="<?php echo base_url('assets/images/slide-img-2.png'); ?>" alt="gold membership card"
                    class="w-100">
            </div>
            <div>
                <img src="<?php echo base_url('assets/images/slide-img-3.png'); ?>" alt="gold membership card"
                    class="w-100">
            </div>
        </div>
    </div>
</section>

<section class="p-t-40 p-b-40">
    <div class="container">
        <div class="row">
            <div class="col-12 text-dark">
                <p class="mb-2"><strong>Disclosure: </strong><small>Loan Tenure ranges from minimum 6 months to maximum
                        of 60 months, with annual interest rates starting at 11% and going up to 34%. A processing fee
                        up to 2% may be applicable.
                        Representative Example: If a loan of ₹1,00,000 is availed at an interest rate of 12.5% per annum
                        for a tenure of 12 months, and a processing fee of 2% is applied: Interest Payable: ₹6,720
                        approx. Processing
                        Fee: ₹2,000. Total Loan Cost (including interest + fee): ₹1,08,720. APR (Annual Percentage
                        Rate): 14.27% approx. *T&C Apply. All these numbers are tentative/indicative, the final loan
                        specifics may vary
                        depending upon the customer profile and NBFCs' criteria, rules & regulations, and terms &
                        conditions. The amount paid is only for the service charge. We are not lenders and do not
                        guarantee any loan
                        approval.</small></p>

                <p class="mb-2"><strong>Important Note:</strong><small> BE AWARE! We ask our customers to make payments
                        ONLY on our
                        website <a class="text-dark" href="<?php echo COMPANY_SITE; ?>">bharatfinpro.com</a> and NOT
                        through any other source, directly or indirectly. Thanks!</small></p>

                <p class="mb-0"><strong>Company Registered Address:
                    </strong><small><?php echo COMPANY_ADDRESS; ?></small></p>
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