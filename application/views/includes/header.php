<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>
        <?php if (isset($meta->title)) {
            echo $meta->title;
        } else {
            echo "Bharatfinpro – Personal Loan and Business Loan";
        } ?>
    </title>
    <meta name="description" content="<?php if (isset($meta->descriptions)) {
                                            echo $meta->descriptions;
                                        } ?>" />
    <meta name="keywords" content="<?php if (isset($meta->keywords)) {
                                        echo $meta->keywords;
                                    } ?>" />
    <meta name="author" content="vw-team">
    <link rel="canonical" href="<?php echo base_url(uri_string()); ?>" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="google-site-verification" content="bSZVJI1coQ9ImAJMiDt46_i3QMtA8YIQ7xHdEQIHBa0" />

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Bharatfinpro - Personal & Business Loan Solutions">
    <meta property="og:description"
        content="Explore personal and business loan options with Bharatfinpro. Fast approvals and seamless application processes to meet your financial needs.">
    <meta property="og:url" content="https://bharatfinpro.com/">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://bharatfinpro.com/assets/images/logo-light-2x.png">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bharatfinpro - Personal & Business Loan Solutions">
    <meta name="twitter:description"
        content="Apply for personal and business loans with Bharatfinpro. Simplify your financial needs with quick approvals and transparent processes.">
    <meta name="twitter:image" content="https://bharatfinpro.com/assets/images/logo-light-2x.png">

    <script type="text/javascript">
        (function(c, l, a, r, i, t, y) {
            c[a] = c[a] || function() {
                (c[a].q = c[a].q || []).push(arguments)
            };
            t = l.createElement(r);
            t.async = 1;
            t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "rfpn3lx866");
    </script>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/images/apple-icon-180x180.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/favicon-16x16.png'); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>">

    <?php echo link_tag('assets/plugins/bootstrap-switch/bootstrap-switch.css'); ?>
    <?php echo link_tag('assets/css/plugins.css'); ?>
    <?php echo link_tag('assets/css/style.css'); ?>
       <?php echo link_tag('assets/css/custome.css'); ?>
    <?php echo link_tag('assets/css/validation/form-validation.css'); ?>
    <?php echo link_tag('assets/plugins/rateit/rateit.css'); ?>


    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,800,700,600%7CRaleway:100,300,600,700,800"
        rel="stylesheet" type="text/css" />

    <!-- Facebook Domain + Pixel Code -->
     <?php
             $fbdomain = getFacebookDomain();
             if ($fbdomain != Null) {
             	echo '<meta name="facebook-domain-verification" content="' . $fbdomain . '" />';
             }

             $fbpixel = getFacebookPixel('facebookpixel');
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
    fbq('init', '<?php echo $fbpixel; 
                    ?>');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=<?php echo $fbpixel; 
                                                ?>&ev=PageView&noscript=1" /></noscript>
    <?php } 
    ?> 
    <!-- End Facebook Domain + Pixel Code -->


    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-18510121487"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'AW-18510121487');
</script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NRDLG24W5G"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-NRDLG24W5G');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PB62HF7T');</script>
<!-- End Google Tag Manager -->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PB62HF7T"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div class="body-inner">

        <header id="header" class="dark submenu-light">
            <div class="header-inner">
                <div class="container">

                    <div id="logo">
                        <a href="<?php echo site_url(); ?>">
                            <span class="logo-default"><img src="<?php echo base_url('assets/images/logo-2x.png'); ?>"
                                    alt="<?php echo PROJECT_NAME; ?>" width="160"></span>
                            <span class="logo-dark"><img
                                    src="<?php echo base_url('assets/images/logo-2x.png'); ?>"
                                    alt="<?php echo PROJECT_NAME; ?>" width="160"></span>
                        </a>
                    </div>

                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>

                    <div id="mainMenu" class="menu-center">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li class="text-dark"><a href="<?php echo site_url(); ?>">Home</a></li>

                                    <li class="text-dark"><a href="javascript:;" onclick="goToMenu('company')">Company</a></li>

                                    <li class="text-dark"><a href="javascript:;" onclick="goToMenu('products')">Products</a></li>
                                    <li class="text-dark"><a href="javascript:;" onclick="goToMenu('contacts')">Contact Us</a></li>
                                    <li class="text-dark"><a href="<?php echo site_url('plan/bharatpro_finance'); ?>">Bharat Pro
                                            Finance</a></li>

                                    <!-- <li><a href="https://fitzify.com/">Fitzify</a></li> -->

                                    <li class="dropdown"><a href="#" class="text-dark">Apply Now </a>
                                        <ul class="dropdown-menu">
                                            <li class="text-dark"><a href="<?php echo site_url('digital/personalLoan'); ?>"><i
                                                        class="fa fa-home"></i>Personal Loan</a></li>
                                            <li class="text-dark"><a href="<?php echo site_url('digital/businessLoan'); ?>"><i
                                                        class="fa fa-building"></i>Business Loan</a></li>
                                            <li class="text-dark"><a href="<?php echo site_url('plan/bharatpro_finance'); ?>"><i
                                                        class="fa fa-building"></i>Bharat Pro Finance</a></li>
                                        </ul>
                                    </li>

                                    <li class="dropdown text-dark"><a href="#" class="btn btn-rounded px-3 btn-orange"><i
                                                class="fa fa-user-alt"></i> Login<i class="fas fa-angle-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li class="text-dark"><a href="<?php echo site_url('customer'); ?>"><i
                                                        class="fa fa-user-alt"></i> Customer Login</a></li>
                                            <li class="text-dark"><a href="<?php echo site_url('plan_customer'); ?>"><i
                                                        class="fa fa-user-alt"></i> Bharat Pro Finance Login</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </header>