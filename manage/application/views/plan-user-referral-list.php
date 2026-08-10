<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("111").className += " active";
    document.getElementById("1111").className += " active";
    document.getElementById("8004").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-8 col-12 mb-1">
        <div class="badge badge-pill badge-light badge-square">Customer</div>
        <h1 class="content-header-title text-uppercase">Referral Customer List</h1>
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
      include_once(APPPATH . 'views/includes/plan-user-menu.php');
      ?>

            <div class="col-lg-9 col-md-9">
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body">

                            <table class="table table-striped table-bordered table-sm responsive dataex-html5-export">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Fullname</th>
                                        <th>Mobile</th>
                                        <th>Status</th>
                                        <th>Pay</th>
                                        <th>Pay Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                  if (count($reflist)) {
                    $cnt = 1;
                    foreach ($reflist as $row) {
                      echo "<tr>";
                      echo "<td>" . $cnt . "</td>";
                      echo "<td>" . displayDate($row->rec_date) . "</td>";
                      echo "<td>" . anchor("plan/userdetails/{$row->id}", $row->fullname, 'class="text-capitalize"') . "</td>";
                      echo "<td>" . htmlentities($row->mobile) . "</td>";

                      echo "<td>";
                      if ($row->isUser == 2) {
                        echo "Purchased Membership";
                      } else if ($row->isUser == 1) {
                        echo "Payment Pending";
                      } else {
                        echo "Application Pending";
                      }
                      echo "</td>";

                      if ($row->payout == 1) {
                        echo "<td class='text-success'>Payout</td>";
                      } else {
                        echo "<td class='text-danger'>Pending</td>";
                      }

                      echo "<td>";
                      if ($row->payout_date != NULL) {
                        echo displayDate($row->payout_date);
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