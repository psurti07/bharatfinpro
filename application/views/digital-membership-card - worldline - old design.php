<?php
$this->load->view('includes/header-apply.php');
$amtpay = $productdata['payamount'];
$eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']);

?>
<section class="background-light-green p-t-20">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 pb-4 text-center">
				<h2>Digital
					<?php echo $userdetails['loanname']; ?> Application Process
				</h2>
				<p> Buy
					<?php echo $userdetails['cardname']; ?> membership card get pre-approval loan offers life time
				</p>

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
		<div class="row">
			<!-- START : GET MEMBERSHIP CARD -->
			<?php echo form_open('digital/checkoutDigital', array('id' => 'submitForm3', 'class' => 'p-cb', 'novalidate' => 'novalidate')); ?>
			<div class="col-lg-12 col-md-12 col-sm-12 row p-0 m-0 ">
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

				<input type="hidden" name="orderAmount" id="orderAmount" value="<?php echo $amtpay; ?>"
					class="form-control" required>

				<input type="hidden" name="paymentid" id="paymentid" value="" class="form-control">

				<div class="col-lg-12 col-md-12 col-sm-12 text-center text-light">
					<h5>Congrats! Buy Membership Now To Unlock Your <strong class="text-success">Rs.
							<?php echo formatePriceIndia($eligibilityamt); ?>
						</strong> Pre-Approved Loan Offer Instantly!</h5>
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
									<?php echo date('d/m/Y', strtotime('+6 months')); ?>
								</span>
								<p class="credit__info">
									<?php echo $userdetails['fullname']; ?>
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group col-lg-12 col-md-12 col-sm-12 text-center m-t-10">
					<h4>Membership Card Fees</h4>
					<?php
					if ($productdata['offeramount'] != 0) {
						echo '<h3>Rs. <del class="text-danger">' . formatePriceIndia($productdata['amount']) . '</del> <span class="text-success">' . formatePriceIndia($productdata['offeramount']) . '</span> only</h3>';
					} else {
						echo '<h3>Rs. ' . formatePriceIndia($productdata['amount']) . ' only</h3>';
					}
					?>
					<p class="m-b-0">
						<?php if ($productdata['offeramount'] != 0) { ?>
							<span class="text-success m-r-10"><i class="fa fa-chevron-right m-r-5"></i> Offer Ending
								Soon</span>
						<?php } ?>
						<span class="text-dark m-r-10"><i class="fa fa-chevron-right m-r-5"></i> GST Additional</span>
					</p>
				</div>
				<div class="form-group col-md-12 text-center text-uppercase">
					<button type="submit" id="form-submit3" class="btn btn-primary">BUY NOW</button>
					<div id="resmessage"></div>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="text-center">
					<p class="m-b-0">
						<small>By submitting the form &amp; proceeding, you agree to the
							<a href="<?php echo site_url('terms-conditions'); ?>" target="_blank">Terms of Use</a>
							and
							<a href="<?php echo site_url('privacy-policy'); ?>" target="_blank">Privacy Policy</a>
							of Prayoshafincart.com
						</small>
					</p>
					<p class="m-b-0"><small>(1) Let you apply for personal loan in multiple banks (2) You get 6 months
							free loan consultancy (3) Get 35% referral payout bonus (4) Get loan offers from multiple
							banks anytime-anywhere (5) You stay at home; our team will go to multiple banks for you (6)
							On-call Assistance on all your doubts</small></p>
				</div>
			</div>
			<?php echo form_close(); ?>
			<!-- END : GET MEMBERSHIP CARD -->
		</div>
	</div>
</section>



<?php if (count($testimoniallist) > 0) { ?>
	<section class="p-t-30">
		<div class="container">
			<div class="heading-text heading-plain text-center p-b-10">
				<h4>Our Customers Testimonials</h4>
			</div>
			<div class="carousel equalize testimonial testimonial-box" data-margin="20" data-arrows="false" data-items="3"
				data-items-sm="2" data-items-xxs="1" data-equalize-item=".testimonial-item">
				<?php foreach ($testimoniallist as $row) { ?>
					<div class="testimonial-item">
						<img src="<?php echo base_url('assets/images/customers/' . $row->photo); ?>" alt="customer img">
						<div class="rateit" data-rateit-mode="font" data-rateit-ispreset="true" data-rateit-readonly="true"
							data-rateit-value="<?php echo $row->ratings; ?>"></div>
						<p>
							<?php echo $row->reviews; ?>
						</p>
						<span class="p-b-20">
							<?php echo $row->fullname; ?>
						</span>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>

<?php
$this->load->view('includes/footer-apply.php');
?>


<script type="text/javascript" src="https://www.paynimo.com/Paynimocheckout/server/lib/checkout.js"></script>
<script type="text/javascript">
	$(document).ready(function () {

		$('#submitForm3').on('submit', function (e) {
			e.preventDefault();

			$('#form-submit3').attr('disabled', true);
			$('#form-submit3').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESSING...');

			$.ajax({
				url: $(this).attr('action') || window.location.pathname,
				type: 'POST',
				data: $(this).serialize(),
				cache: false,
				success: function (response) {
					var obj = JSON.parse(response);

					function handleResponse(res) {
						if (typeof res != 'undefined' && typeof res.paymentMethod != 'undefined' && typeof res.paymentMethod.paymentTransaction != 'undefined' && typeof res.paymentMethod.paymentTransaction.statusCode != 'undefined' && res.paymentMethod.paymentTransaction.statusCode == '0300') {
							// success block
						} else if (typeof res != 'undefined' && typeof res.paymentMethod != 'undefined' && typeof res.paymentMethod.paymentTransaction != 'undefined' && typeof res.paymentMethod.paymentTransaction.statusCode != 'undefined' && res.paymentMethod.paymentTransaction.statusCode == '0398') {
							// initiated block
						} else {
							// error block
						}
					};

					var configJson = {
						'tarCall': false,
						'features': {
							'showPGResponseMsg': true,
							'enableNewWindowFlow': true,
							'enableAbortResponse': true,
							'enableExpressPay': true,
							'enableInstrumentDeRegistration': false,
							'enableMerTxnDetails': true,
							'siDetailsAtMerchantEnd': false,
							'enableSI': false,
							'hideSIDetails': false,
							'enableDebitDay': false,
							'expandSIDetails': false,
							'enableTxnForNonSICards': false,
							'showSIConfirmation': false,
							'showSIResponseMsg': false,
						},
						'consumerData': {
							'deviceId': 'WEBSH2',
							//possible values 'WEBSH1', 'WEBSH2' and 'WEBMD5'
							//'debitDay':'10',
							'token': obj['hash'],
							'returnUrl': obj['data'][12],
							/*'redirectOnClose': 'https://www.tekprocess.co.in/MerchantIntegrationClient/MerchantResponsePage.jsp',*/
							'responseHandler': handleResponse,
							'paymentMode': 'all',
							'checkoutElement': '',
							'merchantLogoUrl': 'https://prayoshafincart.com/assets/images/logo-2x.png',
							'merchantId': obj['data'][0],
							'currency': obj['data'][15],
							'consumerId': obj['data'][8], //Your unique consumer identifier to register a eMandate/eNACH
							'consumerMobileNo': obj['data'][9],
							'consumerEmailId': obj['data'][10],
							'txnId': obj['data'][1], //Unique merchant transaction ID
							'items': [{
								'itemId': obj['data'][14],
								'amount': obj['data'][2],
								'comAmt': '0'
							}],
							'cartDescription': '}{custname:' + obj['data'][13],
							'merRefDetails': [{
								"name": "Txn. Ref. ID",
								"value": obj['data'][1]
							}],
							'customStyle': {
								'PRIMARY_COLOR_CODE': '#a8d6ff', //merchant primary color code
								'SECONDARY_COLOR_CODE': '#3f3962', //provide merchant's suitable color code
								'BUTTON_COLOR_CODE_1': '#51da00', //merchant's button background color code
								'BUTTON_COLOR_CODE_2': '#000' //provide merchant's suitable color code for button text
							},
							'accountNo': obj['data'][11], //Pass this if accountNo is captured at merchant side for eMandate/eNACH
							'accountHolderName': obj['data'][16], //Pass this if accountHolderName is captured at merchant side for ICICI eMandate & eNACH registration this is mandatory field, if not passed from merchant Customer need to enter in Checkout UI.
							'ifscCode': obj['data'][17], //Pass this if ifscCode is captured at merchant side.
							'accountType': obj['data'][18], //Required for eNACH registration this is mandatory field
							'debitStartDate': obj['data'][3],
							'debitEndDate': obj['data'][4],
							'maxAmount': obj['data'][5],
							'amountType': obj['data'][6],
							'frequency': obj['data'][7] //  Available options DAIL, WEEK, MNTH, QURT, MIAN, YEAR, BIMN and ADHO
						}
					};

					//console.log(configJson);       

					$.pnCheckout(configJson);
					if (configJson.features.enableNewWindowFlow) {
						pnCheckoutShared.openNewWindow();
					}
				}
			});
		});

	});
</script>
