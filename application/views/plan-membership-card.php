<?php
$this->load->view('includes/header-plan-apply.php');

$amtpay = $productdata['payamount'];
$eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']);
?>

<section class="background-alice-blue loan-application-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-start mb-4">
                <h2 class="mb-0 display-6 text-dark-navy font-weight-bold"> Personal Loan </h2>
                <p class="mb-0"> Kindly continue to finalize the process at your earliest convenience.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-12 col-12 mb-lg-0 mb-4">
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
            <div class="col-lg-5 col-md-12 col-12 mb-lg-0 mb-4">

                <div class="card shadow mb-0">
                    <!-- <div class="card-body"> -->

                    <?php echo form_open('plan/checkoutDigital', array('id' => 'submitForm2', 'class' => '', 'novalidate' => 'novalidate')); ?>
                    <input type="hidden" name="loantype" id="loantype" value="<?php echo $userdetails['loantype']; ?>"
                        class="form-control" required>

                    <input type="hidden" name="applyid" id="applyid" value="<?php echo $userdetails['applyid']; ?>"
                        class="form-control" required>

                    <input type="hidden" name="fullname" id="fullname" value="<?php echo $userdetails['fullname']; ?>"
                        class="form-control" required>

                    <input type="hidden" name="mobile" id="mobile" value="<?php echo $userdetails['mobile']; ?>"
                        class="form-control" required>

                    <input type="hidden" name="email" id="email" value="<?php echo $userdetails['email']; ?>"
                        class="form-control" required>

                    <input type="hidden" name="orderAmount" id="orderAmount" value="<?php echo $amtpay; ?>"
                        class="form-control" required>
                    <div class="loan-approved-box">
                        <div class="text-center w-100 mb-3  loan-approve-text pt-4 pb-5">
                            <p class="text-white mb-1">Great news, <?php echo $userdetails['fullname']; ?>!</p>
                            <h4 class="text-white">Your Loan is Pre-Approved Amount Of <h4 class="text-warning">₹
                                    <?php echo formatePriceIndia($eligibilityamt); ?>/-</h4>
                            </h4>
                        </div>
                        <div class="background-alice-blue border counter-wrapper-main membership-offer mb-0">
                            <div class="row counter-wrapper p-3">
                                <div class="col-sm-4 col-4">
                                    <div class="counter-wrap text-center position-relative">
                                        <div class=" text-start position-relative">
                                        <p class="text-gray fa-sm mb-0 text-uppercase">Loan</p>
                                      
                                    </div>
                                              <h5 class="counter counter-lg text-dark-navy font-weight-600 mb-0">
                                            ₹2,40,000</h5>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-4">
                                    <div class="counter-wrap text-center position-relative">
                                        <div class=" text-start position-relative">
                                        <p class="text-gray fa-sm mb-0 text-uppercase">Monthly EMI</p>
                                    </div>
                                 
                                                   <h5 class="counter counter-lg text-primary font-weight-600 mb-0">
                                            ₹11,242</h5>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-4">
                                    <div class="counter-wrap text-center position-relative">
                                        <div class=" text-start position-relative">
                                        <p class="text-gray fa-sm mb-0 text-uppercase">Tenure</p>
                                        
                                    </div>
                                            <h5 class="counter counter-lg text-dark-navy font-weight-600 mb-0">
                                            24 Mo</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <table class="table m-b-0 membership-table">
                            <tbody>
                                <tr>
                                    <td class="text-center border-top-0 pt-0" colspan="2">
                                        <?php
                                               if ($productdata['offeramount'] != 0) {
                                                 echo '<h4 class="m-b-0">';
                                                echo '<div class="d-flex align-items-center justify-content-center mb-0 flex-md-nowrap flex-wrap">₹ <del class="text-gray">' . formatePrice($productdata['amount']) . '</del> 
                                                <h3 class="text-dark-navy display-3 font-weight-bold mb-0">' . formatePrice($productdata['offeramount']) . '</h3>
                                                <span class="text-white bg-success fa-sm px-3 py-2 rounded-pill font-weight-700 badge d-inline-block"> ' . calPercentage($productdata['amount'], $productdata['offeramount']) . ' off</span> </div>';
                                                echo ' ';    
                                                 echo '</h4>';
                                                $subtotal = $productdata['offeramount'];
                                               } else {
                                                echo '<h4>Rs. ' . formatePrice($productdata['amount']) . '</h4>';
                                                $subtotal = $productdata['amount'];
                                                  }
												?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart-product-name d-text-left border-top-0 pb-0">
                                        + Amount
                                    </td>
                                    <td class="cart-product-name text-right border-top-0 pb-0">
                                        <span class="amount font-weight-bold">
                                            <?php echo formatePriceIndia($subtotal); ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart-product-name d-text-left border-top-0 ">
                                        + GST (18%)
                                    </td>
                                    <td class="cart-product-name text-right border-top-0">
                                        <span class="amount font-weight-bold">
                                            <?php $gst = $subtotal * 0.18;
													echo formatePriceIndia($gst); ?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart-product-name d-text-left">
                                        = Grand Total
                                    </td>
                                    <td class="cart-product-name text-right">
                                        <span class="amount color lead"><strong>
                                                <?php $grandtotal = $subtotal + $gst;
														echo formatePriceIndia($grandtotal); ?>
                                            </strong></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cart-product-name text-center border-top-0" colspan="2">
                                        <button type="submit" id="form-submit3" class="btn btn-lg btn-primary w-100">Buy
                                            Now <i class="icon-arrow-right"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-center mt-0 mb-3 text-gray fa-sm w-100"> <i
                            class="icon-shield text-success mr-2"></i>Secure checkout · 256-bit encryption </p>
                    <div id="resmessage"></div>


                    <?php echo form_close(); ?>

                    <!-- </div> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-12 mb-lg-0 mb-0">
                <div class="card shadow mb-0 benefit-card">
                    <div class="card-body p-0">
                        <h5 class="card-title text-dark-navy font-weight-bold">Plan Benefits:</h5>

                        <ul class="icon-list-wrap bullet-bg bullet-soft-orange mb-0 p-0">
                            <li class="ps-0 d-flex ">
                                <i class="icon-check-circle text-success mt-1"></i> <span class="text-gray ml-3">
                                    Loan processed across multiple
                                    NBFCs</span>
                            </li>
                            <li class="ps-0 d-flex">
                                <i class="icon-check-circle text-success mt-1"></i>
                                <span class="text-gray ml-3"> 100% online financial
                                    consultation</span>
                            </li>
                            <li class="ps-0 d-flex">
                                <i class="icon-check-circle text-success mt-1"></i>
                                <span class="text-gray ml-3"> Access to personalised
                                    tracking
                                    portal</span>
                            </li>
                            <li class="ps-0 d-flex">
                                <i class="icon-check-circle text-success mt-1"></i> <span class="text-gray ml-3">
                                    Dedicated loan expert
                                    assigned</span>
                            </li>
                            <li class="ps-0 d-flex">
                                <i class="icon-check-circle text-success mt-1"></i>
                                <span class="text-gray ml-3"> Plan validity: 6 months</span>
                            </li>
                            <li class="ps-0 d-flex">
                                <i class="icon-check-circle text-success mt-1"></i>
                                <span class="text-gray ml-3">Loan processing time: 48
                                    hours</span>
                            </li>
                        </ul>
                        <hr class="my-3" />

                        <div class="row text-center customers-satisfied-section">
                            <div class="col-6 p-0">
                                <h4 class="mb-1 text-primary">225k</h4>
                                <p class="mb-0 text-gray fa-xs">Satisfied Customers</p>
                            </div>

                            <div class="col-6 p-0">
                                <h4 class="mb-1 text-primary">₹100M</h4>
                                <p class="mb-0 text-gray fa-xs">Loan Disbursed</p>
                            </div>
                        </div>

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
    $('#submitForm3').on('submit', function(e) {
        $('#form-submit3').attr('disabled', true);
        $('#form-submit3').html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESS...'
        );
    });
});
</script>