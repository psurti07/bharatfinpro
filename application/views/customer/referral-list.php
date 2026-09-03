<?php
$this->load->view('customer/includes/header.php');
?>

<section id="page-title" class="background-dark">
    <div class="container">
        <div class="page-title">
            <h4><i class="fa fa-users"></i> My Customers</h4>
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
                                    <th scope="col">Registration</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Email Id</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Pay</th>
                                    <th scope="col">Pay Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
								$cnt = 1;
								foreach ($refuserlist as $row) {
									echo "<tr>";
									echo "<td>" . $cnt . "</td>";
									echo "<td>" . displayDate($row->rec_date) . "</td>";
									echo "<td class='text-capitalize'>" . htmlentities($row->fullname) . "</td>";
									echo "<td>" . htmlentities($row->mobile) . "</td>";
									echo "<td>" . htmlentities($row->email) . "</td>";
									echo "<td>" . htmlentities($row->city) . "</td>";

									if ($row->payout == 1) {
										echo "<td class='text-success'>Approved</td>";
									} else if ($row->payout == 2) {
										echo "<td class='text-danger'>Rejected</td>";
									} else {
										echo "<td class='text-dark'>Pending</td>";
									}

									echo "<td>";
									if ($row->payout_date != NULL) {
										echo displayDate($row->payout_date);
									}
									echo "</td>";

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