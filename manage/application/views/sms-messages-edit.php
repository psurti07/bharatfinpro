<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("131").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-8 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Edit SMS Message</h1>
    </div>
    <div class="content-header-right btn-group-sm text-right col-md-4 col-12">
        <a href="<?php echo site_url('sms/smsmessages'); ?>" target="_self" class="btn btn-outline-primary"><i
                class="la la-list-ol"></i> SMS Messages</a>
    </div>
</div>


<div class="content-body">
    <!-- Input Validation start -->
    <section class="input-validation">
        <div class="row">

            <div class="col-lg-7 col-md-7 col-12">
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <?php echo form_open('sms/editSMSmessage', array('id' => 'submitForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                            <input type="hidden" name="id" value="<?php echo $smsdetails->id; ?>" required>

                            <div class="form-body">
                                <div class="form-group">
                                    <h5>SMS : <span
                                            class='text-uppercase'><?php echo str_replace('-', ' ', $smsdetails->option_key); ?></span>
                                    </h5>
                                </div>

                                <div class="form-group">
                                    <h5>SMS Message</h5>
                                    <div class="controls">
                                        <textarea name="message" class="form-control"
                                            rows="7"><?php echo $smsdetails->option_value; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions text-right">
                                <button type="submit" id="submit-btn"
                                    class="btn btn-success btn-min-width">UPDATE</button>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-5 col-12">
                <p class="bg-blue-grey bg-dark text-highlight white pl-1">Offer Message</p>
                <ul>
                    <li>Set <#preamount> variable for amount. Replace with amount i.e. 500000</li>
                    <li>Remain '&' symbol as it is.</li>
                </ul>

                <p class="bg-blue-grey bg-dark text-highlight white pl-1">Remarketing Message</p>
                <ul>
                    <li>Set <#cronamount> variable for amount. Replace with amount i.e. 500000</li>
                    <li>Add %26 instad of '&' symbol.</li>
                </ul>
            </div>

        </div>
    </section>
    <!-- Input Validation end -->
</div>

<?php
include_once(APPPATH . 'views/includes/footer.php');
?>