<?php
$this->load->view('includes/header.php');
?>

<section id="page-title">
	<div class="container">
		<div class="breadcrumb text-left">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url('career'); ?>">Career</a></li>
					<li class="breadcrumb-item active" aria-current="page">Apply Now</li>
				</ol>
			</nav>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row">

			<div class="col-lg-12 col-md-12">
				<div class="heading-text heading-plain">
					<h4>
						<?php echo $jobdetails->title; ?>
					</h4>
				</div>
			</div>

			<div class="col-lg-7 col-md-7 col-12">
				<?php echo form_open_multipart('apply/careerSubmission', array('id' => 'submitForm2', 'class' => 'p-cb background-light', 'enctype' => 'multipart/form-data', 'novalidate' => 'novalidate')); ?>
				<input type="hidden" name="id" value="<?php echo $jobdetails->id; ?>" class="form-control" required>
				<input type="hidden" name="slug" value="<?php echo $jobdetails->slug; ?>" class="form-control" required>

				<div class="row">
					<div class="form-group col-md-6">
						<label class="text-dark" for="firstname">First Name</label>
						<input type="text" aria-required="true" name="firstname" id="firstname" class="form-control"
							required>
						<div class="help-block font-small-3"></div>
					</div>

					<div class="form-group col-md-6">
						<label class="text-dark" for="lastname">Last Name</label>
						<input type="text" name="lastname" id="lastname" class="form-control">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<label class="text-dark" for="mobile">Mobile</label>
						<input type="text" aria-required="true" name="mobile" id="mobile" class="form-control" required
							maxlength="10" inputmode="numeric" data-validation-regex-regex="[0-9]+">
						<div class="help-block font-small-3"></div>
					</div>

					<div class="form-group col-md-6">
						<label class="text-dark" for="emailid">Email Id</label>
						<input type="text" aria-required="true" name="emailid" id="emailid" class="form-control"
							required>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<label class="text-dark" for="city">City</label>
						<input type="text" aria-required="true" name="city" id="city" class="form-control" required>
						<div class="help-block font-small-3"></div>
					</div>

					<div class="form-group col-md-6">
						<label class="text-dark" for="qualifications">Qualifications</label>
						<input type="text" aria-required="true" name="qualifications" id="qualifications"
							class="form-control" required>
						<div class="help-block font-small-3"></div>
					</div>
				</div>

				<div class="form-group">
					<label class="text-dark" for="experience">Experience</label>
					<textarea aria-required="true" name="experience" id="experience" class="form-control"
						required></textarea>
					<div class="help-block font-small-3"></div>
				</div>

				<div class="form-group">
					<label class="text-dark" for="keyskills">Key Skills</label>
					<textarea aria-required="true" name="keyskills" id="keyskills" class="form-control"
						required></textarea>
					<div class="help-block font-small-3"></div>
				</div>

				<div class="form-group">
					<label class="text-dark" for="resume">Upload Resume</label>
					<input type="file" aria-required="true" name="resume" id="resume" class="form-control" required
						accept=".doc,.docx,.txt,.pdf">
					<div class="help-block font-small-3"></div>
				</div>

				<div class="form-group">
					<label class="text-dark">
						<small>By submitting the form &amp; proceeding, you agree to the
							<a href="<?php echo site_url('terms-conditions'); ?>" target="_blank">Terms of Use</a> and
							<a href="<?php echo site_url('privacy-policy'); ?>" target="_blank">Privacy Policy</a> of
							Prayoshafincart.com
						</small>
					</label>
					<div class="help-block font-small-3"></div>
				</div>

				<div class="form-group">
					<button type="submit" id="submit-btn2" class="btn btn-primary">APPLY NOW</button>
				</div>

				<div class="form-group" id="applymessage"></div>
				<?php echo form_close(); ?>
			</div>

			<div class="col-lg-5 col-md-5 col-12 pt-4">
				<?php echo $jobdetails->descriptions; ?>
			</div>

		</div>
	</div>
</section>

<?php
$this->load->view('includes/footer.php');
?>

<script type="text/javascript">
	$(function () {
		$('#submitForm2').on('submit', function (e) {
			e.preventDefault();
			var formData = new FormData($(this)[0]);

			$.ajax({
				url: $(this).attr('action'),
				type: "POST",
				data: formData,
				async: true,
				dataType: "JSON",
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function () {
					$('#submit-btn2').html('Document uploading... <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
					$('#submit-btn2').attr('disabled', true);
				},
				success: function (response) {
					if (response['success'] == true) {
						document.getElementById("submitForm2").reset();
					}

					document.getElementById("applymessage").innerHTML = response['message'];
					$.notify({ message: response['message'] }, { type: 'success' });
					$('#submit-btn2').html('APPLY NOW');
					$('#submit-btn2').attr('disabled', false);
				},
				error: function (jXHR, textStatus, errorThrown) {
					$('#submit-btn2').html('APPLY NOW');
					$('#submit-btn2').attr('disabled', false);
					$.notify({ message: errorThrown }, { type: 'danger' });
				}
			});
		});
	});
</script>
