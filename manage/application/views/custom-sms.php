<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("150").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Custom SMS - Digital Customers</h1>
    </div>
</div>

<div class="content-body">
    <section id="configuration">
        <div class="row">

            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body">

                            <?php echo form_open('sms/sendcustomsms', array('id' => 'submitForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <h5>Target Customers <span class="required">*</span></h5>
                                    <div class="controls">
                                        <fieldset class="radio">
                                            <label>
                                                <input type="radio" name="targetcustomers" value="99" checked> Test SMS
                                            </label>
                                        </fieldset>

                                        <fieldset class="radio">
                                            <label>
                                                <input type="radio" name="targetcustomers" value="4"> Process Step 4 -
                                                Digital
                                            </label>
                                        </fieldset>

                                        <fieldset class="radio">
                                            <label>
                                                <input type="radio" name="targetcustomers" value="5"> Process Step 5 -
                                                User Verification
                                            </label>
                                        </fieldset>

                                        <fieldset class="radio">
                                            <label>
                                                <input type="radio" name="targetcustomers" value="6"> Process Step 6 -
                                                Document Verification
                                            </label>
                                        </fieldset>

                                        <fieldset class="radio">
                                            <label>
                                                <input type="radio" name="targetcustomers" value="7"> Process Step 7 -
                                                Application - In Process
                                            </label>
                                        </fieldset>

                                        <fieldset class="radio">
                                            <label>
                                                <input type="radio" name="targetcustomers" value="8"> Process Step 8 -
                                                Application - Query Process
                                            </label>
                                        </fieldset>

                                        <fieldset class="radio">
                                            <label>
                                                <input type="radio" name="targetcustomers" value="9"> Process Step 9 -
                                                Application - File Reopen
                                            </label>
                                        </fieldset>

                                        <fieldset class="radio">
                                            <label>
                                                <input type="radio" name="targetcustomers" value="10"> Process Step 10 -
                                                Application - Rejected
                                            </label>
                                        </fieldset>

                                        <fieldset class="radio">
                                            <label>
                                                <input type="radio" name="targetcustomers" value="11"> Process Step 11 -
                                                Application - Approved
                                            </label>
                                        </fieldset>

                                        <div class="help-block font-small-3"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Message <span class="required">*</span></h5>
                                    <div class="controls">
                                        <textarea name="message" id="message" class="form-control" rows="6"
                                            required></textarea>
                                        <div class="help-block font-small-3"></div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-actions text-right">
                                <button type="submit" id="submit-btn"
                                    class="btn btn-success btn-min-width">SEND</button>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body" id="customresponse">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<?php
include_once(APPPATH . 'views/includes/footer.php');
?>


<script type="text/javascript">
$(document).ready(function() {

    $('#submitForm').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: $(this).attr('action') || window.location.pathname,
            method: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#submit-btn').html('SENDING...');
                $('#submit-btn').attr('disabled', true);
                document.getElementById('customresponse').innerHTML =
                    'Sending SMS, Please wait..';
            },
            success: function(response) {
                if (response['success'] == true) {
                    $('#submitForm')[0].reset();
                    $('#submit-btn').attr('disabled', false);
                    $('#submit-btn').html('SEND');
                    document.getElementById('customresponse').innerHTML = response[
                        'customresponse'];
                    toastr.success(response['message']);
                } else {
                    document.getElementById('customresponse').innerHTML = '';
                    toastr.error(response['message']);
                }
            },
            error: function(jXHR, textStatus, errorThrown) {
                $('#submit-btn').attr('disabled', false);
                $('#submit-btn').html('SEND');
                document.getElementById('customresponse').innerHTML = '';
                toastr.error(errorThrown, 'ERROR');
            }
        })
    });

});
</script>