<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("1601").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">
            Webinar Leads
        </h1>
    </div>
</div>


<div class="content-body">
    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <div class="heading-elements">
                            <?php
                            $attributes = array('class' => 'email', 'id' => 'myform');
                            echo form_open('webinar/webinarleads', array('id' => 'filterForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
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
                                        <th>Date</th>
                                        <th>Full Name</th>
                                        <th>Mobile</th>
                                        <th>Email Id</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th class='text-center'>Details</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (count($userlist)) {
                                        $cnt = 1;
                                        foreach ($userlist as $row) {
                                            echo "<tr>";
                                            echo "<td width='50'>" . htmlentities($cnt) . "</td>";
                                            echo "<td width='150'>" . DateFormatDisplay($row->rec_date) . "</td>";
                                            echo "<td class='text-capitalize'>" . htmlentities($row->first_name . ' ' . $row->last_name) . "</td>";
                                            echo "<td>" . htmlentities($row->mobile) . "</td>";
                                            echo "<td width='320' class='dont-break-out'>" . htmlentities($row->email) . "</td>";
                                            echo "<td>" . htmlentities($row->city) . "</td>";
                                            echo "<td>" . htmlentities($row->state) . "</td>";
                                            echo "<td class='text-center'>
                                <a href='javascript:void(0);'
                                  class='btn btn-icon btn-outline-dark btn-sm viewDetails'
                                  data-program_id='" . $row->program_id . "'
                                  data-id='" . $row->id . "'>
                                  <i class='la la-info'></i>
                                </a>
                                <a href=" . base_url() . "webinar/deletewebinar_lead/" . $row->id . "
                                  class='btn btn-icon btn-outline-dark btn-sm viewDetails'
                                  >
                                  <i class='la la-trash'></i>
                                </a>
                            </td>";

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
                            <div class="col-md-6 border-end">
                                <table class="table table-borderless align-middle">
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
                                    <tr>
                                        <th>Earning Goals:</th>
                                        <td id="earning_goal"></td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <table class="table table-borderless align-middle">
                                    <tr>
                                        <th width="35%">Pincode:</th>
                                        <td id="pincode"></td>
                                    </tr>
                                    <tr>
                                        <th>City:</th>
                                        <td id="city"></td>
                                    </tr>
                                    <tr>
                                        <th>State:</th>
                                        <td id="state"></td>
                                    </tr>
                                    <tr>
                                        <th>Current Occupation:</th>
                                        <td id="occupation"></td>
                                    </tr>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Program Details Card -->
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">

                        <h3 class="fw-bold mb-4">Program Details</h3>

                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Banner</th>
                                        <th>Name</th>
                                        <th>Speaker</th>
                                        <th>Language</th>
                                    </tr>
                                </thead>

                                <tbody id="programTableBody"></tbody>

                            </table>
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

    var program_id = $(this).data('program_id');
    var id = $(this).data('id');

    $('#userDetailModal').modal('show');

    $.ajax({
        url: "<?php echo site_url('webinar/webinar_leadetail'); ?>",
        type: "POST",
        dataType: "json",
        data: {
            program_id: program_id,
            id: id
        },
        success: function(res) {
            //$('#modalContent').html(response);

            $('#rec_date').text(res.user.rec_date);
            $('#full_name').text(res.user.first_name + ' ' + res.user.last_name);
            $('#email').text(res.user.email);
            $('#mobile').text(res.user.mobile);
            $('#earning_goal').text(res.user.earning_goal);

            $('#pincode').text(res.user.pincode);
            $('#city').text(res.user.city);
            $('#state').text(res.user.state);
            $('#occupation').text(res.user.occupation);
            $('#schedule_link').val(res.schedule_link);

            // Program Details
            var html = '';

            $.each(res.orders, function(i, row) {

                html += `
                <tr>
                    <td>${i + 1}</td>

                    <td>
                        <img src="<?= 'https://bharatfinpro.com/assets/images/webinarpage/' ?>${row.event_image}"
                             width="50"
                             class="img-thumbnail">
                    </td>

                    <td>${row.event_title}</td>
                    <td>${row.mentor_name}</td>
                    <td>${row.language}</td>
                </tr>`;
            });

            $('#programTableBody').html(html);

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