<?php
$this->load->view('includes/header-apply.php');
?>

<section class="background-grey">
    <div class="container">
        <div class="row">
            <!-- START : CHECK ELIGIBLITY -->
            <div class="col-lg-8 col-md-12 col-12 mb-lg-0 mb-4">
                <div class="card shadow mb-0 border">
                    <div class="card-body">
                        <div class="subscription-price pb-0 pt-0">
                            <div class="d-flex align-items-center mb-4">
                                <div>
                                    <div class="icon staticts-card bg-navy mb-0">
                                        <i class="icon-briefcase text-white"></i>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <h3 class="mb-0 font-weight-bold text-blue"> <?php echo $userdetails['loanname']; ?>
                                    </h3>
                                    <p class="mb-0">Get pre-approved offers instantly — just fill in your details.</p>
                                </div>
                            </div>
                        </div>

                        <?php echo form_open('digital/userApply', array('id' => 'submitForm1', 'class' => 'row', 'novalidate' => 'novalidate')); ?>
                        <input type="hidden" name="applyid" value="<?php echo $userdetails['applyid']; ?>"
                            class="form-control" required>

                        <input type="hidden" name="userid" value="<?php echo $userdetails['userid']; ?>"
                            class="form-control" required>

                        <input type="hidden" name="cardtype" value="<?php echo $userdetails['cardtype']; ?>"
                            class="form-control" required>
                        <div class="col-md-6 col-sm-6 col-12">


                            <div class="form-group">
                                <label class="text-dark text-uppercase" for="cibilscore">CIBIL Score</label>
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
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label class="text-dark text-uppercase" for="monincome">Monthly Income (₹)</label>
                                <input type="text" aria-required="true" id="monincome" name="monincome"
                                    class="form-control" placeholder="As per your requirement" required min="10000"
                                    max="5000000" inputmode="numeric" data-validation-regex-regex="[0-9]+">
                                <div class="help-block font-small-3"></div>
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label class="text-dark text-uppercase" for="monemi">Current Monthly EMI (₹)</label>
                                <input type="text" aria-required="true" id="monemi" name="monemi" class="form-control"
                                    placeholder="As per your requirement" required inputmode="numeric"
                                    data-validation-regex-regex="[0-9]+">
                                <div class="help-block font-small-3"></div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label class="text-dark text-uppercase" for="loanpurpose">Loan Purpose</label>
                                <select name="loanpurpose" aria-required="true" id="loanpurpose" class="form-control"
                                    required>
                                    <?php if ($userdetails['loantype'] == 12) { ?>
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
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label class="text-dark text-uppercase" for="pincode">Pincode</label>
                                <input type="text" name="pincode" id="pincode" maxlength="6" minlength="6"
                                    inputmode="numeric" class="form-control mb-2" required>
                                <div class="help-block font-small-3"></div>
                                <span class="pincode error text-danger text-start"></span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label class="text-dark text-uppercase" for="city">City</label>
                                <input type="text" aria-required="true" name="city" id="city" class="form-control"
                                    required style="background-color: #ffffff;">
                                <div class="help-block font-small-3"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label class="text-dark text-uppercase" for="state">State</label>
                                <input type="text" aria-required="true" name="state" id="state" class="form-control"
                                    required style="background-color: #ffffff;">
                                <div class="help-block font-small-3"></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card otp-velidation-text rounded-4 background-grey mb-0">
                                <div class="card-body p-3">
                                    <div class="row align-items-center">
                                        <div class="col-lg-7 col-md-12 col-sm-12 col-12  mb-lg-0 mb-3">
                                            <div class="d-flex align-items-start ">
                                                <i class="icon-target mr-2 text-orange mt-2"></i>
                                                <div class="ml-2">
                                                    <p class="mb-0 fa-sm">Soft check only — won't impact
                                                        your credit
                                                        score. </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-12 col-sm-12 col-12 text-end">
                                            <button type="submit" id="form-submit1"
                                                class="btn btn-lg btn-orange text-uppercase">Check Your Eligibility
                                                <i class="icon-arrow-right"></i> </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <!-- END : CHECK ELIGIBLITY -->

            <div class="col-lg-4 col-md-12 col-12">
                <div class="card shadow border">
                    <div class="card-body">
                        <span class="text-uppercase sub-title mb-1 d-block">Desired Loan Amount</span>

                        <h2 class=" mb-0 font-weight-bold text-blue">₹
                            <?php echo formatePriceIndia($userdetails['loanamount']); ?> </h2>

                        <p class="fs-12 lh-normal mb-3">Tenure: up to 60 months · ROI from 11%*</p>


                        <h5 class="text-uppercase text-blue border-top pt-3">Customer details</h5>
                        <div class="table-block mb-3">
                            <div>
                                <div class="d-flex align-items-center">
                                    <div class="icon-col">
                                        <div class="text-center icon-col-image background-grey">
                                            <i class="icon-user"></i>
                                        </div>
                                    </div>
                                    <div class="pt-0 pb-1 pl-0 ml-3">
                                        <small class="text-uppercase d-block">Name</small>
                                        <strong><?php echo $userdetails['fullname']; ?></strong>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="icon-col">
                                        <div class="text-center icon-col-image background-grey">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                    </div>
                                    <div class="pt-0 pb-1 pl-0 ml-3">
                                        <small class="text-uppercase d-block">Mobile</small>
                                        <strong><?php echo $userdetails['mobile']; ?></strong>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="icon-col">
                                        <div class="text-center icon-col-image background-grey">
                                            <i class="far fa-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="pt-0 pb-1 pl-0 ml-3">
                                        <small class="text-uppercase d-block">Email</small>
                                        <strong><?php echo $userdetails['email']; ?></strong>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="icon-col">
                                        <div class="text-center icon-col-image background-grey">
                                            <i class="far fa-file"></i>
                                        </div>
                                    </div>
                                    <div class="pt-0 pb-1 pl-0 ml-3">
                                        <small class="text-uppercase d-block">Loan Type</small>
                                        <strong><?php echo $userdetails['loanname']; ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card otp-velidation-text background-titan-white border mb-0">
                            <div class="card-body py-2 px-3 ">
                                <div class="d-flex align-items-start">
                                    <i class="icon-shield text-success mt-1"></i>
                                    <div class="ml-2">
                                        <p class="mb-0 fa-sm ms-2 text-success">Your data is 256-bit encrypted and never
                                            shared
                                            without your consent.</p>
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

<?php
$this->load->view('includes/footer-apply.php');
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
            url: "<?= base_url('digital/geoLocation') ?>",
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