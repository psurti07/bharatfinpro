<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title><?php if(isset($meta->title)) { echo $meta->title; } else { echo "Bharatfinpro – Personal Loan and Business Loan"; } ?></title>
  <meta name="description" content="<?php if(isset($meta->descriptions)) { echo $meta->descriptions; } ?>" />
  <meta name="keywords" content="<?php if(isset($meta->keywords)) { echo $meta->keywords; } ?>" />
  <meta name="author" content="vw-team">
  <link rel="canonical" href="<?php echo base_url(uri_string()); ?>" />
  
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/images/apple-icon-180x180.png'); ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/favicon-16x16.png'); ?>">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>">

  <?php echo link_tag('assets/plugins/bootstrap-switch/bootstrap-switch.css'); ?>
  <?php echo link_tag('assets/css/plugins.css'); ?>
  <?php echo link_tag('assets/css/style.css'); ?>
  <?php echo link_tag('assets/css/validation/form-validation.css'); ?>
  
  <?php echo link_tag('assets/plugins/datatables/css/datatables.min.css'); ?>
  <?php echo link_tag('assets/plugins/datatables/css/responsive.dataTables.min.css'); ?>
  <?php echo link_tag('assets/plugins/datatables/css/buttons.dataTables.min.css'); ?>
  <?php echo link_tag('assets/plugins/datatables/css/buttons.bootstrap4.min.css'); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,800,700,600%7CRaleway:100,300,600,700,800" rel="stylesheet" type="text/css" />
</head>

<body class="side-panel side-panel-static">

<div id="side-panel" class="text-center">
  <div id="close-panel"> <i class="fa fa-times"></i> </div>

  <div class="side-panel-wrap">
    <div class="logo">
      <a href="<?php echo site_url(); ?>"><img src="<?php echo base_url('assets/images/logo-large.png'); ?>" width="140" alt="<?php echo PROJECT_NAME; ?>"></a>
    </div>

    <div id="mainMenu" class="menu-onclick menu-vertical">
      <div class="container">
        <nav>
          <p class="text-center"><strong><?php echo $this->session->userdata('bfp-customername'); ?></strong><br/>
             <strong><?php echo $this->session->userdata('bfp-customermobile'); ?></strong></p>
          <hr/>

          <ul>
            <li><a href="<?php echo site_url('customer/dashboard'); ?>"><i class="fa fa-desktop"></i> Dashboard</a></li>
            <li><a href="<?php echo site_url('customer/profile'); ?>"><i class="fa fa-user"></i> My Profile</a></li>
            <li><a href="<?php echo site_url('customer/profile/documents'); ?>"><i class="fa fa-file"></i> KYC Documents</a></li>
            <li><a href="<?php echo site_url('customer/profile/mcard'); ?>"><i class="fa fa-credit-credit"></i> Membership Card</a></li>
            <li><a href="<?php echo site_url('customer/offers'); ?>"><i class="fa fa-cube"></i> Apply Now</a></li>
            <li><a href="<?php echo site_url('customer/offers/preapproved'); ?>"><i class="fa fa-link"></i> Pre-Approved Loan</a></li>
            <li><a href="<?php echo site_url('customer/offers/cardoffers'); ?>"><i class="fa fa-credit-credit"></i> Card Offers</a></li>
            <li><a href="<?php echo site_url('customer/loan/history'); ?>"><i class="fa fa-rupee-sign"></i> My Loan History</a></li>
            <?php
            $hidedata = 0; // 0 = show, 1 = Hide
            if ($hidedata == 0) {
              ?>
            <li><a href="<?php echo site_url('customer/referral'); ?>"><i class="fa fa-users"></i> My Customers</a></li>
            <li><a href="<?php echo site_url('customer/referral/history'); ?>"><i class="fa fa-list"></i> My Customers Loans</a></li>
            <?php } ?>
            <li><a href="<?php echo site_url('customer/support'); ?>"><i class="fa fa-shield-alt"></i> Support</a></li>
            <li><a href="<?php echo site_url('customer/Login/logout'); ?>"><i class="fa fa-sign-out-alt"></i> Logout</a></li>
          </ul>

        </nav>
      </div>
    </div>
    
  </div>
</div>


<div class="body-inner">
  
    <header id="header" class="header-disable-fixed d-block light" data-transparent="true">
      <div class="header-inner">
        <div class="container">
          <div class="header-extras" style="line-height: 60px;">
            <ul>
              <li>
                <a id="side-panel-trigger" href="#" class="toggle-item" data-target="body" data-class="side-panel-active"> <i class="fa fa-bars"></i> <i class="fa fa-times"></i> </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>