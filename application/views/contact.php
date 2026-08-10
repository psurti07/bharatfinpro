<?php
$this->load->view('includes/header.php');
?>

<section id="page-title">
	<div class="container">
		<div class="breadcrumb text-left">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
				</ol>
			</nav>
		</div>
	</div>
</section>

<section id="contact">
	<div class="container">
		<div class="row">

			<div class="col-lg-5 m-b-30">
				<div class="heading-text heading-plain">
					<h4>Get in touch</h4>
				</div>

				<div>
					<p><a href="tel:<?php echo COMPANY_MOBILE; ?>"><i class="fa fa-phone m-r-5"></i>
							<?php echo COMPANY_MOBILE; ?>
						</a></p>
					<p><a href="mailto:<?php echo COMPANY_EMAIL; ?>"><i class="fa fa-envelope m-r-5"></i>
							<?php echo COMPANY_EMAIL; ?>
						</a></p>
					<p><i class="fa fa-map-marker m-r-5"></i> Registered Office: <br />
						<?php echo COMPANY_ADDRESS; ?>
					</p>
				</div>

				<div class="social-icons social-icons-colored social-icons-rounded float-left">
					<h6>Stay Connected:</h6>
					<ul>
						<?php if (SM_GOOGLE != "#") { ?>
							<li class="social-google"><a href="<?php echo SM_GOOGLE; ?>" target="_blank" rel="nofollow"><i
										class="fab fa-google-plus-g"></i></a></li>
						<?php } ?>

						<?php if (SM_FACEBOOK != "#") { ?>
							<li class="social-facebook"><a href="<?php echo SM_FACEBOOK; ?>" target="_blank"
									rel="nofollow"><i class="fab fa-facebook-f"></i></a></li>
						<?php } ?>

						<?php if (SM_INSTAGRAM != "#") { ?>
							<li class="social-instagram"><a href="<?php echo SM_INSTAGRAM; ?>" target="_blank"
									rel="nofollow"><i class="fab fa-instagram"></i></a></li>
						<?php } ?>

						<?php if (SM_TWITTER != "#") { ?>
							<li class="social-twitter"><a href="<?php echo SM_TWITTER; ?>" target="_blank" rel="nofollow"><i
										class="fab fa-twitter"></i></a></li>
						<?php } ?>

						<?php if (SM_LINKEDIN != "#") { ?>
							<li class="social-linkedin"><a href="<?php echo SM_LINKEDIN; ?>" target="_blank"
									rel="nofollow"><i class="fab fa-linkedin"></i></a></li>
						<?php } ?>

						<?php if (SM_PINTEREST != "#") { ?>
							<li class="social-pinterest"><a href="<?php echo SM_PINTEREST; ?>" target="_blank"
									rel="nofollow"><i class="fab fa-pinterest"></i></a></li>
						<?php } ?>

						<?php if (SM_YOUTUBE != "#") { ?>
							<li class="social-youtube"><a href="<?php echo SM_YOUTUBE; ?>" target="_blank" rel="nofollow"><i
										class="fab fa-youtube"></i></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>

			<div class="col-lg-7">
				<?php echo form_open('infopage/contactsubmission', array('id' => 'submitForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
				<input type="hidden" name="do" value="contactsubmission" class="form-control" required>

				<div class="row">
					<div class="form-group col-md-6">
						<label class="text-dark" for="fullname">Full Name *</label>
						<input type="text" aria-required="true" name="fullname" class="form-control" required>
						<div class="help-block font-small-3"></div>
					</div>
					<div class="form-group col-md-6">
						<label class="text-dark" for="email">Mobile no *</label>
						<input type="text" aria-required="true" name="mobile" class="form-control" required>
						<div class="help-block font-small-3"></div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label class="text-dark" for="subject">Subject</label>
						<input type="text" name="subject" class="form-control">
					</div>
					<div class="form-group col-md-6">
						<label class="text-dark" for="email">Email id *</label>
						<input type="email" aria-required="true" name="email" class="form-control" required>
						<div class="help-block font-small-3"></div>
					</div>
				</div>
				<div class="form-group">
					<label class="text-dark" for="message">Message *</label>
					<textarea name="message" rows="5" aria-required="true" class="form-control" required></textarea>
					<div class="help-block font-small-3"></div>
				</div>

				<div class="form-group">
					<label class="text-dark">
						<small>By submitting the form &amp; proceeding, you agree to the
							<a href="<?php echo site_url('terms-conditions'); ?>" target="_blank">Terms of Use</a> and
							<a href="<?php echo site_url('privacy-policy'); ?>" target="_blank">Privacy Policy</a> of
							Bharatfinpro.com
						</small>
					</label>
					<div class="help-block font-small-3"></div>
				</div>

				<button type="submit" id="submit-btn" class="btn btn-primary">Send Message</button>

				<div id="response"></div>
				<?php echo form_close(); ?>
			</div>

		</div>
	</div>
</section>

<section class="no-padding">
	<iframe
		src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1563.668724074667!2d72.82614932350613!3d21.229788683542974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04eb897c87987%3A0xf8a3f451c7e1f6e7!2sBapa%20Sitaram%20Chowk%2C%20Magan%20Nagar%2C%20Subhash%20Nagar%20Society%2C%20Katargam%2C%20Surat%2C%20Gujarat%20395004!5e0!3m2!1sen!2sin!4v1635237886996!5m2!1sen!2sin"
		width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</section>

<?php
$this->load->view('includes/footer.php');
?>


<script type="text/javascript">
	$(function () {
		$('#submitForm').on('submit', function (e) {
			e.preventDefault();

			$.ajax({
				url: $(this).attr('action') || window.location.pathname,
				type: "POST",
				data: new FormData(this),
				dataType: "JSON",
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function () {
					$('#submit-btn').html("submiting...");
					$('#submit-btn').attr('disabled', true);
				},
				success: function (response) {
					if (response['success'] == true) {
						$.notify({ message: response['message'] }, { type: 'success' });
						$('#submitedmessage').html(response['message']);
						location.reload(2000);
					}
					else {
						$.notify({ message: response['message'] }, { type: 'danger' });
					}
				},
				error: function (jXHR, textStatus, errorThrown) {
					$.notify({ message: errorThrown }, { type: 'danger' });
				}
			});
		});
	});
</script>
