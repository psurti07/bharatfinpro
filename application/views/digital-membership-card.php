<?php
$this->load->view('includes/header-apply.php');

$amtpay = $productdata['payamount'];
$eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']);
?>

<section class="background-grey subscription-section">
    <div class="container">
        <div class="loan-offer-card how-we-help-block bg-navy mb-4">
            <div class="row align-items-end">
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="card shadow-none mb-4 bg-transparent border-0">


                        <div class="card-body">
                            <span
                                class="badge badge-blue rounded-pill text-white text-uppercase text-main-top text-wrap text-start">
                                <i class="icon-briefcase text-white mr-2"></i> <?php echo $userdetails['loanname']; ?>
                            </span>
                            <h2 class="text-white font-weight-bolder">Great news,
                                <?php echo $userdetails['fullname']; ?>!
                                🎉</h2>

                            <p class="text-white">Your <strong class="text-orange">Rs.
                                    <?php echo formatePriceIndia($eligibilityamt); ?></strong> pre-approved loan is
                                waiting.
                                Purchase a subscription to proceed.</p>


                            <span class="badge bg-pale-primary rounded-pill text-main-top-wrap py-2">
                                <i class="fa fa-clock mr-2"></i>Valid till 12 AM tonight
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <img class="img-fluid r-12" src="<?php echo base_url() ?>assets/images/subscriber.png" alt="">
                </div>
            </div>
        </div>
        <!-- START : MEMBERSHIP CARD -->
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 mb-lg-0 mb-4">
                <div class="subscription-card-offer bg-white border shadow">
                    <div class="row align-items-start">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 border-right">
                            <div class="bg-white p-4">
                                <div class="card-body">

                                    <?php echo form_open('digital/checkoutDigital', array('id' => 'submitForm3', 'class' => '', 'novalidate' => 'novalidate')); ?>
                                    <input type="hidden" name="loantype" id="loantype"
                                        value="<?php echo $userdetails['loantype']; ?>" class="form-control" required>

                                    <input type="hidden" name="applyid" id="applyid"
                                        value="<?php echo $userdetails['applyid']; ?>" class="form-control" required>

                                    <input type="hidden" name="fullname" id="fullname"
                                        value="<?php echo $userdetails['fullname']; ?>" class="form-control" required>

                                    <input type="hidden" name="mobile" id="mobile"
                                        value="<?php echo $userdetails['mobile']; ?>" class="form-control" required>

                                    <input type="hidden" name="email" id="email"
                                        value="<?php echo $userdetails['email']; ?>" class="form-control" required>

                                    <input type="hidden" name="orderAmount" id="orderAmount"
                                        value="<?php echo $amtpay; ?>" class="form-control" required>

                                    <div class="d-flex align-items-start justify-content-between w-100">
                                        <div class="ms-0 mb-3">
                                            <h5 class="fs-11 mb-1 text-orange text-uppercase">Premium Subscription
                                            </h5>
                                            <h4 class="text-start text-blue font-weight-bold">Limited-time offer</h4>
                                        </div>
                                        <div class="ml-2">
                                            <?php
                                       
                                          echo '<span class="text-white bg-success fa-sm px-3 py-2 rounded-pill font-weight-700 badge d-inline-block"> ' . calPercentage($productdata['amount'], $productdata['offeramount']) . ' off</span>';
                                        ?>
                                        </div>
                                    </div>
                                    <table class="table m-b-0 membership-table">
                                        <tbody>
                                            <tr>
                                                <td class="text-start border-top-0 " colspan="2">
                                                    <?php
                                            if ($productdata['offeramount'] != 0) {
                                                // echo '<h3 class="m-b-0">';

                                                echo '<div class="d-flex align-items-bottom mb-3">Rs. <del class="text-danger">' . formatePrice($productdata['amount']) . '</del> 

                                                <h1 class="text-orange">' . formatePrice($productdata['offeramount']) . '</h1> </div>';

                                                // echo '<span class="text-danger font-weight-700"> (' . calPercentage($productdata['amount'], $productdata['offeramount']) . ' off)</span>';
                                                echo ' <p>One-time fee, GST extra </p>';    
                                                // echo '</h3>';
                                                

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
                                                    Amount
                                                </td>
                                                <td class="cart-product-name text-right border-top-0 pb-0">
                                                    <span class="amount">
                                                        <?php echo formatePriceIndia($subtotal); ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="cart-product-name d-text-left border-top-0">
                                                    GST (18%)
                                                </td>
                                                <td class="cart-product-name text-right border-top-0">
                                                    <span class="amount">
                                                        <?php $gst = $subtotal * 0.18;
                                                echo formatePriceIndia($gst); ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="cart-product-name d-text-left">
                                                    <strong>Grand Total</strong>
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
                                                    <button type="submit" id="form-submit3"
                                                        class="btn btn-lg btn-orange w-100">BUY
                                                        NOW <i class="icon-arrow-right"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="text-center mt-2 mb-0 text-subtitle m-auto">
                                        <small>Secured by 256-bit SSL · UPI / Cards / Net Banking</small>
                                    </p>
                                    <div id="resmessage"></div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="bg-white p-4">
                                <div class="card-body p-0">

                                    <h4 class="text-left text-blue font-weight-bold">Subscription Benefits</h4>
                                    <ul class="mt-4 mb-4 p-0">
                                        <li class="mb-3 d-flex">
                                            <div>
                                                <i class="icon-check-circle text-success"></i>
                                            </div><span class="ml-2 text-left"> Loan Process in Multiple NBFCs
                                            </span>
                                        </li>
                                        <li class="mb-3 d-flex">
                                            <div>
                                                <i class="icon-check-circle text-success"></i>
                                            </div> <span class="ml-2 text-left"> 100% Online Financial Consultation
                                            </span>
                                        </li>
                                        <li class="mb-3 d-flex">
                                            <div>
                                                <i class="icon-check-circle text-success"></i>
                                            </div> <span class="ml-2 text-left"> Access Personalized Tracking Portal
                                            </span>
                                        </li>
                                        <li class="mb-3 d-flex">
                                            <div>
                                                <i class="icon-check-circle text-success"></i>
                                            </div> <span class="ml-2 text-left"> Dedicated Loan Expert
                                                Assigned</span>
                                        </li>
                                        <li class="mb-3 d-flex">
                                            <div>
                                                <i class="icon-check-circle text-success"></i>
                                            </div> <span class="ml-2 text-left">Subscription Validity: 9
                                                Months</span>
                                        </li>
                                        <li class="mb-4 d-flex">
                                            <div>
                                                <i class="icon-check-circle text-success"></i>
                                            </div><span class="ml-2 text-left">Loan Processing Time: 48 Hours</span>
                                        </li>
                                    </ul>
                                    <div class="row counter-wrapper">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 p-0 mt-0">
                                            <div class="card-blog text-center">
                                                <div
                                                    class="icon staticts-card-btn btn btn-block pe-none background-light-green m-auto border-0">
                                                    <i class="fa fa-user text-orange"></i>
                                                </div>
                                                <h3 class="counter text-blue mt-1 mb-1 font-weight-bold">2.25L+</h3>
                                                <p class="mb-0 text-uppercase fa-sm ">Satisfied Customers</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 p-0 mt-0">
                                            <div class="card-blog text-center">
                                                <div
                                                    class="icon staticts-card-btn btn btn-block pe-none background-titan-white  m-auto border-0">
                                                    <i class="fa fa-wallet text-success"></i>
                                                </div>
                                                <h3 class="counter text-blue mt-1 mb-1 font-weight-bold">₹100M+</h3>
                                                <p class="mb-0 text-uppercase fa-sm">Loan Disbursed</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card shadow border">
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

        <!-- END : MEMBERSHIP CARD -->
    </div>
</section>

<?php
$this->load->view('includes/footer-apply.php');
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