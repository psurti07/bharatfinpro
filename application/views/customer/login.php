<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="vw-team">
    <title>Online Personal Loan, Instant Loan, Cash Loan Apply Now - <?php echo PROJECT_NAME; ?></title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/images/apple-icon-180x180.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/favicon-16x16.png'); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>">

    <?php echo link_tag('assets/plugins/bootstrap-switch/bootstrap-switch.css'); ?>
    <?php echo link_tag('assets/css/plugins.css'); ?>
    <?php echo link_tag('assets/css/style.css'); ?>
    <?php echo link_tag('assets/css/validation/form-validation.css'); ?>
</head>

<body>

    <section class="fullscreen background-light-green">
        <div class="d-flex justify-content-center col-md-12">
            <div class="card border-2 center shadow-none">
                <div class="card-body m-20 sm-m-0">
                    <div class="text-center p-b-30">
                        <a href="#" class="logo"> <img src="<?php echo base_url('assets/images/logo-2x.png'); ?>"
                                alt="<?php echo PROJECT_NAME; ?>" width="250"> </a>
                    </div>
                    <div class="row">
                        <div class="center">
                            <h3 class="text-center"><strong>Customer Login Account</strong></h3>

                            <?php echo form_open('customer/login/validateLogin', array('id' => 'submitForm1', 'class' => '', 'novalidate' => 'novalidate')); ?>
                            <div class="form-group">
                                <label class="sr-only">Mobile no</label>
                                <input type="text" name="mobile" class="form-control" placeholder="Mobile no"
                                    aria-required="true" required minlength="10" maxlength="10" inputmode="numeric"
                                    data-validation-regex-regex="^[6789]\d{9}$">
                                <div class="help-block font-small-3"></div>
                            </div>
                            <div class="form-group">
                                <label class="sr-only">Password</label>
                                <input type="password" name="password" maxlength="6" class="form-control"
                                    placeholder="Password" aria-required="true" required>
                                <div class="help-block font-small-3"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="form-submit1"
                                    class="btn btn-block btn-primary btn-lg">LOGIN</button>
                            </div>
                            <?php echo form_close(); ?>

                            <p class="small text-right"><a
                                    href="<?php echo site_url('customer/login/forgotpassword'); ?>"><strong>Forgot your
                                        password?</strong></a></p>

                            <hr />
                            <strong>
                                <p class="text-center m-b-0">Don't have an account yet? <a
                                        href="<?php echo site_url('digital/personalLoan'); ?>">Apply Now</a> </p>
                            </strong>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>

    <script src="<?php echo base_url('assets/js/jquery.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/plugins.js'); ?>" type="text/javascript"></script>

    <script src="<?php echo base_url('assets/js/functions.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/validation/jqBootstrapValidation.js'); ?>" type="text/javascript">
    </script>

    <script src="<?php echo base_url('assets/plugins/validate/form-validation.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/validate/form-validation.min.js'); ?>" type="text/javascript">
    </script>

    <script src="<?php echo base_url('assets/plugins/bootstrap-switch/bootstrap-switch.min.js'); ?>"
        type="text/javascript"></script>

    <script type="text/javascript">
        $(function() {
            $('#submitForm1').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action') || window.location.pathname,
                    type: "POST",
                    data: $(this).serialize(),
                    dataType: "JSON",
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('#form-submit1').html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> VERIFYING...'
                        );
                        $('#form-submit1').attr('disabled', true);
                    },
                    success: function(response) {
                        if (response['success'] == true) {
                            $.notify({
                                message: response['message']
                            }, {
                                type: 'success'
                            });
                            window.location.href =
                                '<?php echo base_url("customer/dashboard"); ?>';
                        } else {
                            $.notify({
                                message: response['message']
                            }, {
                                type: 'danger'
                            });
                        }
                        $('#form-submit1').html('LOGIN');
                        $('#form-submit1').attr('disabled', false);
                    },
                    error: function(jXHR, textStatus, errorThrown) {
                        $('#form-submit1').html('LOGIN');
                        $('#form-submit1').attr('disabled', false);
                        $.notify({
                            message: errorThrown
                        }, {
                            type: 'danger'
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>