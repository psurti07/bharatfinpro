<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
  window.onload = function () {
    document.getElementById("154").className += " active";
  }
</script>

<div class="content-header row">

  <div class="content-header-left col-md-6 col-12 mb-1">
    <h1 class="content-header-title text-uppercase">Subpaisa Log List</h1>
  </div>

  <div class="content-header-right col-md-6 col-12 mb-1">
    <?php echo form_open('report/subpaisalog', array('id' => 'filterForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
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
                    <th>Datetime</th>
                    <th>Entry For</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Order ID</th>
                    <th class='text-right'>Order Amount</th>
                    <th>Order Note</th>
                    <th>Reference ID</th>
                    <th >Transaction Status</th>
                    <th>Payment Mode</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  if (count($paymentlist)) {
                    $cnt = 1;
                    foreach ($paymentlist as $row) {
                      echo "<tr>";
                      echo "<td>" . htmlentities($cnt) . "</td>";
                      echo "<td>" . DateFormatDisplay($row->rec_date) . "</td>";
                      echo "<td>" . htmlspecialchars($row->entrydetail ?? '') . "</td>";
                      echo "<td>" . htmlspecialchars($row->fullname ?? '') . "</td>";
                      echo "<td>" . htmlspecialchars($row->email ?? '') . "</td>";
                      echo "<td>" . htmlspecialchars($row->mobile ?? '') . "</td>";
                      echo "<td>" . htmlspecialchars($row->orderid ?? '') . "</td>";
                      echo "<td class='text-right'>" . htmlspecialchars($row->orderamount ?? '') . "</td>";
                      echo "<td>" . htmlspecialchars($row->ordernote ?? '') . "</td>";
                      echo "<td>" . htmlspecialchars($row->referenceid ?? '') . "</td>";
                      echo "<td>" . htmlspecialchars($row->txstatus ?? '') . "</td>";
                      echo "<td>" . htmlspecialchars($row->paymentmode ?? '') . "</td>";

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
