<?php
$this->load->view('plan_customer/includes/header.php');

$isall = 0;
if ($profiledata->cardtype == 22) {
	$loantype = "bl";
} else {
	$loantype = "pl";
}
?>

<section id="page-title" class="background-dark">
	<div class="container">
		<div class="page-title">
			<h4><i class="fa fa-file"></i> KYC Documents</h4>
		</div>
	</div>
</section>

<section id="page-content" class="fullscreen">
	<div class="container">

		<div class="row">
			<div class="col-md-4 col-12">
				<h4>Document List</h4>
				<ul class="list-group p-0">
					<li class="list-group-item"> <?php
													echo ($docflags['profilephoto'] == 1) ? '<i class="fa fa-check-circle text-success"></i>' : '<i class="fa fa-exclamation-circle text-danger"></i>';
													?> Profile Photo</li>

					<li class="list-group-item"> <?php
													echo ($docflags['aadharcard'] == 1) ? '<i class="fa fa-check-circle text-success"></i>' : '<i class="fa fa-exclamation-circle text-danger"></i>';
													?> Aadhar Card</li>

					<li class="list-group-item"> <?php
													echo ($docflags['pancard'] == 1) ? '<i class="fa fa-check-circle text-success"></i>' : '<i class="fa fa-exclamation-circle text-danger"></i>';
													?> PAN Card</li>

					<li class="list-group-item"> <?php
													echo ($docflags['lightbill'] == 1) ? '<i class="fa fa-check-circle text-success"></i>' : '<i class="fa fa-exclamation-circle text-danger"></i>';
													?> Address Proof - Light bill</li>

					<li class="list-group-item"> <?php
													echo ($docflags['cancelcheque'] == 1) ? '<i class="fa fa-check-circle text-success"></i>' : '<i class="fa fa-exclamation-circle text-danger"></i>';
													?> Cancel Cheque</li>

					<li class="list-group-item"> <?php
													echo ($docflags['bankstatement'] == 1) ? '<i class="fa fa-check-circle text-success"></i>' : '<i class="fa fa-exclamation-circle text-danger"></i>';
													?> Bank Statement - 1 year</li>

					<?php if ($profiledata->cardtype == 11) { ?>
						<li class="list-group-item"> <?php
														echo ($docflags['formsixteen'] == 1) ? '<i class="fa fa-check-circle text-success"></i>' : '<i class="fa fa-exclamation-circle text-danger"></i>';
														?> Form 16</li>

						<li class="list-group-item"> <?php
														echo ($docflags['salaryslip'] == 1) ? '<i class="fa fa-check-circle text-success"></i>' : '<i class="fa fa-exclamation-circle text-danger"></i>';
														?> Salary Slip - 3 month</li>
					<?php } ?>

					<?php if ($profiledata->cardtype == 12) { ?>
						<li class="list-group-item"> <?php
														echo ($docflags['businessproof'] == 1) ? '<i class="fa fa-check-circle text-success"></i>' : '<i class="fa fa-exclamation-circle text-danger"></i>';
														?> Business Proof</li>

						<li class="list-group-item"> <?php
														echo ($docflags['itreturn'] == 1) ? '<i class="fa fa-check-circle text-success"></i>' : '<i class="fa fa-exclamation-circle text-danger"></i>';
														?> IT Return</li>
					<?php } ?>
				</ul>

				<p class="text-danger m-t-10">Note : All of the above documents are not mandatory, provide what you have.</p>
			</div>

			<div class="col-md-8 col-12">
				<div class="row">
				
				
						<h2>
						<!-- <input type="hidden" id="data" value="<?php echo $this->session->flashdata('jsonSuccess');?>"/> -->
						<?php 
							if($this->session->flashdata('jsonSuccess')!=''){
								
								?><input type="hidden" id="data" value="1"/><?php
							}else{?>
								<input type="hidden" id="data" value="0"/>
							<?php
							}
						 //echo "ddd".$this->session->flashdata('jsonSuccess');
						?>
						</h2>
					
				
					<?php if ($docflags['profilephoto'] == 0) { ?>
						<div class="col-md-6 col-12">
							<?php echo form_open('plan_customer/profile/uploaddocument', array('id' => 'submitForm11', 'class' => 'p-cb process border-top-dark', 'enctype' => 'multipart/form-data', 'novalidate' => 'novalidate')); ?>
							<input type="hidden" name="doc" value="profilephoto" required>
							<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
							
							<div class="form-group">
								<label class="form-control-label">Profile Photo</label>
								<div class="input-group">
									<input type="file" name="userfile" id="user_photo" class="form-control" aria-required="true" required accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
									<div class="input-group-append">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-light cust-btn-blue">UPLOAD</button>
										</span>
									</div>
								</div>
								<div class="help-block font-small-3"></div>
							</div>
							<?php echo form_close(); ?>
						</div>
					<?php $isall += 1;
					} ?>

					<?php if ($docflags['aadharcard'] == 0) { ?>
						<div class="col-md-6 col-12">
							<?php echo form_open('plan_customer/profile/uploaddocument', array('id' => 'submitForm13', 'class' => 'p-cb process border-top-dark', 'enctype' => 'multipart/form-data', 'novalidate' => 'novalidate')); ?>
							<input type="hidden" name="doc" value="aadharcard" required>
							<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
							<div class="form-group">
								<label class="form-control-label">Aadhar Card Number</label>
								<input type="text" aria-required="true" name="userfile_number" id="user_aadharcard_number" class="form-control" placeholder="Aadhar Card Number" required inputmode="numeric" data-validation-regex-regex="[0-9]+" value="<?php echo ($docflags['aadharcard_number'] != 0) ? $docflags['aadharcard_number'] : ''; ?>">
								<div class="help-block font-small-3"></div>
							</div>
							<div class="form-group">
								<label class="form-control-label">Aadhar Card</label>
								<div class="input-group">
									<input type="file" name="userfile" id="user_aadharcard" class="form-control" aria-required="true" required accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
									<div class="input-group-append">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-light cust-btn-blue">UPLOAD</button>
										</span>
									</div>
								</div>
								<div class="help-block font-small-3"></div>
							</div>
							<?php echo form_close(); ?>
						</div>
					<?php $isall += 1;
					} ?>

					<?php if ($docflags['pancard'] == 0) { ?>
						<div class="col-md-6 col-12">
							<?php echo form_open('plan_customer/profile/uploaddocument', array('id' => 'submitForm12', 'class' => 'p-cb process border-top-dark', 'enctype' => 'multipart/form-data', 'novalidate' => 'novalidate')); ?>
							<input type="hidden" name="doc" value="pancard" required>
							<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
							<div class="form-group">
								<label class="form-control-label">PAN Card Number</label>
								<input type="text" aria-required="true" name="userfile_number" id="user_pancard_number" class="form-control" placeholder="PAN Card Number" required value="<?php echo ($docflags['pancard_number'] != 0) ? $docflags['pancard_number'] : ''; ?>">
								<div class="help-block font-small-3"></div>
							</div>
							<div class="form-group">
								<label class="form-control-label">PAN Card</label>
								<div class="input-group">
									<input type="file" name="userfile" id="user_pancard" class="form-control" aria-required="true" required accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
									<div class="input-group-append">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-light cust-btn-blue">UPLOAD</button>
										</span>
									</div>
								</div>
								<div class="help-block font-small-3"></div>
							</div>
							<?php echo form_close(); ?>
						</div>
					<?php $isall += 1;
					} ?>

					<?php if ($docflags['lightbill'] == 0) { ?>
						<div class="col-md-6 col-12">
							<?php echo form_open('plan_customer/profile/uploaddocument', array('id' => 'submitForm15', 'class' => 'p-cb process border-top-dark', 'enctype' => 'multipart/form-data', 'novalidate' => 'novalidate')); ?>
							<input type="hidden" name="doc" value="lightbill" required>
							<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
							<div class="form-group">
								<label class="form-control-label">Address Proof - Light bill</label>
								<div class="input-group">
									<input type="file" name="userfile" id="user_lightbill" class="form-control" aria-required="true" required accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
									<div class="input-group-append">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-light cust-btn-blue">UPLOAD</button>
										</span>
									</div>
								</div>
								<div class="help-block font-small-3"></div>
							</div>
							<?php echo form_close(); ?>
						</div>
					<?php $isall += 1;
					} ?>

					<?php if ($docflags['cancelcheque'] == 0) { ?>
						<div class="col-md-6 col-12">
							<?php echo form_open('plan_customer/profile/uploaddocument', array('id' => 'submitForm14', 'class' => 'p-cb process border-top-dark', 'enctype' => 'multipart/form-data', 'novalidate' => 'novalidate')); ?>
							<input type="hidden" name="doc" value="cancelcheque" required>
							<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
							<div class="form-group">
								<label class="form-control-label">Cancel Cheque</label>
								<div class="input-group">
									<input type="file" name="userfile" id="user_cheque" class="form-control" aria-required="true" required accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
									<div class="input-group-append">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-light cust-btn-blue">UPLOAD</button>
										</span>
									</div>
								</div>
								<div class="help-block font-small-3"></div>
							</div>
							<?php echo form_close(); ?>
						</div>
					<?php $isall += 1;
					} ?>

					<?php if ($docflags['bankstatement'] == 0) { ?>
						<div class="col-md-6 col-12">
							<?php echo form_open('plan_customer/profile/uploaddocument', array('id' => 'submitForm16', 'class' => 'p-cb process border-top-dark', 'enctype' => 'multipart/form-data', 'novalidate' => 'novalidate')); ?>
							<input type="hidden" name="doc" value="bankstatement" required>
							<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
							<div class="form-group">
								<label class="form-control-label">Bank Statement - 1 year</label>
								<div class="input-group">
									<input type="file" name="userfile" id="user_bankstatement" class="form-control" aria-required="true" required accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
									<div class="input-group-append">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-light cust-btn-blue">UPLOAD</button>
										</span>
									</div>
								</div>
								<div class="help-block font-small-3"></div>
							</div>
							<?php echo form_close(); ?>
						</div>
					<?php $isall += 1;
					} ?>

					<?php if ($profiledata->cardtype == 11) { ?>
						<?php if ($docflags['formsixteen'] == 0) { ?>
							<div class="col-md-6 col-12">
								<?php echo form_open('plan_customer/profile/uploaddocument', array('id' => 'submitForm17', 'class' => 'p-cb process border-top-dark', 'enctype' => 'multipart/form-data', 'novalidate' => 'novalidate')); ?>
								<input type="hidden" name="doc" value="formsixteen" required>
								<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
								<div class="form-group">
									<label class="form-control-label">Form 16</label>
									<div class="input-group">
										<input type="file" name="userfile" id="user_formsixteen" class="form-control" aria-required="true" required accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
										<div class="input-group-append">
											<span class="input-group-btn">
												<button type="submit" class="btn btn-light cust-btn-blue">UPLOAD</button>
											</span>
										</div>
									</div>
									<div class="help-block font-small-3"></div>
								</div>
								<?php echo form_close(); ?>
							</div>
						<?php $isall += 1;
						} ?>

						<?php if ($docflags['salaryslip'] == 0) { ?>
							<div class="col-md-6 col-12">
								<?php echo form_open('plan_customer/profile/uploaddocument', array('id' => 'submitForm18', 'class' => 'p-cb process border-top-dark', 'enctype' => 'multipart/form-data', 'novalidate' => 'novalidate')); ?>
								<input type="hidden" name="doc" value="salaryslip" required>
								<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
								<div class="form-group">
									<label class="form-control-label">Salary Slip - 3 month</label>
									<div class="input-group">
										<input type="file" name="userfile" id="user_salaryslip" class="form-control" aria-required="true" required accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
										<div class="input-group-append">
											<span class="input-group-btn">
												<button type="submit" class="btn btn-light cust-btn-blue">UPLOAD</button>
											</span>
										</div>
									</div>
									<div class="help-block font-small-3"></div>
								</div>
								<?php echo form_close(); ?>
							</div>
						<?php $isall += 1;
						} ?>
					<?php } ?>


					<?php if ($profiledata->cardtype == 12) { ?>
						<?php if ($docflags['businessproof'] == 0) { ?>
							<div class="col-md-6 col-12">
								<?php echo form_open('plan_customer/profile/uploaddocument', array('id' => 'submitForm19', 'class' => 'p-cb process border-top-dark', 'enctype' => 'multipart/form-data', 'novalidate' => 'novalidate')); ?>
								<input type="hidden" name="doc" value="businessproof" required>
								<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
								<div class="form-group">
									<label class="form-control-label">Business Proof</label>
									<div class="input-group">
										<input type="file" name="userfile" id="user_businessproof" class="form-control" aria-required="true" required accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
										<div class="input-group-append">
											<span class="input-group-btn">
												<button type="submit" class="btn btn-light cust-btn-blue">UPLOAD</button>
											</span>
										</div>
									</div>
									<div class="help-block font-small-3"></div>
								</div>
								<?php echo form_close(); ?>
							</div>
						<?php $isall += 1;
						} ?>

						<?php if ($docflags['itreturn'] == 0) { ?>
							<div class="col-md-6 col-12">
								<?php echo form_open('plan_customer/profile/uploaddocument', array('id' => 'submitForm20', 'class' => 'p-cb process border-top-dark', 'enctype' => 'multipart/form-data', 'novalidate' => 'novalidate')); ?>
								<input type="hidden" name="doc" value="itreturn" required>
								<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
								<div class="form-group">
									<label class="form-control-label">IT Return</label>
									<div class="input-group">
										<input type="file" name="userfile" id="user_itreturn" class="form-control" aria-required="true" required accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.pdf">
										<div class="input-group-append">
											<span class="input-group-btn">
												<button type="submit" class="btn btn-light cust-btn-blue">UPLOAD</button>
											</span>
										</div>
									</div>
									<div class="help-block font-small-3"></div>
								</div>
								<?php echo form_close(); ?>
							</div>
						<?php $isall += 1;
						} ?>
					<?php } ?>

					<?php if ($isall == 0 && $docflags['isVerified'] == 0) { ?>
						<div class="col-md-12 col-12">
							<h3>Upload Successful</h3>
							<p>Your documents are successfully submitted. Our Company Executive will verify the documents and contact you shortly.</p>
						</div>
					<?php } else if ($isall == 0 && $docflags['isVerified'] == 1) { ?>
						<div class="col-md-12 col-12">
							<h3>Verification Successful</h3>
							<p>Dear Customer, your documents are successfully verified. Our Company Executive will contact you soon for your loan process. </p>
						</div>
					<?php } ?>

					<?php if ($docflags['aadharcard_number'] != '' || $docflags['pancard_number'] != '') { ?>
						<div class="col-md-12 col-12">
							<div class="p-cb process border-top-green p-b-0">
								<?php
								if ($docflags['aadharcard_number'] != '') {
									echo "<p>Aadhar Card Number - " . $docflags['aadharcard_number'] . "</p>";
								}

								if ($docflags['pancard_number'] != '') {
									echo "<p>PAN Card Number - " . $docflags['pancard_number'] . "</p>";
								}
								?>
							</div>
						</div>
					<?php } ?>

					<div class="col-md-12 col-12">
						<?php echo form_open('plan_customer/profile/documentmsg', array('id' => 'submitForm20', 'class' => 'p-cb process border-top-dark', 'novalidate' => 'novalidate')); ?>
						<input type="hidden" name="customerid" value="<?php echo stringCrypt($profiledata->id, 'encrypt'); ?>" required>
						<div class="form-group">
							<label class="form-control-label">Remarks</label>
							<div class="input-group">
								<textarea name="remarks" id="remarks" rows="5" class="form-control"><?php echo $docflags['remarks']; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" id="submit-submit1" class="btn btn-outline btn-dark btn-sm">Submit</button>
						</div>
						<?php echo form_close(); ?>
					</div>

				</div>

			</div>
		</div>
	</div>
</section>

<?php
$this->load->view('plan_customer/includes/footer.php');
?>
<script>	
	var message = '<?php echo $this->session->flashdata('docSuccess'); ?>';
	if(message != ''){		
		toastr.success(message);
	}else{		
		<?php $this->session->set_flashdata('docSuccess','') ?>;
	}
	$('#user_photo, #user_aadharcard, #user_pancard, #user_lightbill, #user_cheque, #user_bankstatement, #user_formsixteen, #user_salaryslip, #user_businessproof, #user_itreturn').bind('change', function() {
		if (this.files[0].size > 4096000) {
			$(this).val('');
			$.notify({
				message: 'Please upload file less then 4 MB'
			}, {
				type: 'danger'
			});
		}
	});


</script>
