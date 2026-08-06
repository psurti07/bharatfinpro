<?php
$this->load->view('includes/header-apply.php');

$amtpay = $productdata['payamount'];
$eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']);
?>

<section>
	<div class="container">
		<div class="row">
			<!-- START : MEMBERSHIP CARD -->
			<div class="col-lg-8 col-md-8 col-12 sm-p-0">
				<div class="card border-2 border-primary shadow-none">
				<div class="box">
					<span class="wdp-ribbon wdp-ribbon-two">Offer Valid till 12am</span>
				</div>
					<div class="card-body">
						<h3>Digital <?php echo $userdetails['loanname']; ?> Application Process</h3>
						
						<p>Congrats! Buy Membership Now To Unlock Your <strong class="text-secondary h4">Rs. <?php echo formatePriceIndia($eligibilityamt); ?></strong> Pre-Approved Loan Offer Instantly!</p>

						<div class="seperator"></div>
						
						<?php echo form_open('digital/checkoutDigital', array('id' => 'submitForm3', 'class' => 'row', 'novalidate' => 'novalidate')); ?>
							<input type="hidden" name="loantype" id="loantype" value="<?php echo $userdetails['loantype']; ?>" class="form-control" required>
							
							<input type="hidden" name="applyid" id="applyid" value="<?php echo $userdetails['applyid']; ?>" class="form-control" required>
							
							<input type="hidden" name="fullname" id="fullname" value="<?php echo $userdetails['fullname']; ?>" class="form-control" required>

							<input type="hidden" name="mobile" id="mobile" value="<?php echo $userdetails['mobile']; ?>" class="form-control" required>
							
							<input type="hidden" name="email" id="email" value="<?php echo $userdetails['email']; ?>" class="form-control" required>
							
							<input type="hidden" name="orderAmount" id="orderAmount" value="<?php echo $amtpay; ?>" class="form-control" required>

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
												<?php echo date('d/m/Y', strtotime('+6 months')); ?>
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

													echo '<span class="text-danger font-weight-700"> (' . calPercentage($productdata['amount'], $productdata['offeramount']) . ' off)</span>';

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
												<button type="submit" id="form-submit3" class="btn btn-lg btn-primary">BUY NOW</button>
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
			<!-- END : MEMBERSHIP CARD -->

			<div class="col-lg-4 col-md-4 col-sm-12 sm-p-0">
				<div class="card shadow-none">
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

				<div class="card shadow-none">
					<!--<div class="card-body background-pattern-1 rounded-lg">
						<h3 class="m-b-20 text-medium">Personal Loan</h3>
						<p class="m-b-0 text-muted">Get up to</p>
						<h4><span style="border-bottom: 4px solid #37c893">₹10 Lac in 30 mins</span></h4>
					</div>
					<div class="card-footer p-20 background-alice-blue">
						<ul class="list-icon list-icon-colored m-b-0">
							<li><i class="fa fa-arrow-right"></i> Simple Online Process</li>
							<li><i class="fa fa-arrow-right"></i> ⁠Lowest Interest Rate</li>
							<li><i class="fa fa-arrow-right"></i> ⁠Flexible EMI Options</li>
							<li><i class="fa fa-arrow-right"></i> ⁠Minimal Documentation</li>
						</ul>
					</div>-->
					<?php  $offer = array('10.png','11.png','12.png','13.png','14.png','15.png','16.png');?>
					<div class="carousel client-logos" style="border:1px solid;border-radius:10px;padding:5px" data-margin="0" data-items="1" data-items-md="1" data-items-sm="1" data-items-xs="1" data-arrows="false" data-dots="false">
						<?php foreach ($offer as $row) { ?>
							<div>
								<a href="#"><img alt="<?php echo $row;?>" src="<?php echo base_url('assets/images/' . $row); ?>"></a>
							</div>
						<?php } ?>
					</div>
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
			$('#form-submit3').attr('disabled', true);
			$('#form-submit3').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESS...');
		});
	});
</script>
