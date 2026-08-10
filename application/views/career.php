<?php
    $this->load->view('includes/header.php');
?>

<section id="page-title">
	<div class="container">
		<div class="breadcrumb text-left">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Career</li>
				</ol>
			</nav>
		</div>
	</div>
</section>

<section id="career">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
				if(count($openinglist) > 0) {

					echo "<h3>We always strive to bring in stellar individuals for our comprehensive growth!</h3>";
					echo "<p>Do you have the zeal to reshape your career? Come, join us!</p>";

					foreach ($openinglist as $row) {
				?>
					<div class="card">
						<div class="card-body row">
							<div class="col-md-10">
								<h3 class="card-title text-primary"><?php echo $row->title; ?></h3>
								<?php echo $row->descriptions; ?>
							</div>
							<div class="col-md-2 text-right">
								<a href="<?php echo site_url('apply/career/'.$row->slug); ?>" class="btn btn-sm">Apply Now</a>
							</div>
						</div>
					</div>
				<?php 
					}

					echo "<p>Mail your updated CV at hr@bharatfinpro.com or Call on ".COMPANY_MOBILE."</p>";
				}
				else {
					echo "<p>We are looking forward to seeing you in our team, and we will be looking for more helpful people in the future.</p>";
				}
				?>
			</div>
		</div>
		
	</div>
</section>

<?php
    $this->load->view('includes/footer.php');
?>