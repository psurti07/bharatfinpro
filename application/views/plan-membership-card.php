<?php
$this->load->view('includes/header-plan-apply.php');

$amtpay = $productdata['payamount'];
$eligibilityamt = calEligiblity($userdetails['income'], $userdetails['currentemi'], $userdetails['apr'], $userdetails['loanamount']);
?>
<!-- Header -->
<div class="header">
    <h3 class="text-light">Get Loan Offers Tailored To Your Needs</h3>
    <p class="text-success fs-5" style="font-weight:800">From Trusted Partner NBFCs</p>
</div>

<!-- Main Card -->
<div class="container">
    <div class="card shadow card-main">

        <div class="container-fluid mobile-container">
            <div class="card text-center">
                <div class="card-header" style="border-radius: 8px 8px 0 0;">
                    <div class="card-title">
                        <h6 class="font-weight-bold">Unlock Your Personal Loan Offer </h6>
                        <p>You’re Eligible For <strong class="text-secondary h4">Rs.
                                <?php echo formatePriceIndia($eligibilityamt); ?>/-</strong>
                            Pre-Approved Loan Offer.</p>
                    </div>
                </div>
            </div>

            <div class="card shadow-none">
                <div class="card-body">
					<div class="box">
					<span class="wdp-ribbon wdp-ribbon-two">Offer Valid till 12am</span>
				</div>
                    <div class="row">
						<div class="col-md-7">
                        <?php echo form_open('plan/checkoutDigital', array('id' => 'submitForm2', 'class' => 'row', 'novalidate' => 'novalidate')); ?>
							<input type="hidden" name="loantype" id="loantype" value="<?php echo $userdetails['loantype']; ?>" class="form-control" required>
							
							<input type="hidden" name="applyid" id="applyid" value="<?php echo $userdetails['applyid']; ?>" class="form-control" required>
							
							<input type="hidden" name="fullname" id="fullname" value="<?php echo $userdetails['fullname']; ?>" class="form-control" required>

							<input type="hidden" name="mobile" id="mobile" value="<?php echo $userdetails['mobile']; ?>" class="form-control" required>
							
							<input type="hidden" name="email" id="email" value="<?php echo $userdetails['email']; ?>" class="form-control" required>
							
							<input type="hidden" name="orderAmount" id="orderAmount" value="<?php echo $amtpay; ?>" class="form-control" required>

							<div class="form-group col-lg-12 col-md-12 col-sm-12 m-b-0" style="border:1px solid;border-radius:10px;padding:5px">
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
												<button type="submit" id="form-submit3" class="btn btn-lg btn-primary btn-process">BUY NOW</button>
											</td>
										</tr>
									</tbody>
								</table>
								<div id="resmessage"></div>
							</div>
                        
						<?php echo form_close(); ?>
						</div>
						<div class="col-md-5 mt-2">
							<?php  $offer = array('1.jpeg','2.jpeg','3.jpeg');?>
							<div class="carousel client-logos" style="border:1px solid;border-radius:10px;padding:5px" data-margin="0" data-items="1" data-items-md="1" data-items-sm="1" data-items-xs="1" data-arrows="false" data-dots="false">
								<?php foreach ($offer as $row) { ?>
									<div>
										<a href="#"><img alt="<?php echo $row;?>" src="<?php echo base_url('assets/images/privylege_finance/' . $row); ?>"></a>
									</div>
								<?php } ?>
							</div>
						</div>
                    </div>
                </div>

            </div>
            <div class="card shadow-none row">
                <div class="col-md-6">
                    <div class="accordion white accordion-shadow">
                        <div class="ac-item">
                            <h5 class="ac-title">Personal Detail</h5>
                            <div class="ac-content">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Loan : <?php echo $userdetails['loanname']; ?></li>
                                    <li class="list-group-item">Loan Amount :
                                        <?php echo formatePriceIndia($userdetails['loanamount']); ?></li>
                                    <li class="list-group-item">Name : <?php echo $userdetails['fullname']; ?></li>
                                    <li class="list-group-item">Mobile no. : <?php echo $userdetails['mobile']; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="accordion white accordion-shadow">
                        <div class="ac-item">
                            <h5 class="ac-title">Personal Loan Benifit</h5>
                            <div class="ac-content">
                                <ul class="list-icon list-icon-colored m-b-0">
                                    <li><i class="fa fa-arrow-right"></i> Simple Online Process</li>
                                    <li><i class="fa fa-arrow-right"></i> ⁠Lowest Interest Rate</li>
                                    <li><i class="fa fa-arrow-right"></i> ⁠Flexible EMI Options</li>
                                    <li><i class="fa fa-arrow-right"></i> ⁠Minimal Documentation</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
$this->load->view('includes/footer-plan-apply.php');
?>

<script type="text/javascript">
	$(function () {
		$('#submitForm3').on('submit', function (e) {
			$('#form-submit3').attr('disabled', true);
			$('#form-submit3').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> PROCESS...');
		});
	});
</script>
