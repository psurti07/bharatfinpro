<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="vw-team">
    <title>
        <?php echo PROJECT_NAME; ?>
    </title>

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">

    <!-- FAVICON -->
    <link rel="apple-touch-icon" href="<?php echo base_url('assets/images/logo/apple-icon-180x180.png'); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/logo/favicon.ico'); ?>">

    <!-- BEGIN VENDOR CSS-->
    <?php echo link_tag('assets/css/vendors.css'); ?>
    <?php echo link_tag('assets/vendors/css/icons/line-awesome/line-awesome.min.css'); ?>
    <?php echo link_tag('assets/vendors/css/extensions/toastr.css'); ?>
    <!-- END VENDOR CSS-->

    <!-- BEGIN MODERN CSS-->
    <?php echo link_tag('assets/css/app.css'); ?>
    <!-- END MODERN CSS-->

    <!-- BEGIN Page Level CSS-->
    <?php echo link_tag('assets/css/core/menu/menu-types/vertical-menu.css'); ?>
    <?php echo link_tag('assets/css/core/colors/palette-gradient.css'); ?>

    <?php echo link_tag('assets/css/plugins/forms/validation/form-validation.css'); ?>
    <?php echo link_tag('assets/css/pages/login-register.css'); ?>
    <!-- END Page Level CSS-->

    <!-- BEGIN Custom CSS-->
    <?php echo link_tag('assets/css/style.css'); ?>
    <!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-menu 1-column menu-expanded blank-page blank-page" data-open="click"
    data-menu="vertical-menu" data-col="1-column" style="background-color:#705e008c;">

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-4 col-12">

                            <div class="card">
                                <div class="card-body text-center">
                                    <img src="<?php echo base_url('assets/images/logo/logo-dark-lg.png'); ?>"
                                        alt="<?php echo PROJECT_NAME; ?>" width="180" class="img-responsive pb-2">

                                    <?php
									if (!empty($ac_data['ac_title'])) {
									?>
                                    <div class="alert alert-<?php echo $ac_data['ac_class'] ?> fade show" role="alert">
                                        <h4><?php echo $ac_data['ac_title'] ?></h4>
                                        <p><?php echo $ac_data['ac_msg'] ?></p>
                                    </div>
                                    <?php
									}
									?>
                                    <?php echo form_open('login/validateLogin', array('id' => 'submitForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>

                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="email" name="emailid" class="form-control input-lg" id="user-email"
                                            placeholder="Email Id" tabindex="1" required
                                            data-validation-required-message="Please enter your email id.">
                                        <div class="form-control-position"><i class="ft-user"></i></div>
                                        <div class="help-block font-small-3 text-left"></div>
                                    </fieldset>

                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" name="password" class="form-control input-lg"
                                            id="user-password" placeholder="Password" tabindex="2" required
                                            data-validation-required-message="Please enter your password.">
                                        <div class="form-control-position"><i class="la la-key"></i></div>
                                        <div class="help-block font-small-3 text-left"></div>
                                    </fieldset>

                                    <button type="submit" id="submit-btn" class="btn btn-dark btn-md btn-block"><i
                                            class="ft-unlock"></i>
                                        LOGIN</button>

                                    <?php echo form_close(); ?>

                                    <div class="float-sm-center text-dark text-center pt-2">
                                        <p class="m-0">
                                            <?php echo date("Y") . " © " . COMPANY_NAME; ?>.
                                        </p>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url('assets/vendors/js/vendors.min.js'); ?>" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->

    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo base_url('assets/vendors/js/forms/icheck/icheck.min.js'); ?>" type="text/javascript">
    </script>
    <script src="<?php echo base_url('assets/vendors/js/forms/validation/jqBootstrapValidation.js'); ?>"
        type="text/javascript"></script>
    <script src="<?php echo base_url('assets/vendors/js/extensions/toastr.min.js'); ?>" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->

    <!-- BEGIN MODERN JS-->
    <script src="<?php echo base_url('assets/js/core/app-menu.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/core/app.js'); ?>" type="text/javascript"></script>
    <!-- END MODERN JS-->

    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?php echo base_url('assets/js/scripts/forms/form-login-register.js'); ?>" type="text/javascript">
    </script>
    <!-- END PAGE LEVEL JS-->


    <script type="text/javascript">
    $(function() {
        $('#submitForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action') || window.location.pathname,
                type: "POST",
                data: $(this).serialize(),
                dataType: "JSON",
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#submit-btn').html("<i class='la la-spinner spinner'></i>");
                    $('#submit-btn').attr('disabled', true);
                },
                success: function(response) {
                    if (response['success'] == true) {
                        document.getElementById("submitForm").reset();
                        toastr.success(response['message']);
                        setTimeout(function() {
                            window.location.href =
                                '<?php echo base_url("dashboard"); ?>';
                        }, 2000);
                    } else {
                        $('#submit-btn').html("<i class='ft-unlock'></i> LOGIN");
                        $('#submit-btn').attr('disabled', false);
                        toastr.error(response['message']);
                    }
                },
                error: function(jXHR, textStatus, errorThrown) {
                    $('#submit-btn').html("<i class='ft-unlock'></i> LOGIN");
                    $('#submit-btn').attr('disabled', false);
                    toastr.error(errorThrown, 'ERROR');
                }
            });
        });
    });
    </script>

</body>

</html>