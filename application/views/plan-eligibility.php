<?php
$this->load->view('includes/header-plan-apply.php');
?>

<!-- Header -->
<div class="header">
    <h3 class="text-light">Get Loan Offers Tailored To Your Needs</h3>
    <p class="text-success fs-5" style="font-weight:800">From Trusted Partner NBFCs</p>
</div>

<!-- Main Card -->
<div class="container">
    <div class="card shadow card-main">

        <div class="container-fluid mobile-container">
            <div class="card text-center">
                <div class="card-header" style="border-radius: 8px 8px 0 0;">
                    <div class="card-title">
                        <h6 class="font-weight-bold"><?php echo $userdetails['loanname']; ?> Application Process</h6>
                    </div>
                </div>
            </div>

            <div class="card shadow-none">
                <div class="card-body">
                    <?php echo form_open('plan/userApply', array('id' => 'submitForm1', 'class' => 'row', 'novalidate' => 'novalidate')); ?>
                    <input type="hidden" name="applyid" value="<?php echo $userdetails['applyid']; ?>"
                        class="form-control" required>

                    <input type="hidden" name="userid" value="<?php echo $userdetails['userid']; ?>"
                        class="form-control" required>

                    <input type="hidden" name="cardtype" value="<?php echo $userdetails['cardtype']; ?>"
                        class="form-control" required>

                    <div class="form-group col-md-6">
                        <label class="text-dark" for="cibilscore">CIBIL Score</label>
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
                        <label class="text-dark" for="monincome">Monthly Income</label>
                        <input type="text" aria-required="true" id="monincome" name="monincome" class="form-control"
                            placeholder="As per your requirement" required min="10000" max="5000000" inputmode="numeric"
                            data-validation-regex-regex="[0-9]+">
                        <div class="help-block font-small-3"></div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="text-dark" for="monemi">Monthly EMI You are Already Paying</label>
                        <input type="text" aria-required="true" id="monemi" name="monemi" class="form-control"
                            placeholder="As per your requirement" required inputmode="numeric"
                            data-validation-regex-regex="[0-9]+">
                        <div class="help-block font-small-3"></div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="text-dark" for="loanpurpose">Loan Purpose</label>
                        <select name="loanpurpose" aria-required="true" id="loanpurpose" class="form-control" required>
                            <?php  if ($userdetails['loantype'] == 22) { ?>
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

                    <div class="form-group col-md-6">
                        <label class="text-dark" for="pincode">Pincode</label>
                        <input type="text" name="pincode" id="pincode" maxlength="6" minlength="6" inputmode="numeric"
                            class="form-control mb-2" required>
                        <div class="help-block font-small-3"></div>
                        <span class="pincode error text-danger text-start"></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="text-dark" for="city">City</label>
                        <input type="text" aria-required="true" name="city" id="city" class="form-control" required
                            style="background-color: #ffffff;">
                        <div class="help-block font-small-3"></div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="text-dark" for="state">State</label>
                        <input type="text" aria-required="true" name="state" id="state" class="form-control" required
                            style="background-color: #ffffff;">
                        <div class="help-block font-small-3"></div>
                    </div>

                    <div class="form-group col-md-12 m-t-10 d-flex justify-content-center">
                        <button type="submit" id="form-submit1" class="btn btn-lg btn-primary btn-process">CHECK
                            ELIGIBILITY</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>

            </div>
            <div class="card shadow-none row">
                <div class="col-md-6">
                    <div class="accordion white accordion-shadow">
                        <div class="ac-item">
                            <h5 class="ac-title">Personal Detail</h5>
                            <div class="ac-content">
                                 <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Loan : <?php echo $userdetails['loanname']; ?></li>
                                    <li class="list-group-item">Loan Amount :
                                        <?php echo formatePriceIndia($userdetails['loanamount']); ?></li>
                                    <li class="list-group-item">Name : <?php echo $userdetails['fullname']; ?></li>
                                    <li class="list-group-item">Mobile no. : <?php echo $userdetails['mobile']; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="accordion white accordion-shadow">
                        <div class="ac-item">
                            <h5 class="ac-title">Personal Loan Benifit</h5>
                            <div class="ac-content">
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
        </div>

    </div>
</div>

<div class="container my-4">
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