<?php
    $this->load->view('customer/includes/header.php');
?>

<section id="page-title" class="background-dark">
	<div class="container">
		<div class="page-title">
			<h4><i class="fa fa-list"></i> My Customers Loan History</h4>
		</div>
	</div>
</section>


<section id="page-content" class="fullscreen">
	<div class="container" style="overflow: auto;">
		<div class="row">
			<div class="content col-md-12">
				
                    <div class="card process border-top-dark">
                         <div class="card-body p-10">
          				<table id="myDatatable" class="table table-hover">
          					<thead>
          						<tr>
          							<th scope="col">#</th>
          							<th scope="col">Date</th>
          							<th scope="col">Name</th>
          							<th scope="col">Loan Type</th>
          							<th scope="col">Loan Amount</th>
          							<th scope="col">Loan tenure</th>
          							<th scope="col">Loan Purpose</th>
          							<th scope="col">Status</th>
          						</tr>
          					</thead>
          					<tbody>
          						<?php
          						$cnt = 1;
                              	foreach($loanhistory as $row) {
                              		echo "<tr>";
                              		echo "<td>".$cnt."</td>";
                              		echo "<td>".displayDate($row->rec_date)."</td>";
                              		echo "<td class='text-capitalize'>".htmlentities($row->fullname)."</td>";

                              		if($row->loantype == 11) {
                              			echo "<td>Personal Loan</td>";
                              		}
                              		else if($row->loantype == 12) {
                              			echo "<td>Business Loan</td>";
                              		}
                              		else {
                              			echo "<td>-</td>";
                              		}

                              		echo "<td>".formatePriceIndia($row->loanamount)."</td>";
                              		echo "<td>".htmlentities($row->loantenure)."</td>";
                              		echo "<td>".htmlentities($row->loanpurpose)."</td>";

                              		if($row->status == 1) {
                              			echo "<td class='text-warning'>New</td>";
                              		}
                              		else if($row->status == 2) {
                              			echo "<td class='text-success'>Approve</td>";
                              		}
                              		else if($row->status == 3) {
                              			echo "<td class='text-danger'>Rejected</td>";
                              		}
                              		else {
                              			echo "<td>-</td>";
                              		}
                              		echo "</tr>";
                              		$cnt++;
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
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>