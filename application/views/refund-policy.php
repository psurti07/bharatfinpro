<?php
    $this->load->view('includes/header.php');
?>

<section id="page-title">
	<div class="container">
		<div class="breadcrumb text-left">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
					<li class="breadcrumb-item">Pages</li>
					<li class="breadcrumb-item active" aria-current="page">Refund &amp; Return Policy</li>
				</ol>
			</nav>
		</div>
	</div>
</section>

<section id="section-privacy">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
	                <div class="card-body">
	                	<div class="heading-text heading-line text-uppercase text-center">
							<h4>Refund &amp; Return Policy</h4>
						</div>

						<?php
							echo $contentdetails->option_value;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
    $this->load->view('includes/footer.php');
?>