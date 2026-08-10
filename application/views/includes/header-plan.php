<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?php if (isset($meta->title)) {
            echo $meta->title;
          } else {
            echo "Personal Loan and Business Loan | Lending Finance";
          } ?></title>
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

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/images/apple-icon-180x180.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/favicon-16x16.png'); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>">

    <?php echo link_tag('assets/plugins/bootstrap-switch/bootstrap-switch.css'); ?>
    <?php echo link_tag('assets/css/plugins.css'); ?>
    <?php echo link_tag('assets/css/style.css'); ?>
    <?php echo link_tag('assets/css/validation/form-validation.css'); ?>
    <?php echo link_tag('assets/plugins/jquery-steps/jquery.steps.css'); ?>
    <?php echo link_tag('assets/plugins/rateit/rateit.css'); ?>
    <?php echo link_tag('assets/css/custome.css'); ?>
    <?php echo link_tag('assets/css/toastr.min.css'); ?>

    <!-- Facebook Domain + Pixel Code -->
    <?php
  $fbdomain = getFacebookDomain();
  if ($fbdomain != Null) {
    echo '<meta name="facebook-domain-verification" content="' . $fbdomain . '" />';
  }

  $fbpixel = getFacebookPixel('facebookpixelplan');
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
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16689511349"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'AW-16689511349');
    </script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TX89VY56WG"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-TX89VY56WG');
    </script>
    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-MNC23NZ4');
    </script>
    <!-- End Google Tag Manager -->

</head>

<body class="breakpoint-xl b--desktop">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MNC23NZ4" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="body-inner">
        <header id="header" data-transparent="true" data-fullwidth="true" class="submenu-light header-disable-fixed">
            <div class="header-inner">
                <div class="container">

                    <div id="logo">
                        <a href="#">
                            <span class="logo-default"><img
                                    src="<?php echo base_url('assets/images/lending-finance.png'); ?>"
                                    alt="<?php echo PROJECT_NAME; ?>" width="180"></span>
                            <span class="logo-dark"><img
                                    src="<?php echo base_url('assets/images/lending-finance.png'); ?>"
                                    alt="<?php echo PROJECT_NAME; ?>" width="180"></span>
                        </a>
                    </div>

                    <div class="header-extras">
                        <div class="p-dropdown">
                            <a class="x"><span class="lines"></span></a>
                            <ul class="p-dropdown-content">
                                <li><a href="tel:<?php echo COMPANY_MOBILE; ?>"><i
                                            class="icon-phone-call"></i><?php echo COMPANY_MOBILE; ?></a></li>
                                <li><a href="mailto:<?php echo COMPANY_EMAIL; ?>"><i
                                            class="icon-mail"></i><?php echo COMPANY_EMAIL; ?></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </header>