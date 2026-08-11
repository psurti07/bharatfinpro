<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="vw-team">
    <title>Online Personal Loan, Instant Loan, Cash Loan Apply Now - <?php echo PROJECT_NAME; ?></title>

    <?php echo link_tag('assets/plugins/bootstrap-switch/bootstrap-switch.css'); ?>
    <?php echo link_tag('assets/css/plugins.css'); ?>
    <?php echo link_tag('assets/css/style.css'); ?>
    <?php echo link_tag('assets/css/validation/form-validation.css'); ?>
</head>

<body>
    <div class="body-inner">
        <section class="fullscreen background-grey text-center text-dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="text-center p-b-30">
                            <a href="#" class="logo"> <img src="<?php echo base_url('assets/images/logo-2x.png'); ?>"
                                    alt="<?php echo PROJECT_NAME; ?>" width="250"> </a>
                        </div>
                        <div class="center">
                            <h3>Forget Password</h3>
                            <?php echo form_open('customer/login/sendForgetmessage', array('id' => 'submitForm1', 'class' => '', 'novalidate' => 'novalidate')); ?>
                            <div class="form-group ">
                                <label class="">Please enter your Mobile number you have created at registration</label>
                                <input type="text" name="mobile" class="form-control" placeholder="Mobile no"
                                    aria-required="true" required minlength="10" maxlength="10" inputmode="numeric"
                                    data-validation-regex-regex="^[6789]\d{9}$">
                                <div class="help-block font-small-3"></div>
                            </div>
                            <div class="text-left form-group">
                                <button type="submit" id="form-submit1"
                                    class="btn btn-block btn-lg btn-primary">SEND</button>
                            </div>
                            <?php echo form_close(); ?>

                            <p class="text-center">Already have an account? <a
                                    href="<?php echo site_url('customer'); ?>">Log in Now</a> </p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <img src="<?php echo base_url('assets/images/pattern/login.webp'); ?>"
                            class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </section>
    </div>

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
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> SENDING...'
                        );
                        $('#form-submit1').attr('disabled', true);
                    },
                    success: function(response) {
                        if (response['success'] == true) {
                            document.getElementById("submitForm1").reset();
                            $.notify({
                                message: response['message']
                            }, {
                                type: 'success'
                            });
                            setTimeout(function() {
                                window.location.href =
                                    '<?php echo base_url("customer/login"); ?>';
                            }, 2000);
                        } else {
                            $.notify({
                                message: response['message']
                            }, {
                                type: 'danger'
                            });
                        }
                        $('#form-submit1').html('SEND');
                        $('#form-submit1').attr('disabled', false);
                    },
                    error: function(jXHR, textStatus, errorThrown) {
                        $('#form-submit1').html('SEND');
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