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

<section class="background-alice-blue fullscreen">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 m-auto">
                <div class="card">
                    <div class="card-body text-center">
                        <!-- START : SUCCESS -->
                        <?php if ($responsedata['status'] == "true") { ?>
                        <h1 class="icon pulse infinite text-success m-0" data-animate="pulse infinite"><i
                                class="icon-check-circle "></i></h1>
                        <h2 class="text-success">Congratulations!<span class="text-blue">
                                <?php echo $userdata->fullname; ?></span></h2>
                        <p>Your <?php echo $loantype; ?> A dedicated loan expert will reach out to complete <br>
                            documentation and bank verification. </p>
                        <div class="row mb-4">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                <div
                                    class="card-blog-wrapper border py-3 mb-sm-0 mb-3 background-grey card shadow-none">

                                    <p class="mt-0 mb-1 fs-11 text-uppercase fw-light">Sanctioned</p>
                                    <h4 class="mb-0 fs-18 text-blue font-weight-bold">₹1,95,000</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                <div
                                    class="card-blog-wrapper border py-3 mb-sm-0 mb-3 background-grey card shadow-none">

                                    <p class="mt-0 mb-1 fs-11 text-uppercase fw-light">Tenure</p>
                                    <h4 class="mb-0 fs-18 text-blue  font-weight-bold">Up to 60 mo</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                <div
                                    class="card-blog-wrapper border py-3 mb-sm-0 mb-3 background-grey card shadow-none">

                                    <p class="mt-0 mb-1 fs-11 text-uppercase fw-light">Disbursal</p>
                                    <h4 class="mb-0 fs-18 text-blue  font-weight-bold">Within 48 hrs</h4>
                                </div>
                            </div>
                        </div>

                        <a href="<?php echo site_url('plan_customer/login'); ?>"
                            class="btn btn-primary m-t-10 text-uppercase"><i class="fas fa-cloud-upload-alt"> </i>
                            &nbsp;Login Now</a>
                        <a href="<?php echo site_url('customer'); ?>" class="btn btn-light m-t-10 text-uppercase"><i
                                class="fas fa-home"> </i>
                            &nbsp;Customer Login</a>
                        <div class="mt-4">
                            <a href="#">Start a new application <i class="icon-arrow-right"></i></a>
                        </div>



                        <?php } ?>
                        <!-- END : SUCCESS -->

                        <!-- START : FAIL -->
                        <?php if ($responsedata['status'] == "false") { ?>
                        <h1 class="icon pulse infinite text-danger m-0" data-animate="pulse infinite"><i
                                class="icon-x-circle "></i></h1>
                        <h2 class="text-danger">Payment Unsuccessful<span class="text-blue">
                                <?php echo $userdata->fullname; ?></span></h2>
                        <p>Your loan application payment process has failed. Please try again. <br /> If you have any
                            questions you can contact on our customer care number.</p>

                        <a href="<?php echo site_url('superoffer'); ?>"
                            class="btn btn-primary btn-sm m-t-10 text-uppercase">Go to Homepage</a>
                        <div class="mt-4">
                            <a href="#">Start a new application <i class="icon-arrow-right"></i></a>
                        </div>
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