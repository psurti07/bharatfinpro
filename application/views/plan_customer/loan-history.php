<?php
$this->load->view('plan_customer/includes/header.php');
?>

<section id="page-title" class="background-dark">
    <div class="container">
        <div class="page-title">
            <h4><i class="fa fa-rupee-sign"></i> My Loan Applications History</h4>
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
                                    <th scope="col">Loan Type</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">CIBIL Score</th>
                                    <th scope="col">Loan Purpose</th>
                                    <th scope="col">Tenure</th>
                                    <th scope="col">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
								$cnt = 1;
								foreach ($loanhistory as $row) {
									echo "<tr>";
									echo "<td>" . $cnt . "</td>";
									echo "<td>" . displayDate($row->rec_date) . "</td>";

									if ($row->loantype == 11) {
										echo "<td>Personal Loan</td>";
									} else if ($row->loantype == 12) {
										echo "<td>Business Loan</td>";
									} else {
										echo "<td>-</td>";
									}
									$enc_id = '';
									$enc_id = stringCrypt($row->id, 'encrypt');
									echo "<td>" . formatePriceIndia($row->loanamount) . "</td>";
									echo "<td>" . htmlentities($row->cibilscore) . "</td>";
									echo "<td>" . htmlentities($row->loanpurpose) . "</td>";
									echo "<td>" . htmlentities($row->loantenure) . "</td>";

									echo "<td class='text-center' width='50'>" . anchor("plan_customer/loan/appdetails/{$enc_id}", '<i class="icon-arrow-right-circle"></i>', 'class="btn btn-icon btn-sm cust-btn-blue"') . "</td>";

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
$this->load->view('plan_customer/includes/footer.php');
?>

<script>
$(document).ready(function() {
    $('#myDatatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
});
</script>