<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("141").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Report - Process Step - <?php echo $step; ?></h1>
    </div>
</div>

<div class="content-body">
    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <div class="heading-elements">
                            <?php echo form_open('report/processstep/' . $step, array('id' => 'filterForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
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
                      if ($row->isActive == 0) {
                        echo "<tr class='bg-danger bg-lighten-1 white'>";
                      } else {
                        echo "<tr>";
                      }
                      echo "<td width='50'>" . htmlentities($cnt) . "</td>";
                      echo "<td>" . displayDate($row->update_date) . "</td>";
                      echo "<td class='text-capitalize'>" . htmlentities($row->fullname) . "</td>";
                      echo "<td>" . htmlentities($row->mobile) . "</td>";
                      echo "<td width='320' class='dont-break-out'>" . htmlentities($row->email) . "</td>";
                      echo "<td>" . htmlentities($row->city) . "</td>";
                      echo "<td>" . htmlentities($row->state) . "</td>";

                      echo "<td class='text-center' width='50'>";
                      if ($step < '4' && $row->isUser != 2) {
                        echo anchor("users/leaddetails/{$row->id}", '<i class="la la-info"></i>', 'class="btn btn-icon btn-outline-dark btn-sm"');
                      } else {
                        echo anchor("users/userdetails/{$row->id}", '<i class="la la-info"></i>', 'class="btn btn-icon btn-outline-dark btn-sm"');
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