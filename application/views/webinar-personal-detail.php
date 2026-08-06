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
                                        alt="Prayoshafincart" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="page-title-home hero-wrap">
            <div class="container">
                <div class="content">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-4 order-2 order-md-1">
                            <div class="award-card mt-1">
                                <div class="accordion" id="faqAccordion">
                                    <div class="accordion-item bg-transparent">
                                        <h2 class="accordion-header" id="heading1">
                                            <button class="accordion-button bg-transparent color-highlight4"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#collapse1"
                                                aria-expanded="true" aria-controls="collapse1">
                                                User Info.
                                            </button>
                                        </h2>
                                        <div id="collapse1" class="accordion-collapse collapse show"
                                            aria-labelledby="heading1" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body color-666">
                                                 <ul class="list-icon list-icon-arrow-circle list-icon-colored" style="font-size:13px">
                                                    <li class="mb-2"> Fill Basic Details </li>
                                                    <li class="mb-2"> Confirm Your Registration </li>
                                                    <li class="mb-2"> Webinar Access </li>
                                                </ul>
                                                
                                                <hr class="mt-20 mb-20">
                                                <h6>User Details: </h6><hr>
                                                <ul class="list-icon list-icon-arrow-circle list-icon-colored" style="font-size:13px">
                                                    <li class="mb-2"> Name : <?php echo $this->session->tempdata('firstname');?> </li>
                                                    <li class="mb-2"> Mobile : <?php echo $this->session->tempdata('usermobile');?> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="info mt-3">
                                    <div class="m-auto">
                                        <div class="">
                                            <div class="" style="width: 264px; margin-right: 15px;">
                                                <div class="img text-center mb-3">
                                                    <img src="<?php echo base_url() ?>assets/images/workshop/digital.png"
                                                        class="img-fluid" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="swiper-pagination position-relative mt-3"></div> -->
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 order-1 order-md-2">
                            <div class="section-card mb-3 mt-lg-0  mt-0 mb-lg-0">
                                <h3 class="color-highlight4">Personal Details</h3>
                                <p class="fsz-12">Fill in the details below to complete your registration.</p>
                                <form action="<?php echo base_url() ?>webinar/user-registration" method="POST"
                                    class="signup-form" novalidate="novalidate" id="frmworkshop">
                                        <input type="hidden" name="mobile_no" id="mobile_no" value="<?php echo $userdata->mobile ?>">
                                        <input type="hidden" name="program_id" id="program_id" value="<?php echo $userdata->program_id ?>">
                                        <input type="hidden" name="program_type" id="program_type" value="<?php echo $userdata->program_type ?>">
                                        <input type="hidden" name="fbclid" id="fbclid" value="">
                                    <div class="row pt-2">
                                        <div class="col-lg-8 col-md-8 col-12">
                                            <div class="form-group mb-3">
                                                <label class="d-block text-start color-000 mb-10 fsz-14" for="email">Email Id <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" name="email" id="email" class="form-control fsz-14 radius-2"
                                                    placeholder="john@doe.com" required>
                                                
                                               <div class="help-block font-small-3"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-12">
                                            <div class="form-group mb-3">
                                                <label class="d-block text-start color-000 mb-10 fsz-14" for="current_occupation">Current
                                                    Occupation
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" name="current_occupation" id="current_occupation"
                                                    class="form-control fsz-14 radius-2" placeholder="Ex: Engineer" required>
                                                
                                                <div class="help-block font-small-3"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-12">
                                            <div class="form-group mb-3">
                                                <label class="d-block text-start color-000 mb-10 fsz-14" for="goal">Earning Goal
                                                    <span class="text-danger">*</span></label>
                                                <input type="tel" name="earning_goal" id="goal"
                                                    class="form-control fsz-14 radius-2" placeholder="5,00,000"
                                                    inputmode="numeric" pattern="[0-9]*" required>
                                               
                                                <div class="help-block font-small-3"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-12">
                                            <div class="form-group mb-3">
                                                <label class="d-block text-start color-000 mb-2 fsz-14" for="pincode">Pincode <span
                                                        class="text-danger">*</span></label>
                                                <input type="tel" id="pincode" name="pincode"
                                                    class="form-control name numeric-input fsz-14 radius-2"
                                                    placeholder="123456" value="" maxlength="6" minlength="6"
                                                    inputmode="numeric" pattern="[0-9]*" autocomplete="postal-code" required>
                                                
                                                <div class="help-block font-small-3"></div>
                                            </div>
                                        </div>
                                        <div id="loader" style="display:none;">
                                            Loading...
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-12">
                                            <div class="form-group mb-3">
                                                <label class="d-block text-start color-000 mb-2 fsz-14" for="city">City <span
                                                        class="text-danger">*</span></label>
                                                <input id="city" name="city" type="text"
                                                    class="form-control fsz-14 radius-2" placeholder="Mumbai" value="" required>
                                               
                                                <div class="help-block font-small-3"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-12">
                                            <div class="form-group mb-3">
                                                <label class="d-block text-start color-000 mb-2 fsz-14" for="state">State <span
                                                        class="text-danger">*</span></label>
                                                <select id="state" name="state" class="form-select fsz-14 radius-2" required>
                                                    <option value="">Select State</option>
                                                    <?php echo getStateOption(); ?>
                                                </select>
                                               
                                               <div class="help-block font-small-3"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="button_su radius-2 mt-10">
                                                <span class="su_button_circle bg-darkBlue1 desplode-circle"></span>
                                                <button type="submit" id="registerbtn"
                                                    class="tf-btn m-auto text-uppercase px-4 py-2"
                                                    >
                                                    <span
                                                        class="button_text_container text-uppercase ltspc-1 d-flex align-items-center color-yellow2">
                                                        
                                                        Register
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
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
        
</body>

</html>

<script>
$('#pincode').on('input', function() {

    var pincode = $(this).val();

    if (pincode.length === 6) {

        $.ajax({
            url: "<?= base_url('webinar/geoLocation') ?>",
            type: "POST",
            data: {
                pincode: pincode
            },
            dataType: "json",

            success: function(response) {

                if (response.status === 'success') {
                    $('#city').val(response.city);
                    $('#state').val(response.state);
                    $('.pincode').text('');
                } else {
                    $('#city').val('');
                    $('#state').val('');
                    $('.pincode').text('Enter valid pincode.');
                }
            },

            error: function() {
                $('.pincode').text('Enter valid pincode.');
            }
        });

    } else {
        $('#city').val('');
        $('#state').val('');
    }
});
</script>