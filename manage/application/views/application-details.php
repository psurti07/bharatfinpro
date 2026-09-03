<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("110").className += " active";
    document.getElementById("110" + <?php echo $appdetails->status; ?>).className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-8 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Application Details</h1>
    </div>

    <div class="content-header-right btn-group-sm text-right col-md-4 col-12">
        <button onclick="window.history.back();" class="btn btn-outline-dark"><i class="la la-chevron-left"></i>
            Back</button>
    </div>
</div>


<div class="content-body">
    <section id="input-validation">
        <div class="row">

            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <dl class="row">
                                <dd class="col-md-4">Name :</dd>
                                <dt class="col-md-8">
                                    <?php echo anchor("users/userdetails/{$appdetails->userid}", $appdetails->fullname, 'class="text-capitalize"'); ?>
                                </dt>
                            </dl>
                            <hr />

                            <dl class="row">
                                <dd class="col-md-4">Mobile :</dd>
                                <dt class="col-md-8"><?php echo $appdetails->mobile; ?></dt>
                            </dl>
                            <hr />

                            <dl class="row">
                                <dd class="col-md-4">Loan Type :</dd>
                                <dt class="col-md-8"><?php
                                      if ($appdetails->loantype == 11) {
                                        echo 'Personal Loan';
                                      } else if ($appdetails->loantype == 12) {
                                        echo 'Business Loan';
                                      }
                                      ?></dt>
                            </dl>
                            <hr />

                            <dl class="row">
                                <dd class="col-md-4">Loan Amount :</dd>
                                <dt class="col-md-8"><?php echo formatePriceIndia($appdetails->loanamount); ?></dt>
                            </dl>
                            <hr />

                            <dl class="row">
                                <dd class="col-md-4">Loan Tenure :</dd>
                                <dt class="col-md-8"><?php echo $appdetails->loantenure; ?></dt>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <dl class="row">
                                <dd class="col-md-4">Loan Purpose :</dd>
                                <dt class="col-md-8"><?php echo $appdetails->loanpurpose; ?></dt>
                            </dl>
                            <hr />

                            <dl class="row">
                                <dd class="col-md-4">CIBIL Score :</dd>
                                <dt class="col-md-8"><?php echo $appdetails->cibilscore; ?></dt>
                            </dl>
                            <hr />

                            <dl class="row">
                                <dd class="col-md-4">Income :</dd>
                                <dt class="col-md-8"><?php echo formatePriceIndia($appdetails->income); ?></dt>
                            </dl>
                            <hr />

                            <dl class="row">
                                <dd class="col-md-4">Current EMI :</dd>
                                <dt class="col-md-8"><?php echo $appdetails->currentemi; ?></dt>
                            </dl>
                            <hr />

                            <dl class="row">
                                <dd class="col-md-4">EMI Bounce :</dd>
                                <dt class="col-md-8"><?php
                                      if ($appdetails->emibounce == 0) {
                                        echo 'No';
                                      } else if ($appdetails->emibounce == 1) {
                                        echo 'Yes';
                                      } else {
                                        echo '-';
                                      } ?></dt>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="float-md-right mb-2">
                    <?php
          switch ($appdetails->status) {
            case "6":
              echo "<div class='alert alert-info mr-1' role='alert' style='display: inline;'> This application is decline form customer. </div>";

              echo "<a href='" . site_url('loan/appstatusForm/' . $appdetails->id) . "' class='btn btn-primary mr-1'>Add Status</a>";

              echo "<a href='" . site_url('loan/applicationstatus/2/' . $appdetails->id) . "' class='btn btn-success mr-1'>Approve Application</a>";

              break;

            case "5":
              echo "<div class='alert alert-info mr-1' role='alert' style='display: inline;'> This application is reopen again for processing. </div>";

              echo "<a href='" . site_url('loan/appstatusForm/' . $appdetails->id) . "' class='btn btn-primary mr-1'>Add Status</a>";

              echo "<a href='" . site_url('loan/applicationstatus/2/' . $appdetails->id) . "' class='btn btn-success mr-1'>Approve Application</a>";

              echo "<a href='" . site_url('loan/applicationstatus/3/' . $appdetails->id) . "' class='btn btn-danger mr-1'>Reject Application</a>";

              echo "<a href='" . site_url('loan/applicationstatus/4/' . $appdetails->id) . "' class='btn btn-warning mr-1'>Query Process</a>";

              echo "<a href='" . site_url('loan/applicationstatus/6/' . $appdetails->id) . "' class='btn btn-warning mr-1'>Customer Decline</a>";
              break;

            case "4":
              echo "<div class='alert alert-warning mr-1' role='alert' style='display: inline;'> This application is under query processing. </div>";

              echo "<a href='" . site_url('loan/appstatusForm/' . $appdetails->id) . "' class='btn btn-primary mr-1'>Add Status</a>";

              echo "<a href='" . site_url('loan/applicationstatus/2/' . $appdetails->id) . "' class='btn btn-success mr-1'>Approve Application</a>";

              echo "<a href='" . site_url('loan/applicationstatus/3/' . $appdetails->id) . "' class='btn btn-danger mr-1'>Reject Application</a>";

              echo "<a href='" . site_url('loan/applicationstatus/6/' . $appdetails->id) . "' class='btn btn-warning mr-1'>Customer Decline</a>";
              break;

            case "3":
              echo "<div class='alert alert-danger mr-1' role='alert' style='display: inline;'> This application has been completely rejected. </div>";

              echo "<a href='" . site_url('loan/applicationstatus/5/' . $appdetails->id) . "' class='btn btn-info mr-1'>Reopen Application</a>";

              echo "<a href='" . site_url('loan/applicationstatus/2/' . $appdetails->id) . "' class='btn btn-success mr-1'>Re-approve Application</a>";

              echo "<a href='" . site_url('loan/applicationstatus/4/' . $appdetails->id) . "' class='btn btn-warning mr-1'>Query Process</a>";

              echo "<a href='" . site_url('loan/applicationstatus/6/' . $appdetails->id) . "' class='btn btn-warning mr-1'>Customer Decline</a>";
              break;

            case "2":
              echo "<div class='alert alert-success mr-1' role='alert' style='display: inline;'> This application has been approved. </div>";

              echo "<a href='" . site_url('loan/appstatusForm/' . $appdetails->id) . "' class='btn btn-primary mr-1'>Add Status</a>";

              echo "<a href='" . site_url('loan/applicationstatus/4/' . $appdetails->id) . "' class='btn btn-warning mr-1'>Query Process</a>";

              echo "<a href='" . site_url('loan/applicationstatus/3/' . $appdetails->id) . "' class='btn btn-danger mr-1'>Reject Application</a>";

              echo "<a href='" . site_url('loan/applicationstatus/6/' . $appdetails->id) . "' class='btn btn-warning mr-1'>Customer Decline</a>";
              break;

            case "1":
              echo "<a href='" . site_url('loan/appstatusForm/' . $appdetails->id) . "' class='btn btn-primary mr-1'>Add Status</a>";

              echo "<a href='" . site_url('loan/applicationstatus/2/' . $appdetails->id) . "' class='btn btn-success mr-1'>Approve Application</a>";

              echo "<a href='" . site_url('loan/applicationstatus/4/' . $appdetails->id) . "' class='btn btn-warning mr-1'>Query Process</a>";

              echo "<a href='" . site_url('loan/applicationstatus/3/' . $appdetails->id) . "' class='btn btn-danger mr-1'>Reject Application</a>";

              echo "<a href='" . site_url('loan/applicationstatus/6/' . $appdetails->id) . "' class='btn btn-warning mr-1'>Customer Decline</a>";
              break;

            default:
              break;
          }
          ?>
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <table class="table table-bordered table-sm table-responsive dataex-res-configuration">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>#</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Bank</th>
                                        <th>Remarks</th>
                                        <th>Staff Name</th>
                                        <th>Loan Details</th>
                                        <th class='text-center'>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                  if (count($statuslist)) {
                    $cnt = 1;
                    foreach ($statuslist as $row) {
                      echo "<tr class='bg-" . $row->colorclass . " bg-lighten-4'>";
                      echo "<td></td>";
                      echo "<td width='50'>" . htmlentities($cnt) . "</td>";

                      echo "<td><strong>" . htmlentities($row->statusname) . "</strong></td>";
                      echo "<td>" . displayDate($row->statusdate) . "</td>";
                      echo "<td>" . htmlentities($row->bank_name) . "</td>";
                      echo "<td style='min-width: 400px;'>" . htmlentities($row->remarks) . "</td>";

                      echo "<td>" . htmlentities($row->fullname) . "</td>";

                      echo "<td>";
                      if ($row->loanamount != 0) {
                        echo "<small>Amount : </small>" . formatePriceIndia($row->loanamount) . "<br/>";
                      }

                      if ($row->loanroi != "") {
                        echo "<hr/><small>ROI : </small>" . htmlentities($row->loanroi) . "<br/>";
                      }

                      if ($row->loanterms != "") {
                        echo "<hr/><small>Terms : </small>" . htmlentities($row->loanterms) . "<br/>";
                      }

                      if ($row->processfees != 0) {
                        echo "<hr/><small>Process Fees : </small>" . htmlentities($row->processfees) . "<br/>";
                      }

                      if ($row->insurance != "") {
                        echo "<hr/><small>Insurance : </small>" . htmlentities($row->insurance) . "<br/>";
                      }

                      if ($row->monthlyemi != 0) {
                        echo "<hr/><small>Monthly EMI : </small>" . formatePriceIndia($row->monthlyemi) . "<br/>";
                      }

                      if ($row->sanction_letter != "") {
                        echo "<hr/><small>Sanction Letter : </small>";
                        echo anchor("Loan/downloadfile/{$appdetails->id}/{$row->sanction_letter}", '<i class="la la-download"></i> Download', 'class="btn btn-icon btn-outline-dark btn-sm" target="_blank"');
                      }
                      echo "</td>";

                      echo "<td class='text-center' width='50'>" . anchor("Loan/deleteappstatus/{$row->id}/{$appdetails->id}", '<i class="la la-trash"></i>', 'class="btn btn-icon btn-outline-danger btn-sm"') . "</td>";

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