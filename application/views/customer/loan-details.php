<?php
    $this->load->view('customer/includes/header.php');
?>

<section id="page-title" class="background-dark">
	<div class="container">
		<div class="page-title">
			<h4><i class="fa fa-rupee-sign"></i> My Loan Application Details</h4>
		</div>
	</div>
</section>


<section id="page-content" class="fullscreen">
	<div class="container" style="overflow: auto;">

		<div class="content">
			<div class="row">
				<div class="col-md-12">
					<?php 
                  	switch($appdetails->status) {
                      case "5":
                        echo '<div role="alert" class="alert alert-info"> Your application is reopen again for process. Please contact customer care for more details.</div>';
                      break;

                      case "4":
                        echo '<div role="alert" class="alert alert-warning"> Your application is under query processing. Please contact customer care for more details.</div>';
                      break;

                      case "3":
                        echo '<div role="alert" class="alert alert-danger"> Your application has been completely rejected. Please contact customer care for more details.</div>';
                      break;

                      case "2":
                        echo '<div role="alert" class="alert alert-success"> Your application has been approved. Please contact customer care for more details.</div>';
                      break;

                      default:
                      break;
                  	}
               		?>
				</div>
			</div>

			<div class="row p-cb process border-top-dark">
				<div class="col-md-6">
					<h5>Loan Type : <strong><?php 
	                    if($appdetails->loantype == 11) {
	                      echo 'Personal Loan';
	                    } else if($appdetails->loantype == 12) {
	                      echo 'Business Loan';
	                    }
	                  ?></strong></h5>
	                <hr/>

	                <h5>Loan Amount : <strong><?php echo formatePriceIndia($appdetails->loanamount); ?></strong></h5>
	                <hr/>

	                <h5>Loan Tenure : <strong><?php echo $appdetails->loantenure; ?></strong></h5>
	                <hr/>

	                <h5>Loan Purpose : <strong><?php echo $appdetails->loanpurpose; ?></strong></h5>
				</div>

				<div class="col-md-6">
					<h5>CIBIL Score : <strong><?php echo $appdetails->cibilscore; ?></strong></h5>
					<hr/>

					<h5>Income : <strong><?php echo formatePriceIndia($appdetails->income); ?></strong></h5>
					<hr/>

					<h5>Current EMI : <strong><?php echo $appdetails->currentemi; ?></strong></h5>
					<hr/>

					<h5>EMI Bounce : <strong><?php 
		                if($appdetails->emibounce == 0) {
		                  echo 'No';
		                } else if($appdetails->emibounce == 1) {
		                  echo 'Yes';
		                } else {
		                  echo '-';
		                } ?></strong></h5>
				</div>
			</div>

			<div class="row m-t-30">
				<div class="col-md-12">
					<div class="p-cb process border-top-dark">
						<table id="myDatatable" class="table table-hover dt-responsive">
	     					<thead>
	     						<tr>
	                                <th scope="col"></th>
			                        <th scope="col">Status</th>
			                        <th scope="col">Date</th>
			                        <th scope="col">Bank</th>
			                        <th scope="col">Loan Amount</th>
			                        <th scope="col">ROI</th>
			                        <th scope="col">Terms</th>
			                        <th scope="col">Process Fees</th>
			                        <th scope="col">Insurance</th>
			                        <th scope="col">Monthly EMI</th>
			                        <th scope="col">Remarks</th>
	     						</tr>
	     					</thead>
	     					<tbody>
	     						<?php
	     						if(count($statuslist)) {
		                          foreach ($statuslist as $row) {
		                            echo "<tr class='table-".$row->colorclass."'>";
		                            echo "<td></td>";
		                          
		                            echo "<td><strong>".htmlentities($row->statusname)."</strong></td>";
		                            echo "<td>".displayDate($row->statusdate).' '.displayTime($row->rec_date)."</td>";
		                            echo "<td>".htmlentities($row->bank_name)."</td>";
		                            echo "<td class='text-right'>".formatePriceIndia($row->loanamount)."</td>";
		                            echo "<td>".htmlentities($row->loanroi)."</td>";
		                            echo "<td>".htmlentities($row->loanterms)."</td>";
		                            echo "<td>".htmlentities($row->processfees)."</td>";
		                            echo "<td>".htmlentities($row->insurance)."</td>";
		                            echo "<td>".htmlentities($row->monthlyemi)."</td>";
		                            echo "<td>".htmlentities($row->remarks)."</td>";
		                            echo "</tr>";
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

<?php
    $this->load->view('customer/includes/footer.php');
?>

<script>
$(document).ready(function() {
    $('#myDatatable').DataTable( {
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>
