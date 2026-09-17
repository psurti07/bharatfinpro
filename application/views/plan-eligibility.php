<?php
$this->load->view('includes/header-plan-apply.php');
?>

<!-- Header -->


<section class="background-alice-blue">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-start mb-4">
                <h2 class="mb-0 display-6 text-dark-navy font-weight-bold"> Personal Loan </h2>
                <p class="mb-0 text-gray">🔒 Your information is secure. Complete your profile to verify your
                    eligibility and receive personalized loan offers.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12 order-lg-1 order-2">
                <div class="card shadow-none mb-md-0 mb-4 user-details-card ">
                    <div class="card-body">
                        <span class="text-uppercase sub-title mb-2 d-block text-gray">Desired loan
                            amount</span>
                        <div class="text-start">
                            <h3 class="ps-0 price-text font-weight-600 text-primary">₹<?php echo formatePriceIndia($userdetails['loanamount']); ?></h3>
                        </div>
                        <hr />
                        <h5 class="text-dark-navy mb-3"><i class="icon-user mr-2"></i>Customer details
                        </h5>
                        <p class="mb-2 d-flex justify-content-between"><span class="text-gray"><i
                                    class="icon-user mr-2"></i>Name
                            </span><span
                                class="text-dark-navy font-weight-500"><?php echo $userdetails['fullname']; ?></span>
                        </p>
                        <p class="mb-2 d-flex justify-content-between"><span class="text-gray"> <i
                                    class="fa fa-phone mr-2"></i>Mobile
                            </span><span
                                class="text-dark-navy font-weight-500"><?php echo $userdetails['mobile']; ?></span>
                        </p>
                        <p class="mb-2 d-flex justify-content-between"><span class="text-gray"><i
                                    class="fa fa-envelope mr-2"></i>Email
                            </span><span
                                class="text-dark-navy font-weight-500"><?php echo $userdetails['email']; ?></span>
                        </p>
                        <p class="mb-5 d-flex justify-content-between"><span class="text-gray"> <i
                                    class="fa fa-file mr-2"></i>Loan</span><span
                                class="text-dark-navy font-weight-500"> <?php echo $userdetails['loanname']; ?></span>
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-12 mb-lg-0 mb-4 order-lg-2 order-1">
                <div class="card shadow-none mb-0">
                    <div class="card-body">
                        <div class="mb-4">
                            <h3 class="text-dark-navy font-weight-bold mb-2">Complete your profile</h3>
                            <p class="fw-light text-gray mb-7">Share some details to check your eligibility and get
                                tailored loan offers from our partners.
                            </p>
                        </div>
                        <?php echo form_open('plan/userApply', array('id' => 'submitForm1', 'class' => 'row', 'novalidate' => 'novalidate')); ?>
                        <input type="hidden" name="applyid" value="<?php echo $userdetails['applyid']; ?>"
                            class="form-control" required>

                        <input type="hidden" name="userid" value="<?php echo $userdetails['userid']; ?>"
                            class="form-control" required>

                        <input type="hidden" name="cardtype" value="<?php echo $userdetails['cardtype']; ?>"
                            class="form-control" required>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="text-dark" for="cibilscore">CIBIL score</label>
                                <select name="cibilscore" aria-required="true" id="cibilscore" class="form-control"
                                    required>
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
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="text-dark" for="monincome">Monthly income (₹)</label>
                                <input type="text" aria-required="true" id="monincome" name="monincome"
                                    class="form-control" placeholder="As per your requirement" required min="10000"
                                    max="5000000" inputmode="numeric" data-validation-regex-regex="[0-9]+">
                                <div class="help-block font-small-3"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="text-dark" for="monemi">Current monthly EMI (₹)</label>
                                <input type="text" aria-required="true" id="monemi" name="monemi" class="form-control"
                                    placeholder="As per your requirement" required inputmode="numeric"
                                    data-validation-regex-regex="[0-9]+">
                                <div class="help-block font-small-3"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="text-dark" for="loanpurpose">Loan Purpose</label>
                                <select name="loanpurpose" aria-required="true" id="loanpurpose" class="form-control"
                                    required>
                                    <?php if ($userdetails['loantype'] == 22) { ?>
                                    <option value="">Select Loan Purpose</option>
                                    <option value="Business Expansion">Business Expansion</option>
                                    <option value="Maintain Cash Flow">Maintain Cash Flow</option>
                                    <option value="Supplier Payments">Supplier Payments</option>
                                    <option value="Setup Manufacturing Unit">Setup Manufacturing Unit</option>
                                    <option value="Hiring Budget">Hiring Budget</option>
                                    <option value="Other">Other</option>
                                    <?php } else { ?>
                                    <option value="">Select Loan Purpose</option>
                                    <option value="Personal Use">Personal Use</option>
                                    <option value="Property Renovation">Property Renovation</option>
                                    <option value="Marriage Purpose">Marriage Purpose</option>
                                    <option value="Education Purpose">Education Purpose</option>
                                    <option value="Medical Emergency">Medical Emergency</option>
                                    <option value="Other">Other</option>
                                    <?php } ?>
                                </select>
                                <div class="help-block font-small-3"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="text-dark" for="pincode">Pincode</label>
                                <input type="text" name="pincode" id="pincode" maxlength="6" minlength="6"
                                    inputmode="numeric" class="form-control mb-2" required>
                                <div class="help-block font-small-3"></div>
                                <span class="pincode error text-danger text-start"></span>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="text-dark" for="city">City</label>
                                <input type="text" aria-required="true" name="city" id="city" class="form-control"
                                    required style="background-color: #ffffff;">
                                <div class="help-block font-small-3"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="text-dark" for="state">State</label>
                                <input type="text" aria-required="true" name="state" id="state" class="form-control"
                                    required style="background-color: #ffffff;">
                                <div class="help-block font-small-3"></div>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">

                            <button type="submit" id="form-submit1" class="btn btn-primary btn-lg btn-send w-100">Check
                                Eligibility <i class="icon-arrow-right"></i></button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>

                </div>




            </div>

        </div>
    </div>
</section>


<?php
$this->load->view('includes/footer-plan-apply.php');
?>

<script type="text/javascript">
$(function() {
    $('#submitForm1').on('submit', function(e) {
        $('#form-submit1').attr('disabled', true);
        $('#form-submit1').html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESS...'
        );
    });
});
</script>

<script>
$('#pincode').on('input', function() {

    var pincode = $(this).val();

    if (pincode.length === 6) {

        $.ajax({
            url: "<?= base_url('plan/geoLocation') ?>",
            type: "POST",
            data: {
                pincode: pincode
            },
            dataType: "json",

            success: function(response) {

                if (response.status === 'success') {
                    $('#city').val(response.city);
                    $('#state').val(response.state);
                    $('.pincode').text('');
                } else {
                    $('#city').val('');
                    $('#state').val('');
                    $('.pincode').text('Enter valid pincode.');
                }
            },

            error: function() {
                $('.pincode').text('Enter valid pincode.');
            }
        });

    } else {
        $('#city').val('');
        $('#state').val('');
    }
});
</script>