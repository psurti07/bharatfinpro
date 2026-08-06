<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html class="loading" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  	<meta name="author" content="vw-team">
    <title><?php echo PROJECT_NAME; ?></title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
   	<link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
	<?php echo link_tag('assets/css/vendors.css'); ?>
	<?php echo link_tag('assets/css/app.css'); ?>
	<?php echo link_tag('assets/css/core/menu/menu-types/vertical-menu.css'); ?>
	<?php echo link_tag('assets/css/core/colors/palette-gradient.css'); ?>
	<?php echo link_tag('assets/css/pages/error.css'); ?>
	<?php echo link_tag('assets/css/style.css'); ?>
</head>

<body class="vertical-layout vertical-menu 1-column menu-expanded bg-dark blank-page blank-page"
data-open="click" data-menu="vertical-menu" data-col="1-column">

  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 p-0">
              <div class="card-header bg-transparent border-0 text-center">
                <img src="<?php echo base_url('assets/images/logo/logo-dark.png'); ?>" alt="<?php echo PROJECT_NAME; ?>">
              </div>
              <div class="card-content text-center">
                <h2 class="error-code text-white mb-2">404</h2>
                <h3 class="text-uppercase text-white mb-2">Page Not Found !</h3>
                <a href="<?php echo base_url(); ?>" class="text-uppercase text-info">Back to Website</a>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

</body>

	<script src="<?php echo base_url('assets/vendors/js/vendors.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/core/app-menu.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/core/app.js'); ?>" type="text/javascript"></script>

</html>