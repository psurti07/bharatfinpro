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
    <?php echo link_tag('assets/fonts/font/font-awesome.min.css'); ?>
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
        <div class="hero-wrap">
            <div class="container">
                <section class="hero">
                    <div>
                        <div class="eyebrow">Fintech Growth Webinar</div>
                        <h1>5X Your Growth by Starting Your Own <span class="green">Fintech Business</span></h1>

                        <ul class="check-list ps-0">
                            <li><i class="far fa-check me-2 color-highlight2 mt-1"></i> Build a scalable digital
                                business</li>
                            <li><i class="far fa-check me-2 color-highlight2 mt-1"></i> Learn the full digital
                                lead-to-payment process</li>
                            <li><i class="far fa-check me-2 color-highlight2 mt-1"></i> Work with customers across India
                                from anywhere</li>
                        </ul>

                        <div class="webinar-note">
                            <div class="icon"><i class="fa fa-bolt"></i></div>
                            <div>
                                <strong>Webinar Built For</strong>
                                India’s Next-Gen Fintech Leaders
                            </div>
                        </div>
                    </div>

                    <div class="form-card">
                        <h4 class="fw-bold">Let's Begin!</h4>
                        <p>Fill in the details below to get started.</p>

                        <form action="<?php echo base_url() ?>webinar/otp-verification" method="POST"
                            class="signup-form" novalidate="novalidate" id="signupform">
                            <?php
                            if ($this->session->flashdata('danger')): ?>
                            <div id="flash-message" class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('danger'); ?>
                                <?= $this->session->unset_userdata('danger'); ?>
                            </div>
                            <?php endif; ?>
                            <div class="row pt-2">
                                <div class="col-12">
                                    <div class="form-group mb-4">
                                        <small class="d-block text-start color-000 mb-2 fsz-14">First Name <span
                                                class="text-danger">*</span></small>
                                        <input type="hidden" name="program_type" value="0"
                                            class="form-control fsz-14 radius-2" placeholder="John">

                                        <input type="text" name="firstname" class="form-control fsz-14 radius-2"
                                            placeholder="John" required>

                                        <div class="help-block font-small-3"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-4">
                                        <small class="d-block text-start color-000 mb-2 fsz-14">Last Name <span
                                                class="text-danger">*</span></small>
                                        <input type="text" name="lastname" class="form-control fsz-14 radius-2"
                                            placeholder="Doe" required>

                                        <div class="help-block font-small-3"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <small class="d-block text-start color-000 mb-2 fsz-14">Mobile Number <span
                                                class="text-danger">*</span></small>
                                        <input type="tel" name="mobile_no" class="form-control fsz-14 radius-2"
                                            placeholder="XXXXXX9571" maxlength="10" minlength="10" id="mobileno"
                                            inputmode="numeric" pattern="[0-9]*" autocomplete="tel" required>

                                        <div class="help-block font-small-3"></div>
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-12 text-center">
                                        <div class="button_su mt-20">
                                            <span class="su_button_circle bg-darkBlue1 desplode-circle"
                                                style="left: 34.3281px; top: 64.0156px;"></span>
                                            <button type="submit" id="signupbtn"
                                                class="tf-btn m-auto text-uppercase px-4 py-2">
                                                <span
                                                    class="button_text_container text-uppercase ltspc-1 d-flex align-items-center color-yellow2">
                                                    <span
                                                        class="spinner-border spinner-border-sm me-2 d-none color-yellow2"
                                                        role="status" aria-hidden="true" id="signupLoader"></span>
                                                    Let’s Start!
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 pb-0">
                                    <div class="form-check">
                                        <input class="form-check-input border-1-solid" type="checkbox" value="1"
                                            id="termsCheck" name="terms" checked="">
                                        <label class="form-check-label" for="termsCheck" style="font-size:12px">
                                            By submitting this form, you agree to Urbansmallfinance's <a
                                                href="<?php echo base_url() ?>terms-conditions" class="color-999">
                                                Terms </a>, <a href="<?php echo base_url() ?>privacy-policy"
                                                class="color-999"> Privacy Policy, </a> and consent to receive
                                            communications from various channels.
                                        </label>
                                    </div>

                                    <span class="text-start invalid-feedback ajax-error terms is-invalid text-danger"
                                        role="alert"></span>
                                </div>
                            </div>
                        </form>

                    </div>
                </section>

            </div>
        </div>

        <section>
            <div class="container two-col">
                <div class="image-box">
                    <img src="<?php echo base_url() ?>assets/images/workshop/user-2.jpeg" class="img-fluid"
                        alt="Indiakarobar">
                </div>

                <div>
                    <div class="section-tag">Why Start</div>
                    <h2 class="section-title">Why Start Your <span class="green">Digital Loan</span> Advisory Business?
                    </h2>
                    <p class="section-text">India’s lending ecosystem is expanding rapidly, and customers now expect
                        fast, transparent, and tech-enabled financial services.</p>

                    <div class="bullet-title">Key industry insights (ui):</div>
                    <ul class="mini-list ps-0">
                        <li><i class="far fa-check me-3 color-highlight2 mt-1"></i> ₹23.3 lakh crore — Current value of
                            India’s Fintech market (2025)</li>
                        <li><i class="far fa-check me-3 color-highlight2 mt-1"></i> ₹84.8 lakh crore by 2030 — Expected
                            fintech market size</li>
                        <li><i class="far fa-check me-3 color-highlight2 mt-1"></i> 10–12% growth — Projected overall
                            bank credit (FY 2026)</li>
                        <li><i class="far fa-check me-3 color-highlight2 mt-1"></i> 18–14% growth — Retail loan segment
                            including personal loans</li>
                    </ul>

                    <div class="bullet-title">What this means for you:</div>
                    <p class="section-text" style="margin-bottom:0">Loan professionals who go digital today get more
                        customers, close deals faster, and stand out from offline competitors.</p>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="feature-panel">
                    <h2 class="center-title">What Makes Us Your <span class="green">Wisest Choice</span></h2>
                    <p class="center-sub">Unlock growth with our strategy, experts, and digital tools.</p>

                    <div class="stats">
                        <div class="stat">
                            <div class="stat-icon bg-green"><i class="fa fa-upload"></i></div>
                            <div>
                                <h4 style="color:#248a47">45+</h4>
                                <p>Fintech Projects Delivered</p>
                            </div>
                        </div>

                        <div class="stat">
                            <div class="stat-icon bg-orange"><i class="fa fa-users"></i></div>
                            <div>
                                <h4 style="color:#ff7a00">10+</h4>
                                <p>Fintech & Tech Experts</p>
                            </div>
                        </div>

                        <div class="stat">
                            <div class="stat-icon bg-yellow"><i class="fa fa-rocket"></i></div>
                            <div>
                                <h4 style="color:#e29a00">100+</h4>
                                <p>Digital Systems & Automation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="journey">
            <div class="container">
                <h2 class="center-title">How Your <span class="green">Fintech</span> Journey Works</h2>
                <p class="center-sub">A simple three-step path to becoming a digital loan professional.</p>

                <div class="journey-steps">
                    <div class="step">
                        <div class="step-icon"><img src="<?php echo base_url() ?>assets/images/workshop/analysis.svg"
                                class="img-fluid" alt="" style="width:40px"></div>
                        <h4>Fintech Business Assessment</h4>
                    </div>
                    <div class="step">
                        <div class="step-icon"><img src="<?php echo base_url() ?>assets/images/workshop/workshop.svg"
                                class="img-fluid" alt="" style="width:40px"></div>
                        <h4>Enroll in Programs & Webinar</h4>
                    </div>
                    <div class="step">
                        <div class="step-icon"> <img src="<?php echo base_url() ?>assets/images/workshop/virtual.svg"
                                class="img-fluid" alt="" style="width:40px"></div>
                        <h4>Go Digital & Upscale Revenue</h4>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <h2 class="center-title">A Complete Ecosystem For <span class="green">Your Growth</span></h2>
                <p class="center-sub">Built to support every step of your entrepreneurial journey.</p>

                <div class="services">
                    <div class="service-card">
                        <div class="service-top">
                            <div class="service-icon icon-green"> <img
                                    src="<?php echo base_url() ?>assets/images/workshop/icon2.webp" alt="icon"
                                    class="th-50"></div>
                            <div>
                                <h4>Professional Website for Loan Services</h4>
                            </div>
                        </div>
                        <p>Showcase all your loan offerings with credibility, branding, and proper structure — built to
                            convert leads.</p>
                    </div>

                    <div class="service-card">
                        <div class="service-top">
                            <div class="service-icon icon-orange"><img
                                    src="<?php echo base_url() ?>assets/images/workshop/icon1.webp" alt="icon"
                                    class="th-50"></div>
                            <div>
                                <h4>CRM Setup for Lead Tracking</h4>
                            </div>
                        </div>
                        <p>Track every customer, automate follow-ups, and never lose a lead again.</p>
                    </div>

                    <div class="service-card">
                        <div class="service-top">
                            <div class="service-icon icon-green"> <img
                                    src="<?php echo base_url() ?>assets/images/workshop/icon3.webp" alt="icon"
                                    class="th-50"></div>
                            <div>
                                <h4>Lead Generation Funnel</h4>
                            </div>
                        </div>
                        <p>A funnel designed specifically for loan services — optimized for India’s nationwide reach.
                        </p>
                    </div>

                    <div class="service-card">
                        <div class="service-top">
                            <div class="service-icon icon-yellow"> <img
                                    src="<?php echo base_url() ?>assets/images/workshop/icon4.webp" alt="icon"
                                    class="th-50"></div>
                            <div>
                                <h4>Digital Branding Assets</h4>
                            </div>
                        </div>
                        <p>Professional content, profiles, and digital presence designed to make you look authoritative.
                        </p>
                    </div>

                    <div class="service-card">
                        <div class="service-top">
                            <div class="service-icon icon-teal"> <img
                                    src="<?php echo base_url() ?>assets/images/workshop/icon5.webp" alt="icon"
                                    class="th-50"></div>
                            <div>
                                <h4>Growth Strategy & Training</h4>
                            </div>
                        </div>
                        <p>Webinar and guidance on customer acquisition, digital presence scaling, and positioning
                            yourself as a trusted financial advisor.</p>
                    </div>

                    <div class="service-card">
                        <div class="service-top">
                            <div class="service-icon icon-orange"> <img
                                    src="<?php echo base_url() ?>assets/images/workshop/icon6.webp" alt="icon"
                                    class="th-50"></div>
                            <div>
                                <h4>Customer Care</h4>
                            </div>
                        </div>
                        <p>Online query matrix, toll-free number for partners, quick TAT for faster resolution.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="tc-about-style25">
            <div class="container">
                <h2 class="center-title">What You Get With <span class="green">Urbansmallfinance</span></h2>
                <p class="center-sub">End-to-end digital infrastructure for modern business growth.</p>

                <div class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="info">
                                <div class="grid grid-cols-4 py-3">
                                    <div class="icon-box p-4">
                                        <img src="<?php echo base_url() ?>assets/images/workshop/anniversary.svg"
                                            class="icon-40 mb-3" alt="icon1">
                                        <h5 class="color-666 fw-normal mb-0">100% Done-For-You Digital Setup</h5>
                                    </div>
                                    <div class="icon-box p-4">
                                        <img src="<?php echo base_url() ?>assets/images/workshop/crm.svg"
                                            class="icon-40 mb-3" alt="icon1">
                                        <h5 class="color-666 fw-normal mb-0">CRM + automation + website + funnel
                                        </h5>
                                    </div>
                                    <div class="icon-box p-4">
                                        <img src="<?php echo base_url() ?>assets/images/workshop/growth-1.svg"
                                            class="icon-40 mb-3" alt="icon1">
                                        <h5 class="color-666 fw-normal mb-0">Expert growth consultations</h5>
                                    </div>
                                    <div class="icon-box p-4">
                                        <img src="<?php echo base_url() ?>assets/images/workshop/rating.svg"
                                            class="icon-40 mb-3" alt="icon1">
                                        <h5 class="color-666 fw-normal mb-0">Dedicated support team</h5>
                                    </div>
                                    <div class="icon-box p-4">
                                        <img src="<?php echo base_url() ?>assets/images/workshop/sync.svg"
                                            class="icon-40 mb-3" alt="icon1">
                                        <h5 class="color-666 fw-normal mb-0">Regular updates &amp; optimizations
                                        </h5>
                                    </div>
                                    <div class="icon-box p-4">
                                        <img src="<?php echo base_url() ?>assets/images/workshop/light-bulb.svg"
                                            class="icon-40 mb-3" alt="icon1">
                                        <h5 class="color-666 fw-normal mb-0">Zero technical knowledge required</h5>
                                    </div>
                                    <div class="icon-box p-4">
                                        <img src="<?php echo base_url() ?>assets/images/workshop/connection.svg"
                                            class="icon-40 mb-3" alt="icon1">
                                        <h5 class="color-666 fw-normal mb-0">End-to-end ecosystem for your loan
                                            business</h5>
                                    </div>
                                    <div class="icon-box p-4">
                                        <img src="<?php echo base_url() ?>assets/images/workshop/click.svg"
                                            class="icon-40 mb-3" alt="icon1">
                                        <h5 class="color-666 fw-normal mb-0">Customer Engagement Tools</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section style="padding-top:10px" class="tc-blog-style5">
            <div class="container">
                <h2 class="center-title">Frequently <span class="green">Asked Questions!</span></h2>
                <p class="center-sub">Everything you need to know before getting started with us.</p>
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="faq-side">
                            <div class="accordion" id="faqAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading1">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false"
                                            aria-controls="collapse1">
                                            I do not have any experience. Can I still do this?
                                        </button>
                                    </h2>
                                    <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1"
                                        data-bs-parent="#faqAccordion" style="">
                                        <div class="accordion-body color-666">
                                            Yes. You do not require any prior experience. We will train you from the
                                            beginning and provide ongoing support to ensure a smooth journey.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading2">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false"
                                            aria-controls="collapse2">
                                            Do I need technical knowledge?
                                        </button>
                                    </h2>
                                    <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body color-666">
                                            Not at all. Our team handles all the technical setup, tools, and
                                            support.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading3">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false"
                                            aria-controls="collapse3">
                                            Will I get my own website?
                                        </button>
                                    </h2>
                                    <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body color-666">
                                            Yes. You will receive your own original website.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading4">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false"
                                            aria-controls="collapse4">
                                            What if I get stuck after starting my business?
                                        </button>
                                    </h2>
                                    <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body color-666">
                                            Our expert team will always be there to guide and support you whenever
                                            needed.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading5">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false"
                                            aria-controls="collapse1">
                                            Will I receive marketing support?
                                        </button>
                                    </h2>
                                    <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5"
                                        data-bs-parent="#faqAccordion" style="">
                                        <div class="accordion-body color-666">
                                            Yes. Our team will help you with everything, including training you on
                                            the marketing platform, developing marketing strategies, increasing
                                            conversions, and more.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="tc-blog-style5 py-lg-5 py-md-5 py-5">
            <div class="container" style="background: #feae004f; padding: 15px; border-radius: 10px;">
                <p style="font-size:13px" class="mb-0"><strong>Disclaimer:</strong>
                    This is a business opportunity program. Earnings are not guaranteed and may vary based on
                    individual effort, market conditions, product approvals, and business performance. Indiakarobar
                    provides training, systems, and support; however, success depends on your execution and external
                    factors.</p>
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
        <script type="text/javascript" src="<?php echo base_url('assets/js/plugins.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/validation/jqBootstrapValidation.js'); ?>">
        </script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/validate/form-validation.js'); ?>">
        </script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/validate/form-validation.min.js'); ?>">
        </script>
        <script type="text/javascript" src="<?php echo base_url('assets/webinar/js/bootstrap.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/webinar/js/swiper-bundle.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/webinar/js/countto.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/webinar/js/swiper.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/webinar/js/main.js') ?>"></script>
        <script>
        setTimeout(function() {
            var msg = document.getElementById('flash-message');
            if (msg) {
                msg.style.display = 'none';
            }
        }, 5000); // 5000 ms = 5 seconds
        </script>

</html>