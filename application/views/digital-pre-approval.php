<?php
$this->load->view('includes/header-apply.php');

$eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']);
?>

<section class="background-grey subscription-section">
    <div class="container">
        <div class="row">
            <!-- START : PRE APPROVAL -->
            <div class="col-lg-8 col-md-12 col-12 mb-lg-0 mb-4">
                <div class="card shadow landing-form-right h-100 border">
                    <div class="card-body">
                        <div class="subscription-price pb-0 pt-0">
                            <div class="d-flex align-items-center mb-4">
                                <div>
                                    <div class="icon staticts-card bg-navy mb-0">
                                        <i class="icon-briefcase text-white"></i>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <h3 class="mb-0 font-weight-bold text-blue">EMI Options
                                    </h3>
                                    <p class="mb-0">Selecting the Right EMI Options for Your Financial Goals</p>
                                </div>
                            </div>
                        </div>

                        <!-- <p>Congratulation! Your <strong class="text-secondary h4 text-orange">Rs.
                                <?php echo formatePriceIndia($eligibilityamt); ?>/-</strong>
                            Pre-Approved<?php echo $userdetails['loanname']; ?> Offer Processing Confirmed.</p> -->

                        <?php echo form_open('digital/getpreApproval', array('id' => 'submitForm2', 'class' => 'row', 'novalidate' => 'novalidate')); ?>
                        <input type="hidden" name="applyid" value="<?php echo $userdetails['applyid']; ?>"
                            class="form-control" required>

                        <input type="hidden" name="userid" value="<?php echo $userdetails['userid']; ?>"
                            class="form-control" required>

                        <input type="hidden" name="mobile" value="<?php echo $userdetails['mobile']; ?>"
                            class="form-control" required>

                        <input type="hidden" name="cardtype" value="<?php echo $userdetails['cardtype']; ?>"
                            class="form-control" required>

                        <!-- <div class="form-group col-md-12 p-0 text-dark">
                            <ul class="product-size">
                                <li>
                                    <label>
                                        <input type="radio" checked="checked" name="tenure" id="years1" value="12">
                                        <span><strong><i class="icon-calendar"></i>
                                                12 Months</strong><br />
                                            Rs. <?php echo calPMT($userdetails['apr'], 1, $eligibilityamt); ?></span>
                                    </label>
                                </li>


                                <li>
                                    <label>
                                        <input type="radio" name="tenure" id="years2" value="24">
                                        <span><strong><i class="icon-calendar"></i>
                                                24 Months</strong><br />
                                            Rs. <?php echo calPMT($userdetails['apr'], 2, $eligibilityamt); ?>
                                        </span>
                                    </label>
                                </li>

                                <li>
                                    <label>
                                        <input type="radio" name="tenure" id="years3" value="36">
                                        <span><strong><i class="icon-calendar"></i>
                                                36 months</strong><br />
                                            Rs. <?php echo calPMT($userdetails['apr'], 3, $eligibilityamt); ?>
                                        </span>
                                    </label>
                                </li>

                                <li>
                                    <label>
                                        <input type="radio" name="tenure" id="years4" value="48">
                                        <span><strong><i class="icon-calendar"></i>
                                                48 Months</strong><br />
                                            Rs. <?php echo calPMT($userdetails['apr'], 4, $eligibilityamt); ?>
                                        </span>
                                    </label>
                                </li>

                                <li>
                                    <label>
                                        <input type="radio" name="tenure" id="years5" value="60">
                                        <span><strong><i class="icon-calendar"></i>
                                                60 Months</strong><br />
                                            Rs. <?php echo calPMT($userdetails['apr'], 5, $eligibilityamt); ?>
                                        </span>
                                    </label>
                                </li>

                                <li>
                                    <label>
                                        <input type="radio" name="tenure" id="years6" value="72">
                                        <span><strong><i class="icon-calendar"></i>
                                                72 Months</strong><br />
                                            Rs. <?php echo calPMT($userdetails['apr'], 6, $eligibilityamt); ?>
                                        </span>
                                    </label>
                                </li>
                            </ul>
                        </div> -->
                        <div class="row gx-2">
                            <div class="col-md-6 col-lg-4 col-sm-6 col-6 mb-3">
                                <fieldset class="picker1">
                                    <label for="plan-1">
                                        <input type="radio" name="tenure" id="plan-1" value="12" class="d-none" checked>
                                        <span class="p-3">
                                            <div class="subscription-price pb-2 pt-0">
                                                <span
                                                    class="sub-offer-value text-orange text-uppercase fs-13 lh-normal">12
                                                    months</span>
                                            </div>
                                            <h3 class="mb-2 text-blue font-weight-bold">
                                                ₹<?php echo calPMT($userdetails['apr'], 1, $eligibilityamt); ?></h3>
                                            <p class="mb-0 fw-light"><small>per month</small></p>
                                            <div class="round-radiobox"></div>
                                            <div class="calender-image">
                                                <i class="fa fa-calendar-alt"></i>

                                            </div>
                                        </span>
                                    </label>
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-lg-4 col-sm-6 col-6 mb-3">
                                <fieldset class="picker1">
                                    <label for="plan-2">
                                        <input type="radio" name="tenure" id="plan-2" value="24" class="d-none">
                                        <span class="p-3">
                                            <div class="subscription-price pb-2 pt-0">
                                                <span
                                                    class="sub-offer-value text-orange text-uppercase fs-13 lh-normal">24
                                                    months</span>
                                            </div>

                                            <h3 class="mb-2 text-blue">₹
                                                <?php echo calPMT($userdetails['apr'], 2, $eligibilityamt); ?></h3>
                                            <p class="mb-0 fw-light"><small>per month</small></p>
                                            <div class="round-radiobox"></div>
                                            <div class="calender-image">
                                                <i class="fa fa-calendar-alt"></i>
                                            </div>
                                        </span>
                                    </label>
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-lg-4 col-sm-6 col-6 mb-3">
                                <fieldset class="picker1">
                                    <label for="plan-3">
                                        <input type="radio" name="tenure" id="plan-3" value="36" class="d-none">
                                        <span class="p-3">
                                            <div class="subscription-price pb-2 pt-0">
                                                <span
                                                    class="sub-offer-value text-orange text-uppercase fs-13 lh-normal">36
                                                    months</span>
                                            </div>
                                            <h3 class="mb-2 text-blue">₹
                                                <?php echo calPMT($userdetails['apr'], 3, $eligibilityamt); ?></h3>
                                            <p class="mb-0 fw-light"><small>per month</small><br />
                                            </p>

                                            <div class="round-radiobox"></div>
                                            <div class="calender-image">
                                                <i class="fa fa-calendar-alt"></i>
                                            </div>
                                        </span>
                                    </label>
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-lg-4 col-sm-6 col-6 mb-3">
                                <fieldset class="picker1">
                                    <label for="plan-4">
                                        <input type="radio" name="tenure" id="plan-4" value="48" class="d-none">
                                        <span class="p-3">
                                            <div class="subscription-price pb-2 pt-0">
                                                <span
                                                    class="sub-offer-value text-orange text-uppercase fs-13 lh-normal">48
                                                    months</span>
                                            </div>
                                            <h3 class="mb-2 text-blue">₹
                                                <?php echo calPMT($userdetails['apr'], 4, $eligibilityamt); ?></h3>
                                            <p class="mb-0 fw-light"><small>per month</small></p>

                                            <div class="round-radiobox"></div>
                                            <div class="calender-image">
                                                <i class="fa fa-calendar-alt"></i>
                                            </div>
                                        </span>
                                    </label>
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-lg-4 col-sm-6 col-6 mb-3">
                                <fieldset class="picker1">
                                    <label for="plan-5">
                                        <input type="radio" name="tenure" id="plan-5" value="60" class="d-none">
                                        <span class="p-3">
                                            <div class="subscription-price pb-2 pt-0">
                                                <span
                                                    class="sub-offer-value text-orange text-uppercase fs-13 lh-normal">60
                                                    months</span>
                                            </div>
                                            <h3 class="mb-2 text-blue">₹
                                                <?php echo calPMT($userdetails['apr'], 5, $eligibilityamt); ?></h3>
                                            <p class="mb-0 fw-light"><small>per month</small></p>

                                            <div class="round-radiobox"></div>
                                            <div class="calender-image">
                                                <i class="fa fa-calendar-alt"></i>
                                            </div>
                                        </span>
                                    </label>
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-lg-4 col-sm-6 col-6 mb-3">
                                <fieldset class="picker1">
                                    <label for="plan-6">
                                        <input type="radio" name="tenure" id="plan-6" value="72" class="d-none">
                                        <span class="p-3">
                                            <div class="subscription-price pb-2 pt-0">
                                                <span
                                                    class="sub-offer-value text-orange text-uppercase fs-13 lh-normal">72
                                                    months</span>
                                            </div>

                                            <h3 class="mb-2 text-blue">₹
                                                <?php echo calPMT($userdetails['apr'], 6, $eligibilityamt); ?></h3>
                                            <p class="mb-0 fw-light"><small>per month</small></p>
                                            <div class="round-radiobox"></div>
                                            <div class="calender-image">
                                                <i class="fa fa-calendar-alt"></i>
                                            </div>
                                        </span>
                                    </label>
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card otp-velidation-text rounded-4 background-grey mb-0">
                                <div class="card-body p-3">
                                    <div class="row align-items-center">
                                        <div class="col-lg-7 col-md-6 col-sm-6 col-12">
                                            <div class="d-flex align-items-center mb-md-0 mb-3">
                                                <i class="icon-target mr-2 text-orange"></i>
                                                <div>
                                                    <p class="mb-0 fa-sm">How is pre-approved loan offer
                                                        calculated? <a href="#"
                                                            class="text-decoration-underline text-orange">Know Here
                                                        </a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-6 col-sm-6 col-12 text-end">

                                            <button type="submit" id="form-submit2"
                                                class="btn btn-lg btn-orange w-100 text-uppercase">Choose offer <i
                                                    class="icon-arrow-right"></i></button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <!-- END : PRE APPROVAL -->

            <div class="col-lg-4 col-md-12 col-sm-12 mb-lg-0 mb-4">
                <div class="card shadow mb-0 border">
                    <div class="card-body">

                        <span class="text-uppercase sub-title mb-1 d-block fa-sm">Desired Loan Amount</span>

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

<?php if (count($roipackages)) { ?>
<section class="background-honeydew">
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

<div class="modal fade" id="modal" role="modal" aria-labelledby="modal-label" aria-hidden="true" style="display: none;">
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
                            <p>It should be noted that the Pre-Approved Loan Offer and the amount mentioned in it are
                                solely shown based on the software calculation done on Monthly Income and Current
                                Monthly EMI entered by you. This 'Pre-Approved Loan Offer' is tentative and not the
                                final loan approval. The final loan approval is given by the bank only, based on the
                                bank's rules and regulations and the customer profile.</p>

                            <p><strong>Reference Calculation:</strong></p>

                            <p>Consider a person who has entered the following details<br />
                                - Monthly Income: Rs.1,00,000<br />
                                - Current Monthly EMI: Rs.30,000</p>

                            <p>Based on these details, the person is left with Rs.70,000 in hand (deducting current EMI)
                                every month. So, according to the general rules of the banks, the EMI of 50% of the
                                in-hand amount can be approved - here it's 35,000. And based on the EMI and rate of
                                interest (12.5% tentatively), the eligible amount is shown in the Pre-Approved Loan
                                Offer - considering the mentioned calculation.</p>

                            <p>Note: Pre-approved loan offer is tentative. It should not be considered as the final loan
                                approval. The final loan approval is given by the bank only, according to their rules
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

<script src="<?php echo base_url('assets/plugins/celebration/confetti-script.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/celebration/confetti.browser.min.js'); ?>" type="text/javascript">
</script>

<?php
$this->load->view('includes/footer-apply.php');
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