<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("1604").className += " active";
}
</script>
<style>
.modal-xl {
    max-width: 60%;
    margin-left: 20%;
    margin-right: 20%;
}
</style>
<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Schedule Slot Data</h1>
    </div>
</div>


<div class="content-body">
    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <div class="heading-elements">
                            <?php echo form_open('webinar/schedule_slot_detail', array('id' => 'filterForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                            <fieldset class="form-group row">
                                From: <input name="dt_to" type="date" class="input-sm form-control col-md-4"
                                    id="datepicker" value="<?php echo $dt_to; ?>" style="display: inline;" />
                                &nbsp; &nbsp;
                                To: <input name="dt_from" type="date" class="input-sm form-control col-md-4"
                                    id="datepicker1" value="<?php echo $dt_from; ?>" style="display: inline;" />
                                &nbsp; &nbsp;
                                <button class="btn btn-outline-primary btn-sm" name="submit" type="submit">Show</button>
                            </fieldset>
                            <?php echo form_close(); ?>
                        </div>
                    </div>

                    <div class="card-content collapse show">
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-sm responsive dataex-html5-export">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fullname</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Schedule Date</th>
                                        <th>Time</th>
                                        <th>Language</th>
                                        <th>DND Status</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                  if (count($userlist)) {
                    $cnt = 1;
                    foreach ($userlist as $row) {
                      echo "<tr>";

                      echo "<td>" . htmlentities($cnt) . "</td>";

                      echo "<td class='text-capitalize'>" . htmlentities($row->first_name . ' ' . $row->last_name) . "</td>";

                      echo "<td>" . htmlentities($row->mobile) . "</td>";

                      echo "<td>" . htmlentities($row->email) . "</td>";

                      echo "<td>" . DateFormatDisplay($row->date) . "</td>";

                      echo "<td>" . displayTime($row->time) . "</td>";
                      if ($row->language == 1) {
                        $lang = 'Gujarati';
                      } else if ($row->language == 2) {
                        $lang = 'Hindi';
                      } else if ($row->language == 3) {
                        $lang = 'English';
                      }
                      echo "<td >" . $lang . "</td>";

                      if ($row->isDnd == 1) {
                        echo "<td><a href='" . base_url() . "webinar/dnd_status/" . $row->user_id . "/" . $row->id . "' class='btn btn-icon btn-success btn-sm'>Is DND</a></td>";
                      } else if ($row->isDnd == 0) {
                        echo "<td><a href='" . base_url() . "webinar/dnd_status/" . $row->user_id . "/" . $row->id . "' class='btn btn-icon btn-danger btn-sm'>Not DND</a></td>";
                      }

                      if ($row->status == 1) {
                        $status = 'Schedule';
                      } else if ($row->status == 2) {
                        $status = 'Completed';
                      } else if ($row->status == 3) {
                        $status = 'Cancelled';
                      } else if ($row->status == 4) {
                        $status = 'Not Reachable';
                      }
                      echo "<td>" . $status . "</td>";

                      echo "<td class='text-center'>
                                <a href='javascript:void(0);'
                                  class='btn btn-icon btn-outline-dark btn-sm viewDetails'
                                  data-sloat_id='" . $row->id . "'
                                  data-id='" . $row->id . "'>
                                  <i class='la la-info'></i>
                                </a>
                                <a href=" . base_url() . "webinar/deletewebinar_user/" . $row->id . "
                                  class='btn btn-icon btn-outline-dark btn-sm viewDetails'>
                                  <i class='la la-trash'></i>
                                </a>
                            </td>";;

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
<div class="modal fade" id="userDetailModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 shadow">

            <!-- Header -->
            <div class="modal-header">
                <h4 class="modal-title fw-bold">Customer Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Body -->
            <div class="modal-body bg-light">

                <!-- Customer Details Card -->
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-4">

                        <h3 class="fw-bold mb-4">Customer Details</h3>

                        <div class="row">

                            <!-- Left Column -->
                            <div class="col-md-5">
                                <table class="table border border-radius align-middle">
                                    <tr>
                                        <th width="35%">Date:</th>
                                        <td id="rec_date"></td>
                                    </tr>
                                    <tr>
                                        <th>Full Name:</th>
                                        <td id="full_name"></td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td id="email"></td>
                                    </tr>
                                    <tr>
                                        <th>Mobile:</th>
                                        <td id="mobile"></td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-7">
                                <div class="card border p-1">
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <?php echo form_open('webinar/update_schedule_slot', array('id' => 'submitForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate', 'enctype' => 'multipart/form-data', 'accept-charset' => 'utf-8')); ?>
                                            <div class="form-body">
                                                <div class="">
                                                    <input type="hidden" name="schid" id="schid">
                                                    <div class="form-group row">
                                                        <label for="schedule_date" class="col-md-3">Date <span
                                                                class="required">*</span></label>
                                                        <div class="col-md-9">
                                                            <input type="date" name="schedule_date" id="schedule_date"
                                                                class="form-control" required
                                                                value="<?php echo date('Y-m-d H:i:s'); ?>">
                                                        </div>
                                                        <div class="help-block font-small-3"></div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="schedule_time" class="col-md-3">Time <span
                                                                class="required">*</span></label>
                                                        <div class="col-md-9">
                                                            <select class="custom-select form-control"
                                                                aria-required="true" id="schedule_time"
                                                                name="schedule_time" required>
                                                                <option value="">Select</option>
                                                                <option value="11:00:00">11:00 AM</option>
                                                                <option value="11:30:00">11:30 AM</option>
                                                                <option value="12:00:00">12:00 PM</option>
                                                                <option value="12:30:00">12:30 PM</option>
                                                                <option value="13:00:00">01:00 PM</option>
                                                                <option value="13:30:00">01:30 PM</option>
                                                                <option value="14:00:00">02:00 PM</option>
                                                                <option value="14:30:00">02:30 PM</option>
                                                                <option value="15:00:00">03:00 PM</option>
                                                                <option value="15:30:00">03:30 PM</option>
                                                                <option value="16:00:00">04:00 PM</option>
                                                            </select>
                                                        </div>
                                                        <div class="help-block font-small-3"></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="language" class="col-md-3">Language : </label>
                                                        <lable class="language" class="col-md-9"><strong>Hindi</strong>
                                                            </label>
                                                            <div class="help-block font-small-3"></div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="remark" class="col-md-3">Remarks <span
                                                                class="required">*</span></label>
                                                        <div class="col-md-9">

                                                            <textarea name="remark" id="remark" aria-required="true"
                                                                class="form-control"></textarea>
                                                        </div>
                                                        <div class="help-block font-small-3"></div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="status" class="col-md-3">Status <span
                                                                class="required">*</span></label>
                                                        <div class="col-md-9">
                                                            <select class="custom-select form-control"
                                                                aria-required="true" id="status" name="status" required>
                                                                <option value="">Select</option>
                                                                <option value="1">Scheduled</option>
                                                                <option value="2">Complated</option>
                                                                <option value="3">Cancelled</option>
                                                                <option value="4">Not Reachable</option>
                                                            </select>
                                                        </div>
                                                        <div class="help-block font-small-3"></div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label for="upadte_remark" class="col-md-3">Remarks</label>
                                                        <div class="col-md-9">
                                                            <textarea name="upadte_remark" id="upadte_remark"
                                                                class="form-control"></textarea>
                                                        </div>
                                                        <div class="help-block font-small-3"></div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-actions text-right">
                                            <button type="submit" id="submit-btn"
                                                class="btn btn-success btn-min-width">Update</button>
                                        </div>
                                        <?php echo form_close(); ?>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
</div>

<?php
include_once(APPPATH . 'views/includes/footer.php');
?>


<script>
$(document).on('click', '.viewDetails', function() {

    var id = $(this).data('id');

    $('#userDetailModal').modal('show');

    $.ajax({
        url: "<?php echo site_url('webinar/user_schedule_slot_detail'); ?>",
        type: "POST",
        dataType: "json",
        data: {
            id: id
        },
        success: function(res) {
            //$('#modalContent').html(response);
            console.log(res);
            $('#schid').val(res.id);
            $('#rec_date').text(res.created_at);
            $('#full_name').text(res.first_name + ' ' + res.last_name);
            $('#email').text(res.email);
            $('#mobile').text(res.mobile);

            $('#schedule_date').val(res.date);
            $('#remark').val(res.remarks);

            $('#schedule_time').val(res.time).trigger('change');

            $('#userDetailModal').modal('show');
        }
    });
});
$(document).ready(function() {

    <?php if ($this->session->flashdata('success')) { ?>
    toastr.success("<?= $this->session->flashdata('success'); ?>");
    <?php } ?>

});
</script>