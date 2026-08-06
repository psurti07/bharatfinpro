<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("135").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-12 col-12 mb-1">
	    <h1 class="content-header-title text-uppercase">Support Request</h1>
	  </div>
	</div>

	<div class="content-body">
      <section id="configuration">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <div class="heading-elements">
                    <?php echo form_open('support/ticket', array('id'=>'filterForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>
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
                        <th>Ticket No</th>
                        <th>Status</th>
                        <th>User Type</th>
                        <th>Full Name</th>
                        <th>Mobile</th>
                        <th>Email Id</th>
                        <th class='text-center'>Details</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                        if(count($ticketlist)) {
                        	$cnt=1; 
                        	foreach ($ticketlist as $row) {
                        		echo "<tr>";
                            echo "<td width='50'>".htmlentities($cnt)."</td>";
                            echo "<td>".DateFormatDisplay($row->rec_date)."</td>";
                            echo "<td width='50'>".htmlentities($row->ticketnumber)."</td>";

                            echo "<td>";
                            switch ($row->status) {
                              case '1':
                                echo "<span class='text-info'>Open</span>";
                                break;

                              case '2':
                                echo "<span class='text-danger'>Processing</span>";
                                break;

                              case '3':
                                echo "<span class='text-warning'>Closed – No Response</span>";
                                break;

                              case '4':
                                echo "<span class='text-success'>Solved</span>";
                                break;
                              
                              default:
                                echo "-";
                                break;
                            }
                            echo "</td>";

                            echo "<td>";
                            switch ($row->usertype) {
                              case '1':
                                echo "Customer";
                                break;

                              case '2':
                                echo "Guest User";
                                break;

                              default:
                                echo "-";
                                break;
                            }
                            echo "</td>";

                            echo "<td>".htmlentities($row->fullname)."</td>";
                            echo "<td>".htmlentities($row->mobile)."</td>";
                            echo "<td width='270' class='dont-break-out'>".htmlentities($row->email)."</td>";
                          
                            echo "<td class='text-center' width='50'>".anchor("support/ticketdetails/{$row->id}",'<i class="la la-info"></i>','class="btn btn-icon btn-outline-dark btn-sm"')."</td>";

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
