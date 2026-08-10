<?php
include_once(APPPATH . 'views/includes/header.php');

if ($loantype == 'pl') {
  $loanid = 21;
  $loanname = 'Personal Loan';
} else if ($loantype == 'bl') {
  $loanid = 22;
  $loanname = 'Business Loan';
} else {
  $loanid = 99;
  $loanname = 'All Loan';
}
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("126").className += " active";
    document.getElementById("126" + <?php echo $loanid; ?>).className += " active";
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
    background: rgba(255, 255, 255, 0.8) url("<?php echo base_url('assets/images/spinner.gif'); ?>") center no-repeat;
}

/* Turn off scrollbar when body element has the loading class */
body.loading {
    overflow: hidden;
}

/* Make spinner image visible when body element has the loading class */
body.loading .overlay {
    display: block;
}
</style>
<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Report - Plan Leads - <?php echo $loanname; ?></h1>
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
                            <canvas id="column-chart" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-content collapse show">
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Year</th>
                                        <th>Month</th>
                                        <th>Total Leads</th>
                                        <th>DateWise</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                  $grandtotal = 0;
                  $barlabel = $bardata = "";

                  if (count($datalist)) {
                    foreach ($datalist as $row) {
                      echo "<tr>";
                      echo "<td>" . htmlentities($row->recyear) . "</td>";
                      echo "<td>" . htmlentities($row->recmonth) . "</td>";
                      echo "<td class='text-right'>" . htmlentities(number_format($row->totaluser, 0)) . "</td>";
                      echo "<td class='text-center' width = '50px'><button type = 'button' class = 'btn btn-icon btn-outline-dark btn-sm model_data' data-toggle='modal' data-target='#modaldata' id='$row->recyear' data-id='$row->recmonth' data-ids='$row->monthno'><i class='la la-info'></i>View Datewise</button></td>";
                      $grandtotal += $row->totaluser;
                      $barlabel .= "'" . $row->recyear . " - " . $row->recmonth . "',";
                      $bardata .= $row->totaluser . ",";

                      echo "</tr>";
                    }
                  }
                  ?>
                                </tbody>
                                <tfoot>
                                    <tr class='text-right text-bold-600'>
                                        <td colspan="2">Total Leads</td>
                                        <td><?php echo number_format($grandtotal, 0); ?></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade" id="modaldata" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md" role="document">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 id='clickmonthname'></h3><br>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body" style="overflow-y:scroll; height:400px;">
                <table class="table table-bordered table-sm" id="modal-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th class='text-right'>Total Leads</th>
                        </tr>
                    </thead>
                    <tbody id="table_data">

                    </tbody>
                    <tfoot>
                        <tr class='text-right text-bold-600'>
                            <td>Total Leads</td>
                            <td>
                                <div id="subtotalleads"></div>
                            </td>

                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end modal-->
<?php
include_once(APPPATH . 'views/includes/footer.php');
?>

<script type="text/javascript">
$(document).on({
    ajaxStart: function() {
        $("body").addClass("loading");
    },
    ajaxStop: function() {
        $("body").removeClass("loading");
    }
});
$(document).ready(function() {
    var ctx = $("#column-chart");

    var chartOptions = {
        elements: {
            rectangle: {
                borderWidth: 2,
                borderColor: 'rgb(0, 255, 0)',
                borderSkipped: 'bottom'
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration: 500,
        legend: {
            position: 'top',
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }]
        },
    };

    // Chart Data
    var chartData = {
        labels: [<?php echo $barlabel; ?>],
        datasets: [{
            label: "Total Leads",
            data: [<?php echo $bardata; ?>],
            backgroundColor: "#F9A825",
            hoverBackgroundColor: "#f6c980",
            borderColor: "transparent"
        }]
    };

    var config = {
        type: 'bar',
        options: chartOptions,
        data: chartData
    };

    var lineChart = new Chart(ctx, config);

    reset_modal_data();

    $('.model_data').on('click', function() {
        reset_modal_data();
        var month_name = $(this).attr('data-id');
        var month = $(this).attr('data-ids');
        var year = $(this).attr('id');
        var loantype = "<?php echo $loantype; ?>";
        console.log(loantype);
        if (month) {
            $.ajax({
                url: '<?php echo base_url("report/planleadsdaywise"); ?>',
                type: "POST",
                data: {
                    'loantype': loantype,
                    'month': month,
                    'year': year
                },
                dataType: "json",
                beforeSend: function() {
                    reset_modal_data();
                },
                success: function(response) {
                    var raw_data = '';
                    var total_leads = 0;
                    for (i = 0; i < response.length; i++) {
                        raw_data += '<tr>';
                        raw_data += '<td>' + response[i].recdate + '</td>';
                        raw_data += '<td class="text-right">' + response[i].totaluser +
                            '</td>';
                        raw_data += '</tr>';
                        total_leads += parseInt(response[i].totaluser);
                    }
                    if (raw_data) {
                        $('#subtotalleads').html(total_leads);
                    }
                    $('#table_data').html(raw_data);
                    $('#clickmonthname').html(month_name + ' - ' + year);
                }
            });
        } else {
            reset_modal_data();
        }
    });

    function reset_modal_data() {
        $('#table_data').empty();
        $('#clickmonthname').empty();
        $('#subtotalleads').val('0');
    }
});
</script>