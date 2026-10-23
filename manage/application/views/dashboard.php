<?php
include_once(APPPATH . 'views/includes/header.php');
$barlabel1 = $bardata1 = $barlabel2 = $bardata2 = $barlabel3 = $bardata3 = $barlabel4 = $bardata4 = $barlabel5 = $bardata5 = $barlabel6 = $bardata6 = "";

if($userrole == 0 || $userrole == 1){

if (count($digitalcustlist)) {
	foreach ($digitalcustlist as $row) {
		$barlabel1 .= "'" . $row->recday . " - " . $row->recmonth . "',";
		$bardata1 .= $row->totaluser . ",";
	}
}

if (count($digitalleadlist)) {
	foreach ($digitalleadlist as $row) {
		$barlabel2 .= "'" . $row->recday . " - " . $row->recmonth . "',";
		$bardata2 .= $row->totaluser . ",";
	}
}

if (count($plancustlist)) {
	foreach ($plancustlist as $row) {
		$barlabel3 .= "'" . $row->recday . " - " . $row->recmonth . "',";
		$bardata3 .= $row->totaluser . ",";
	}
}

if (count($planleadlist)) {
	foreach ($planleadlist as $row) {
		$barlabel4 .= "'" . $row->recday . " - " . $row->recmonth . "',";
		$bardata4 .= $row->totaluser . ",";
	}
}
}
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("101").className += " active";
}
</script>

<div class="content-body">
    <div class="row">
        <div class="col-12">
            <?php
			if (!empty($ac_data)) {
			?>
            <div class="alert alert-<?php echo $ac_data['ac_class'] ?> fade show" role="alert">
                <h4><?php echo $ac_data['ac_title'] ?></h4>
                <p><?php echo $ac_data['ac_msg'] ?></p>
            </div>
            <?php
			}
			?>
            <h2 class="text-bold-600 text-center">Digital Today's Statistics - <?php echo date('d M, Y'); ?></h2>
            <hr />
        </div>
    </div>

    <div class="row">
        <!-- Digital Loan -->
        <div class="col-12 col-md-6">
				<div class="card">
					<div class="card-content collapse show">
						<h2 class="text-center pt-1">Digital Customer Registrations</h2>
						<div class="card-body">
							<canvas id="column-chart-digital-customer" height="300"></canvas>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-6">
				<div class="card">
					<div class="card-content collapse show">
						<h2 class="text-center pt-1">Digital Customer Leads</h2>
						<div class="card-body">
							<canvas id="column-chart-digital-leads" height="300"></canvas>
						</div>
					</div>
				</div>
			</div>  
        </div>
        <div class="row">
			<div class="col-12 col-md-6">
				<div class="card">
					<div class="card-content collapse show">
						<h2 class="text-center pt-1">Plan Customer Registrations</h2>
						<div class="card-body">
							<canvas id="column-chart-plan-customer" height="300"></canvas>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-6">
				<div class="card">
					<div class="card-content collapse show">
						<h2 class="text-center pt-1">Plan Customer Leads</h2>
						<div class="card-body">
							<canvas id="column-chart-plan-leads" height="300"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>

</div>

<?php
include_once(APPPATH . 'views/includes/footer.php');
?>


<script type="text/javascript">
	$(document).ready(function () {
		var digitalcustomer = $("#column-chart-digital-customer");
		var digitalleads = $("#column-chart-digital-leads");

		var plancustomer = $("#column-chart-plan-customer");
		var planleads = $("#column-chart-plan-leads");

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

		// Chart Data Customer
		var chartData1 = {
			labels: [<?php echo $barlabel1; ?>],
			datasets: [{
				label: "Registrations",
				data: [<?php echo $bardata1; ?>],
				backgroundColor: "#ef801c",
				hoverBackgroundColor: "#423e3a",
				borderColor: "transparent"
			}]
		};

		var config1 = {
			type: 'bar',
			options: chartOptions,
			data: chartData1
		};

		var lineChart = new Chart(digitalcustomer, config1);

		// Chart Data Leads
		var chartData2 = {
			labels: [<?php echo $barlabel2; ?>],
			datasets: [{
				label: "Leads",
				data: [<?php echo $bardata2; ?>],
				backgroundColor: "#ef801c",
				hoverBackgroundColor: "#423e3a",
				borderColor: "transparent"
			}]
		};

		var config2 = {
			type: 'bar',
			options: chartOptions,
			data: chartData2
		};

		var lineChart = new Chart(digitalleads, config2);

		// Chart Data Plan Customer
		var chartData3 = {
			labels: [<?php echo $barlabel3; ?>],
			datasets: [{
				label: "Registrations",
				data: [<?php echo $bardata3; ?>],
				backgroundColor: "#029750",
				hoverBackgroundColor: "#0FB365",
				borderColor: "transparent"
			}]
		};

		var config3 = {
			type: 'bar',
			options: chartOptions,
			data: chartData3
		};

		var lineChart = new Chart(plancustomer, config3);

		// Chart Data Plan Leads
		var chartData4 = {
			labels: [<?php echo $barlabel4; ?>],
			datasets: [{
				label: "Leads",
				data: [<?php echo $bardata4; ?>],
				backgroundColor: "#029750",
				hoverBackgroundColor: "#0FB365",
				borderColor: "transparent"
			}]
		};

		var config4 = {
			type: 'bar',
			options: chartOptions,
			data: chartData4
		};

		var lineChart = new Chart(planleads, config4);
	});
</script>

<script type="text/javascript">
setTimeout(function() {
    location.reload();
}, 180000);
</script>