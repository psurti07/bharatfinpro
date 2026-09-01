<?php
$this->load->view('plan_customer/includes/header.php');

if ($carddata->cardtype == 22) {
	$cardname = 'Bharat Pro Finance';
} else {
	$cardname = 'Bharat Pro Finance';
}

?>

<section id="page-title" class="background-dark">
    <div class="container">
        <div class="page-title">
            <h4><i class="fa fa-credit-credit"></i> Membership Card</h4>
        </div>
    </div>
</section>

<section id="page-content" class="fullscreen">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">

                <div class="text-right">
                    <a href="#" id="btn-download-image"
                        class="btn btn-light cust-btn-blue btn-reveal btn-reveal-left"><span>Membership Card</span><i
                            class="fa fa-download"></i></a>

                    <a href="<?php echo site_url('plan_customer/profile/invoice/' . stringCrypt($carddata->id, 'encrypt')); ?>"
                        target="_blank" class="btn btn-light cust-btn-blue btn-reveal btn-reveal-left"><span>Invoice</span><i
                            class="fa fa-download"></i></a>
                </div>

                <div class="card process border-top-dark">
                    <div class="card-body">

                        <div id="credit" class="credit">
                            <div class="credit__front credit__part <?php echo strtolower($cardname); ?>">
                                <div class="credit__head">
                                    <!-- <h4 class="credit__label">Membership Card</h4>
							    	<img class="credit__front-logo credit__logo" src="<?php echo base_url('assets/images/logo-large.png'); ?>"> -->
                                </div>
                                <p class="credit_numer text-left text-light">
                                    <?php echo chunk_split($carddata->card_number, 4, ' '); ?></p>
                                <div class="credit__space-full text-left text-light">
                                    <span class="credit__label">VALID FROM
                                        <?php echo date('d/m/Y', strtotime($carddata->registration_date)); ?> VALID TO
                                        <?php echo date('d/m/Y', strtotime($carddata->expiry_date)); ?></span>
                                    <p class="credit__info"><?php echo $carddata->fullname; ?></p>
                                </div>
                            </div>
                        </div>

                        <h5>Membership Card Benefits</h5>
                        <p><small>(1) Apply for any loan to multiple banks (2) Providing loan assistance for 6 months
                                (3) Get 35% referral payout as reward (4) Get loan approval within 7 business days (5)
                                On call support to clear all doubts & query (6) Bank verification does not affect to
                                CIBIL Score</small></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php
$this->load->view('customer/includes/footer.php');
?>


<script type="text/javascript">
$(document).ready(function() {
    var element = document.getElementById("credit"); // global variable
    var getCanvas; // global variable

    html2canvas(element, {
        onrendered: function(canvas) {
            getCanvas = canvas;
        }
    });

    $("#btn-download-image").on('click', function() {
        // Now browser starts downloading it instead of just showing it
        var imgageData = getCanvas.toDataURL("image/png");
        var newData = imgageData.replace("image/png", "image/octet-stream");
        $("#btn-download-image").attr("download", "#").attr("href", newData);
    });

});
</script>