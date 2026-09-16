<footer id="footer">
    <div class="footer-content">
        <div class="container">
            <div class="row gap-y">
                <div class="col-md-6 col-xl-4">
                    <p>
                        <a href="<?php echo site_url(); ?>" class="logo"> <img
                                src="<?php echo base_url('assets/images/logo-2x.png'); ?>"
                                alt="<?php echo PROJECT_NAME; ?>" class="img-fluid m-b-10" width="180"></a>
                    </p>
                    <p>When it comes to finding peace with fast-paced and professional online loan services, Bharatfinpro is a place where a humongous customer base that is ever-growing.</p>

                    <P><strong>CIN NO.: </strong><?php echo COMPANY_CIN; ?></P>

                    <div class="social-icons social-icons-colored social-icons-rounded float-left">
                        <ul>
                            <ul class="social-icons social-icons-colored social-icons-rounded align-center">
                                <?php if (SM_GOOGLE != "#") { ?>
                                <li class="social-google"><a href="<?php echo SM_GOOGLE; ?>" target="_blank"
                                        rel="nofollow"><i class="fab fa-google-plus-g"></i></a></li><?php } ?>

                                <?php if (SM_FACEBOOK != "#") { ?>
                                <li class="social-facebook"><a href="<?php echo SM_FACEBOOK; ?>" target="_blank"
                                        rel="nofollow"><i class="fab fa-facebook-f"></i></a></li><?php } ?>

                                <?php if (SM_INSTAGRAM != "#") { ?>
                                <li class="social-instagram"><a href="<?php echo SM_INSTAGRAM; ?>" target="_blank"
                                        rel="nofollow"><i class="fab fa-instagram"></i></a></li><?php } ?>

                                <?php if (SM_TWITTER != "#") { ?>
                                <li class="social-twitter"><a href="<?php echo SM_TWITTER; ?>" target="_blank"
                                        rel="nofollow"><i class="fab fa-twitter"></i></a></li><?php } ?>

                                <?php if (SM_LINKEDIN != "#") { ?>
                                <li class="social-linkedin"><a href="<?php echo SM_LINKEDIN; ?>" target="_blank"
                                        rel="nofollow"><i class="fab fa-linkedin"></i></a></li><?php } ?>

                                <?php if (SM_PINTEREST != "#") { ?>
                                <li class="social-pinterest"><a href="<?php echo SM_PINTEREST; ?>" target="_blank"
                                        rel="nofollow"><i class="fab fa-pinterest"></i></a></li><?php } ?>

                                <?php if (SM_YOUTUBE != "#") { ?>
                                <li class="social-youtube"><a href="<?php echo SM_YOUTUBE; ?>" target="_blank"
                                        rel="nofollow"><i class="fab fa-youtube"></i></a></li><?php } ?>
                            </ul>
                        </ul>
                    </div>
                </div>

                <div class="col-6 col-md-3 col-xl-2">

                    <div class="widget">
                        <h4 class="text-navy">Useful Links</h4>
                        <ul class="list p-0">
                            <li><a href="<?php echo site_url('plan/bharatpro_finance'); ?>">  Bharat Pro Finance</a></li>
                            <!-- <li><a href="https://fitzify.com/"><i class="fas fa-external-link-alt m-r-5"></i>
                                    Fitzify</a></li> -->
                            <li><a href="javascript:;" onclick="goToMenu('company')">  Company</a></li>
                            <li><a href="javascript:;" onclick="goToMenu('contacts')">  Contact Us</a></li>
                            <li><a href="<?php echo site_url('career'); ?>"> 
                                    Career</a>
                            <li><a href="<?php echo site_url('important-update'); ?>"> 
                                    Important Update</a></li>
                            <li><a href="<?php echo site_url('raise-request'); ?>"> 
                                    Raise a Request</a></li>
                            <!-- <li><i class="fas fa-external-link-alt m-r-5"></i><a
                                    href="<?php echo site_url('webinar'); ?>">Webinar</a></li> -->

                        </ul>
                    </div>

                </div>
                <div class="col-6 col-md-3 col-xl-3">

                    <div class="widget">
                        <h4 class="text-navy">Useful Links</h4>
                        <ul class="list p-0">
                            <li><a href="<?php echo site_url('disclaimer'); ?>"> 
                                    Disclaimer</a></li>
                            <li><a href="<?php echo site_url('faqs'); ?>"> 
                                    FAQs</a></li>

                            <li><a href="<?php echo site_url('privacy-policy'); ?>"> 
                                    Privacy Policy</a></li>
                            <li><a href="<?php echo site_url('refund-policy'); ?>"> 
                                    Refund &amp; Return Policy</a></li>
                            <li><a href="<?php echo site_url('terms-conditions'); ?>"> 
                                    Terms & Conditions</a></li>


                        </ul>
                    </div>

                </div>

                <div class="col-6 col-md-6 col-xl-3">
                    <div class="widget">
                        <h4 class="text-navy">Get in touch with us</h4>
                        <div>
                            <span><a href="tel:<?php echo COMPANY_MOBILE; ?>"><i class="fas fa-mobile-alt m-r-5"></i>
                                    <?php echo COMPANY_MOBILE; ?>
                                </a></span><br />
                            <span><a href="mailto:<?php echo COMPANY_EMAIL; ?>"><i class="fa fa-envelope m-r-5"></i>
                                    <?php echo COMPANY_EMAIL; ?>
                                </a></span><br />
                            <span><i class="fas fa-map-marked-alt m-r-5"></i> <?php echo COMPANY_ADDRESS; ?>
                            </span>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="copyright-content background-webcolor">
        <div class="container">
            <div class="copyright-text text-center text-light">
                <?php echo date('Y') . " &copy; " . COMPANY_NAME; ?>. All rights reserved.
            </div>
        </div>
    </div>
</footer>

<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>

<script src="<?php echo base_url('assets/js/jquery.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins.js'); ?>" type="text/javascript"></script>

<script src="<?php echo base_url('assets/js/functions.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/validation/jqBootstrapValidation.js'); ?>" type="text/javascript"></script>

<script src="<?php echo base_url('assets/plugins/validate/form-validation.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/validate/form-validation.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-switch/bootstrap-switch.min.js'); ?>" type="text/javascript">
</script>

<script src="<?php echo base_url('assets/plugins/metafizzy/infinite-scroll.min.js'); ?>" type="text/javascript">
</script>

<script src="<?php echo base_url('assets/plugins/particles/particles.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/particles/particles-dots.js'); ?>" type="text/javascript"></script>

<script src="<?php echo base_url('assets/plugins/rateit/jquery.rateit.min.js'); ?>" type="text/javascript"></script>



<script type="text/javascript">
function goToMenu(sectionId) {
    let currentUrl = window.location.href;
    let lastSegment = currentUrl.substring(currentUrl.lastIndexOf('/') + 1);
    if ((lastSegment !== '')) {
        window.location.href = `${base_url}#${sectionId}`;
    } else {
        var section = document.getElementById(sectionId);
        if (section) {
            section.scrollIntoView({
                behavior: 'smooth'
            });
        }
    }
}

$(document).ready(function() {
    $('#loanamount, #monincome, #monemi, #monthlyincome, #cardamount').on('input', function() {
        var inputVal = $(this).val();
        inputVal = inputVal.replace(/\D/g, '');
        inputVal = inputVal.slice(0, 7);
        $(this).val(inputVal);
    });

    $('#mobileno, #mobile').on('input', function() {
        var inputVal = $(this).val();
        inputVal = inputVal.replace(/\D/g, '');
        inputVal = inputVal.slice(0, 10);
        $(this).val(inputVal);
    });

    $('#user_aadharcard_number').on('input', function() {
        var inputVal = $(this).val();
        inputVal = inputVal.replace(/\D/g, '');
        inputVal = inputVal.slice(0, 12);
        $(this).val(inputVal);
    });

    $('#cardnumber').on('input', function() {
        var inputVal = $(this).val();
        inputVal = inputVal.replace(/\D/g, '');
        inputVal = inputVal.slice(0, 16);
        $(this).val(inputVal);
    });

});
</script>
</body>

</html>