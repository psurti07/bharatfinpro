<?php
$this->load->view('includes/header.php');
?>
<section id="page-title">
    <div class="container">
        <div class="breadcrumb text-left">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active" aria-current="page">Raise a Request</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section id="request">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6 col-12">
                <?php echo form_open('support/raiserequest', array('id' => 'submitForm', 'class' => 'form-transparent-grey', 'novalidate' => 'novalidate')); ?>
                <div class="row">

                    <div class="form-group col-md-12">
                        <label class="text-dark" for="fullname">I am a,</label>
                        <div class="row p-l-20">
                            <div class="col-md-6">
                                <input class="form-check-input" name="usertype" id="customer" value="1" checked
                                    type="radio">
                                <label class="form-check-label" for="customer">Customer</label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-check-input" name="usertype" id="guest" value="2" type="radio">
                                <label class="form-check-label" for="guest">Guest User</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="text-dark" for="fullname">Full Name *</label>
                        <input type="text" aria-required="true" name="fullname" id="fullname" class="form-control"
                            placeholder="John Doe" required>
                        <div class="help-block font-small-3"></div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="text-dark" for="email">Mobile no *</label>
                        <input type="text" aria-required="true" name="mobile" id="mobile" class="form-control"
                            placeholder="98765 43210" maxlength="10" minlength="10" inputmode="numeric"
                            data-validation-regex-regex="^[789]\d{9}$"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            required>
                        <div class="help-block font-small-3"></div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="text-dark" for="email">Email id *</label>
                        <input type="email" aria-required="true" name="email" id="email" class="form-control"
                            placeholder="john@domain.com" required>
                        <div class="help-block font-small-3"></div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="text-dark" for="cno">Card Number(Optional)</label>
                        <input type="text" name="cardnumber" id="cardnumber" class="form-control"
                            placeholder="9876 5432 1012 3456">
                    </div>

                    <div class="form-group col-md-12">
                        <label class="text-dark" for="">Query Related To</label>
                        <select id="requestreason" class="form-control" name="requestreason" required>
                            <option>Select Issue</option>
                            <option value="Service Problem">Service Problem</option>
                            <option value="Payment Issue">Payment Issue</option>
                            <option value="Technical Problem">Technical Problem</option>
                            <option value="Eligibility or Pre-Approval Query">Eligibility or Pre-Approval Query</option>
                            <option value="Other">Other</option>
                        </select>
                        <div class="help-block font-small-3"></div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="text-dark" for="message">Request Message</label>
                        <textarea aria-required="true" name="message" id="message" class="form-control"
                            placeholder="Request message in minimum 60 characters" required="" minlength="60"
                            required></textarea>
                        <div class="help-block font-small-3"></div>
                    </div>

                    <div class="form-group col-md-12">
                        <button class="btn btn-primary" name="submit-btn" id="submit-btn">Submit Request</button>
                    </div>

                    <div class="form-group col-md-12" id="submitedmessage"></div>

                </div>
                <?php echo form_close(); ?>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
                <div class="heading-text m-b-0 text-center">
                    <h4>Common FAQs</h4>
                </div>

                <div class="accordion white accordion-shadow">
                    <div class="ac-item">
                        <h5 class="ac-title p-r-15">I did the payment by mistake and I do not wish to take company
                            services. Can I request a refund?</h5>
                        <div class="ac-content">
                            <p>In this case, we request you to call the company on <?php echo COMPANY_MOBILE; ?> between
                                10 AM to 5 PM – Monday to Saturday (business days only) – and discuss the matter.</p>
                        </div>
                    </div>

                    <div class="ac-item p-r-15">
                        <h5 class="ac-title">Who is eligible to get a GST Return?</h5>
                        <div class="ac-content">
                            <p>Some of the likely purposes for which a personal loan can be used are Shopping, Home
                                Renovation, Higher Education, Debt Consolidation, Tour Travel, Wedding, Medical
                                emergency, etc.</p>
                        </div>
                    </div>

                    <div class="ac-item">
                        <h5 class="ac-title p-r-15">What should I do if I am not satisfied with the company's services?
                        </h5>
                        <div class="ac-content">
                            <p>In this case, we request you to call the company on <?php echo COMPANY_MOBILE; ?> between
                                10 AM to 5 PM – Monday to Saturday (business days only) – and discuss the matter.</p>
                        </div>
                    </div>

                    <div class="ac-item p-r-15">
                        <h5 class="ac-title">What should I do if my account is not created even after the payment is
                            done?</h5>
                        <div class="ac-content">
                            <p>It might happen that your amount is on hold with the payment gateway and is still not
                                credited to the company's account. Kindly do not worry, your account will be created
                                once the amount is credited to the company's account – and you will be timely informed.
                                Or, the payment gateway will refund the amount to your account according to their rules
                                and regulations.</p>
                        </div>
                    </div>

                    <div class="ac-item">
                        <h5 class="ac-title p-r-15">I'm not willing to take the company's services. Can I request a
                            refund?</h5>
                        <div class="ac-content">
                            <p>In this case, we request you to call the company on <?php echo COMPANY_MOBILE; ?> between
                                10 AM to 5 PM – Monday to Saturday (business days only) – and discuss the matter.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php
$this->load->view('includes/footer.php');
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
                $('#submit-btn').html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting...'
                    );
                $('#submit-btn').attr('disabled', true);
            },
            success: function(response) {
                if (response['success'] == true) {
                    $.notify({
                        message: response['message']
                    }, {
                        type: 'success'
                    });
                } else {
                    $.notify({
                        message: response['message']
                    }, {
                        type: 'danger'
                    });
                }

                $('#submitedmessage').html(response['message']);

                setTimeout(function() {
                    location.reload();
                }, 10000);
            },
            error: function(jXHR, textStatus, errorThrown) {
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