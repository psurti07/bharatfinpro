<?php
$this->load->view('includes/header-apply.php');
?>

<section>
    <div class="container">
        <div class="row">
            <!-- START : CHECK ELIGIBLITY -->
            <div class="col-lg-8 col-md-8 col-12 sm-p-0">
                <div class="card border-2 shadow-none">
                    <div class="card-body">
                        <h3>Digital <?php echo $userdetails['loanname']; ?> Application Process</h3>
                        <p>Your Instant Pre-Approved Loan Offer is Few Steps Away!</p>

                        <div class="seperator"></div>

                        <?php echo form_open('digital/userApply', array('id' => 'submitForm1', 'class' => 'row', 'novalidate' => 'novalidate')); ?>
                        <input type="hidden" name="applyid" value="<?php echo $userdetails['applyid']; ?>"
                            class="form-control" required>

                        <input type="hidden" name="userid" value="<?php echo $userdetails['userid']; ?>"
                            class="form-control" required>

                        <input type="hidden" name="cardtype" value="<?php echo $userdetails['cardtype']; ?>"
                            class="form-control" required>

                        <div class="form-group col-md-8">
                            <label class="text-dark" for="cibilscore">CIBIL Score</label>
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

                        <div class="form-group col-md-8">
                            <label class="text-dark" for="monincome">Monthly Income</label>
                            <input type="text" aria-required="true" id="monincome" name="monincome" class="form-control"
                                placeholder="As per your requirement" required min="10000" max="5000000"
                                inputmode="numeric" data-validation-regex-regex="[0-9]+">
                            <div class="help-block font-small-3"></div>
                        </div>

                        <div class="form-group col-md-8">
                            <label class="text-dark" for="monemi">Monthly EMI You are Already Paying</label>
                            <input type="text" aria-required="true" id="monemi" name="monemi" class="form-control"
                                placeholder="As per your requirement" required inputmode="numeric"
                                data-validation-regex-regex="[0-9]+">
                            <div class="help-block font-small-3"></div>
                        </div>

                        <div class="form-group col-md-8">
                            <label class="text-dark" for="loanpurpose">Loan Purpose</label>
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

                        <div class="form-group col-md-8">
                            <label class="text-dark" for="pincode">Pincode</label>
                            <input type="text" name="pincode" id="pincode" maxlength="6" minlength="6"
                                inputmode="numeric" class="form-control mb-2" required>
                            <div class="help-block font-small-3"></div>
                            <span class="pincode error text-danger text-start"></span>
                        </div>

                        <div class="form-group col-md-8">
                            <label class="text-dark" for="city">City</label>
                            <input type="text" aria-required="true" name="city" id="city" class="form-control" required
                                style="background-color: #ffffff;">
                            <div class="help-block font-small-3"></div>
                        </div>

                        <div class="form-group col-md-8">
                            <label class="text-dark" for="state">State</label>
                            <input type="text" aria-required="true" name="state" id="state" class="form-control"
                                required style="background-color: #ffffff;">
                            <div class="help-block font-small-3"></div>
                        </div>

                        <div class="form-group col-md-12 m-t-10">
                            <button type="submit" id="form-submit1" class="btn btn-lg btn-primary">CHECK
                                ELIGIBILITY</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <!-- END : CHECK ELIGIBLITY -->

            <div class="col-lg-4 col-md-4 col-sm-12 sm-p-0">
                <div class="card shadow-none">
                    <div class="card-body">
                        <div class="wizard clearfix" data-style="1">
                            <p class="small m-b-0">Process Steps: </p>
                            <div class="steps clearfix m-0">
                                <ul role="tablist">
                                    <li role="tab" class="current"><a href="#"><span class="number">1</span><span
                                                class="title">Quick Registration</span></a></li>

                                    <li role="tab" class="current"><a href="#"><span class="number">2</span><span
                                                class="title">Check Eligibility</span></a></li>

                                    <li role="tab" class="disabled"><a href="#"><span class="number">3</span><span
                                                class="title">Get Pre-Approval Offer</span></a></li>

                                    <li role="tab" class="disabled"><a href="#"><span class="number">4</span><span
                                                class="title">Buy Membership Card</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>User Details : </strong></li>
                            <li class="list-group-item">Loan : <?php echo $userdetails['loanname']; ?></li>
                            <li class="list-group-item">Loan Amount :
                                <?php echo formatePriceIndia($userdetails['loanamount']); ?></li>
                            <li class="list-group-item">Name : <?php echo $userdetails['fullname']; ?></li>
                            <li class="list-group-item">Mobile no. : <?php echo $userdetails['mobile']; ?></li>
                        </ul>
                    </div>
                </div>

                <div class="card shadow-none">
                    <div class="card-body background-pattern-1 rounded-lg">
                        <h3 class="m-b-20 text-medium">Personal Loan</h3>
                        <p class="m-b-0 text-muted">Get up to</p>
                        <h4><span style="border-bottom: 4px solid #012960">₹10 Lac in 30 mins</span></h4>
                    </div>
                    <div class="card-footer p-20 background-alice-blue">
                        <ul class="list-icon list-icon-colored m-b-0">
                            <li><i class="fa fa-arrow-right"></i> Simple Online Process</li>
                            <li><i class="fa fa-arrow-right"></i> ⁠Lowest Interest Rate</li>
                            <li><i class="fa fa-arrow-right"></i> ⁠Flexible EMI Options</li>
                            <li><i class="fa fa-arrow-right"></i> ⁠Minimal Documentation</li>
                        </ul>
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