<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("110").className += " active";
      document.getElementById("1102").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-6 col-12 mb-1">
	    <h1 class="content-header-title text-uppercase">Loan Application List - <strong class="text-success">Approved</strong></h1>
	  </div>

		<div class="content-header-right col-md-6 col-12 mb-1">
		  <?php echo form_open('loan/approvehistory', array('id'=>'filterForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>

			  <fieldset class="form-group">
				From: <input name="dt_to" type="date" class="input-sm form-control col-md-4" id="datepicker" value="<?php echo $dt_to; ?>" style="display: inline;" />
				&nbsp; &nbsp;
				  To: <input name="dt_from" type="date" class="input-sm form-control col-md-4" id="datepicker1" value="<?php echo $dt_from; ?>" style="display: inline;" />
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
                        <th>Loan Type</th>
                        <th>Loan Amount</th>
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

                            echo "<td>".formatePriceIndia($row->loanamount)."</td>";
                            echo "<td>".htmlentities($row->loantenure)."</td>";
                            echo "<td class='text-capitalize'>".htmlentities($row->fullname)."</td>";
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
