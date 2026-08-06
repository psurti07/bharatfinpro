<?php
$this->load->view('includes/header-apply.php');

$amtpay = $productdata['payamount'];

$eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']);
?>

<section class="background-blue-chalk p-t-40">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 pb-4 text-center">
				<h2>Digital Application Process</h2>
				<p>Buy Membership & Get Your Pre-Approved Loan Offer Quickly</p>

				<div class="wizard clearfix" data-style="3">
					<div class="steps clearfix m-0">
						<ul role="tablist">
							<li role="tab" class="current"><a href="#"><span class="number">1</span><span
										class="title">Quick Registration</span></a></li>
							<li role="tab" class="current"><a href="#"><span class="number">2</span><span
										class="title">Check Eligibility</span></a></li>
							<li role="tab" class="current"><a href="#"><span class="number">3</span><span
										class="title">Get Pre-Approval Offer</span></a></li>
							<li role="tab" class="current"><a href="#"><span class="number">4</span><span
										class="title">Buy Membership Card</span></a></li>
							<li role="tab" class="disabled"><a href="#"><span class="number">5</span><span
										class="title">Submit Documents</span></a></li>
							<li role="tab" class="disabled"><a href="#"><span class="number">6</span><span
										class="title">Get Sanctioned</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="reservation-form-over no-padding">
	<div class="container">
		<div class="row p-cb">
			<!-- START : GET MEMBERSHIP CARD -->
			<?php echo form_open('digital/checkoutDigital', array('id' => 'submitForm3', 'class' => 'w-100', 'novalidate' => 'novalidate')); ?>
			<div class="col-lg-12 col-md-12 col-sm-12 p-b-20 m-0 text-center">
				<h4>Congrats! Buy Membership Now To Unlock Your <strong class="text-success">Rs.
						<?php echo formatePriceIndia($eligibilityamt); ?>
					</strong> Pre-Approved Loan Offer Instantly!</h4>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 p-0 m-0">
				<input type="hidden" name="loantype" id="loantype" value="<?php echo $userdetails['loantype']; ?>"
					class="form-control" required>

				<input type="hidden" name="applyid" id="applyid" value="<?php echo $userdetails['applyid']; ?>"
					class="form-control" required>

				<input type="hidden" name="fullname" id="fullname" value="<?php echo $userdetails['fullname']; ?>"
					class="form-control" required>

				<input type="hidden" name="mobile" id="mobile" value="<?php echo $userdetails['mobile']; ?>"
					class="form-control" required>

				<input type="hidden" name="email" id="email" value="<?php echo $userdetails['email']; ?>"
					class="form-control" required>

				<input type="hidden" name="orderamount" id="orderamount" value="<?php echo $amtpay; ?>"
					class="form-control" required>

				<div class="row">
					<div class="col-md-6 text-center">
						<div class="p-cb">
							<div class="credit">
								<div
									class="credit__front credit__part <?php echo strtolower($userdetails['cardname']) . '-card'; ?>">
									<div class="credit__head">
									</div>
									<p class="credit_numer text-left">**** **** ****
										<?php echo random_code(4); ?>
									</p>
									<div class="credit__space-full text-left">
										<span class="credit__label">VALID FROM
											<?php echo date('d/m/Y'); ?> VALID TO
											<?php echo date('d/m/Y', strtotime('+1 years')); ?>
										</span>
										<p class="credit__info">
											<?php echo $userdetails['fullname']; ?>
										</p>
									</div>
								</div>
							</div>
							<div class="form-group col-lg-12 col-md-12 col-sm-12 m-b-0">
								<h4 class="text-center">Membership Special Offer</h4>
								<table class="table m-b-0 membership-table">
									<tbody>
										<tr>
											<td class="text-center" colspan="2">
												<?php
												if ($productdata['offeramount'] != 0) {
													echo '<h4 class="m-b-0">';

													echo 'Rs. <del class="text-danger">' . formatePrice($productdata['amount']) . '</del> ';

													echo '<span class="text-success text-bold">' . formatePrice($productdata['offeramount']) . '</span> only';

													echo '<h4>';

													$subtotal = $productdata['offeramount'];
												} else {
													echo '<h4>Rs. ' . formatePrice($productdata['amount']) . '</h4>';
													$subtotal = $productdata['amount'];
												}
												?>
											</td>
										</tr>
										<tr>
											<td class="cart-product-name">
												<strong>Subtotal</strong>
											</td>
											<td class="cart-product-name text-right">
												<span class="amount">
													<?php echo formatePriceIndia($subtotal); ?>
												</span>
											</td>
										</tr>
										<tr>
											<td class="cart-product-name">
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
											<td class="cart-product-name">
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
											<td class="cart-product-name text-right" colspan="2">
												<button type="submit" id="form-submit3" class="btn btn-primary">BUY
													NOW</button>
											</td>
										</tr>
									</tbody>
								</table>

								<div id="resmessage"></div>
							</div>
						</div>
					</div>

				</div>


			</div>
			<?php echo form_close(); ?>
			<!-- END : GET MEMBERSHIP CARD -->

		</div>
	</div>
</section>

<section class="p-b-30">
	<div class="container">
		<div class="heading-text heading-plain text-center">
			<h4>Our NBFC Partners</h4>
		</div>

		<div class="carousel client-logos" data-items="5" data-arrows="true" data-dots="false">
			<?php
			foreach ($banklist as $row) {
				echo '<div class="icon-box box-type effect center process">';
				echo '<img src="' . base_url('assets/images/bank/') . $row->bank_image . '" alt="' . $row->bank_name . '">';
				echo '</div>';
			}
			?>
		</div>
	</div>
</section>

<?php
$this->load->view('includes/footer-apply.php');
?>

<script type="text/javascript">
	$(".animated-progress span").each(function () {
		$(this).animate(
			{
				width: $(this).attr("data-progress") + "%",
			},
			1000
		);
		$(this).text($(this).attr("data-progress") + "%");
	});
</script>