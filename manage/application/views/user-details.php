<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("107").className += " active";
    document.getElementById("1070").className += " active";
    document.getElementById("7001").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-8 col-12 mb-1">
        <div class="badge badge-pill badge-light badge-square">Customer</div>
        <h1 class="content-header-title text-uppercase">Customer Details</h1>
        <h1 class="text-primary text-uppercase"><?php echo $userdata['fullname'] . " - " . $userdata['mobile']; ?></h1>
    </div>

    <div class="content-header-right btn-group-sm text-right col-md-4 col-12">
        <button onclick="window.history.back();" class="btn btn-outline-dark"><i class="la la-chevron-left"></i>
            Back</button>
    </div>
</div>


<div class="content-body">
    <section id="input-validation">
        <div class="row">
            <?php
            include_once(APPPATH . 'views/includes/user-menu.php');
            ?>

            <div class="col-lg-9 col-md-9">

                <?php if ($userdetails['userinfo']->isActive == 0) { ?>
                <div class="alert alert-danger mb-2" role="alert">
                    <strong>Customer account is not activated.</strong> You can activate user account from action panel.
                </div>
                <?php } ?>

                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <?php echo form_open('users/updateprofile', array('id' => 'submitForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>

                            <div class="form-body">
                                <input type="hidden" name="id" value="<?php echo $userdetails['userinfo']->id; ?>">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <h5>Registration on :
                                            <strong><?php echo DateFormatDisplay($userdetails['userinfo']->rec_date); ?></strong>
                                        </h5>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5>Referal Code :
                                            <strong><?php echo $userdetails['userinfo']->refcode; ?></strong>
                                        </h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <h5>Fullname <span class="required">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="fullname" id="fullname" class="form-control"
                                                value="<?php echo $userdetails['userinfo']->fullname; ?>" required>
                                            <div class="help-block font-small-3"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5>Mobile No <span class="required">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="mobile" id="mobile" class="form-control"
                                                value="<?php echo $userdetails['userinfo']->mobile; ?>" required>
                                            <div class="help-block font-small-3"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <h5>Email Id <span class="required">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="emailid" id="emailid" class="form-control"
                                                value="<?php echo $userdetails['userinfo']->email; ?>" required>
                                            <div class="help-block font-small-3"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5>Pincode <span class="required">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="pincode" id="pincode" maxlength="6" minlength="6"
                                                inputmode="numeric" class="form-control"
                                                value="<?php echo $userdetails['userinfo']->pincode; ?>" required>
                                            <div class="help-block font-small-3"></div>
                                            <span class="pincode error text-danger text-start"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <h5>City <span class="required">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="city" id="city" class="form-control"
                                                value="<?php echo $userdetails['userinfo']->city; ?>" required
                                                style="background-color: #ffffff;">
                                            <div class="help-block font-small-3"></div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h5>State <span class="required">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="state" id="state" class="form-control"
                                                value="<?php echo $userdetails['userinfo']->state; ?>" required
                                                style="background-color: #ffffff;">
                                            <div class="help-block font-small-3"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" id="submit-btn"
                                        class="btn btn-success btn-min-width">SAVE</button>
                                </div>
                            </div>

                            <?php echo form_close(); ?>

                        </div>
                    </div>
                </div>

                <?php
                if ($userdetails['userreference'] !== NULL) {
                ?>
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <h5><strong>REFERENCE CUSTOMER DETAILS</strong></h5>
                            <hr />

                            <dl class="row">
                                <dd class="col-md-6">Name :
                                    <strong><?php echo $userdetails['userreference']->fullname; ?></strong>
                                </dd>
                                <dd class="col-md-6">Mobile :
                                    <strong><?php echo $userdetails['userreference']->mobile; ?></strong>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
    </section>
</div>

<?php
include_once(APPPATH . 'views/includes/footer.php');
?>

<script type="text/javascript">
$(function() {
    $('#submitForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action') || window.location.pathname,
            type: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#submit-btn').html("<i class='la la-spinner spinner'></i>");
                $('#submit-btn').attr('disabled', true);
            },
            success: function(response) {
                if (response['success'] == true) {
                    toastr.success(response['message']);
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            },
            error: function(jXHR, textStatus, errorThrown) {
                $('#submit-btn').html("SAVE");
                $('#submit-btn').attr('disabled', false);
                toastr.error(errorThrown, 'ERROR');
            }
        });
    });
});
</script>

<script>
$('#pincode').on('input', function() {

    var pincode = $(this).val();

    if (pincode.length === 6) {

        $.ajax({
            url: "<?= base_url('users/geoLocation') ?>",
            type: "POST",
            data: {
                pincode: pincode
            },
            dataType: "json",

            success: function(response) {

                if (response.status === 'success') {
                    $('#city').val(response.city);
                    $('#state').val(response.state);
                    $('.pincode').text('');
                } else {
                    $('#city').val('');
                    $('#state').val('');
                    $('.pincode').text('Enter valid pincode.');
                }
            },

            error: function() {
                $('.pincode').text('Enter valid pincode.');
            }
        });

    } else {
        $('#city').val('');
        $('#state').val('');
    }
});
</script>