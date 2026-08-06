<?php
$this->load->view('includes/header-apply.php');

$amtpay = $productdata['payamount'];
?>

<section class="fullscreen background-grey p-t-80 p-b-10">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12 text-center m-b-20">
				<h4 class="text-dark">Purchase Membership & Instantly Process Your Personal Loan!</h4>
				<h2 class="text-medium m-t-10">Your Personal Loan up to <span class="text-secondary">Rs.10,00,000/-</span> is Ready To Be Processed Ahead</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6 col-md-6 col-12">
				<div class="card">
					<div class="card-body">
						<div class="text-center">
							<img src="<?php echo base_url('assets/images/slider/membership-card-gold.png'); ?>" alt="cardoffer"
							class="img-fluid rounded">
						</div>

						<table class="table m-b-0 membership-table">
							<tbody>
								<tr>
									<td class="text-center" colspan="2">
										<?php
										if ($productdata['offeramount'] != 0) {
											echo '<h4 class="m-b-0">';

											echo 'Rs. <del class="text-danger">' . formatePrice($productdata['amount']) . '</del> ';

											echo '<span class="text-success text-xs">' . formatePrice($productdata['offeramount']) . '</span> only';

											echo '<span class="text-success small"> (' . calPercentage($productdata['amount'], $productdata['offeramount']) . 'off)</span>';

											echo '</h4>';

											$subtotal = $productdata['offeramount'];
										} else {
											echo '<h4>Rs. ' . formatePrice($productdata['amount']) . '</h4>';
											$subtotal = $productdata['amount'];
										}
										?>
									</td>
								</tr>
								<tr>
									<td class="cart-product-name d-text-left">
										<strong>Subtotal</strong>
									</td>
									<td class="cart-product-name text-right">
										<span class="amount">
											<?php echo formatePriceIndia($subtotal); ?>
										</span>
									</td>
								</tr>
								<tr>
									<td class="cart-product-name d-text-left">
										<strong>GST (18%)</strong>
									</td>
									<td class="cart-product-name text-right">
										<span class="amount">
											<?php $gst = $subtotal * 0.18;
											echo formatePriceIndia($gst); ?>
										</span>
									</td>
								</tr>
								<tr>
									<td class="cart-product-name d-text-left">
										<strong>Grand Total</strong>
									</td>
									<td class="cart-product-name text-right">
										<span class="amount color lead"><strong>
												<?php $grandtotal = $subtotal + $gst;
												echo formatePriceIndia($grandtotal); ?>
											</strong></span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-12">
				<div class="card">
					<div class="card-body">
						<?php echo form_open('loan/getmegaoffer', array('id' => 'submitForm1', 'class' => 'form-transparent-grey', 'novalidate' => 'novalidate')); ?>
						<input type="hidden" name="amount" id="amount" value="<?php echo $amtpay; ?>" class="form-control"
							required>
						<input type="hidden" name="paymentid" id="paymentid" value="" class="form-control">

						<h5>Start Your Loan Process With Your Few Details:</h5>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend"><span class="input-group-text" id="basic-addon2">Full
										Name</span></div>
								<input type="text" name="fullname" id="fullname" aria-required="true" class="form-control"
									aria-describedby="basic-addon2" required>
							</div>
							<div class="help-block font-small-3"></div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend"><span class="input-group-text" id="basic-addon3">Mobile
										No</span></div>
								<input type="text" name="mobileno" id="mobileno" aria-required="true" class="form-control"
									aria-describedby="basic-addon3" required maxlength="10"  minlength="10" inputmode="numeric" data-validation-regex-regex="^[6789]\d{9}$" >
							</div>
							<div class="help-block font-small-3"></div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend"><span class="input-group-text" id="basic-addon4">Email Id
										&nbsp; &nbsp;</span></div>
								<input type="email" name="emailid" id="emailid" aria-required="true" class="form-control"
									aria-describedby="basic-addon4" required>
							</div>
							<div class="help-block font-small-3"></div>
						</div>

						<div class="form-group text-left">
							<button type="submit" id="form-submit1" class="btn btn-primary">PROCEED TO PAY</button>
						</div>

						<div class="form-group text-dark">
							<p class="m-b-0">
								<small>By submitting the form &amp; proceeding, you agree to the
									<a href="<?php echo site_url('terms-conditions'); ?>" target="_blank">Terms of Use</a>
									and
									<a href="<?php echo site_url('privacy-policy'); ?>" target="_blank">Privacy Policy</a>
									of Prayoshafincart.com
								</small>
							</p>
						</div>
						
						<?php echo form_close(); ?>

						<div class="form-group text-dark border-top">
							<h5 class="m-t-10 m-b-10 text-dark">Membership Card Benifits:</h5>
							<p class="text-dark small m-b-0">(1) Let you apply for personal loan in multiple banks (2) You get 6 months free loan consultancy (3) Get 35% referral payout bonus (4) Get loan offers from multiple banks anytime-anywhere (5) You stay at home; our team will go to multiple banks for you (6) On-call Assistance on all your doubts</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- testimonial section -->
<section>
	<div class="container">
		<div class="text-center m-b-50">
			<h2 class="text-dark">Our Customers Testimonials</h2>
			<p class="text-dark">Such feedback inspires us to go a mile beyond, every time!</p>
		</div>
		<?php $testimoniallist_a = array('1.png','2.png','3.png','4.png','5.png','6.png','7.png','8.png');?>
		<div class="carousel equalize testimonial testimonial-box" data-margin="20" data-arrows="true" data-dots="false"
			data-items="3" data-items-sm="2" data-items-xxs="1" data-equalize-item=".testimonial-item">
			<?php foreach ($testimoniallist_a as $row) { ?>
				
					
						<img src="<?php echo base_url('assets/images/' . $row); ?>" alt="customer img">
						
					
				
			<?php } ?>
		</div>
	</div>
</section>

<?php
$this->load->view('includes/footer-apply.php');
?>

<script type="text/javascript">
	$(function () {
		$('#submitForm1').on('submit', function (e) {
			$('#form-submit1').attr('disabled', true);
			$('#form-submit1').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESS...');
		});
	});
</script>
