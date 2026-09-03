<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("132").className += " active";
    document.getElementById("1323").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Prime Offer Sales</h1>
    </div>

    <div class="content-header-right col-md-6 col-12 mb-1">
        <?php echo form_open('enquiry/primeoffer', array('id' => 'filterForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>

        <fieldset class="form-group">
            From: <input name="dt_to" type="date" class="input-sm form-control col-md-4" id="datepicker"
                value="<?php echo $dt_to; ?>" style="display: inline;" />
            &nbsp; &nbsp;
            To: <input name="dt_from" type="date" class="input-sm form-control col-md-4" id="datepicker1"
                value="<?php echo $dt_from; ?>" style="display: inline;" />
            &nbsp; &nbsp;
            <button class="btn btn-outline-success btn-sm" name="submit" type="submit">Show</button>
        </fieldset>

        <?php echo form_close(); ?>
    </div>
</div>

<div class="content-body">
    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table class="table table-bordered table-bordered table-sm responsive dataex-html5-export">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Card No.</th>
                                        <th>Registration</th>
                                        <th>Expiry</th>
                                        <th>Amount</th>
                                        <th>Payment Id</th>
                                        <th>Account</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                  if (count($saleslist)) {
                    $cnt = 1;
                    foreach ($saleslist as $row) {
                      if ($row->isCustomer == 1) {
                        echo "<tr>";
                      } else {
                        echo "<tr class='bg-warning bg-lighten-5'>";
                      }

                      echo "<td width='50'>" . htmlentities($cnt) . "</td>";
                      echo "<td>" . htmlentities($row->fullname) . "</td>";
                      echo "<td>" . htmlentities($row->mobile) . "</td>";
                      echo "<td>" . htmlentities($row->emailid) . "</td>";
                      echo "<td>" . htmlentities($row->card_number) . "</td>";
                      echo "<td>" . displayDate($row->registration_date) . "</td>";
                      echo "<td>" . displayDate($row->expiry_date) . "</td>";
                      echo "<td>" . htmlentities($row->amount) . "</td>";
                      echo "<td>" . htmlentities($row->paymentid) . "</td>";

                      if ($row->isCustomer == 1) {
                        echo "<td class='text-center'>" . anchor("enquiry/offerstatus/5/{$row->isCustomer}/{$row->id}", 'Customer', 'class="btn btn-icon btn-outline-success btn-sm"') . "</td>";
                      } else {
                        echo "<td class='text-center'>" . anchor("enquiry/offerstatus/5/{$row->isCustomer}/{$row->id}", 'Lead', 'class="btn btn-icon btn-outline-warning btn-sm"') . "</td>";
                      }

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