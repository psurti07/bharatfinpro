<?php
$this->load->view('includes/header-apply.php');

$amtpay = $productdata['payamount'];
$eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']);
?>

<section>
	<div class="container">
		<div class="row">
			<!-- START : CHECK ELIGIBLITY -->
			<div class="col-lg-8 col-md-8 col-12">
				<div class="card border-2 border-primary">
					<div class="card-body">
						<h3>Digital <?php echo $userdetails['loanname']; ?> Application Process</h3>
						
						<p>Congrats! Buy Membership Now To Unlock Your <strong class="text-secondary">Rs. <?php echo formatePriceIndia($eligibilityamt); ?></strong> Pre-Approved Loan Offer Instantly!</p>

						<div class="seperator"></div>
						
						<?php echo form_open('digital/checkoutDigital', array('id' => 'submitForm3', 'class' => 'row', 'novalidate' => 'novalidate')); ?>
							<input type="hidden" name="loantype" id="loantype" value="<?php echo $userdetails['loantype']; ?>" class="form-control" required>
							
							<input type="hidden" name="applyid" id="applyid" value="<?php echo $userdetails['applyid']; ?>" class="form-control" required>
							
							<input type="hidden" name="fullname" id="fullname" value="<?php echo $userdetails['fullname']; ?>" class="form-control" required>

							<input type="hidden" name="mobile" id="mobile" value="<?php echo $userdetails['mobile']; ?>" class="form-control" required>
							
							<input type="hidden" name="email" id="email" value="<?php echo $userdetails['email']; ?>" class="form-control" required>
							
							<input type="hidden" name="orderAmount" id="orderAmount" value="<?php echo $amtpay; ?>" class="form-control" required>

							<input type="hidden" name="paymentid" id="paymentid" value="" class="form-control">

							<div class="form-group col-md-12 text-center">
								<div class="credit">
									<div
										class="credit__front credit__part <?php echo strtolower($userdetails['cardname']) . '-card'; ?>">
										<div class="credit__head"></div>
										<p class="credit_numer text-left">**** **** ****
											<?php echo random_code(4); ?>
										</p>
										<div class="credit__space-full text-left">
											<span class="credit__label">VALID FROM
												<?php echo date('d/m/Y'); ?> VALID TO
												<?php echo date('d/m/Y', strtotime('+3 months')); ?>
											</span>
											<p class="credit__info">
												<?php echo $userdetails['fullname']; ?>
											</p>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group col-lg-12 col-md-12 col-sm-12 m-b-0">
								<h4 class="text-center">Membership Card</h4>
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
										<tr>
											<td class="cart-product-name text-center" colspan="2">
												<button type="submit" id="form-submit3" class="btn new-btn-color">BUY
													NOW</button>
											</td>
										</tr>
									</tbody>
								</table>
								<div id="resmessage"></div>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
			<!-- END : CHECK ELIGIBLITY -->

			<div class="col-lg-4 col-md-4 col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="wizard clearfix" data-style="1">
							<p class="small m-b-0">Process Steps: </p>
							<div class="steps clearfix m-0">
								<ul role="tablist">
									<li role="tab" class="current"><a href="#"><span class="number">1</span><span class="title">Quick Registration</span></a></li>

									<li role="tab" class="current"><a href="#"><span class="number">2</span><span class="title">Check Eligibility</span></a></li>

									<li role="tab" class="current"><a href="#"><span class="number">3</span><span class="title">Get Pre-Approval Offer</span></a></li>

									<li role="tab" class="current"><a href="#"><span class="number">4</span><span class="title">Buy Membership Card</span></a></li>
								</ul>
							</div>
						</div>

						<ul class="list-group list-group-flush">
							<li class="list-group-item"><strong>User Details : </strong></li>
							<li class="list-group-item">Loan : <?php echo $userdetails['loanname']; ?></li>
							<li class="list-group-item">Loan Amount : <?php echo formatePriceIndia($userdetails['loanamount']); ?></li>
							<li class="list-group-item">Name : <?php echo $userdetails['fullname']; ?></li>
							<li class="list-group-item">Mobile no. : <?php echo $userdetails['mobile']; ?></li>
						</ul>
					</div>
				</div>

				<?php
				$testimonialimg = array('testimonial-1.jpg', 'testimonial-2.jpg', 'testimonial-3.jpg', 'testimonial-4.jpg');
				?>
				
				<div class="carousel equalize testimonial testimonial-box" data-margin="20" data-arrows="false" data-dots="true"
					data-items="1" data-items-sm="1" data-items-xxs="1" data-equalize-item=".testimonial-item">
					<?php foreach ($testimonialimg as $row) { ?>
						<div class="">
							<img src="<?php echo base_url('assets/images/customers/' . $row); ?>" alt="testimonial">
						</div>
					<?php } ?>
				</div>
			</div>

		</div>
	</div>
</section>

<?php
$this->load->view('includes/footer-apply.php');
?>

<script type="text/javascript">
	$(function () {
		$('#submitForm3').on('submit', function (e) {
			e.preventDefault();

			$('#form-submit3').attr('disabled', true);
			$('#form-submit3').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESSING...');

			var fullname = document.getElementById('fullname').value;
			var mobile = document.getElementById('mobile').value;
			var email = document.getElementById('email').value;
			var amount = document.getElementById('orderamount').value;

			if (amount != <?php echo $amtpay; ?>) {
				amount = <?php echo $amtpay; ?>
			}

			var options = {
				"key": "<?php echo RAZOR_KEY_ID; ?>",
				"amount": (amount * 100).toFixed(),
				"currency": "INR",
				"name": "<?php echo PROJECT_NAME; ?>",
				"description": "Membership Card Purchase",
				"prefill": {
					"name": fullname,
					"email": email,
					"contact": mobile
				},
				"notify": {
					"sms": true,
					"email": true
				},
				"modal": {
					"ondismiss": function () {
						location.reload();
					}
				},
				"handler": function (response) {
					if (response.razorpay_payment_id != "") {
						document.getElementById('paymentid').value = response.razorpay_payment_id;
						document.getElementById('submitForm3').submit();
					}
					else {
						setTimeout(function () {
							location.reload();
						}, 1500);
					}
				}
			};

			var rzp1 = new Razorpay(options);
			rzp1.open();
		});
	});
</script>
