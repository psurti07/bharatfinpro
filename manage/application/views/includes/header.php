<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="vw-team">
    <title><?php echo PROJECT_NAME; ?></title>

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">

    <!-- FAVICON -->
    <link rel="apple-touch-icon" href="<?php echo base_url('assets/images/logo/apple-icon-180x180.png'); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/logo/favicon.ico'); ?>">

    <!-- BEGIN VENDOR CSS-->
    <?php echo link_tag('assets/vendors/css/charts/morris.css'); ?>
    <?php echo link_tag('assets/css/vendors.css'); ?>


    <?php echo link_tag('assets/vendors/css/forms/selects/select2.min.css'); ?>
    <?php echo link_tag('assets/vendors/css/extensions/toastr.css'); ?>
    <?php echo link_tag('assets/vendors/css/icons/line-awesome/line-awesome.min.css'); ?>

    <?php echo link_tag('assets/fonts/simple-line-icons/style.css'); ?>

    <?php echo link_tag('assets/vendors/css/tables/datatable/datatables.min.css'); ?>
    <?php echo link_tag('assets/vendors/css/tables/extensions/responsive.dataTables.min.css'); ?>
    <?php echo link_tag('assets/vendors/css/tables/extensions/buttons.dataTables.min.css'); ?>
    <?php echo link_tag('assets/vendors/css/tables/extensions/buttons.bootstrap4.min.css'); ?>

    <?php echo link_tag('assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css'); ?>
    <?php echo link_tag('assets/vendors/css/forms/icheck/icheck.css'); ?>

    <?php echo link_tag('assets/css/app.css'); ?>

    <?php echo link_tag('assets/css/core/menu/menu-types/vertical-menu.css'); ?>
    <?php echo link_tag('assets/css/core/colors/palette-gradient.css'); ?>
    <?php echo link_tag('assets/css/plugins/forms/validation/form-validation.css'); ?>

    <?php echo link_tag('assets/css/style.css'); ?>

</head>

<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-menu" data-col="2-columns">
    <!-- fixed-top-->
    <nav
        class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-navy">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="la la-navicon font-large-1"></i></a></li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="#">
                            <h3 class="brand-text"><img class="brand-text" alt="<?php echo PROJECT_NAME; ?>"
                                    src="<?php echo base_url('assets/images/logo/logo-dark-name.png'); ?>"></h3>
                        </a>
                    </li>
                    <li class="nav-item d-md-none">
                        <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                                class="la la-ellipsis-v"></i></a>
                    </li>
                </ul>
            </div>

            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                href="#"><i class="la la-navicon"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="mr-1">Hello,
                                    <span
                                        class="user-name text-bold-700"><?php echo $this->session->userdata('adminname'); ?></span>
                                    <i class="la la-ellipsis-v"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?php echo site_url('Login/cpForm'); ?>"><i
                                        class="la la-lock"></i> Change Password</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item"
                                    href="<?php echo site_url('Login/logout'); ?>"><i class="la la-power-off"></i>
                                    Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- START HEADER -->
    <?php
  include_once(APPPATH . 'views/includes/sidebar.php');
  ?>
    <!-- END HEADER -->

    <div class="app-content content">
        <div class="content-wrapper">