<?php
$this->load->view('plan_customer/includes/header.php');

if ($profiledata->cardtype == 22) {
  $loantype = "bl";
} else {
  $loantype = "pl";
}
?>

<section id="page-title" class="background-dark">
    <div class="container">
        <div class="page-title">
            <h4><i class="fa fa-user"></i> My Profile</h4>
        </div>
    </div>
</section>

<section id="page-content" class="fullscreen">
    <div class="container">

        <div class="row">
            <div class="content col-md-7 text-dark">
                <?php echo form_open('customer/profile/changeprofile', array('id' => 'submitForm1', 'class' => 'form-horizontal p-cb process border-top-dark', 'novalidate' => 'novalidate')); ?>
                <h4>PROFILE DETAILS</h4>
                <div class="form-group row">
                    <label for="regdate" class="col-form-label col-sm-12">Registration On -
                        <?php echo displayDate($profiledata->rec_date); ?></label>
                    <label for="regdate" class="col-form-label col-sm-12">Mobile No -
                        <?php echo $profiledata->mobile; ?></label>
                </div>
                <div class="form-group row">
                    <label for="fullname" class="col-form-label col-sm-3">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" aria-required="true" name="fullname"
                            value="<?php echo $profiledata->fullname; ?>" id="fullname" required>
                        <div class="help-block font-small-3"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mobile" class="col-form-label col-sm-3">Email Id</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" aria-required="true" name="emailid"
                            value="<?php echo $profiledata->email; ?>" id="emailid" required>
                        <div class="help-block font-small-3"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mobile" class="col-form-label col-sm-3">City</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" aria-required="true" name="city"
                            value="<?php echo $profiledata->city; ?>" id="city" required>
                        <div class="help-block font-small-3"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mobile" class="col-form-label col-sm-3">State</label>
                    <div class="col-sm-9">
                        <select name="state" aria-required="true" id="state" class="form-control" required>
                            <option value="">Select State</option>
                            <?php echo getStateOption($profiledata->state); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" id="submit-submit1" class="btn btn-dark">CHANGE</button>
                </div>
                <?php echo form_close(); ?>
            </div>


            <div class="content col-md-5 text-dark">
                <?php
        $hidedata = 0; // 0 = show, 1 = Hide
        if ($hidedata == 1) {
        ?>
                <form class="p-cb process border-top-dark">
                    <div class="form-group">
                        <label class="form-control-label">Reference Link</label>
                        <div class="input-group">
                            <input id="target1" type="text" class="form-control"
                                value="<?php echo base_url('digital/' . $loantype . '/' . $profiledata->refcode); ?>">
                            <div class="input-group-append">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-light" data-clipboard="true"
                                        data-clipboard-target="#target1">COPY</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
                <?php } ?>

                <div class="accordion">
                    <div class="ac-item">
                        <h5 class="ac-title">CHANGE PASSWORD</h5>
                        <div class="ac-content">
                            <?php echo form_open('customer/profile/changepassword', array('id' => 'submitForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                            <div class="form-group">
                                <label for="password-text-input" class="col-form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password-text-input">
                            </div>
                            <div class="form-group">
                                <label for="retype-text-input" class="col-form-label">Retype Password</label>
                                <input type="password" class="form-control" name="retypepassword"
                                    id="retype-text-input">
                            </div>
                            <div class="form-group">
                                <button type="submit" id="submit-submit" class="btn btn-dark">CHANGE</button>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<?php
$this->load->view('customer/includes/footer.php');
?>

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
                $('#form-submit').html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> SUBMITTING...'
                    );
                $('#form-submit').attr('disabled', true);
            },
            success: function(response) {
                if (response['success'] == true) {
                    $.notify({
                        message: response['message']
                    }, {
                        type: 'success'
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                } else {
                    $.notify({
                        message: response['message']
                    }, {
                        type: 'danger'
                    });
                }
                $('#form-submit').html('CHANGE');
                $('#form-submit').attr('disabled', false);
            },
            error: function(jXHR, textStatus, errorThrown) {
                $('#form-submit').html('CHANGE');
                $('#form-submit').attr('disabled', false);
                $.notify({
                    message: errorThrown
                }, {
                    type: 'danger'
                });
            }
        });
    });


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
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> SUBMITTING...'
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
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                } else {
                    $.notify({
                        message: response['message']
                    }, {
                        type: 'danger'
                    });
                }
                $('#form-submit1').html('CHANGE');
                $('#form-submit1').attr('disabled', false);
            },
            error: function(jXHR, textStatus, errorThrown) {
                $('#form-submit1').html('CHANGE');
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