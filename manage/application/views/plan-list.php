<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("118").className += " active";
    document.getElementById("118" + <?php echo $cardtype; ?>).className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">
            <?php echo ($cardtype == 12) ? "Diamond" : "Gold"; ?> Membership Card List</h1>
    </div>

    <div class="content-header-right col-md-6 col-12 mb-1">
        <?php echo form_open('plan/planlist/' . $cardtype, array('id' => 'filterForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>

        <fieldset class="form-group">
            From: <input name="dt_to" type="date" class="input-sm form-control col-md-4" id="datepicker"
                value="<?php echo $dt_to; ?>" style="display: inline;" />
            &nbsp; &nbsp;
            To: <input name="dt_from" type="date" class="input-sm form-control col-md-4" id="datepicker1"
                value="<?php echo $dt_from; ?>" style="display: inline;" />
            &nbsp; &nbsp;
            <button class="btn btn-outline-primary btn-sm" name="submit" type="submit">Show</button>
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
                            <table class="table table-striped table-bordered table-sm responsive dataex-html5-export">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fullname</th>
                                        <th>Card Number</th>
                                        <th>Registration Date</th>
                                        <th>Expiry Date</th>
                                        <th class='text-right'>Amount</th>
                                        <th>Mobile</th>
                                        <th>Payment Id</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                  if (count($membershiplist)) {
                    $cnt = 1;
                    foreach ($membershiplist as $row) {
                      echo "<tr>";
                      echo "<td width='50'>" . htmlentities($cnt) . "</td>";
                      echo "<td>" . anchor("plan/plancard/{$row->userid}", $row->fullname, 'class="text-capitalize"') . "</td>";
                      echo "<td>" . htmlentities($row->card_number) . "</td>";
                      echo "<td>" . displayDate($row->registration_date) . "</td>";
                      echo "<td>" . displayDate($row->expiry_date) . "</td>";
                      echo "<td class='text-right'>" . formatePriceIndia($row->amount) . "</td>";
                      echo "<td>" . htmlentities($row->mobile) . "</td>";
                      echo "<td>" . htmlentities($row->paymentid) . "</td>";
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