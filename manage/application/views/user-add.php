<?php
include_once(APPPATH . 'views/includes/header.php');
?>

<script type="text/javascript">
window.onload = function() {
    document.getElementById("107").className += " active";
    document.getElementById("1071").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-8 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Create an account</h1>
    </div>
    <div class="content-header-right btn-group-sm text-right col-md-4 col-12">
        <a href="<?php echo site_url('users'); ?>" target="_self" class="btn btn-outline-primary"><i
                class="la la-list-ol"></i> Customer List</a>
    </div>
</div>


<div class="content-body">
    <!-- Input Validation start -->
    <section class="input-validation">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">

                    <div class="card-content collapse show">
                        <div class="card-body">
                            <?php echo form_open_multipart('users/addUser', array('id' => 'submitForm', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'novalidate' => 'novalidate')); ?>

                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="fullname">Registration Date <span class="required">*</span></label>
                                        <input type="date" name="regdate" id="regdate" class="form-control" required
                                            value="<?php echo date('Y-m-d'); ?>">
                                        <div class="help-block font-small-3"></div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="fullname">Full name <span class="required">*</span></label>
                                        <input type="text" name="fullname" id="fullname" class="form-control" required
                                            data-validation-regex-regex="^[a-zA-z]+([\s][a-zA-Z]+)*$">
                                        <div class="help-block font-small-3"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="mobile">Mobile No <span class="required">*</span></label>
                                        <input type="text" name="mobile" id="mobile" class="form-control" required
                                            data-validation-regex-regex="[0-9]+" maxlength="10">
                                        <div class="help-block font-small-3"></div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="emailid">Emai Id <span class="required">*</span></label>
                                        <input type="email" name="emailid" id="emailid" class="form-control" required>
                                        <div class="help-block font-small-3"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="pincode">Pincode <span class="required">*</span></label>
                                        <input type="text" name="pincode" id="pincode" maxlength="6" minlength="6"
                                            inputmode="numeric" class="form-control" aria-required="true" required>
                                        <div class="help-block font-small-3"></div>
                                        <span class="pincode error text-danger text-start"></span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="city">City <span class="required">*</span></label>
                                        <input type="text" name="city" id="city" class="form-control" required
                                            style="background-color: #ffffff;">
                                        <div class="help-block font-small-3"></div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="state">State <span class="required">*</span></label>
                                        <input type="text" name="state" id="state" class="form-control" required
                                            style="background-color: #ffffff;">
                                        <div class="help-block font-small-3"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 btn-group-toggle" data-toggle="buttons">
                                        <div class="btn-group">
                                            <label class="btn btn-outline-primary active">
                                                <input type="radio" name="usertype" value="0" autocomplete="off"
                                                    checked><i class="icon-briefcase"></i> Salaried Person
                                            </label>
                                            <label class="btn btn-outline-primary">
                                                <input type="radio" name="usertype" value="1" autocomplete="off"><i
                                                    class="icon-flag"></i> Self Employed Person
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 btn-group-toggle" data-toggle="buttons">
                                        <div class="btn-group">
                                            <label class="btn btn-outline-warning active">
                                                <input type="radio" name="loantype" value="11" autocomplete="off"
                                                    checked>Personal Loan
                                            </label>
                                            <label class="btn btn-outline-warning">
                                                <input type="radio" name="loantype" value="12"
                                                    autocomplete="off">Business Loan
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="form-section"><i class="ft-disc"></i> Loan Info</h4>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="loanamount">Loan Amount <span class="required">*</span></label>
                                        <input type="text" aria-required="true" id="loanamount" name="loanamount"
                                            class="form-control" placeholder="As per your requirement" required
                                            min="10000" max="5000000" inputmode="numeric"
                                            data-validation-regex-regex="[0-9]+">
                                        <div class="help-block font-small-3"></div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="cibilscore">CIBIL Score <span class="required">*</span></label>
                                        <select class="custom-select form-control" aria-required="true" id="cibilscore"
                                            name="cibilscore" required>
                                            <option value="">Select Score</option>
                                            <option value="650 - 700">650 - 700</option>
                                            <option value="700 - 750">700 - 750</option>
                                            <option value="750 - 800">750 - 800</option>
                                            <option value="800 - 850">800 - 850</option>
                                            <option value="850 - 900">850 - 900</option>
                                        </select>
                                        <div class="help-block font-small-3"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="loanpurpose">Loan Purpose <span class="required">*</span></label>
                                        <select class="custom-select form-control" aria-required="true" id="loanpurpose"
                                            name="loanpurpose" required>
                                            <option value="">Select Loan Purpose</option>
                                            <option value="Personal Use">Personal Use</option>
                                            <option value="Property Renovation">Property Renovation</option>
                                            <option value="Marriage Purpose">Marriage Purpose</option>
                                            <option value="Education Purpose">Education Purpose</option>
                                            <option value="Medical Emergency">Medical Emergency</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <div class="help-block font-small-3"></div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="monthlyincome">Monthly Income <span
                                                class="required">*</span></label>
                                        <input type="text" aria-required="true" id="monthlyincome" name="monthlyincome"
                                            class="form-control" placeholder="As per your requirement" required
                                            min="10000" max="5000000" inputmode="numeric"
                                            data-validation-regex-regex="[0-9]+">
                                        <div class="help-block font-small-3"></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="currentemi">Monthly EMI You are Already Paying <span
                                                class="required">*</span></label>
                                        <input type="text" name="currentemi" id="currentemi" class="form-control"
                                            required data-validation-regex-regex="[0-9]+">
                                        <div class="help-block font-small-3"></div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="emibounce">Last 6 months any EMI Bounce? <span
                                                class="required">*</span></label>
                                        <select class="custom-select form-control" id="emibounce" name="emibounce"
                                            required>
                                            <option value="0" selected>No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>

                                <h4 class="form-section"><i class="ft-credit-card"></i> Membership Card Details</h4>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="cardamount">Card Amount</label>
                                        <input type="text" aria-required="true" id="cardamount" name="cardamount"
                                            class="form-control" placeholder="Card Amount" inputmode="numeric"
                                            data-validation-regex-regex="[0-9]+">
                                        <div class="help-block font-small-3"></div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label></label>
                                        <p><strong>Note:</strong> 18% GST amount added on card amount.</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="cardnumber">Card Number</label>
                                        <input type="text" name="cardnumber" id="cardnumber" class="form-control"
                                            minlength="16" maxlength="16" data-validation-regex-regex="[0-9]+"
                                            value="<?php echo random_code(16); ?>">
                                        <div class="help-block font-small-3"></div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="paymentid">Payment Id</label>
                                        <input type="text" name="paymentid" id="paymentid" class="form-control"
                                            value="<?php echo 'cash_' . random_password(13) ?>">
                                    </div>
                                </div>

                            </div>

                            <div class="form-actions text-right">
                                <button type="submit" id="submit-btn"
                                    class="btn btn-success btn-min-width">CREATE</button>
                            </div>
                            <?php echo form_close(); ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Input Validation end -->
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
                } else {
                    toastr.error(response['message']);
                }
                $('#submit-btn').html("CREATE");
                $('#submit-btn').attr('disabled', false);
            },
            error: function(jXHR, textStatus, errorThrown) {
                $('#submit-btn').html("CREATE");
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