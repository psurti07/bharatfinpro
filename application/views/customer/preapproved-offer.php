<?php
    $this->load->view('customer/includes/header.php');
?>

<section id="page-title" class="background-dark">
	<div class="container">
		<div class="page-title">
			<h4><i class="fa fa-link"></i> Pre-Approved Loan</h4>
		</div>
	</div>
</section>

<section id="page-content" class="fullscreen">
	<div class="container">
		<div class="heading-text heading-line text-center">
			<h4 class="text-medium font-weight-500">Pre-Approved Loan Offers</h4>
		</div>

		<div class="row">
			<?php 
			if(count($directlinks)) {
	        	foreach ($directlinks as $row) {
			?>
			<div class="col-md-4 col-12">
				<div class="icon-box effect center process m-t-10 m-b-10 p-10 w-100">
					<img alt="" src="<?php echo base_url('assets/images/bank/'.$row->bank_image); ?>">
					
					<a href="<?php echo $row->applyurl; ?>" class="btn btn-dark btn-outline  btn-reveal btn-reveal-right btn-sm m-t-20" target="_blank"><span>Apply Now</span><i class="fa fa-arrow-right"></i></a>
				</div>
			</div>
			<?php 
				}
			} ?>
		</div>
	</div>
</section>

<?php
    $this->load->view('customer/includes/footer.php');
?>