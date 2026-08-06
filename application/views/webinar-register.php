<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webinar Registration</title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/images/apple-icon-180x180.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/favicon-16x16.png'); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/webinar/css/styles.css">
    <link href="<?php echo base_url() ?>assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/webinar/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/webinar/css/swiper-bundle.min.css">
    <!-- Facebook Domain + Pixel Code -->
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
                                    <img id="logo-header" src="<?php echo base_url() ?>assets/images/logo.png" width="160"
                                        alt="nowofloan" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="register-section pt-0 pb-0 position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 mt-lg-0 mt-md-4 mt-5">
                        <div class="content-left-from text-start">
                            <h4 class="mb-3 text-black fw-bold"><?php echo $eventdetails->event_title ?>
                                </h4>
                                <h3 class="text-content mt-1 text-dark">

                                    <del class="fw-normal me-1 fs-6">
                                        ₹<?php echo $eventdetails->event_main_price ?>
                                    </del>
                                     <?php if($eventdetails->event_offer_price == 0) { ?>
                                        <span>FREE</span>
                                     <?php } else { ?>
                                        <span><?php echo $eventdetails->event_offer_price ?></span>
                                     <?php } ?>   
                                    
                                </h3>
                                <div class="article-thumb image-wrap mt-3 mb-4">
                                    <img class="web-image" src="<?php echo base_url() ?>assets/images/webinarpage/<?php echo $eventdetails->event_image; ?>"
                                         alt="<?php echo $eventdetails->event_image ?>">
                                </div>
                                <div class="teachers-content mb-3">
                                    <div class="d-none d-md-block d-lg-block mb-3">
                                        <p class="mb-1"><strong>🚀 Program Highlights</strong></p>
                                        <?php echo $eventdetails->event_desc_1 ?>
                                    </div>
                                    <h5 class="text-black">Webinar Details</h5>
                                    <ul class="mt-3 ps-0 mb-4">
                                        <li class="mb-2 d-flex align-items-center details-list text-black">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                fill="#0c6653" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                            </svg>
                                            Mentor: <?php echo $eventdetails->mentor_name ?>
                                        </li>
                                        <li class="mb-2 d-flex align-items-center details-list text-black">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                fill="#0c6653" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                            </svg>
                                            Language: <?php echo $eventdetails->language ?>
                                        </li>
                                        <li class="mb-2 d-flex align-items-center details-list text-black">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                fill="#0c6653" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                            </svg>
                                            Date: <?php echo date('jS F Y', strtotime($eventdetails->event_datetime)); ?>
                                        </li>
                                        <li class="mb-2 d-flex align-items-center details-list text-black">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                fill="#0c6653" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                            </svg>
                                            Time: <?php echo date('h:i A', strtotime($eventdetails->event_datetime)); ?>
                                        </li>
                                    </ul>
                                </div>
                                <p class="title-bottom d-none d-md-block d-lg-block mb-0 text-black"><small>
                                        You agree to share information entered
                                        on this page with Nowofloan (owner of this page) and Razorpay, adhering to
                                        applicable
                                        laws.</small></p>
                                <ul class="d-flex d-none d-md-block d-lg-block"
                                    style="padding-left:0px;list-style-type:none;margin-bottom:15px; line-height: 2;">
                                    <li class="me-2">
                                        <a href="<?php echo site_url('privacy-policy'); ?>" class="text-decoration-underline text-black">Privacy</a> &nbsp; |
                                        &nbsp;
                                        <a href="<?php echo site_url('terms-conditions'); ?>" class="text-decoration-underline text-black">Terms</a>
                                    </li>
                                    <li class="me-2 text-black">Nowofloan 2026 Powered By Indiakarobar</li>
                                </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 column-right">
                        <div class="content-right h-100">
                            <h5 class="fw-bold">Billing Information</h5>
                            <div class="register">
                                <p class="mt-0">Complete your purchase by providing your payment details.</p>
                            </div>

                                <?php
                                $msg = $this->session->flashdata('success');
                                if(isset($msg) && $msg !== ''):
                                ?>
                                    <div class="alert alert-success flash-msg">
                                        <?= $msg; ?>
                                    </div>
                                <?php endif; ?>
                            <form action="<?php echo base_url() ?>webinar/checkoutWebinar" method="POST" class="webinar-form">
                                <div class="checkout-billing p-lg-0 p-md-2 mb-3">
                                    <input type="hidden" name="eid" value="<?php echo $eventdetails->id ?>">
                                    <input type="hidden" name="offer_price" value="<?php echo $eventdetails->event_offer_price ?>">
                                    <div class="cols pt-3">
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <div class="input-group">
                                                    <input id="firstname" type="text" name="firstname"
                                                        class="form-control w-100 py-2" placeholder="First Name" />
                                                </div>
                                            
                                                <span
                                                    class="text-start invalid-feedback ajax-error firstname is-invalid text-danger"
                                                    role="alert"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <div class="input-group">
                                                    <input id="lastname" type="text" name="lastname"
                                                        class="form-control w-100 py-2" placeholder="Last Name" />
                                                </div>
                                               
                                                <span
                                                    class="text-start invalid-feedback ajax-error lastname is-invalid text-danger"
                                                    role="alert"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <div class="input-group">
                                                    <input id="mobile_no" type="text" name="mobile_no"
                                                        class="form-control w-100 py-2" minlength="10" maxlength="10"
                                                        placeholder="Mobile No" />
                                                </div>
                                             
                                                <span
                                                    class="text-start invalid-feedback ajax-error mobile_no is-invalid text-danger"
                                                    role="alert"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <div class="input-group">
                                                    <input id="email" type="email" name="email"
                                                        class="form-control w-100 py-2" placeholder="Email Id" />
                                                </div>
                                              
                                                <span
                                                    class="text-start invalid-feedback ajax-error email is-invalid text-danger"
                                                    role="alert"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <div class="input-group">
                                                    <input id="pincode" type="text" name="pincode"
                                                        class="form-control w-100 py-2" placeholder="Pincode" />
                                                </div>
                                                
                                                <span
                                                    class="text-start invalid-feedback ajax-error pincode is-invalid text-danger"
                                                    role="alert"></span>
                                            </div>
                                        </div>
                                        <div id="loader" style="display:none;">
                                            Loading...
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <div class="input-group">
                                                    <input id="city" type="text" name="city"
                                                        class="form-control w-100 py-2" placeholder="City" />
                                                </div>
                                               
                                                <span
                                                    class="text-start invalid-feedback ajax-error city is-invalid text-danger"
                                                    role="alert"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <div class="input-group">
                                                    <select class="form-select w-100 border" id="state" name="state" required>
                                                        <option value="">State *</option>
                                                        <?php echo getStateOption(); ?>
                                                    </select>
                                                    <div class="error-message" id="state-message"></div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="shop-checkout">
                                    <div class="container p-0">
                                        <div class="row">
                                            <div class="cols">
                                                <div class="sidebar-shop-checkout">
                                                    <div class="sidebar-checkout-item your-order">
                                                        <h2 class="title fw-bold"></h2>
                                                        <ul class="product-list ps-0">
                                                            <li
                                                                class="product-item pb-3 d-flex justify-content-between">
                                                                <p class="fw-normal mb-0">SubTotal</p>
                                                                <?php if($eventdetails->event_offer_price > 0){ 
                                                                    $event_price =  $eventdetails->event_offer_price;   
                                                                ?>
                                                                 <p class="fw-normal mb-0" id="subtotal-amount">
                                                                    <?php echo $eventdetails->event_offer_price ?>
                                                                </p>
                                                                <?php } else { ?>
                                                                <p class="fw-normal mb-0" id="subtotal-amount">
                                                                    FREE
                                                                </p>
                                                                <?php } ?>
                                                            </li>
                                                            <?php if($eventdetails->event_offer_price > 0) { ?>
                                                            <li
                                                                class="product-item pb-0 d-flex justify-content-between cgst-row">
                                                                <p class="fw-normal">GST (18%)</p>
                                                                <p class="fw-normal" id="cgst-amount">₹
                                                                    <?php $gst = $event_price * 0.18;
														            echo formatePriceIndia($gst); ?>
                                                                </p>
                                                                
                                                            </li>
                                                            <?php } ?>
                                                                 
                                                        </ul>
                                                        <ul class="checkout-total-bill ps-0 mb-0">
                                                            <li class="total d-flex justify-content-between">
                                                                <p class="fw-normal mb-0"><strong>Total
                                                                        :</strong></p>
                                                                <?php if($eventdetails->event_offer_price > 0) { ?>
                                                                    <p class="fw-normal mb-0"><strong
                                                                        id="total-amount">₹<?php $grandtotal = $event_price + $gst;
														                    echo formatePriceIndia($grandtotal); ?></strong></p>
                                                                <?php } else { ?>
                                                                <p class="fw-normal mb-0"><strong
                                                                        id="total-amount">₹0.00</strong></p>
                                                                <?php } ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="btns mt-4 mb-2">
                                                        <button type="submit"
                                                            class="butn py-2 m-0 lh-5 text-center w-100 rounded-3 bg-dark text-white">
                                                            Proceed to Pay
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
    </div>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/webinar/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/webinar/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/webinar/js/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/webinar/js/countto.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/webinar/js/swiper.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/webinar/js/main.js"></script>
  
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
<script>
    setTimeout(function() {
        var msg = document.getElementById('flash-msg');
        if (msg) {
            msg.style.display = 'none';
        }
    }, 5000); // 5000 ms = 5 seconds
</script>
</body>

</html>