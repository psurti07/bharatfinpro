<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("104").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-6 col-12 mb-1">
	    <h1 class="content-header-title text-uppercase">Contact Enquiry</h1>
	  </div>

		<div class="content-header-right col-md-6 col-12 mb-1">
		  <?php echo form_open('enquiry/contact', array('id'=>'filterForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>

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
                  <table class="table table-striped table-bordered table-sm responsive dataex-res-configuration">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th class='text-center'>Delete</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                        if(count($enquirylist)) {
                        	$cnt=1; 
                        	foreach ($enquirylist as $row) {
                        		echo "<tr>";
                        		echo "<td width='50'>".htmlentities($cnt)."</td>";
								echo "<td>".fetchRecDate($row->rec_date)."</td>";
								echo "<td>".htmlentities($row->fullname)."</td>";
								echo "<td>".htmlentities($row->email)."</td>";
								echo "<td>".htmlentities($row->mobile)."</td>";
								echo "<td>".htmlentities($row->subject)."</td>";
								echo "<td>".htmlentities($row->message)."</td>";
							  
								echo "<td class='text-center' width='50'>".anchor("enquiry/deletecontactenq/{$row->id}",'<i class="la la-trash"></i>','class="btn btn-icon btn-outline-danger btn-sm"')."</td>";
						 
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
