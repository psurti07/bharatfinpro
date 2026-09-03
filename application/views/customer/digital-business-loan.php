<?php
$this->load->view('customer/includes/header.php');
?>

<section id="page-title" class="background-dark">
    <div class="container">
        <div class="page-title">
            <h4><i class="fa fa-tags"></i> Digital Business Loan Application</h4>
        </div>
    </div>
</section>


<section id="page-content" class="fullscreen">
    <div class="container">
        <div class="row">

            <?php if ($userdetails['step'] == "s1") {
				echo form_open('customer/digital/userBusinessApply', array('id' => 'submitForm1', 'class' => '', 'novalidate' => 'novalidate')); ?>
            <div class="col-lg-12 col-md-12 col-sm-12 row p-0 m-0">
                <input type="hidden" name="step" value="s1" class="form-control" required>
                <input type="hidden" name="loantype" value="12" class="form-control" required>
                <input type="hidden" name="userid" value="<?php echo stringCrypt($userdetails['userid'], 'encrypt'); ?>"
                    class="form-control" required>

                <div class="form-group col-md-6">
                    <label class="text-dark" for="mobile">Loan Amount</label>
                    <input type="text" aria-required="true" id="loanamount" name="loanamount" class="form-control"
                        placeholder="As per your requirement" required min="10000" max="5000000" inputmode="numeric"
                        data-validation-regex-regex="[0-9]+">
                    <div class="help-block font-small-3"></div>
                </div>

                <div class="form-group col-md-6">
                    <label class="text-dark" for="mobile">CIBIL Score</label>
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

                <div class="form-group col-md-6">
                    <label class="text-dark" for="mobile">Loan Purpose</label>
                    <select name="loanpurpose" aria-required="true" id="loanpurpose" class="form-control" required>
                        <option value="">Select Loan Purpose</option>
                        <option value="Personal Use">Personal Use</option>
                        <option value="Property Renovation">Property Renovation</option>
                        <option value="Marriage Purpose">Marriage Purpose</option>
                        <option value="Education Purpose">Education Purpose</option>
                        <option value="Medical Emergency">Medical Emergency</option>
                        <option value="Other">Other</option>
                    </select>
                    <div class="help-block font-small-3"></div>
                </div>

                <div class="form-group col-md-6">
                    <label class="text-dark" for="mobile">Monthly Income</label>
                    <input type="text" aria-required="true" id="monincome" name="monincome" class="form-control"
                        placeholder="As per your requirement" required min="10000" max="5000000" inputmode="numeric"
                        data-validation-regex-regex="[0-9]+">
                    <div class="help-block font-small-3"></div>
                </div>

                <div class="form-group col-md-6">
                    <label class="text-dark" for="mobile">Monthly EMI You are Already Paying</label>
                    <input type="text" aria-required="true" id="monemi" name="monemi" class="form-control"
                        placeholder="As per your requirement" required inputmode="numeric"
                        data-validation-regex-regex="[0-9]+">
                    <div class="help-block font-small-3"></div>
                </div>

                <div class="form-group col-md-6">
                    <label class="text-dark" for="mobile">Last 6 months any EMI Bounce?</label>
                    <select name="emibounce" id="emibounce" class="form-control">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>

                <div class="form-group col-md-12 text-center text-uppercase">
                    <?php
						if ($userdetails['flag'] == 0) {
							echo '<p class="custom-error">Your last application was recently placed, wait for process status.</p>';
						} else {
							echo '<button type="submit" id="form-submit1" class="btn btn-primary">CHECK ELIGIBILITY NOW</button>';
						}
						?>
                </div>

                <div class="form-group col-md-12 text-center">
                    <p class="m-b-0">
                        <small>By submitting the form &amp; proceeding, you agree to the
                            <a href="<?php echo site_url('terms-conditions'); ?>" target="_blank">Terms of Use</a>
                            and
                            <a href="<?php echo site_url('privacy-policy'); ?>" target="_blank">Privacy Policy</a>
                            of Bharatfinpro.com
                        </small>
                    </p>
                </div>
            </div>
            <?php echo form_close();
			} ?>


            <!-- START : GET PRE-APPROVAL -->
            <?php if ($userdetails['step'] == "s2") {
				echo form_open('customer/digital/getpreApproval', array('id' => 'submitForm2', 'class' => '', 'novalidate' => 'novalidate')); ?>
            <div class="col-lg-12 col-md-12 col-sm-12 row p-0 m-0">
                <input type="hidden" name="step" value="s2" class="form-control" required>
                <input type="hidden" name="applyid" value="<?php echo $userdetails['applyid']; ?>" class="form-control"
                    required>
                <input type="hidden" name="userid" value="<?php echo stringCrypt($userdetails['userid'], 'encrypt'); ?>"
                    class="form-control" required>

                <div class="form-group col-md-12 text-center">
                    <?php
						$eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], 12.5, $userdetails['loanamount']);
						?>
                    <h4 class="text-success">Congratulation! Your pre-approval <span class="text-lowercase">Personal
                            Loan</span> eligibility offer is Rs.
                        <?php echo formatePriceIndia($eligibilityamt); ?>
                    </h4>

                    <h5>As per your required loan amount - Rs. <strong>
                            <?php echo formatePriceIndia($userdetails['loanamount']); ?>
                        </strong>. Your monthly EMI are as below. Kindly select any option:</h5>
                </div>

                <div class="form-group col-sm-12 col-md-7 offset-md-5 text-dark">
                    <div class="form-check">
                        <label class="form-check-label m-l-10">
                            <strong>Tenure</strong> <i class="fa fa-long-arrow-alt-right m-r-20 m-l-20"></i>
                            <strong>EMI</strong>
                        </label>
                    </div>

                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="tenure" id="years3" value="36" checked>
                        <label class="form-check-label" for="years3">
                            36 Months <i class="fa fa-long-arrow-alt-right m-r-10 m-l-10"></i> Rs.
                            <?php echo calPMT(12.5, 3, $userdetails['loanamount']); ?>
                        </label>
                    </div>

                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="tenure" id="years4" value="48">
                        <label class="form-check-label" for="years4">
                            48 Months <i class="fa fa-long-arrow-alt-right m-r-10 m-l-10"></i> Rs.
                            <?php echo calPMT(12.5, 4, $userdetails['loanamount']); ?>
                        </label>
                    </div>

                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="tenure" id="years5" value="60">
                        <label class="form-check-label" for="years5">
                            60 Months <i class="fa fa-long-arrow-alt-right m-r-10 m-l-10"></i> Rs.
                            <?php echo calPMT(12.5, 5, $userdetails['loanamount']); ?>
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-12 text-center text-uppercase">
                    <?php
						if ($userdetails['flag'] == 0) {
							echo '<p class="custom-error">Your last application was recently placed, wait for process status.</p>';
						} else {
							echo '<button type="submit" id="form-submit2" class="btn btn-primary">GET OFFER</button>';
						}
						?>
                </div>

                <div class="form-group col-md-12 text-center">
                    <p class="m-b-0">
                        <small>By submitting the form &amp; proceeding, you agree to the
                            <a href="<?php echo site_url('terms-conditions'); ?>" target="_blank">Terms of Use</a>
                            and
                            <a href="<?php echo site_url('privacy-policy'); ?>" target="_blank">Privacy Policy</a>
                            of Bharatfinpro.com
                        </small>
                    </p>
                    <p class="m-b-0"><small>Note - EMI starting at 2250 is an indicative amount on 1 lakh loan 12.5%
                            interest for a 5 years tenure. Loan disbursal at sole discretion of depend bank.</small></p>
                </div>
            </div>
            <?php echo form_close();
			} ?>
            <!-- END : GET PRE-APPROVAL -->


        </div>
    </div>
</section>

<?php
$this->load->view('customer/includes/footer.php');
?>