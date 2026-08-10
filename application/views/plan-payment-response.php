<?php
$this->load->view('includes/header-plan-apply.php');

if ($responsedata['loantype'] == 21) {
	$loantype = "Personal Loan";
} else if ($responsedata['loantype'] == 22) {
	$loantype = "Business Loan";
} else {
	$loantype = "Loan";
}
?>

<style>
.background-gray {
    background-color: #d8d9db;
}
</style>

<section class="fullscreen">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card border-2 border-primary">
                    <div class="card-body text-center">
                        <!-- START : SUCCESS -->
                        <?php if ($responsedata['status'] == "true") { ?>
                        <h1 class="icon pulse infinite text-success m-0" data-animate="pulse infinite"><i
                                class="icon-check-circle "></i></h1>
                        <h2 class="text-success">Congratulations!</h2>
                        <p>Your <?php echo $loantype; ?> application has been successfully submmited. </p>

                        <p class="text-muted">Please check your email/WhatsApp/SMS to get Your Customer Portal Login
                            Credentials</p>

                        <a href="<?php echo site_url('plan_customer/login'); ?>"
                            class="btn btn-info m-t-10 text-uppercase"><i class="fas fa-cloud-upload-alt"> </i>
                            &nbsp;Upload Document</a>



                        <?php } ?>
                        <!-- END : SUCCESS -->

                        <!-- START : FAIL -->
                        <?php if ($responsedata['status'] == "false") { ?>
                        <h1 class="icon pulse infinite text-danger m-0" data-animate="pulse infinite"><i
                                class="icon-x-circle "></i></h1>
                        <h2 class="text-danger">Payment Unsuccessful</h2>
                        <p>Your loan application payment process has failed. Please try again. <br /> If you have any
                            questions you can contact on our customer care number.</p>

                        <a href="<?php echo site_url('superoffer'); ?>"
                            class="btn btn-primary btn-sm m-t-10 text-uppercase">Go to Homepage</a>
                        <?php } ?>
                        <!-- END : FAIL -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$this->load->view('includes/footer-plan-apply.php');
?>