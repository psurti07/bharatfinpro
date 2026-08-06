<?php
    $this->load->view('customer/includes/header.php');

    if($profiledata->cardtype == 12) {
    	$loantype = "bl";
	}
	else {
		$loantype = "pl";
	}
?>

<section id="page-title" class="background-dark">
	<div class="container">
		<div class="page-title">
			<h4><i class="fa fa-desktop"></i> Dashboard</h4>
		</div>
	</div>
</section>

<section id="page-content" class="fullscreen">
	<div class="container">

		<?php 
		if($accountmsg->option_value != "" && strlen($accountmsg->option_value)>0) {  ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="alert alert-light alert-dismissible fade show text-dark" role="alert">
					<span class="badge badge-warning m-r-10">Important Update</span>
					<?php echo $accountmsg->option_value; ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
			</div>
		</div>
		<?php } ?>

		<div class="row">
			<div class="col-lg-4 col-md-4 text-center">
				<div class="card">
					<div class="card-body">
						<div class="counter"> <span data-speed="500" data-refresh-interval="2" data-to="<?php echo $statestics['personalloan']; ?>" data-from="0" data-seperator="true"></span> </div>
						<h6>Personal Loan Applications</h6>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 text-center">
				<div class="card">
					<div class="card-body">
						<div class="counter"> <span data-speed="500" data-refresh-interval="2" data-to="<?php echo $statestics['businessloan']; ?>" data-from="0" data-seperator="true"></span> </div>
						<h6>Business Loan Applications</h6>
					</div>
				</div>
			</div>
			<?php
            $hidedata = 0; // 0 = show, 1 = Hide
            if ($hidedata == 0) {
              ?>
			<div class="col-lg-4 col-md-4 text-center">
				<div class="card">
					<div class="card-body">
						<div class="counter"> <span data-speed="500" data-refresh-interval="2" data-to="<?php echo $statestics['referalusers']; ?>" data-from="0" data-seperator="true"></span> </div>
						<h6>Total Referral Customers</h6>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<?php
            $hidedata = 0; // 0 = show, 1 = Hide
            if ($hidedata == 0) {
              ?>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12">
				<form class="p-cb process border-top-dark text-dark">
					<h4>Refer and Earn up to Rs 1 Lac per month</h4>
					<hr/>

	                <div class="form-group">
	                    <label class="form-control-label">Reference Link</label>
	                    <div class="input-group">
	                        <input id="target1" type="text" class="form-control" value="<?php echo base_url('digital/'.$loantype.'/'.$profiledata->refcode); ?>">
	                        <div class="input-group-append">
	                            <span class="input-group-btn">
	                              <button type="button" class="btn btn-light" data-clipboard="true" data-clipboard-target="#target1">COPY</button>
	                            </span>
	                        </div>
	                    </div>
	                </div>
	            </form>
			</div>
		</div>
		<?php } ?>
		<div class="row m-t-30">
			<div class="col-md-12">
				<div class="blockquote">
					<h4>Submit Documents</h4>
					<p>Dear Sir / Madam,<br/>
						Kindly submit a list of the following documents as per your profile. Send all documents by email to <a href="mailto:support@prayoshafincart.com" target="_blank"><strong>support@prayoshafincart.com</strong></a></p>
					<p><strong>If you are a salaried person</strong> - Aadhar Card, Pan Card, Bank Statement of 6 months, Photo, Cancelled Cheque, Salary Slip of 3 months, Form16 - 1 years / 2 years.</p>
					<p><strong>If you are a self-employed person</strong> - Aadhar Card, Pan Card, Bank Statement of 6 months, Photo, Canceled Cheque, Business Proof, IT Return - 1 years / 2 years.</p>
					<p><em>Note: Additional documents required as per customer profile.</em></p>
				</div>
			</div>
		</div>

		
	</div>
</section>

<?php
    $this->load->view('customer/includes/footer.php');
?>