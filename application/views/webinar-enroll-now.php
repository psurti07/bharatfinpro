<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webinar</title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/images/apple-icon-180x180.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/favicon-16x16.png'); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>">
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
    if ($fbdomain != Null) {
        echo '<meta name="facebook-domain-verification" content="' . $fbdomain . '" />';
    }

    $fbpixel = getFacebookPixel('facebookpixel-webinar');
    if ($fbpixel != Null) {
    ?>
    <script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '<?php echo $fbpixel; ?>');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=<?php echo $fbpixel; ?>&ev=PageView&noscript=1" /></noscript>
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
                                    <img id="logo-header" src="<?php echo base_url() ?>assets/images/logo.png"
                                        width="160" alt="Bharatfinpro" />
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
                                                <ul class="list-icon list-icon-arrow-circle list-icon-colored"
                                                    style="font-size:13px">
                                                    <li class=""> Fill Basic Details </li>
                                                    <li class=""> Confirm Your Registration </li>
                                                    <li class=""> Webinar Access </li>
                                                </ul>

                                                <hr class="mt-20 mb-20">
                                                <h6>User Details: </h6>
                                                <hr>
                                                <ul class="list-icon list-icon-arrow-circle list-icon-colored"
                                                    style="font-size:13px">
                                                    <li class=""> Name : <?php echo $userdata->first_name ?> </li>
                                                    <li class=""> Mobile : <?php echo $userdata->mobile ?> </li>
                                                    <li class=""> Current Occupation :
                                                        <?php echo $userdata->occupation ?></li>
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
                                                    <img src="<?php echo base_url() ?>assets/images/workshop/market.png"
                                                        class="img-fluid" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="swiper-pagination position-relative mt-3"></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 order-1 order-md-2">
                            <div class="row mb-3 mt-lg-0  mt-0 mb-lg-0">
                                <div class="col-md-6 mb-3 mt-lg-0  mt-0 mb-lg-0">
                                    <?php echo form_open('webinar/chekoutwebinar', array('id' => 'submitForm3', 'class' => '', 'novalidate' => 'novalidate')); ?>
                                    <input type="hidden" name="mobile" id="mobile"
                                        value="<?php echo $userdata->mobile ?>" class="form-control" required>
                                    <input type="hidden" name="program_id" id="program_id"
                                        value="<?php echo $eventdetails->id ?>" class="form-control" required>
                                    <input type="hidden" name="email" id="email" value="<?php echo $userdata->email ?>"
                                        class="form-control" required>
                                    <input type="hidden" name="userid" id="userid" value="<?php echo $userdata->id ?>"
                                        class="form-control" required>
                                    <input type="hidden" name="fullname" id="fullname"
                                        value="<?php echo $userdata->first_name ?>" class="form-control" required>

                                    <div class="sub-blog-card bg-white mb-20"
                                        style="border: 1px solid #ebebeb; box-shadow: none;">
                                        <div class="img img-cover">
                                            <img src="<?php echo base_url() ?>assets/images/webinarpage/<?php echo $eventdetails->event_image; ?>"
                                                alt="<?php echo $eventdetails->event_title ?>" class="img-fluid">
                                        </div>
                                        <div class="info p-3">
                                            <h6 class="mb-3 text-dark" style="font-size:22px">
                                                <?php echo $eventdetails->event_title ?>
                                            </h6>
                                            <p class="mb-2 color-666" style="font-size:14px">
                                                <i class="fas fa-user me-2 color-777 mt-1 th-10"></i>
                                                <?php echo $eventdetails->mentor_name ?>
                                            </p>
                                            <div class="date-tag mb-2" style="font-size:14px">
                                                <span class="me-3 color-666">
                                                    <i class="fas fa-calendar me-2 color-777 mt-1"></i>
                                                    <?php echo date('jS F Y', strtotime($eventdetails->event_datetime)); ?>
                                                </span>
                                            </div>
                                            <div class="date-tag mb-2" style="font-size:14px">
                                                <span class="color-666">
                                                    <i class="fas fa-clock me-2 color-777 mt-1 th-10"></i>
                                                    <?php echo date('h:i A', strtotime($eventdetails->event_datetime)); ?>
                                                </span>
                                            </div>
                                            <div class="date-tag mb-2" style="font-size:14px">
                                                <span class="color-666">
                                                    <i class="fas fa-volume-up me-2 color-777 mt-1 th-10"></i>
                                                    <?php echo ucfirst($eventdetails->language) ?>
                                                </span>
                                            </div>
                                            <h3 class="fw-bold mb-15 color-highlight4">
                                                <span class="color-666 text-decoration-line-through"
                                                    style="font-size:16px">
                                                    <?php echo $eventdetails->event_main_price ?>
                                                </span>
                                                <?php if ($eventdetails->event_offer_price == 0) { ?>
                                                <span>FREE</span>
                                                <?php } else { ?>
                                                <span><?php echo $eventdetails->event_offer_price ?></span>
                                                <?php } ?>
                                            </h3>
                                            <div class="mb-3">
                                                <span class="text-danger" style="font-size:14px">
                                                    <i class="far fa-clock"></i> Registration closing soon!
                                                </span>
                                            </div>
                                            <div class="button_su radius-2 mt-10">
                                                <span class="su_button_circle bg-darkBlue1 desplode-circle"
                                                    style="left: 85px; top: -20.875px;"></span>
                                                <button type="submit" id="registerbtn" data-slug="oHSZrav7Bs"
                                                    class="tf-btn m-auto text-uppercase px-4 py-2">
                                                    <span
                                                        class="button_text_container text-uppercase ltspc-1 d-flex align-items-center color-yellow2">
                                                        <span
                                                            class="spinner-border spinner-border-sm me-2 d-none color-yellow2"
                                                            role="status" aria-hidden="true" id="registerLoader"></span>
                                                        Book Slot Now
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                                <div class="col-md-6 mb-3 mt-lg-0  mt-0 mb-lg-0">
                                    <div class="section-card p-lg-4 p-md-4 p-3 mb-3 mt-lg-0 mt-0 mb-lg-0">
                                        <div class="work-time radius-2 mt-20">
                                            <div class="text-start mb-4" style="margin-top: -1.5rem;">
                                                <span class="deal-badge">
                                                    <span class="deal-icon"><i class="fas fa-users"></i></span>
                                                    ONLY FEW SLOTS LEFT
                                                </span>
                                            </div>
                                            <h6 class="fw-normal">Order Summary</h6>
                                            <ul class="ps-0">
                                                <li>
                                                    <span> Price </span>
                                                    <span class="line"></span>
                                                    <?php if ($eventdetails->event_offer_price == 0) { ?>
                                                    <strong>₹0.00</strong>
                                                    <?php } else { ?>
                                                    <strong><?php echo $eventdetails->event_offer_price ?></strong>
                                                    <?php } ?>

                                                </li>
                                                <li>
                                                    <span> GST </span>
                                                    <span class="line"></span>
                                                    <?php if ($eventdetails->event_offer_price > 0) {
                                                        $gst = $eventdetails->event_offer_price * 0.18; ?>
                                                    <strong><?php echo formatePriceIndia($gst); ?></strong>
                                                    <?php } else { ?>
                                                    <strong>₹0.00</strong>
                                                    <?php } ?>
                                                </li>
                                                <hr class="color-999">
                                                <li>
                                                    <span> To Pay </span>
                                                    <span class="line"></span>
                                                    <?php if ($eventdetails->event_offer_price > 0) {
                                                        $grandtotal = $eventdetails->event_offer_price + $gst; ?>
                                                    <strong><?php echo formatePriceIndia($grandtotal); ?></strong>
                                                    <?php } else { ?>
                                                    <strong> ₹0.00 </strong>
                                                    <?php } ?>

                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mt-4">
                                            <div style="font-size:12px">
                                                <p><strong>🚀 Program Highlights</strong></p>

                                                <?php echo $eventdetails->event_desc_1 ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jqBootstrapValidation.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/form-validation.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/form-validation.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/webinar/js/bootstrap.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/webinar/js/swiper-bundle.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/webinar/js/countto.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/webinar/js/swiper.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/webinar/js/main.js') ?>"></script>

</body>

</html>