<?php
    $this->load->view('plan_customer/includes/header.php');
?>

<section id="page-title" class="background-dark">
	<div class="container">
		<div class="page-title">
			<h4><i class="fa fa-tags"></i> Loan Application</h4>
		</div>
	</div>
</section>

<section id="page-content" class="fullscreen">
	<div class="container">
		<div class="row">
			
			<!-- START : SUCCESS -->
			<?php if($status == "true") { 
				echo form_open('#', array('class'=>'col-md-12')); ?>
				<div class="col-lg-12 col-md-12 col-sm-12 p-0 m-0">
					<!-- <meta http-equiv="refresh" content="10;URL=<?php echo site_url(); ?>">  -->
					<div class="m-t-30 text-center">
						<h1 class="icon pulse infinite text-success m-0" data-animate="pulse infinite"><i class="icon-check-circle "></i></h1>
						<h2 class="text-success">Congratulations!</h2>
						<p>Your loan application has been successfully submmited. <br/>Please check your email and submit required documents and company executive call you back soon!</p>
					</div>
				</div>
			<?php echo form_close();  } ?>
			<!-- END : SUCCESS -->


			<!-- START : FAIL -->
			<?php if($status == "false") { 
				echo form_open('#', array('class'=>'col-md-12')); ?>
				<div class="col-lg-12 col-md-12 col-sm-12 p-0 m-0">
					<!-- <meta http-equiv="refresh" content="10;URL=<?php echo site_url(); ?>"> -->
					<div class="m-t-30 text-center">
						<h1 class="icon pulse infinite text-danger m-0" data-animate="pulse infinite"><i class="icon-x-circle "></i></h1>
						<h2 class="text-danger">Ops!</h2>
						<p>Your loan application payment process has failed. Please try again. <br/> If you have any questions you can contact on our customer care number.</p>
					</div>
				</div>
			<?php echo form_close();  } ?>
			<!-- END : FAIL -->

		</div>
	</div>
</section>

<?php
    $this->load->view('customer/includes/footer.php');
?>