<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("107").className += " active";
    document.getElementById("1070").className += " active";
    document.getElementById("7003").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-8 col-12 mb-1">
        <div class="badge badge-pill badge-light badge-square">Customer</div>
        <h1 class="content-header-title text-uppercase">Application List</h1>
        <h1 class="text-primary text-uppercase"><?php echo $userdata['fullname'] . " - " . $userdata['mobile']; ?></h1>
    </div>

    <div class="content-header-right btn-group-sm text-right col-md-4 col-12">
        <button onclick="window.history.back();" class="btn btn-outline-dark"><i class="la la-chevron-left"></i>
            Back</button>
    </div>
</div>


<div class="content-body">
    <section id="input-validation">
        <div class="row">
            <?php
      include_once(APPPATH . 'views/includes/user-menu.php');
      ?>

            <div class="col-lg-9 col-md-9">
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body">

                            <table class="table table-striped table-bordered table-sm responsive dataex-html5-export">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Date</th>
                                        <th>Loan Type</th>
                                        <th>Amount</th>
                                        <th>Tenure</th>
                                        <th>CIBIL Score</th>
                                        <th>Purpose</th>
                                        <th>Income</th>
                                        <th>Current EMI</th>
                                        <th>EMI Bounce</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                  if (count($applications)) {
                    $cnt = 1;
                    foreach ($applications as $row) {
                      echo "<tr>";
                      echo "<td></td>";

                      echo "<td class='text-center' width='50'>" . anchor("loan/appdetails/{$row->id}", '<i class="la la-info"></i>', 'class="btn btn-icon btn-outline-dark btn-sm"') . "</td>";

                      echo "<td>" . displayDate($row->rec_date) . "</td>";

                      echo "<td>";
                      if ($row->loantype == 11) {
                        echo "Personal Loan";
                      } else if ($row->loantype == 12) {
                        echo "Business Loan";
                      } else {
                        echo "Other";
                      }
                      echo "</td>";

                      echo "<td>" . formatePriceIndia($row->loanamount) . "</td>";
                      echo "<td>" . htmlentities($row->loantenure) . "</td>";
                      echo "<td>" . htmlentities($row->cibilscore) . "</td>";
                      echo "<td>" . htmlentities($row->loanpurpose) . "</td>";
                      echo "<td>" . formatePriceIndia($row->income) . "</td>";
                      echo "<td>" . formatePriceIndia($row->currentemi) . "</td>";

                      echo "<td>";
                      if ($row->emibounce == 1) {
                        echo "Yes";
                      } else {
                        echo "No";
                      }
                      echo "</td>";

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