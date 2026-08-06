<?php
    $this->load->view('customer/includes/header.php');
?>

<section id="page-content" class="fullscreen">
	<div class="container">

		<div class="row">
			<div class="col-lg-12 col-md-12">
				<?php echo form_open('customer/dashboard/acceptlicence', array('id'=>'submitForm1', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>

					<input type="hidden" name="customerid" id="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>

					<h2>License Agreement</h2>
					<p><small>Kindly review the licence terms before using the portal.</small></p>
					<hr/>

					<div class="pre-scrollable p-10">
					<?php
						echo $contentdetails->option_value;
					?>
					</div>

					<hr/>
					<p><small>If you accept the terms of the ageement, click "I Agree" to continue.</small></p>

					<div class="form-group">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" aria-required="true" name="agree" id="agree" class="custom-control-input" value="1" required>
							<label class="custom-control-label" for="agree">I accept the terms in the License Agreement.</label>
							<div class="help-block font-small-3"></div>
						</div>
					</div>

					<div class="form-group">
						<button type="submit" id="submit-btn2" class="btn btn-secondary">I AGREE</button>
					</div>
				<?php echo form_close(); ?> 
			</div>
		</div>

	</div>
</section>

<?php
    $this->load->view('customer/includes/footer.php');
?>