<?php
include_once(APPPATH . 'views/includes/header.php');
?>

<script type="text/javascript">
window.onload = function() {
    document.getElementById("136").className += " active";
    document.getElementById("1362").className += " active";
}
</script>

<style>
.overlay {
    display: none;
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 999;
    background: rgba(255, 255, 255, .8) url("<?php echo base_url('assets/images/spinner.gif'); ?>") center no-repeat;
}

body.loading {
    overflow: hidden;
}

body.loading .overlay {
    display: block;
}
</style>

<div class="content-header row">
    <div class="content-header-left col-md-12 mb-1">
        <h1 class="content-header-title text-uppercase">
            Report - Plan Applications
        </h1>
    </div>
</div>

<div class="overlay"></div>

<div class="content-body">

    <section id="configuration">

        <div class="row">

            <div class="col-12">

                <div class="card">

                    <div class="card-content collapse show">

                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered table-sm">

                                    <thead>

                                        <tr>
                                            <th>Year</th>
                                            <th>Month</th>
                                            <th class="text-center">Approved</th>
                                            <th class="text-center">Rejected</th>
                                            <th class="text-center">Query Process</th>
                                            <th class="text-center">Customer Decline</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Datewise</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php

                                        $grandtotal = 0;
                                        $grandApproved = 0;
                                        $grandRejected = 0;
                                        $grandQuery = 0;
                                        $grandCustomerDecline = 0;
                                        $grandTotal = 0;

                                        if (count($datalist)) {
                                            foreach ($datalist as $row) {
                                                $grandApproved += $row->approved;
                                                $grandRejected += $row->rejected;
                                                $grandQuery += $row->queryprocess;
                                                $grandCustomerDecline += $row->customerdecline;
                                                $grandTotal += $row->totalapplication;
                                                echo "<tr>";

                                                echo "<td>" . $row->recyear . "</td>";

                                                echo "<td>" . $row->recmonth . "</td>";

                                                echo "<td class='text-center'>" . $row->approved . "</td>";

                                                echo "<td class='text-center'>" . $row->rejected . "</td>";

                                                echo "<td class='text-center'>" . $row->queryprocess . "</td>";

                                                echo "<td class='text-center'>" . $row->customerdecline . "</td>";

                                                echo "<td class='text-center'>" . $row->totalapplication . "</td>";

                                                echo "<td class='text-center'>
                                                    <button
                                                        type='button'
                                                        class='btn btn-icon btn-outline-dark btn-sm model_data'
                                                        data-month='" . $row->monthno . "'
                                                        data-year='" . $row->recyear . "'
                                                        data-status='1'
                                                        data-statusname='" . $row->recmonth . " " . $row->recyear . " - Daywise Application Report'
                                                        data-toggle='modal'
                                                        data-target='#modaldata'>
                                                        <i class='la la-info'></i>View Datewise
                                                    </button>
                                                </td>";

                                                echo "</tr>";

                                                $grandtotal += $row->totalapplication;
                                            }
                                        }

                                        ?>

                                    </tbody>

                                    <tfoot>
                                        <tr class="font-weight-bold">

                                            <td colspan="2">Grand Total</td>

                                            <td class="text-center"><?php echo $grandApproved; ?></td>

                                            <td class="text-center"><?php echo $grandRejected; ?></td>

                                            <td class="text-center"><?php echo $grandQuery; ?></td>

                                            <td class="text-center"><?php echo $grandCustomerDecline; ?></td>

                                            <td class="text-center"><?php echo $grandTotal; ?></td>

                                            <td></td>

                                        </tr>
                                    </tfoot>
                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

<div class="modal fade" id="modaldata" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 id="clickmonthname"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" style="height:400px;overflow-y:auto;">

                <table class="table table-bordered table-sm">

                    <thead>

                        <tr>

                            <th>Date</th>

                            <th class="text-center">Approved</th>

                            <th class="text-center">Rejected</th>

                            <th class="text-center">Query Process</th>

                            <th class="text-center">Customer Decline</th>

                            <th class="text-center">Total</th>

                        </tr>

                    </thead>

                    <tbody id="table_data"></tbody>

                    <tfoot>

                        <tr class="font-weight-bold">

                            <td>Grand Total</td>

                            <td class="text-center" id="totalapproved">0</td>

                            <td class="text-center" id="totalrejected">0</td>

                            <td class="text-center" id="totalqueryprocess">0</td>

                            <td class="text-center" id="totalcustomerdecline">0</td>

                            <td class="text-center" id="grandtotal">0</td>

                        </tr>

                    </tfoot>

                </table>

            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<?php include_once(APPPATH . 'views/includes/footer.php'); ?>

<script>
$(document).on({
    ajaxStart: function() {
        $("body").addClass("loading");
    },
    ajaxStop: function() {
        $("body").removeClass("loading");
    }
});

$('.model_data').click(function() {

    $('#table_data').html('');
    $('#subtotalapplication').html(0);

    $.ajax({

        url: '<?php echo base_url("report/planapplicationdaywise"); ?>',

        type: 'POST',

        dataType: 'json',

        data: {
            month: $(this).data('month'),
            year: $(this).data('year')
        },

        success: function(response) {
            var html = '';

            var approved = 0;
            var rejected = 0;
            var queryprocess = 0;
            var customerdecline = 0;
            var total = 0;

            $.each(response, function(i, row) {

                html += '<tr>';

                html += '<td>' + row.recdate + '</td>';

                html += '<td class="text-center">' + row.approved + '</td>';

                html += '<td class="text-center">' + row.rejected + '</td>';

                html += '<td class="text-center">' + row.queryprocess + '</td>';

                html += '<td class="text-center">' + row.customerdecline + '</td>';

                html += '<td class="text-center">' + row.totalapplication + '</td>';

                html += '</tr>';

                approved += parseInt(row.approved);
                rejected += parseInt(row.rejected);
                queryprocess += parseInt(row.queryprocess);
                customerdecline += parseInt(row.customerdecline);
                total += parseInt(row.totalapplication);

            });

            $('#table_data').html(html);

            $('#totalapproved').html(approved);

            $('#totalrejected').html(rejected);

            $('#totalqueryprocess').html(queryprocess);

            $('#totalcustomerdecline').html(customerdecline);

            $('#grandtotal').html(total);

            $('#clickmonthname').html(
                $('.model_data:focus').data('statusname')
            );

        }

    });

});
</script>