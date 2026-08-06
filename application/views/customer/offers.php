<?php
    $this->load->view('customer/includes/header.php');

    $pllink = $bllink = "#";

    if($profiledata->cardtype == 11) {
    	$pllink = site_url('customer/digital/personalLoan');
    	$bllink = site_url('digital/businessLoan');
    }
    else if($profiledata->cardtype == 12) {
    	$pllink = site_url('digital/personalLoan');
    	$bllink = site_url('customer/digital/businessloan');
    }
?>

<section id="page-title" class="background-dark">
	<div class="container">
		<div class="page-title">
			<h4><i class="fa fa-tags"></i>Apply Now</h4>
		</div>
	</div>
</section>

<section id="page-content" class="fullscreen">
	<div class="container">
		<div class="heading-text heading-line text-center">
			<h4 class="text-medium font-weight-500">Most Selling Online Product We Offer</h4>
		</div>

		<div class="row">
			<div class="col-lg-6">
				<div class="icon-box effect medium center process fullwidth">
					<div class="icon"><a href="#"><i class="fa fa-desktop"></i></a></div>
					<h3 class="p-b-20">Digital Perosnal Loan</h3>
					<a href="<?php echo $pllink; ?>" class="item-link text-theme">APPLY NOW <i class="fa fa-arrow-right"></i></a>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="icon-box effect medium center process fullwidth">
					<div class="icon"><a href="#"><i class="fa fa-coins"></i></a></div>
					<h3 class="p-b-20">Digital Business Loan</h3>
					<a href="<?php echo $bllink; ?>" class="item-link text-theme">APPLY NOW <i class="fa fa-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
    $this->load->view('customer/includes/footer.php');
?>