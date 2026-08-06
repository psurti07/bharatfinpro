<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("110").className += " active";
      document.getElementById("1101").className += " active";
  }
</script>

  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-1">
      <h1 class="content-header-title text-uppercase">Digital - Loan Application List - Older than <?php echo $days; ?> days</h1>
    </div>
  </div>

  <div class="content-body">
      <section id="configuration">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <div class="heading-elements w-50">
                  <?php echo form_open('loan/oldapplication', array('id'=>'filterForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>
                    <fieldset class="form-group">
                    Days: &nbsp; 
                      <select class="form-control input-sm col-md-8" aria-required="true" id="days" name="d" style="display: inline;" required>
                          <option value="">Select Score</option>
                          <option value="21" <?php echo ($days==21) ? 'selected' : ''; ?>>21 Days Above</option>
                          <option value="41" <?php echo ($days==41) ? 'selected' : ''; ?>>41 Days Above</option>
                          <option value="61" <?php echo ($days==61) ? 'selected' : ''; ?>>61 Days Above</option>
                          <option value="91" <?php echo ($days==91) ? 'selected' : ''; ?>>91 Days Above</option>
                      </select>
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
                        <th></th>
                        <th>#</th>
                        <th>Date</th>
                        <th>Loan Type</th>
                        <th class='text-right'>Loan Amount</th>
                        <th>Loan Tenure</th>
                        <th>Customer</th>
                        <th>Mobile</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if(count($applicationlist)) {
                          $cnt=1;

                          foreach ($applicationlist as $row) {
                            echo "<tr>";

                            echo "<td><span style='display:none;'>".$cnt."</span><input type='checkbox' class='checkrecordlist' id='checkrecordlist' value='".$row->id."' /></td>";
                            echo "<td width='50'>".htmlentities($cnt)."</td>";
                            
                            echo "<td>".displayDate($row->rec_date)."</td>";

                            echo "<td>";
                            if($row->loantype == 11) {
                              echo "Personal Loan";
                            }
                            else if($row->loantype == 12) {
                              echo "Business Loan";
                            }
                            else {
                              echo "Other";
                            }
                            echo "</td>";

                            echo "<td class='text-right'>".formatePriceIndia($row->loanamount)."</td>";

                            echo "<td>".htmlentities($row->loantenure)."</td>";

                            echo "<td>".anchor("users/applicationlist/{$row->userid}",$row->fullname,'class="text-capitalize"')."</td>";

                            echo "<td>".htmlentities($row->mobile)."</td>";

                            echo "<td class='text-center' width='50'>".anchor("loan/appdetails/{$row->id}",'<i class="la la-info"></i>','class="btn btn-icon btn-outline-dark btn-sm"')."</td>";

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
    include_once(APPPATH.'views/includes/footer.php');
?>
