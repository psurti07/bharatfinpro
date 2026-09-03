<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("110").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-8 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Application Status</h1>
    </div>
    <div class="content-header-right btn-group-sm text-right col-md-4 col-12 mb-1">
        <button onclick="window.history.back();" class="btn btn-outline-dark"><i class="la la-chevron-left"></i>
            Back</button>
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
                            <p><small class="text-muted">Fill the information to continue</small></p>

                            <?php echo form_open_multipart('loan/addAppstatus', array('id' => 'submitForm', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'novalidate' => 'novalidate')); ?>

                            <div class="form-body">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <h4>Application No - <strong><?php echo $appdetails->id; ?></strong></h4>
                                        <input type="hidden" name="applicationid" value="<?php echo $appdetails->id; ?>"
                                            class="form-control">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h4 class="text-capitalize">Customer Name -
                                            <strong><?php echo $appdetails->fullname; ?></strong></h4>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <h4>Loan Type - <strong><?php
                                            if ($appdetails->loantype == 11) {
                                              echo 'Personal Loan';
                                            } else if ($appdetails->loantype == 12) {
                                              echo 'Business Loan';
                                            }
                                            ?></strong></h4>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h4>Loan Amount - <strong><?php echo $appdetails->loanamount; ?></strong></h4>
                                    </div>
                                </div>

                                <hr />

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <h5>Application Status <span class="required">*</span></h5>
                                        <div class="controls">
                                            <select name="statusid" id="statusid"
                                                data-placeholder="Select Application Status"
                                                class="select2 form-control" onchange="return displayDiv(this.value);"
                                                required
                                                data-validation-required-message="Application status is required">
                                                <option value="">Application Status</option>
                                                <?php
                        foreach ($loanstatuslist as $row) {
                          echo "<option value='" . $row->id . "'>" . $row->statusname . "</option>";
                        }
                        ?>
                                            </select>
                                            <div class="help-block font-small-3"></div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h5>Status Date <span class="required">*</span></h5>
                                        <div class="controls">
                                            <!-- <input type="date" name="recdate" id="datepicker" class="form-control" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d', strtotime(date("Y-m-d", strtotime("-3 day")))); ?>" max="<?php echo date('Y-m-d'); ?>" required data-validation-required-message="Status date is required" /> -->
                                            <input type="date" name="recdate" id="datepicker" class="form-control"
                                                value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>"
                                                required data-validation-required-message="Status date is required" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h5>Bank <span class="required">*</span></h5>
                                        <div class="controls">
                                            <select name="bankid" id="bankid" data-placeholder="Select Bank Name"
                                                class="select2 form-control" required
                                                data-validation-required-message="Bank is required">
                                                <option value="">Select Bank Name</option>
                                                <?php
                        foreach ($banklist as $row) {
                          echo "<option value='" . $row->id . "'>" . $row->bank_name . "</option>";
                        }
                        ?>
                                            </select>
                                            <div class="help-block font-small-3"></div>
                                        </div>
                                    </div>
                                </div>

                                <div id="otherdetails" style="display: none;">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <h5>Loan Amount</h5>
                                            <div class="controls">
                                                <input type="text" name="loanamount" id="loanamount"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6"></div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <h5>Loan ROI</h5>
                                            <div class="controls">
                                                <input type="text" name="loanroi" id="loanroi" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <h5>Loan Terms</h5>
                                            <div class="controls">
                                                <input type="text" name="loanterms" id="loanterms" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <h5>Process Fees</h5>
                                            <div class="controls">
                                                <input type="text" name="processfees" id="processfees"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <h5>Insurance</h5>
                                            <div class="controls">
                                                <input type="text" name="insurance" id="insurance" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <h5>Monthly EMI</h5>
                                            <div class="controls">
                                                <input type="text" name="monthlyemi" id="monthlyemi"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <h5>Sanction Letter</h5>
                                            <div class="controls">
                                                <input type="file" name="sanctionletter" id="sanctionletter"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h5>Pre-defined Messages</h5>
                                        <div class="controls">
                                            <select name="basicSelect" id="basicSelect"
                                                data-placeholder="Select Message" class="select2 form-control"
                                                onchange="return premessage(this.value);">
                                                <option value="">Select Message</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h5>Remarks <span class="required">*</span></h5>
                                        <div class="controls">
                                            <textarea name="remarks" id="remarks" class="form-control" rows="5"
                                                required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions text-right">
                                <a href="<?php echo site_url('loan/application'); ?>"
                                    class="btn btn-outline-light">CANCEL</a>
                                <button type="submit" id="submit-btn" class="btn btn-success btn-min-width">ADD</button>
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
function premessage(premessage) {
    document.getElementById("remarks").value = premessage;
}

function displayDiv(status) {
    if (status == 1 || status == 7) {
        document.getElementById("otherdetails").style.display = "block";
    } else {
        document.getElementById("otherdetails").style.display = "none";
    }

    $.ajax({
        url: "<?php echo site_url('loan/getstatusremarks/'); ?>" + status,
        type: 'POST',
        dataType: 'json',
        cache: false,
        processData: false,
        success: function(response) {
            $("#basicSelect").find('option').remove();
            document.getElementById("remarks").value = "";
            if (response['success'] == true) {
                $("#basicSelect").append(response['remarkslist']);
            }
        }
    });
}
</script>