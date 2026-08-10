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

        <section class="page-title-home bg-main">
            <div class="container">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col-lg-12 col-md-12 col-12 m-auto text-center mt-0 mb-0">
                        <div
                            class="heading-section d-flex text-center align-items-center justify-content-center flex-column mb-0">
                            <h2 class="fw-7"> Unlock Super Success In <span class="tf-forth-color"> The Fintech
                                    Industry</span>
                            </h2>
                            <p>Discover the smart ways to secure a bright future in fintech.
                            </p>
                        </div>
                        <?php
                        if ($this->session->flashdata('danger')): ?>
                        <div id="flash-message" class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('danger'); ?>
                            <?= $this->session->unset_userdata('danger'); ?>
                        </div>
                        <?php endif; ?>
                        <div class="bottom-btns mb-5 mb-md-0 mb-lg-0">
                            <a href="<?php echo base_url('webinar/user-register') ?>"
                                class="tf-btn m-auto text-uppercase px-4 py-2"> Apply Now <i
                                    class="fa fa-arrow-right ms-2"></i></a>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <div class="main-content">
            <section class="section-why">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-xl-12 col-12">
                            <div
                                class="heading-section d-flex text-center align-items-center justify-content-center flex-column">
                                <h2 class="fw-7"> Understand the Opportunity <span class="tf-forth-color"> Through
                                        Numbers</span>
                                </h2>
                                <p>Simple insights to help you know the real market potential.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center justify-content-md-center">

                        <div class="col-md-6 mb-4">
                            <div class="icons-box bg-white h-100">
                                <div class="image mb-4">
                                    <img src="<?php echo base_url() ?>assets/webinar/icons/content-strategy.svg"
                                        alt="content-strategy" width="50">
                                </div>
                                <div class="content">
                                    <h5 style="font-size: 18px;">USD 51.30 Billion</h5>
                                    <p>The estimated value of the Indian fintech market in 2026</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="icons-box bg-white h-100">
                                <div class="image mb-4">
                                    <img src="<?php echo base_url() ?>assets/webinar/icons/technical-support.svg"
                                        alt="technical-support" width="50">
                                </div>
                                <div class="content">
                                    <h5 style="font-size: 18px;">USD 109.06 Billion</h5>
                                    <p>Projected to reach by 2031 at a CAGR of 16.27%</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="icons-box bg-white h-100">
                                <div class="image mb-4">
                                    <img src="<?php echo base_url() ?>assets/webinar/icons/implementation.svg"
                                        alt="implementation" width="50">
                                </div>
                                <div class="content">
                                    <h5 style="font-size: 18px;">1 Million Loan Applications</h5>
                                    <p>Processed by major digital lending platforms per month</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="icons-box bg-white h-100">
                                <div class="image mb-4">
                                    <img src="<?php echo base_url() ?>assets/webinar/icons/goal.svg" alt="goal"
                                        width="50">
                                </div>
                                <div class="content">
                                    <h5 style="font-size: 18px;">13–14% growth in retail credit</h5>
                                    <p>Including high-demand segments such as personal loans (FY 2026)
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <img src="<?php echo base_url() ?>assets/webinar/images/sectionBorderL.png" alt="line" class="w-100 h-auto">
            <section class="tc-testimonial-style1 py-lg-5 py-md-5 py-5">
                <div class="container">
                    <div class="section-title section-title-style24 text-center mb-30">
                        <h2> What Makes Us Your <span class="tf-forth-color"> Wisest Choice </span></h2>
                        <p class="mt-3">Unlock growth with our strategy, experts, and digital tools.</p>
                    </div>
                    <div class="numbers white-box bg-white p-3 p-md-4">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12 ps-5 statestics-border">
                                <div class="num-card">
                                    <h3 class="text-grad1"> <span class="tf-forth-color"> 45 </span> <span
                                            class="tf-forth-color">+</span> </h3>
                                    <h6 class="mb-0 text-start"> Fintech Projects Delivered </h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 ps-5 statestics-border">
                                <div class="num-card">
                                    <h3 class="text-grad1"> <span class="tf-forth-color"> 10 </span> <span
                                            class="tf-forth-color">+</span> </h3>
                                    <h6 class="mb-0 text-start"> Fintech &amp; Tech Experts </h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 ps-5">
                                <div class="num-card">
                                    <h3 class="text-grad1"> <span class="tf-forth-color"> 100 </span> <span
                                            class="tf-forth-color">+</span> </h3>
                                    <h6 class="mb-0 text-start"> Digital Systems &amp; Automation </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <img src="<?php echo base_url() ?>assets/webinar/images/sectionBorderR.png" alt="line" class="w-100 h-auto">
            <section class="tc-services-style24 py-lg-5 py-md-5 py-5">
                <div class="container">
                    <div class="section-title section-title-style24 text-center mb-30">
                        <h2> A Complete Ecosystem For <span class="tf-forth-color"> Your Growth </span></h2>
                        <p class="mt-3">Built to support every step of your entrepreneurial journey.</p>
                    </div>
                    <div class="content">
                        <div class="row gx-4 gy-4 justify-content-center">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="services-card">
                                    <div class="content">
                                        <div class="title">
                                            <div class="service-icon icon-green">
                                                <img src="<?php echo base_url() ?>assets/images/workshop/icon2.webp"
                                                    alt="icon" class="th-50">
                                            </div>
                                            <h5 class="mt-3"> Complete Digital Setup </h5>
                                        </div>
                                        <div class="info" style="font-size:14px">
                                            <p class="color-666"> Get a professionally designed website, intelligent
                                                lead funnels, CRM setup, customer workflows, and automation – all
                                                customized for your needs. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="services-card">
                                    <div class="content">
                                        <div class="title">
                                            <div class="service-icon icon-green">
                                                <img src="<?php echo base_url() ?>assets/images/workshop/icon1.webp"
                                                    alt="icon" class="th-50">
                                            </div>
                                            <h5 class="mt-3">Expert Growth Strategies</h5>
                                        </div>
                                        <div class="info" style="font-size:14px">
                                            <p class="color-666"> Our team of experts will always be there to help you
                                                build a strong digital presence, increase conversions, and move towards
                                                long-term growth. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="services-card">
                                    <div class="content">
                                        <div class="title">
                                            <div class="service-icon icon-green">
                                                <img src="<?php echo base_url() ?>assets/images/workshop/icon3.webp"
                                                    alt="icon" class="th-50">
                                            </div>
                                            <h5 class="mt-3">Complete Marketing Support</h5>
                                        </div>
                                        <div class="info" style="font-size:14px">
                                            <p class="color-666">From targeted campaigns to lead nurturing systems,
                                                we'll help you expand your reach, generate high-quality leads, and grow
                                                your business efficiently.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6v col-sm-6 col-12">
                                <div class="services-card">
                                    <div class="content">
                                        <div class="title">
                                            <div class="service-icon icon-green">
                                                <img src="<?php echo base_url() ?>assets/images/workshop/icon4.webp"
                                                    alt="icon" class="th-50">
                                            </div>
                                            <h5 class="mt-3"> Ongoing Expert Guidance</h5>
                                        </div>
                                        <div class="info" style="font-size:14px">
                                            <p class="color-666">Get continuous support from our IT, marketing,
                                                operations, and business development teams to help you move forward with
                                                confidence and clarity.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="services-card">
                                    <div class="content">
                                        <div class="title">
                                            <div class="service-icon icon-green">
                                                <img src="<?php echo base_url() ?>assets/images/workshop/icon5.webp"
                                                    alt="icon" class="th-50">
                                            </div>
                                            <h5 class="mt-3">Transparent &amp; Ethical Operations</h5>
                                        </div>
                                        <div class="info" style="font-size:14px">
                                            <p class="color-666">Clear processes, secure data handling, and compliant
                                                frameworks ensure that your customers always have a smooth and
                                                trustworthy experience.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="services-card">
                                    <div class="content">
                                        <div class="title">
                                            <div class="service-icon icon-green">
                                                <img src="<?php echo base_url() ?>assets/images/workshop/icon6.webp"
                                                    alt="icon" class="th-50">
                                            </div>
                                            <h5 class="mt-3">Industry Training &amp; Insights</h5>
                                        </div>
                                        <div class="info" style="font-size:14px">
                                            <p class="color-666">Stay updated with practical knowledge, evolving market
                                                trends, and real-world industry insights to make smarter and more
                                                confident business decisions.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <img src="<?php echo base_url() ?>assets/webinar/images/sectionBorderL.png" alt="line" class="w-100 h-auto">
            <section class="tc-blog-style17 py-lg-5 py-md-5 py-5">
                <div class="container">
                    <div class="section-title section-title-style24 text-center mb-40">
                        <h2> What Support Do <span class="tf-forth-color"> You Get? </span> </h2>
                        <p class="mt-3">We don’t just guide you — we build your digital ecosystem WITH you.</p>
                    </div>
                    <div class="row gx-4 gy-4">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card radius-6">
                                <div class="card-header bg-blue1" style="border-radius: 15px 15px 0 0;">
                                    <h4 class="my-2 text-white"> What We Offer </h4>
                                </div>
                                <div class="card-body">
                                    <div class="content">
                                        <p class="fsz-14 fw-bold">Smart systems built for you</p>
                                        <ul class="list-icon list-icon-arrow-circle list-icon-colored"
                                            style="font-size:13px">
                                            <li class="mb-2"> End-to-end digital business setup </li>
                                            <li class="mb-2"> Website + CRM + automation workflows </li>
                                            <li class="mb-2"> Admin dashboard access </li>
                                            <li class="mb-2"> Complete marketing setup </li>
                                            <li class="mb-2"> Technical &amp; IT support </li>
                                            <li class="mb-2"> Training on tools &amp; systems </li>
                                            <li class="mb-2"> Dedicated growth manager </li>
                                            <li class="mb-2"> Regular updates &amp; optimization </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card radius-6">
                                <div class="card-header bg-blue1" style="border-radius: 15px 15px 0 0;">
                                    <h4 class="my-2 text-white"> Why This Matters For You </h4>
                                </div>
                                <div class="card-body">
                                    <div class="content">
                                        <p class="fsz-14 fw-bold">Build a future-ready business</p>
                                        <ul class="list-icon list-icon-arrow-circle list-icon-colored"
                                            style="font-size:13px">
                                            <li class="mb-2"> You focus on serving customers — we handle the digital
                                                heavy lifting </li>
                                            <li class="mb-2"> Complete control over your leads, data, and processes
                                            </li>
                                            <li class="mb-2"> Expert-driven growth systems </li>
                                            <li class="mb-2"> No infrastructure needed — everything is digital </li>
                                            <li class="mb-2"> Real-time support whenever required </li>
                                            <li class="mb-2"> Faster scaling with a strong digital foundation </li>
                                            <li class="mb-2"> Reduced manual work through automation </li>
                                            <li class="mb-2"> Better customer experience with faster processes </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <img src="<?php echo base_url() ?>assets/webinar/images/sectionBorderR.png" alt="line" class="w-100 h-auto">
            <section class="tc-about-style25 py-lg-5 py-md-5 py-5">
                <div class="container">
                    <div class="section-title section-title-style24 text-center">
                        <h2>How It Works — <span class="tf-forth-color"> Your Growth Journey </span></h2>
                        <p class="mt-3">A clear roadmap to help you understand how the process works.</p>
                    </div>
                    <div class="row align-items-center mt-30">
                        <div class="col-lg-7 col-md-7 col-12">
                            <div class="step-info pe-lg-5">
                                <div class="step-card">
                                    <h5 class="mb-2">1. Enroll For Our Webinar</h5>
                                    <p class="mb-0 color-666">Register for the webinar and take the first step towards
                                        understanding real opportunities in the fintech industry.</p>
                                </div>
                                <div class="step-card">
                                    <h5 class="mb-2">2. Attend &amp; Learn From Expert</h5>
                                    <p class="mb-0 color-666">Gain valuable industry insights, understand business
                                        processes, and learn practical strategies from industry experts. </p>
                                </div>
                                <div class="step-card">
                                    <h5 class="mb-2">3. Implement &amp; Reach New Heights</h5>
                                    <p class="mb-0 color-666">Put your learning into action with our continuous support
                                        and take confident steps towards long-term business growth. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-12 text-center">
                            <div class="img d-inline-block">
                                <img src="<?php echo base_url() ?>assets/images/model-16.webp" alt="fintech sector"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <img src="<?php echo base_url() ?>assets/webinar/images/sectionBorderL.png" alt="line" class="w-100 h-auto">

            <section class="tc-blog-style5 py-lg-5 py-md-5 py-5">
                <div class="container">
                    <div class="section-title section-title-style24 text-center mb-30">
                        <h2>Frequently <span class="tf-forth-color"> Asked Questions! </span></h2>
                        <p class="mt-3">Everything you need to know before getting started with us.</p>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-10 col-12">
                            <div class="faq-side">
                                <div class="accordion" id="faqAccordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading1">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse1"
                                                aria-expanded="false" aria-controls="collapse1">
                                                I do not have any experience. Can I still do this?
                                            </button>
                                        </h2>
                                        <div id="collapse1" class="accordion-collapse collapse"
                                            aria-labelledby="heading1" data-bs-parent="#faqAccordion" style="">
                                            <div class="accordion-body color-666">
                                                Yes. You do not require any prior experience. We will train you from the
                                                beginning and provide ongoing support to ensure a smooth journey.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading2">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse2"
                                                aria-expanded="false" aria-controls="collapse2">
                                                Do I need technical knowledge?
                                            </button>
                                        </h2>
                                        <div id="collapse2" class="accordion-collapse collapse"
                                            aria-labelledby="heading2" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body color-666">
                                                Not at all. Our team handles all the technical setup, tools, and
                                                support.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading3">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse3"
                                                aria-expanded="false" aria-controls="collapse3">
                                                Will I get my own website?
                                            </button>
                                        </h2>
                                        <div id="collapse3" class="accordion-collapse collapse"
                                            aria-labelledby="heading3" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body color-666">
                                                Yes. You will receive your own original website.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading4">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse4"
                                                aria-expanded="false" aria-controls="collapse4">
                                                What if I get stuck after starting my business?
                                            </button>
                                        </h2>
                                        <div id="collapse4" class="accordion-collapse collapse"
                                            aria-labelledby="heading4" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body color-666">
                                                Our expert team will always be there to guide and support you whenever
                                                needed.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading5">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse5"
                                                aria-expanded="false" aria-controls="collapse1">
                                                Will I receive marketing support?
                                            </button>
                                        </h2>
                                        <div id="collapse5" class="accordion-collapse collapse"
                                            aria-labelledby="heading5" data-bs-parent="#faqAccordion" style="">
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
        <script type="text/javascript">
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
</body>

</html>