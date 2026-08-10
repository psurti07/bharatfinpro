<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("127").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-8 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Bulk SMS List</h1>
    </div>
    <div class="content-header-right btn-group-sm text-right col-md-4 col-12">
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-keyboard="false"
            data-target="#uploadfile"><i class="la la-plus"></i> Upload Data</button>
    </div>
</div>


<div class="content-body">
    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table class="table table-striped table-bordered table-sm responsive dataex-html5-export">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Mobile No.</th>
                                        <th>Email Id</th>
                                        <th class='text-center'>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                  if (count($bulklist)) {
                    $cnt = 1;
                    foreach ($bulklist as $row) {
                      echo "<tr>";
                      echo "<td width='50'>" . htmlentities($cnt) . "</td>";

                      echo "<td>" . htmlentities($row->fullname) . "</td>";
                      echo "<td>" . htmlentities($row->mobileno) . "</td>";
                      echo "<td>" . htmlentities($row->emailid) . "</td>";

                      echo "<td class='text-center' width='50'>" . anchor("sms/deletemsgno/{$row->id}", '<i class="la la-trash"></i>', 'class="btn btn-icon btn-outline-danger btn-sm"') . "</td>";

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

<?php
include_once(APPPATH . 'views/includes/footer.php');
?>

<!-- Modal -->
<div class="modal fade text-left" id="uploadfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel3">Upload Data File</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('sms/uploadbulkfile', array('id' => 'submitForm', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'novalidate' => 'novalidate')); ?>

                <div class="form-body">
                    <div class="form-group">
                        <h5>Upload File <span class="required">*</span></h5>
                        <div class="controls">
                            <input type="file" name="smsfile" class="form-control" required
                                data-validation-required-message="File is required" accept=".csv">
                            <div class="help-block font-small-3"></div>
                            <p class="text-muted font-small-2 mt-1">Upload file format .csv only</p>
                        </div>
                    </div>
                </div>

                <div class="form-actions text-right pb-0">
                    <button type="button" class="btn grey btn-outline-light btn-min-width"
                        data-dismiss="modal">Close</button>
                    <button type="submit" id="submit-btn" class="btn btn-success btn-min-width">Import</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

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
                $('#submit-btn').html('Importing...');
                $('#submit-btn').attr('disabled', true);
            },
            success: function(response) {
                if (response['success'] == true) {
                    $('#submitForm')[0].reset();
                    $('#submit-btn').attr('disabled', false);
                    $('#submit-btn').html('Import Done');

                    toastr.success(response['message']);
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                } else {
                    toastr.error(response['message']);
                }
            },
            error: function(jXHR, textStatus, errorThrown) {
                $('#submit-btn').attr('disabled', false);
                $('#submit-btn').html('Import');
                toastr.error(errorThrown, 'ERROR');
            }
        })
    });

});
</script>