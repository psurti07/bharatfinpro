<?php
$this->load->view('includes/header-apply.php');

$amtpay = $productdata['payamount'];
?>

<section class="background-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12 order-md-1 order-2 center sm-p-0">
                <div class="card border-2 shadow-none">
                    <div class="card-header background-honeydew" style="border-radius: 8px 8px 0 0;">
                        <div class="card-title">
                            <h4 class="font-weight-bold font-italic">Your Personal Loan up to <span
                                    class="text-orange">Rs.5 Lakhs</span> is Ready To Be Processed Ahead!</h4>
                        </div>
                    </div>
                    <div class="card-body sm-m-0">
                        <!-- <h4 class="text-dark pb-3">Purchase Membership & Instantly Process Your Personal Loan!</h4> -->

                        <p><strong>Unlock Best Loan Offers From Our Lending Partners</strong></p>

                        <?php $loanoffers = array('loanoffer-1.jpg', 'loanoffer-2.jpg', 'loanoffer-3.jpg', 'loanoffer-4.jpg'); ?>

                        <div class="carousel equalize testimonial testimonial-box" data-margin="10" data-arrows="false"
                            data-dots="false" data-items="2" data-items-sm="2" data-items-xxs="1"
                            data-equalize-item=".testimonial-item">
                            <?php foreach ($loanoffers as $row) { ?>
                            <img src="<?php echo base_url('assets/images/slider/' . $row); ?>" alt="offer img">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12 order-md-2 order-1 center sm-p-0">
                <div class="card border-2 shadow-none">
                    <div class="card-header background-honeydew" style="border-radius: 8px 8px 0 0;">
                        <?php
                        if ($this->session->flashdata('danger')): ?>
                        <div id="flash-message" class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('danger'); ?>
                            <?= $this->session->unset_userdata('danger'); ?>
                        </div>
                        <?php endif; ?>
                        <div class="card-title">
                            <p><span class="font-weight-bold">Membership Fees</span> <span class="small font-italic">18%
                                    GST additional.</span></p>
                            <?php
                            if ($productdata['offeramount'] != 0) {
                                echo '<h4 class="m-b-0">';

                                echo 'Rs. <del class="text-danger">' . formatePrice($productdata['amount']) . '</del> ';

                                echo '<span class="text-success text-xs">' . formatePrice($productdata['offeramount']) . '</span> only';

                                echo '<span class="text-success small"> (' . calPercentage($productdata['amount'], $productdata['offeramount']) . 'off)</span>';

                                echo '</h4>';

                                $subtotal = $productdata['offeramount'];
                            } else {
                                echo '<h4>Rs. ' . formatePrice($productdata['amount']) . '</h4>';
                                $subtotal = $productdata['amount'];
                            }
                            ?>
                        </div>
                    </div>

                    <div class="card-body sm-m-0">
                        <?php echo form_open('loan/getprimeoffer', array('id' => 'submitForm1', 'class' => 'form-transparent-grey', 'novalidate' => 'novalidate')); ?>
                        <input type="hidden" name="amount" id="amount" value="<?php echo $amtpay; ?>"
                            class="form-control" required>
                        <input type="hidden" name="paymentid" id="paymentid" value="" class="form-control">

                        <h5>Start Your Loan Process With Your Few Details:</h5>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text" id="basic-addon2">Full
                                        Name</span></div>
                                <input type="text" name="fullname" id="fullname" aria-required="true"
                                    class="form-control" aria-describedby="basic-addon2" required>
                            </div>
                            <div class="help-block font-small-3"></div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text" id="basic-addon3">Mobile
                                        No</span></div>
                                <input type="text" name="mobileno" id="mobileno" aria-required="true"
                                    class="form-control" aria-describedby="basic-addon3" required maxlength="10"
                                    minlength="10" inputmode="numeric" data-validation-regex-regex="^[6789]\d{9}$">
                            </div>
                            <div class="help-block font-small-3"></div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text" id="basic-addon4">Email
                                        Id
                                        &nbsp; &nbsp;</span></div>
                                <input type="email" name="emailid" id="emailid" aria-required="true"
                                    class="form-control" aria-describedby="basic-addon4" required>
                            </div>
                            <div class="help-block font-small-3"></div>
                        </div>

                        <div class="form-group text-left">
                            <button type="submit" id="form-submit1" class="btn btn-block btn-lg btn btn-primary">PROCEED
                                TO PAY</button>
                        </div>

                        <div class="form-group text-dark mb-0">
                            <p class="mb-0">
                                <small>By submitting the form &amp; proceeding, you agree to the
                                    <a href="<?php echo site_url('terms-conditions'); ?>" target="_blank">Terms of
                                        Use</a>
                                    and
                                    <a href="<?php echo site_url('privacy-policy'); ?>" target="_blank">Privacy
                                        Policy</a>
                                    of Bharatfinpro.com
                                </small>
                            </p>
                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- testimonial section -->
<section class="background-white pt-1">
    <div class="container">
        <div class="text-center m-b-50">
            <h2 class="text-dark">Our Customers Testimonials</h2>
            <p class="text-dark">Such feedback inspires us to go a mile beyond, every time!</p>
        </div>

        <?php $testimoniallist = array('1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png', '8.png'); ?>

        <div class="carousel equalize testimonial testimonial-box" data-margin="20" data-arrows="true" data-dots="false"
            data-items="2" data-items-sm="2" data-items-xxs="1" data-equalize-item=".testimonial-item">
            <?php foreach ($testimoniallist as $row) { ?>
            <img src="<?php echo base_url('assets/images/' . $row); ?>" alt="customer img">
            <?php } ?>
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
setTimeout(function() {
    const msg = document.getElementById('flash-message');
    if (msg) {
        msg.style.transition = "opacity 0.5s ease-out";
        msg.style.opacity = 0;
        setTimeout(() => {
            msg.style.display = "none";
        }, 500); // Wait for fade out to complete before hiding
    }
}, 5000); // Adjusted comment to match the actual delay
</script>