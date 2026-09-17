<?php
$this->load->view('includes/header-plan-apply.php');

$eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']);
?>



<!-- Main Card -->

<section class="background-alice-blue loan-application-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-start mb-4">
                <h2 class="mb-0 display-6 text-dark-navy font-weight-bold"> Personal Loan </h2>
                <p class="mb-0"> Great news, <?php echo $userdetails['fullname']; ?>! <strong class="text-secondary h4">Rs.
                        <?php echo formatePriceIndia($eligibilityamt); ?>/-</strong>
                    <?php echo $userdetails['loanname']; ?> loan is pre-approved. Please proceed to complete the process
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12 order-lg-1 order-2">
                <div class="card shadow mb-0 user-details-card">
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
                                class="text-dark-navy font-weight-500"><?php echo $userdetails['loanamount']; ?></span>
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-12 mb-lg-0 mb-4 order-lg-2 order-1">
                <div class="card shadow emi-option mb-0">
                    <div class="card-body">


                        <?php echo form_open('plan/getpreApproval', array('id' => 'submitForm2', 'class' => '', 'novalidate' => 'novalidate')); ?>
                        <input type="hidden" name="applyid" value="<?php echo $userdetails['applyid']; ?>"
                            class="form-control" required>

                        <input type="hidden" name="userid" value="<?php echo $userdetails['userid']; ?>"
                            class="form-control" required>

                        <input type="hidden" name="mobile" value="<?php echo $userdetails['mobile']; ?>"
                            class="form-control" required>

                        <input type="hidden" name="cardtype" value="<?php echo $userdetails['cardtype']; ?>"
                            class="form-control" required>
                        <h3 class="text-dark-navy font-weight-bold mb-1">Select your suitable EMI option</h3>

                        <p> Choose the repayment tenure that best fits your budget.</p>
                        <div class="row">
                            <!-- Salaried -->
                            <div class="col-md-4 mb-2">
                                <label class="w-100">
                                    <input type="radio" checked="checked" name="tenure" id="years1" value="12">
                                    <div class="radio-card background-alice-blue d-flex p-3">
                                        <div
                                            class="icon staticts-card-btn btn btn-block pe-none background-honeydew  border-0">
                                            <i class="icon-calendar text-primary fa-lg"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h5 class="mb-0 font-weight-bold text-dark-navy">12 Months</h5>
                                            <p class="text-left mb-0">Rs.
                                                <?php echo calPMT($userdetails['apr'], 1, $eligibilityamt); ?></p>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <!-- Business -->
                            <div class="col-md-4 mb-2">
                                <label class="w-100">
                                    <input type="radio" name="tenure" id="years2" value="24">
                                    <div class="radio-card background-alice-blue d-flex p-3">
                                        <div
                                            class="icon staticts-card-btn btn btn-block pe-none background-honeydew  border-0">
                                            <i class="icon-calendar text-primary fa-lg"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h5 class="mb-0 font-weight-bold text-dark-navy">24 Months</h5>
                                            <p class="text-left mb-0">Rs.
                                                <?php echo calPMT($userdetails['apr'], 2, $eligibilityamt); ?></p>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <!-- Self Employed -->
                            <div class="col-md-4 mb-2">
                                <label class="w-100">
                                    <input type="radio" name="tenure" id="years3" value="36">
                                    <div class="radio-card background-alice-blue d-flex p-3">
                                        <div
                                            class="icon staticts-card-btn btn btn-block pe-none background-honeydew  border-0">
                                            <i class="icon-calendar text-primary fa-lg"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h5 class="mb-0 font-weight-bold text-dark-navy">36 Months</h5>
                                            <p class="text-left mb-0">Rs.
                                                <?php echo calPMT($userdetails['apr'], 3, $eligibilityamt); ?></p>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <!-- NRI -->
                            <div class="col-md-4 mb-2">
                                <label class="w-100">
                                    <input type="radio" name="tenure" id="years4" value="48">
                                    <div class="radio-card background-alice-blue d-flex p-3">
                                        <div
                                            class="icon staticts-card-btn btn btn-block pe-none background-honeydew  border-0">
                                            <i class="icon-calendar text-primary fa-lg"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h5 class="mb-0 font-weight-bold text-dark-navy">48 Months</h5>
                                            <p class="text-left mb-0">Rs.
                                                <?php echo calPMT($userdetails['apr'], 4, $eligibilityamt); ?></p>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <!-- Pension -->
                            <div class="col-md-4 mb-2">
                                <label class="w-100">
                                    <input type="radio" name="tenure" id="years5" value="60">
                                    <div class="radio-card background-alice-blue d-flex p-3">
                                        <div
                                            class="icon staticts-card-btn btn btn-block pe-none background-honeydew  border-0">
                                            <i class="icon-calendar text-primary fa-lg"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h5 class="mb-0 font-weight-bold text-dark-navy">60 Months</h5>
                                            <p class="text-left mb-0">Rs.
                                                <?php echo calPMT($userdetails['apr'], 5, $eligibilityamt); ?></p>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <!-- Defence -->
                            <div class="col-md-4 mb-2">
                                <label class="w-100">
                                    <input type="radio" name="tenure" id="years6" value="72">
                                    <div class="radio-card background-alice-blue d-flex p-3">
                                        <div
                                            class="icon staticts-card-btn btn btn-block pe-none background-honeydew  border-0">
                                            <i class="icon-calendar text-primary fa-lg"></i>
                                        </div>
                                        <div class="ml-3">
                                            <h5 class="mb-0 font-weight-bold text-dark-navy">72 Months</h5>
                                            <p class="text-left mb-0">Rs.
                                                <?php echo calPMT($userdetails['apr'], 6, $eligibilityamt); ?></p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="background-alice-blue border counter-wrapper-main mb-4 mt-3">
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
                        <button type="submit" id="form-submit2" class="btn btn-primary btn-lg btn-send w-100">Choose
                            offer <i class="icon-arrow-right"></i>
                        </button>
                        <p class="m-b-0 text-center">
                            <small>
                                How is pre-approved loan offer calculated?
                                <?php echo formatePriceIndia($userdetails['stramt']); ?> <a class="text-primary"
                                    data-target="#modal" data-toggle="modal" href="#"> Know here</a>
                            </small>
                        </p>

                        <?php echo form_close(); ?>

                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

    <?php if (count($roipackages)) { ?>
    <section class="background-grey">
        <div class="container">
            <div class="text-center p-b-20">
                <h3>You’re Eligible For Pre-Approved Loan Offers From Partnered NBFCs</h3>
                <p>View the specifics of your pre-approved offers</p>
            </div>

            <div class="row d-flex align-items-center justify-content-center">
                <?php
                foreach ($roipackages as $row) {
                ?>
                <div class="col-md-3 col-12">
                    <div class="card">
                        <div class="card-header p-20">
                            <div class="row">
                                <div class="col-md-12 col-8 text-center">
                                    <img src="<?php echo base_url('assets/images/bank/' . $row->bank_image); ?>" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-20 p-b-5">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <p><strong>Loan Amt.:</strong> Rs.
                                        <?php echo formatePriceIndia($eligibilityamt); ?>
                                    </p>
                                    <p><strong>EMI:</strong> Rs.
                                        <?php echo formatePriceIndia(calPMT($row->roi, $row->termsyears, $eligibilityamt)); ?>
                                    </p>
                                    <p><strong>ROI:</strong>
                                        <?php echo $row->roi . "%"; ?>
                                    </p>
                                    <p><strong>Tenure:</strong>
                                        <?php echo $row->termsmonths . " Months"; ?>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
                } ?>
            </div>
            <div class="text-left">
                <p class=""><small>Disclaimer - The above data is tentative and purely on the information provided
                        by
                        you. Final EMI, loan sanction, loan approval, and loan amount depend on customer profile and
                        NBFCs
                        criteria and rules & regulations.</small></p>
            </div>
    </section>
    <?php } ?>

    <div class="modal fade" id="modal" role="modal" aria-labelledby="modal-label" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-label">Eligibility Criteria : </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-justify">
                            <p><strong>What is the calculation behind this pre-approved loan offer?</strong></p>

                            <small>
                                <p>It should be noted that the Pre-Approved Loan Offer and the amount mentioned in it
                                    are
                                    solely shown based on the software calculation done on Monthly Income and Current
                                    Monthly EMI entered by you. This 'Pre-Approved Loan Offer' is tentative and not the
                                    final loan approval. The final loan approval is given by the bank only, based on the
                                    bank's rules and regulations and the customer profile.</p>

                                <p><strong>Reference Calculation:</strong></p>

                                <p>Consider a person who has entered the following details<br />
                                    - Monthly Income: Rs.1,00,000<br />
                                    - Current Monthly EMI: Rs.30,000</p>

                                <p>Based on these details, the person is left with Rs.70,000 in hand (deducting current
                                    EMI)
                                    every month. So, according to the general rules of the banks, the EMI of 50% of the
                                    in-hand amount can be approved - here it's 35,000. And based on the EMI and rate of
                                    interest (12.5% tentatively), the eligible amount is shown in the Pre-Approved Loan
                                    Offer - considering the mentioned calculation.</p>

                                <p>Note: Pre-approved loan offer is tentative. It should not be considered as the final
                                    loan
                                    approval. The final loan approval is given by the bank only, according to their
                                    rules
                                    and criteria and the customer profile.</p>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-b" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('assets/plugins/celebration/confetti-script.js'); ?>" type="text/javascript">
    </script>
    <script src="<?php echo base_url('assets/plugins/celebration/confetti.browser.min.js'); ?>" type="text/javascript">
    </script>

    <?php
$this->load->view('includes/footer-plan-apply.php');
?>

    <script type="text/javascript">
    $(function() {
        $('#submitForm2').on('submit', function(e) {
            $('#form-submit2').attr('disabled', true);
            $('#form-submit2').html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESS...'
            );
        });
    });
    </script>