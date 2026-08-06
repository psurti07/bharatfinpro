<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("128").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-6 col-12 mb-1">
	    <h1 class="content-header-title text-uppercase">GST Data</h1>
	  </div>

		<div class="content-header-right col-md-6 col-12 mb-1">
		  <?php echo form_open('report/gstdata', array('id'=>'filterForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>

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
                        <th>REC Date</th>
                        <th>INV Date</th>
                        <th>INV #</th>
                        <th class='text-right'>Net Amount</th>
                        <th class='text-right'>CGST</th>
                        <th class='text-right'>SGST</th>
                        <th class='text-right'>IGST</th>
                        <th class='text-right'>Total Amount</th>
                        <th>Payment Id</th>
                        <th>Fullname</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <!--<th>GST No</th>-->
                        <th>City</th>
                        <th>State</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                        $totalamount = $netamount = $cgst = $sgst = $igst = 0;

                        if(count($gstlist)) {
                        	$cnt=1; 
                        	foreach ($gstlist as $row) {
                        		echo "<tr>";

                        		echo "<td width='50'>".htmlentities($cnt)."</td>";

                            echo "<td>" . DateFormatDisplay($row['rec_date']) . "</td>";

                            echo "<td>".displayDate($row['inv_date'])."</td>";

                            echo "<td>".$row['inv_prefix'].$row['inv_number']."</td>";

                        		echo "<td class='text-right'>".formatePriceIndia($row['inv_price'])."</td>";
                            $netamount += $row['inv_price'];

                            echo "<td class='text-right'>".formatePriceIndia($row['inv_cgst'])."</td>";
                            $cgst += $row['inv_cgst'];

                            echo "<td class='text-right'>".formatePriceIndia($row['inv_sgst'])."</td>";
                            $sgst += $row['inv_sgst'];

                            echo "<td class='text-right'>".formatePriceIndia($row['inv_igst'])."</td>";
                            $igst += $row['inv_igst'];

                            echo "<td class='text-right'>".formatePriceIndia($row['inv_grandtotal'])."</td>";
                            $totalamount += $row['inv_grandtotal'];

                            echo "<td>".htmlspecialchars($row['paymentid'] ?? '')."</td>";

                            echo "<td class='text-capitalize'>".htmlentities($row['fullname'])."</td>";

                            echo "<td>".htmlentities($row['mobile'])."</td>";

                            echo "<td width='250' class='dont-break-out'>".htmlentities($row['email'])."</td>";

                            //echo "<td width='250' class='dont-break-out'>".htmlentities($row['gstno'])."</td>";

                            echo "<td>".htmlentities($row['city'])."</td>";

                            echo "<td>".htmlentities($row['state'])."</td>";

                          	echo "</tr>";
                          	$cnt++;
                        	}
                        }

                        echo "<tr class='text-right text-bold-800'>";
                          echo "<td></td>";
                          echo "<td>TOTAL GST</td>";
                          echo "<td>AMOUNT</td>";
                          echo "<td>".formatePriceIndia($netamount)."</td>";
                          echo "<td>".formatePriceIndia($cgst)."</td>";
                          echo "<td>".formatePriceIndia($sgst)."</td>";
                          echo "<td>".formatePriceIndia($igst)."</td>";
                          echo "<td>".formatePriceIndia($totalamount)."</td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                          //echo "<td></td>";
                          echo "<td></td>";
                          echo "<td></td>";
                        echo "</tr>";
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
