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
			echo "Personal Loan and Business Loan | Bharatfinpro";
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
	<meta name="baseUrl" content="<?= base_url() ?>">
	
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/images/apple-icon-180x180.png'); ?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/favicon-16x16.png'); ?>">
	<link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>">
	<script type="text/javascript">     (function(c,l,a,r,i,t,y){         c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};         t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;         y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);     })(window, document, "clarity", "script", "rfpn3lx866"); </script>
	<?php echo link_tag('assets/plugins/bootstrap-switch/bootstrap-switch.css'); ?>
	<?php echo link_tag('assets/css/plugins.css'); ?>
	<?php echo link_tag('assets/css/style.css'); ?>
	<?php echo link_tag('assets/css/validation/form-validation.css'); ?>
	<?php echo link_tag('assets/plugins/jquery-steps/jquery.steps.css'); ?>
		<?php echo link_tag('assets/css/toastr.min.css'); ?>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,800,700,600%7CRaleway:100,300,600,700,800"
		rel="stylesheet" type="text/css" />

	<!-- Facebook Domain + Pixel Code -->
	<?php
	$fbdomain = getFacebookDomain();
	if ($fbdomain != Null) {
		echo '<meta name="facebook-domain-verification" content="' . $fbdomain . '" />';
	}

	$fbpixel = getFacebookPixel();
	if ($fbpixel != Null) {
		?>
		<script>
			!function (f, b, e, v, n, t, s) {
				if (f.fbq) return; n = f.fbq = function () {
					n.callMethod ?
						n.callMethod.apply(n, arguments) : n.queue.push(arguments)
				};
				if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
				n.queue = []; t = b.createElement(e); t.async = !0;
				t.src = v; s = b.getElementsByTagName(e)[0];
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
	<!-- Taboola Pixel Code -->
	<script type='text/javascript'>
		window._tfa = window._tfa || [];
		window._tfa.push({ notify: 'event', name: 'page_view', id: 1779022 });
		!function (t, f, a, x) {
			if (!document.getElementById(x)) {
				t.async = 1; t.src = a; t.id = x; f.parentNode.insertBefore(t, f);
			}
		}(document.createElement('script'),
			document.getElementsByTagName('script')[0],
			'//cdn.taboola.com/libtrc/unip/1779022/tfa.js',
			'tb_tfa_script');
	</script>
	<!-- End of Taboola Pixel Code -->
	<script>(function (w, d, t, r, u) { var f, n, i; w[u] = w[u] || [], f = function () { var o = { ti: "97156583", enableAutoSpaTracking: true }; o.q = w[u], w[u] = new UET(o), w[u].push("pageLoad") }, n = d.createElement(t), n.src = r, n.async = 1, n.onload = n.onreadystatechange = function () { var s = this.readyState; s && s !== "loaded" && s !== "complete" || (f(), n.onload = n.onreadystatechange = null) }, i = d.getElementsByTagName(t)[0], i.parentNode.insertBefore(n, i) })(window, document, "script", "//bat.bing.com/bat.js", "uetq");</script>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-16615998313">
	</script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-17124324095"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'AW-16615998313');
		gtag('config', 'AW-17124324095');
	</script>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-G4Q3SBZL0L"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'G-G4Q3SBZL0L');
	</script>

	<!-- Google Tag Manager -->
	<script>(function (w, d, s, l, i) {
			w[l] = w[l] || []; w[l].push({
				'gtm.start':
					new Date().getTime(), event: 'gtm.js'
			}); var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
					'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-T5VWDPBN');</script>
	<!-- End Google Tag Manager -->
	<script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@graph": [
            {
                "@type": "LocalBusiness",
                "name": "Bharatfinpro",
                "image": "https://bharatfinpro.com/assets/images/logo-light-2x.png",
                "telephone": "+91-97241-57576",
                "email": "support@bharatfinpro.com",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "2 Floor, Saymsundar Complex Swaminarayan Nagar soc,katargam, Surat, Gujarat, India - 395004",
                    "addressLocality": "Surat",
                    "addressRegion": "Gujarat",
                    "postalCode": "395009",
                    "addressCountry": "IN"
                },
                "url": "https://bharatfinpro.com/"
            },
            {
                "@type": "BreadcrumbList",
                "itemListElement": [
                    {
                        "@type": "ListItem",
                        "position": 1,
                        "name": "Home",
                        "item": "https://bharatfinpro.com/"
                    },
                    {
                        "@type": "ListItem",
                        "position": 2,
                        "name": "Personal Loan",
                        "item": "https://bharatfinpro.com/digital/personalLoan"
                    },
                    {
                        "@type": "ListItem",
                        "position": 3,
                        "name": "Business Loan",
                        "item": "https://bharatfinpro.com/digital/businessLoan"
                    },
                    {
                        "@type": "ListItem",
                        "position": 4,
                        "name": "FAQs",
                        "item": "https://bharatfinpro.com/faqs"
                    },
                    {
                        "@type": "ListItem",
                        "position": 5,
                        "name": "Raise a Request",
                        "item": "https://bharatfinpro.com/raise-request"
                    },
                    {
                        "@type": "ListItem",
                        "position": 6,
                        "name": "Customer Login",
                        "item": "https://bharatfinpro.com/customer"
                    }
                ]
            },
            {
                "@type": "Organization",
                "name": "Bharatfinpro",
                "url": "https://bharatfinpro.com/",
                "logo": "https://bharatfinpro.com/assets/images/logo-light-2x.png",
                "contactPoint": {
                    "@type": "ContactPoint",
                    "telephone": "+91-97241-57576",
                    "contactType": "Customer Service",
                    "areaServed": "IN",
                    "availableLanguage": "en"
                },
                "sameAs": [
                    "https://www.facebook.com/Bharatfinpro/",
                    "https://www.instagram.com/bharatfinpro/",
                    "https://x.com/bharatfinpro",
                    "https://in.pinterest.com/bharatfinpro/",
                    "https://www.linkedin.com/company/97877361/admin/dashboard/",
                    "https://www.youtube.com/channel/UC-CyyqSgp6YWgalbPdiOhvQ"
                ]
            }
        ]
    }
    </script>
	<script type="text/javascript"> adroll_adv_id = "RVZSLAS4TVAHZIF62WPM7M"; adroll_pix_id = "EGO7CSPQRVGMDOYOOESEJN"; adroll_version = "2.0";  (function(w, d, e, o, a) { w.__adroll_loaded = true; w.adroll = w.adroll || []; w.adroll.f = [ 'setProperties', 'identify', 'track', 'identify_email', 'get_cookie' ]; var roundtripUrl = "https://s.adroll.com/j/" + adroll_adv_id + "/roundtrip.js"; for (a = 0; a < w.adroll.f.length; a++) { w.adroll[w.adroll.f[a]] = w.adroll[w.adroll.f[a]] || (function(n) { return function() { w.adroll.push([ n, arguments ]) } })(w.adroll.f[a]) }  e = d.createElement('script'); o = d.getElementsByTagName('script')[0]; e.async = 1; e.src = roundtripUrl; o.parentNode.insertBefore(e, o); })(window, document); adroll.track("pageView"); </script> 
</head>

<body class="breakpoint-xl b--desktop">
	<!-- Mgid Sensor -->
<script type="text/javascript">
    (function() {
        var d = document, w = window;
        w.MgSensorData = w.MgSensorData || [];
        w.MgSensorData.push({
            cid:897945,
            project: "a.mgid.com"
        });
        var l = "a.mgid.com";
        var n = d.getElementsByTagName("script")[0];
        var s = d.createElement("script");
        s.type = "text/javascript";
        s.async = true;
        var dt = !Date.now?new Date().valueOf():Date.now();
        s.src = "https://" + l + "/mgsensor.js?d=" + dt;
        n.parentNode.insertBefore(s, n);
    })();
</script>
<!-- /Mgid Sensor -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T5VWDPBN"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<div class="body-inner">
		<header id="header" data-transparent="true" data-fullwidth="true" class="submenu-light header-disable-fixed">
			<div class="header-inner">
				<div class="container">

					<div id="logo">
						<a href="#">
							<span class="logo-default"><img src="<?php echo base_url('assets/images/logo-2x.png'); ?>"
									alt="<?php echo PROJECT_NAME; ?>" width="160"></span>
							<span class="logo-dark"><img src="<?php echo base_url('assets/images/logo-2x.png'); ?>"
									alt="<?php echo PROJECT_NAME; ?>" width="160"></span>
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
