<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("1603").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-12 col-12 mb-1">
	    <h1 class="content-header-title text-uppercase">
        Onboard List
      </h1>
	  </div>
	</div>


	<div class="content-body">
      <section id="configuration">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <div class="heading-elements">
                    <?php 
                      $attributes = array('class' => 'email', 'id' => 'myform');
                      echo form_open('webinar/webinar_onboard_detail', array('id'=>'filterForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>
                      <fieldset class="form-group row">
                      From: <input name="dt_to" type="date" class="input-sm form-control col-md-4" id="datepicker" value="<?php echo $dt_to; ?>" style="display: inline;" />
                      &nbsp; &nbsp;
                        To: <input name="dt_from" type="date" class="input-sm form-control col-md-4" id="datepicker1" value="<?php echo $dt_from; ?>" style="display: inline;" />
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
                        <th>Total Leads</th>
                        <th>Total Customer</th>
                        <th>Total Amount</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                        if(count($onboardlist)) {
                        	$cnt=1; 
                        	foreach ($onboardlist as $row) {
                        		echo "<tr>";
                        		echo "<td width='50'>".htmlentities($cnt)."</td>";
                            echo "<td width='150'>".DateFormatDisplay($row->date)."</td>";
                            echo "<td>".htmlentities($row->total_leads)."</td>";
                        		echo "<td>".htmlentities($row->total_customers)."</td>";
                            echo "<td width='320'>".formatePriceIndia($row->total_amount)."</td>";
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
