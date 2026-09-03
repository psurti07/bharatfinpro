<?php
$this->load->view('customer/includes/header.php');
?>

<section id="page-title" class="background-dark">
    <div class="container">
        <div class="page-title">
            <h4><i class="fa fa-shield-alt"></i> Support</h4>
        </div>
    </div>
</section>

<section id="page-content" class="fullscreen">
    <div class="container">
        <div class="row">

            <div class="col-lg-5">
                <div class="card process border-top-dark">
                    <div class="card-body">
                        <?php
						echo "<strong>" . COMPANY_NAME . "</strong>";
						echo "<br/><hr/><i class='fa fa-phone-square m-r-5'></i>" . COMPANY_MOBILE;
						echo "<br/><hr/><i class='fa fa-certificate m-r-5'></i>" . COMPANY_CIN;
						echo "<br/><hr/><i class='fa fa-envelope m-r-5'></i>suport@bharatfinpro.com";
						echo "<br/><hr/><i class='fa fa-clock m-r-5'></i>" . COMPANY_TIMING;
						echo "<br/><hr/><i class='fa fa-map-marker m-r-5'></i>" . COMPANY_ADDRESS;
						?>
                        <hr />
                        <p class="text-info"><small>Our Customer service expert are here for you lines are open Mon –
                                Sat 10 AM to 5 PM</small></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <?php echo form_open('customer/support/submitrequest', array('id' => 'submitForm', 'class' => 'form-horizontal p-cb process m-0 border-top-dark', 'novalidate' => 'novalidate')); ?>
                <input type="hidden" name="do" value="generateticket" class="form-control" required>
                <input type="hidden" name="userid" id="userid" value="<?php echo $userid; ?>" required>
                <div class="form-group">
                    <label class="text-dark" for="subject">Subject *</label>
                    <select name="subject" id="subject" aria-required="true" class="form-control" required>
                        <option value="">-</option>
                        <option value="Issue with Membership Card">Issue with Membership Card</option>
                        <option value="Change Registered Email id or Mobile no">Change Registered Email id or Mobile no
                        </option>
                        <option value="Personal Loan">Personal Loan</option>
                        <option value="Business Loan">Business Loan</option>
                        <option value="Others">Others</option>
                    </select>
                    <div class="help-block font-small-3"></div>
                </div>

                <div class="form-group">
                    <label class="text-dark" for="query">Query *</label>
                    <textarea name="query" id="query" rows="5" aria-required="true" class="form-control"
                        required></textarea>
                    <div class="help-block font-small-3"></div>
                </div>

                <button type="submit" id="submit-btn" class="btn btn-dark">Submit</button>
                <?php echo form_close(); ?>
            </div>

        </div>
    </div>
</section>

<?php
$this->load->view('customer/includes/footer.php');
?>
<script>
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
                $('#submit-btn').html(
                    'SUBMITTING... <span class="spinner-border spinner-border-sm ms-1" role="status" aria-hidden="true"></span>'
                    );
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
                $('#submit-btn').html('Submit Request');
                $('#submit-btn').attr('disabled', false);
            },
            error: function(jXHR, textStatus, errorThrown) {
                toastr.error(errorThrown, 'ERROR');
                $('#submit-btn').html('Submit Request');
                $('#submit-btn').attr('disabled', false);
            }
        });
    });
})
</script>