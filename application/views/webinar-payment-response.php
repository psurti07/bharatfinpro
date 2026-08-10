<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>webinar page </title>
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/images/apple-icon-180x180.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/favicon-16x16.png'); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>">
	<?php echo link_tag('assets/css/plugins.css'); ?>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/webinar/css/styles.css">
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
<section class="fullscreen">
  <div class="container px-3">
		<div class="row d-flex align-items-center justify-content-center">
			<!-- START : SUCCESS -->
			<?php if($responsedata == "true") { ?>
				<div class="col-lg-7 col-md-7 col-sm-7"> 
					<div class="card border-rounded border-success">
						<div class="card-body">
							<div class="m-t-30 m-b-30 text-center">
								<h1 class="icon pulse infinite text-success m-0" data-animate="pulse infinite"><i class="fa fa-check-circle"></i></h1>
								<h2 class="text-success">Thank You for Registering for the Webinar!</h2>
								<p class="small">Your registration and payment have been successfully completed. We look forward to seeing you!</p>
								<hr/>
								
								<a href="<?php echo $community_link ?>" class="btn btn-dark btn-sm m-t-10 text-uppercase">JOIN COMMUNITY</a>
								<a href="<?php echo site_url(); ?>webinar" class="btn btn-dark btn-sm m-t-10 text-uppercase">BACK TO HOME</a>
								<br><br>
								
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			<!-- END : SUCCESS -->

			<!-- START : FAIL -->
			<?php if($responsedata == "false") { ?>
				<div class="col-lg-7 col-md-7 col-sm-7">
					<div class="card border-rounded border-danger">
						<div class="card-body"> 
							<div class="m-t-30 m-b-30 text-center">
								<h1 class="icon pulse infinite text-danger m-0" data-animate="pulse infinite"><i class="fa fa-times-circle"></i></h1>
								<h2 class="text-danger">Payment Failed!</h2>
								<p>Unfortunately, your payment could not be completed.</p>
								<br>
								<h5>What can you do now?</h5>
								<br>
								<p>Don’t worry. You can retry the payment or contact our support team.</p>
								<hr>
								<a href="<?php echo site_url(); ?>webinar" class="btn btn-dark btn-sm m-t-10 m-b-50 text-uppercase">BACK TO PROCESS</a>
								<br><br>
								<p>Need help? Contact: <span class="text-success"><?php echo COMPANY_EMAIL ?></span></p>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			<!-- END : FAIL -->
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
 <script type="text/javascript" src="<?php echo base_url() ?>assets/webinar/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/webinar/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/webinar/js/swiper-bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/webinar/js/countto.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/webinar/js/swiper.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/webinar/js/main.js"></script>
  
</body>

</html>