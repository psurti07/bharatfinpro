<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("111").className += " active";
      document.getElementById("1111").className += " active";
      document.getElementById("8006").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-8 col-12 mb-1">
        <div class="badge badge-pill badge-light badge-square">Customer</div>
  	    <h1 class="content-header-title text-uppercase">KYC Documents</h1>
        <h1 class="text-primary text-uppercase"><?php echo $userdata['fullname']." - ".$userdata['mobile']; ?></h1>
	  </div>

	  <div class="content-header-right btn-group-sm text-right col-md-4 col-12">
            <button onclick="window.history.back();" class="btn btn-outline-dark"><i class="la la-chevron-left"></i> Back</button>
      </div>
	</div>


	<div class="content-body">
      <section>
        <div class="row">
          <?php
              include_once(APPPATH.'views/includes/plan-user-menu.php');
          ?>

          <div class="col-lg-9 col-md-9">
            <div class="card">
              <div class="card-content collapse show">
                <div class="card-body">
                  <?php
                  if(empty($documentlist)) {
                    echo "<h4>No document uploaded.</h4>";
                  } 
                  else {
                  ?>
                      <dl class="row">
                        <?php
                          if($kycstatus == 1) {
                            echo '<dd class="col-md-6 text-left"><div class="alert alert-success mb-2" role="alert">All documents are verified.</div></dd>';

                            echo '<dt class="col-md-6 text-right"><a href="'.site_url('users/docverification/0/'.$userdata['id']).'" class="btn btn-outline-danger">Click to Unverified</a></dt>';
                          }
                          else {
                            echo '<dd class="col-md-6 text-left"><div class="alert alert-danger mb-2" role="alert">Documents are not verified yet.</div></dd>';

                            echo '<dt class="col-md-6 text-right"><a href="'.site_url('users/docverification/1/'.$userdata['id']).'" class="btn btn-outline-success">Click to Verified</a></dt>';
                          }
                        ?>
                      </dl>
                      <hr/>

                      <dl class="row">
                        <dt class="col-md-6">Profile Photo :</dt>
                        <dd class="col-md-6">
                          <?php
                          if($documentlist->profilephoto == NULL) {
                            echo "No document found.";
                          }
                          else {
                            echo anchor("users/downloaddoc/{$userdata['id']}/{$documentlist->profilephoto}",'<i class="la la-download"></i> Download','class="btn btn-icon btn-outline-dark btn-sm"');

                            echo anchor("users/reuploaddoc/profilephoto/{$userdata['id']}",'<i class="la la-exclamation-triangle"></i> Reupload','class="btn btn-icon btn-outline-warning btn-sm ml-1"');
                          }
                          ?>
                        </dd>
                      </dl>
                      <hr/>

                      <dl class="row">
                        <dt class="col-md-6">Aadhar Card :</dt>
                        <dd class="col-md-6">
                          <?php
                          if($documentlist->aadharcard == NULL) {
                            echo "No document found.";
                          }
                          else {
                            echo "<p><strong>".$documentlist->aadharcard_number."</strong></p>";

                            echo anchor("users/downloaddoc/{$userdata['id']}/{$documentlist->aadharcard}",'<i class="la la-download"></i> Download','class="btn btn-icon btn-outline-dark btn-sm"');

                            echo anchor("users/reuploaddoc/aadharcard/{$userdata['id']}",'<i class="la la-exclamation-triangle"></i> Reupload','class="btn btn-icon btn-outline-warning btn-sm ml-1"');
                          }
                          ?>
                        </dd>
                      </dl>
                      <hr/>

                      <dl class="row">
                        <dt class="col-md-6">PAN Card :</dt>
                        <dd class="col-md-6">
                          <?php
                          if($documentlist->pancard == NULL) {
                            echo "No document found.";
                          }
                          else {
                            echo "<p><strong>".$documentlist->pancard_number."</strong></p>";

                            echo anchor("users/downloaddoc/{$userdata['id']}/{$documentlist->pancard}",'<i class="la la-download"></i> Download','class="btn btn-icon btn-outline-dark btn-sm"');

                            echo anchor("users/reuploaddoc/pancard/{$userdata['id']}",'<i class="la la-exclamation-triangle"></i> Reupload','class="btn btn-icon btn-outline-warning btn-sm ml-1"');
                          }
                          ?>
                        </dd>
                      </dl>
                      <hr/>

                      <dl class="row">
                        <dt class="col-md-6">Address Proof :</dt>
                        <dd class="col-md-6">
                          <?php
                          if($documentlist->lightbill == NULL) {
                            echo "No document found.";
                          }
                          else {
                            echo anchor("users/downloaddoc/{$userdata['id']}/{$documentlist->lightbill}",'<i class="la la-download"></i> Download','class="btn btn-icon btn-outline-dark btn-sm"');

                            echo anchor("users/reuploaddoc/lightbill/{$userdata['id']}",'<i class="la la-exclamation-triangle"></i> Reupload','class="btn btn-icon btn-outline-warning btn-sm ml-1"');
                          }
                          ?>
                        </dd>
                      </dl>
                      <hr/>

                      <dl class="row">
                        <dt class="col-md-6">Cancel Cheque :</dt>
                        <dd class="col-md-6">
                          <?php
                          if($documentlist->cancelcheque == NULL) {
                            echo "No document found.";
                          }
                          else {
                            echo anchor("users/downloaddoc/{$userdata['id']}/{$documentlist->cancelcheque}",'<i class="la la-download"></i> Download','class="btn btn-icon btn-outline-dark btn-sm"');

                            echo anchor("users/reuploaddoc/cancelcheque/{$userdata['id']}",'<i class="la la-exclamation-triangle"></i> Reupload','class="btn btn-icon btn-outline-warning btn-sm ml-1"');
                          }
                          ?>
                        </dd>
                      </dl>
                      <hr/>

                      <dl class="row">
                        <dt class="col-md-6">Bank Statement - Last 6 months :</dt>
                        <dd class="col-md-6">
                          <?php
                          if($documentlist->bankstatement == NULL) {
                            echo "No document found.";
                          }
                          else {
                            echo anchor("users/downloaddoc/{$userdata['id']}/{$documentlist->bankstatement}",'<i class="la la-download"></i> Download','class="btn btn-icon btn-outline-dark btn-sm"');

                            echo anchor("users/reuploaddoc/bankstatement/{$userdata['id']}",'<i class="la la-exclamation-triangle"></i> Reupload','class="btn btn-icon btn-outline-warning btn-sm ml-1"');
                          }
                          ?>
                        </dd>
                      </dl>
                      <hr/>

                    <?php if($userdata['cardtype'] == 11) { ?>
                      <dl class="row">
                        <dt class="col-md-6">Form 16 :</dt>
                        <dd class="col-md-6">
                          <?php
                          if($documentlist->formsixteen == NULL) {
                            echo "No document found.";
                          }
                          else {
                            echo anchor("users/downloaddoc/{$userdata['id']}/{$documentlist->formsixteen}",'<i class="la la-download"></i> Download','class="btn btn-icon btn-outline-dark btn-sm"');

                            echo anchor("users/reuploaddoc/formsixteen/{$userdata['id']}",'<i class="la la-exclamation-triangle"></i> Reupload','class="btn btn-icon btn-outline-warning btn-sm ml-1"');
                          }
                          ?>
                        </dd>
                      </dl>
                      <hr/>

                      <dl class="row">
                        <dt class="col-md-6">Salary Slip :</dt>
                        <dd class="col-md-6">
                          <?php
                          if($documentlist->salaryslip == NULL) {
                            echo "No document found.";
                          }
                          else {
                            echo anchor("users/downloaddoc/{$userdata['id']}/{$documentlist->salaryslip}",'<i class="la la-download"></i> Download','class="btn btn-icon btn-outline-dark btn-sm"');

                            echo anchor("users/reuploaddoc/salaryslip/{$userdata['id']}",'<i class="la la-exclamation-triangle"></i> Reupload','class="btn btn-icon btn-outline-warning btn-sm ml-1"');
                          }
                          ?>
                        </dd>
                      </dl>
                    <?php } ?>


                    <?php if($userdata['cardtype'] == 12) { ?>
                      <dl class="row">
                        <dt class="col-md-6">Business Proof :</dt>
                        <dd class="col-md-6">
                          <?php
                          if($documentlist->businessproof == NULL) {
                            echo "No document found.";
                          }
                          else {
                            echo anchor("users/downloaddoc/{$userdata['id']}/{$documentlist->businessproof}",'<i class="la la-download"></i> Download','class="btn btn-icon btn-outline-dark btn-sm"');

                            echo anchor("users/reuploaddoc/businessproof/{$userdata['id']}",'<i class="la la-exclamation-triangle"></i> Reupload','class="btn btn-icon btn-outline-warning btn-sm ml-1"');
                          }
                          ?>
                        </dd>
                      </dl>
                      <hr/>

                      <dl class="row">
                        <dt class="col-md-6">IT Return :</dt>
                        <dd class="col-md-6">
                          <?php
                          if($documentlist->itreturn == NULL) {
                            echo "No document found.";
                          }
                          else {
                            echo anchor("users/downloaddoc/{$userdata['id']}/{$documentlist->itreturn}",'<i class="la la-download"></i> Download','class="btn btn-icon btn-outline-dark btn-sm"');

                            echo anchor("users/reuploaddoc/itreturn/{$userdata['id']}",'<i class="la la-exclamation-triangle"></i> Reupload','class="btn btn-icon btn-outline-warning btn-sm ml-1"');
                          }
                          ?>
                        </dd>
                      </dl>
                    <?php } ?>

                    <hr/>
                    <dl class="row">
                      <dt class="col-md-6">Remarks :</dt>
                      <dd class="col-md-6">
                        <?php echo $documentlist->remarks; ?>
                      </dd>
                    </dl>

                  <?php } ?>

                </div>
              </div>
            </div>
          </div>
         
        </div>
      </section>
    </div>
    
<?php
    include_once(APPPATH.'views/includes/footer.php');
?>
