<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webinar</title>
   <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/images/apple-icon-180x180.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/favicon-16x16.png'); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>">
    <link href="<?php echo base_url() ?>assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/webinar/css/styles.css">
    <link href="<?php echo base_url() ?>assets/css/plugins.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/webinar/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/webinar/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/workshop_css.css">
    <?php echo link_tag('assets/css/validation/form-validation.css'); ?>
<?php 
$fbdomain = getFacebookDomain();
if($fbdomain != Null) {
  echo '<meta name="facebook-domain-verification" content="'.$fbdomain.'" />';
}

$fbpixel = getFacebookPixel('facebookpixel-webinar');
if($fbpixel != Null) {
?>
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '<?php echo $fbpixel; ?>');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo $fbpixel; ?>&ev=PageView&noscript=1" /></noscript>
<?php } ?>
<!-- End Facebook Domain + Pixel Code -->
</head>

<body class="counter-scroll">
    <div id="wrapper">
        <header id="header_main" class="header shadow-none px-lg-5">
            <div class="header-inner">
                <div class="header-inner-wrap container-fluid">
                    <div class="header-left">
                        <div class="header-left justify-left">
                            <div id="site-logo">
                                <a href="#" rel="home">
                                    <img id="logo-header"
                                        src="<?php echo base_url() ?>assets/images/logo.png" width="160"
                                        alt="Bharatfinpro" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="page-title-home hero-wrap" style="min-height: 96vh;">
            <div class="container">
                <div class="content">
                    <div class="row gx-0 align-items-center justify-content-center vh-75">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="section-card">
                                <h3 class="color-highlight4">OTP Verification</h3>
                                <p class="fsz-12">Please enter the OTP sent to your registered mobile number.</p>
                                 <?php
                                    if ($this->session->flashdata('danger')): ?>
                                        <div id="flash-message" class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?= $this->session->flashdata('danger'); ?>
                                            <?= $this->session->unset_userdata('danger'); ?>
                                        </div>
                                    <?php endif; ?>
                                <form action="<?php echo base_url() ?>webinar/checkotpCode" method="POST"
                                    class="signup-form" id="frmvalidate" novalidate="novalidate">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group pt-3">
                                                <input type="hidden" name="otpmobile" id="otpmobile" value="<?php echo $this->session->tempdata('usermobile'); ?>">
                                                <input type="hidden" name="programid" id="programid" value="<?php echo $this->session->tempdata('programid'); ?>">
                                                <div class="d-flex justify-content-center gap-2">
                                                    <input type="tel" name="otpcode[]" maxlength="1" inputmode="numeric"
                                                        pattern="[0-9]*" class="form-control text-center otp-input p-0"
                                                        style="width:45px; height:45px; font-size:20px;">
                                                    <input type="tel" name="otpcode[]" maxlength="1" inputmode="numeric"
                                                        pattern="[0-9]*" class="form-control text-center otp-input p-0"
                                                        style="width:45px; height:45px; font-size:20px;">
                                                    <input type="tel" name="otpcode[]" maxlength="1" inputmode="numeric"
                                                        pattern="[0-9]*" class="form-control text-center otp-input p-0"
                                                        style="width:45px; height:45px; font-size:20px;">
                                                    <input type="tel" name="otpcode[]" maxlength="1" inputmode="numeric"
                                                        pattern="[0-9]*" class="form-control text-center otp-input p-0"
                                                        style="width:45px; height:45px; font-size:20px;">
                                                </div>
                                                <span class="text-center">
                                                    <span
                                                        class="text-start invalid-feedback ajax-error otpcode[] is-invalid text-danger"
                                                        role="alert"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <div class="button_su radius-2 mt-2">
                                                <span class="su_button_circle bg-darkBlue1 desplode-circle"
                                                    style="left: 62.8125px; top: 55.8281px;"></span>
                                                <button type="submit" id="otpbtn"
                                                    class="tf-btn m-auto text-uppercase px-4 py-2">
                                                    <span
                                                        class="button_text_container text-uppercase ltspc-1 d-flex align-items-center color-yellow2">
                                                        <span
                                                            class="spinner-border spinner-border-sm me-2 d-none color-yellow2"
                                                            role="status" aria-hidden="true" id="otpLoader"></span>
                                                        Verify &amp; Proceed
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center mt-3">
                                            <p class="fsz-12">
                                                Didn't receive the OTP?
                                                <a type="button"
                                                    class="m-auto text-success fw-bold"
                                                    id="resendOtpBtn" onclick="resendOtp()">
                                                    Resend OTP
                                    </a>
                                                <span id="otpTimer" class="text-muted ms-1"
                                                    style="font-size: 12px;"></span>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="main-content">
             <footer id="footer" class="inverted text-light pt-0 pb-0" style="z-index:10;background-color:#000;">
                <div class="copyright-content">
                    <div class="container">
                        <div class="row align-items-center py-3">
                            <div class="col-lg-12 text-center">
                                <div class="copyright-text">
                                    <?php echo date('Y') . " &copy; " . COMPANY_NAME; ?> All rights reserved.</div>
                            </div>

                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/validation/jqBootstrapValidation.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/validate/form-validation.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/validate/form-validation.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/webinar/js/bootstrap.min.js') ?>"></script>     
        <script type="text/javascript" src="<?php echo base_url('assets/webinar/js/swiper-bundle.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/webinar/js/countto.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/webinar/js/swiper.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/webinar/js/main.js') ?>"></script>
       
        <script>
// OTP input auto-move
            $('.otp-input').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
                if (this.value.length === 1) {
                    $(this).next('.otp-input').focus();
                }
            });
            $('.otp-input').on('keydown', function(e) {
                if (e.key === "Backspace" && this.value === '') {
                    $(this).prev('.otp-input').focus();
                }
            });
            </script>
</body>

</html>