<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("114").className += " active";
    document.getElementById("1141<?php echo $loan; ?>").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">
            <?php
      if ($loan == 'pl') {
        echo "Digital Personal Loan - Premium Leads";
      } else if ($loan == 'bl') {
        echo "Digital Business Loan - Premium Leads";
      } else {
        echo "Digital Loan - Premium Leads";
      }
      ?>
        </h1>
    </div>

    <div class="content-header-right col-md-6 col-12 mb-1">
        <?php $attributes = array('class' => 'email', 'id' => 'myform');

    echo form_open('users/premiumleads/' . $loan, array('id' => 'filterForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
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
                                        <th>Date</th>
                                        <th>Full Name</th>
                                        <th>Mobile</th>
                                        <th>Email Id</th>
                                        <th>Pincode</th>
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
                      echo "<td width='150'>" . displayDate($row->update_date) . "</td>";
                      echo "<td class='text-capitalize'>" . htmlentities($row->fullname) . "</td>";
                      echo "<td>" . htmlentities($row->mobile) . "</td>";
                      echo "<td width='320' class='dont-break-out'>" . htmlentities($row->email) . "</td>";
                      echo "<td>" . htmlentities($row->pincode) . "</td>";
                      echo "<td>" . htmlentities($row->city) . "</td>";
                      echo "<td>" . ($row->state) . "</td>";
                      echo "<td class='text-center' width='50'>" . anchor("users/leaddetails/{$row->id}", '<i class="la la-info"></i>', 'class="btn btn-icon btn-outline-dark btn-sm"') . "</td>";

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