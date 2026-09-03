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
        <h1 class="content-header-title text-uppercase">SMS Messages</h1>
    </div>
    <div class="content-header-right btn-group-sm text-right col-md-4 col-12 mb-1">
        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-keyboard="false"
            data-target="#sendTestMsg"><i class="la la-plane"></i> Test SMS</button>
    </div>
</div>

<div class="content-body">
    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table class="table table-bordered table-sm dataex-res-configuration">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Update Date</th>
                                        <th>SMS Type</th>
                                        <th>SMS</th>
                                        <th class='text-center'>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                  if (count($smslist)) {
                    $cnt = 1;
                    foreach ($smslist as $row) {
                      echo "<tr>";
                      echo "<td>" . htmlentities($cnt) . "</td>";

                      echo "<td>" . fetchRecDate($row->rec_date) . "</td>";
                      echo "<td class='text-uppercase'>" . str_replace('-', ' ', $row->option_key) . "</td>";
                      echo "<td>" . htmlentities($row->option_value) . "</td>";

                      echo "<td class='text-center' width='50'>" . anchor("sms/editSMSForm/{$row->id}", '<i class="la la-pencil"></i>', 'class="btn btn-icon btn-outline-warning btn-sm"') . "</td>";

                      echo "</tr>";
                      $cnt++;
                    }
                  }
                  ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal text-left" id="sendTestMsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Send Test SMS</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?php echo form_open('site/sendTestsms', array('id' => 'submitForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>

                <div class="form-body">
                    <div class="form-group btn-group-toggle" data-toggle="buttons">
                        <div class="btn-group">
                            <label class="btn btn-outline-warning active">
                                <input type="radio" name="smsaccount" value="1" autocomplete="off" checked>Digital SMS
                            </label>
                            <label class="btn btn-outline-warning">
                                <input type="radio" name="smsaccount" value="2" autocomplete="off">Plan SMS
                            </label>
                            <label class="btn btn-outline-warning">
                                <input type="radio" name="smsaccount" value="3" autocomplete="off">Webinar SMS
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5>Select SMS <span class="required">*</span></h5>
                        <div class="controls">
                            <select name="smsid" id="smsid" data-placeholder="Select SMS" class="select2 form-control"
                                required data-validation-required-message="SMS is required" style="width: 100%;">
                                <option value="">Select SMS</option>
                                <?php
                foreach (array_reverse($smslist) as $row) {
                  $smstitle = strtoupper(str_replace('-', ' ', $row->option_key));
                  echo "<option value='" . $row->id . "'>" . $smstitle . "</option>";
                }
                ?>
                            </select>
                            <div class="help-block font-small-3"></div>
                        </div>
                    </div>

                    <div class="form-group btn-group-toggle" data-toggle="buttons">
                        <div class="btn-group">
                            <label class="btn btn-outline-warning active">
                                <input type="radio" name="smstype" value="1" autocomplete="off" checked>Remarketing SMS
                            </label>
                            <label class="btn btn-outline-warning">
                                <input type="radio" name="smstype" value="2" autocomplete="off">Normal SMS
                            </label>
                            <label class="btn btn-outline-warning">
                                <input type="radio" name="smstype" value="3" autocomplete="off">Webinar SMS
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <h5>Mobile Number <span class="required">*</span></h5>
                        <div class="controls">
                            <input type="text" name="mobile" id="mobile" class="form-control" required minlength="10"
                                maxlength="10" inputmode="numeric" data-validation-regex-regex="^[6789]\d{9}$"
                                data-validation-required-message="Mobile number is required">
                            <div class="help-block font-small-3"></div>
                        </div>
                    </div>
                </div>

                <div class="form-actions text-right pb-0">
                    <button type="button" class="btn grey btn-outline-light btn-min-width"
                        data-dismiss="modal">Close</button>
                    <button type="submit" id="submit-btn" class="btn btn-warning btn-min-width">Send</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<?php
include_once(APPPATH . 'views/includes/footer.php');
?>
<script type="text/javascript">
reset_model();

function reset_model() {
    $('#smsid').val('').trigger('change');
    $('#mobile').val("");
}

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
                    toastr.info(response['message']);
                    reset_model();
                } else {
                    toastr.error(response['message']);
                    reset_model();
                }

                setTimeout(function() {
                    location.reload();
                }, 8000);
            },
            error: function(jXHR, textStatus, errorThrown) {
                $('#submit-btn').html("Send");
                $('#submit-btn').attr('disabled', false);
                toastr.error(errorThrown, 'ERROR');
            }
        });
    });
});
</script>