<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("123").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Remarketing Log List</h1>
    </div>

    <div class="content-header-right col-md-8 col-12 mb-1">
        <?php echo form_open('sms/remarketinglog', array('id' => 'filterForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
        <fieldset class="form-group row mb-0">

                            <div class="col-md-3">
									SMS:
									<select name="parentid" id="parentid" class="input-sm form-control" required>
										<option value="1" <?php echo ($parentid == 1) ? 'selected' : ''; ?>>Digital Loan SMS</option>
										<option value="3" <?php echo ($parentid == 3) ? 'selected' : ''; ?>>Digital Loan Whatsapp</option>
										<option value="9" <?php echo ($parentid == 9) ? 'selected' : ''; ?>>Digital Loan Whatsapp - 2</option>
                                        <option value="2" <?php echo ($parentid == 2) ? 'selected' : ''; ?>>Whatsapp Intrekt</option>
                                        <option value="6" <?php echo ($parentid == 6) ? 'selected' : ''; ?>>Plan Intrekt</option>
                                        <option value="11" <?php echo ($parentid == 11) ? 'selected' : ''; ?>>Plan Intrekt 3</option>
									</select>
								</div>

								<div class="col-md-3">
									  From: <input name="dt_to" type="date" class="input-sm form-control" id="datepicker" value="<?php echo $dt_to; ?>" style="display: inline;" />
								</div>

								<div class="col-md-3">
									To: <input name="dt_from" type="date" class="input-sm form-control" id="datepicker1" value="<?php echo $dt_from; ?>" style="display: inline;" />
								</div>

								<div class="col-md-2">
									<button class="btn btn-outline-primary btn-sm" name="submit" type="submit">Show</button>
								</div>

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
                            <table class="table table-bordered table-sm dataex-res-configuration">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Message For</th>
                                        <th>Job Name</th>
                                        <th>Messages</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                  $total = 0;
                  if (count($loglist)) {
                    $cnt = 1;
                    foreach ($loglist as $row) {
                      $total += $row->msgcount;
                      echo "<tr>";
                      echo "<td width='50'>" . htmlentities($cnt) . "</td>";
                      echo "<td>" . DateFormatDisplay($row->rec_date) . "</td>";
                      echo "<td>" . htmlentities($row->crontype) . "</td>";
                      echo "<td>" . htmlentities($row->cronname) . "</td>";
                      echo "<td>" . htmlentities($row->msgcount) . "</td>";
                      echo "<td class='text-center' width='50'>" . anchor("sms/logdetails/{$row->id}", '<i class="la la-info"></i>', 'class="btn btn-icon btn-outline-dark btn-sm"') . "</td>";

                      echo "</tr>";
                      $cnt++;
                    }
                  ?>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" style="text-align:center">Total:</th>
                                        <th>
                                            <?php echo number_format($total, 0); ?>
                                        </th>
                                        <th></th>
                                    </tr>
                                </tfoot>

                                <?php
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