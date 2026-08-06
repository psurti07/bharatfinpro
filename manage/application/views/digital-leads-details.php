<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("108").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-7 col-12 mb-1">
	    <h1 class="content-header-title text-uppercase">Digital Loan Lead Details</h1>
	  </div>

		<div class="content-header-right btn-group-sm text-right col-md-5 col-12">
      <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-keyboard="false" data-target="#convertlead"><i class="la la-retweet"></i> CONVERT TO CUSTOMER</button>

			<button onclick="window.history.back();" class="btn btn-outline-dark"><i class="la la-chevron-left"></i> Back</button>

			<a onclick="return confirm('Are you sure you want to delete record permanently?');" href="<?php echo site_url('users/leaddelete/'.$userdetails['userinfo']->id); ?>" target="_self" class="btn btn-outline-danger"><i class="la la-trash"></i> Delete</a>
		</div>
	</div>


	<div class="content-body">
      <section id="configuration">
        <div class="row">

          <div class="col-md-6 col-sm-12">
            <div class="card">
              <div class="card-content collapse show">
                <div class="card-body">
                    <h2><strong>Customer Details</strong></h2>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Apply for :</dd>
                      <dt class="col-md-8">
                        <?php 
                          if($userdetails['userinfo']->cardtype == 12) {
                            echo "Diamond Membership Card";
                          }
                          else {
                            echo "Gold Membership Card";
                          }
                        ?>
                        </dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Lead Date :</dd>
                      <dt class="col-md-8"><?php echo DateFormatDisplay($userdetails['userinfo']->rec_date); ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Last Update Date :</dd>
                      <dt class="col-md-8"><?php echo DateFormatDisplay($userdetails['userinfo']->update_date); ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Name :</dd>
                      <dt class="col-md-8 text-capitalize"><?php echo $userdetails['userinfo']->fullname; ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Mobile :</dd>
                      <dt class="col-md-8"><?php echo $userdetails['userinfo']->mobile; ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Email Id :</dd>
                      <dt class="col-md-8"><?php echo $userdetails['userinfo']->email; ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Pincode :</dd>
                      <dt class="col-md-8"><?php echo $userdetails['userinfo']->pincode; ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">City :</dd>
                      <dt class="col-md-8"><?php echo $userdetails['userinfo']->city; ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">State :</dd>
                      <dt class="col-md-8"><?php echo $userdetails['userinfo']->state; ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">User Type :</dd>
                      <dt class="col-md-8"><?php 
                      if($userdetails['userinfo']->usertype == 1) {
                        echo "Self Employed Person";
                      } else {
                        echo "Salaried Person";
                      } 
                      ?></dt>
                    </dl>
                </div>
              </div>
            </div>

            <?php
            if($userdetails['userreference'] !== NULL) {
            ?>
            <div class="card">
              <div class="card-content collapse show">
                <div class="card-body">
                    <h3><strong>Referral Customer Details</strong></h3>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Referral Name :</dd>
                      <dt class="col-md-8"><?php echo $userdetails['userreference']->fullname; ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Referral Mobile :</dd>
                      <dt class="col-md-8"><?php echo $userdetails['userreference']->mobile; ?></dt>
                    </dl>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>

          <div class="col-md-6 col-sm-12">
            <div class="card">
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                    <h3><strong>Application Details</strong></h3>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Loan :</dd>
                      <dt class="col-md-8"><?php 
                      if($userdetails['userapplication']->loantype == 11) {
                        echo "Personal Loan";
                      } else if($userdetails['userapplication']->loantype == 12) {
                        echo "Business Loan";
                      } else {
                        echo "-";
                      } ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Loan Amount :</dd>
                      <dt class="col-md-8"><?php echo formatePriceIndia($userdetails['userapplication']->loanamount); ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Loan Tenure :</dd>
                      <dt class="col-md-8"><?php echo $userdetails['userapplication']->loantenure; ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">CIBIL Score :</dd>
                      <dt class="col-md-8"><?php echo $userdetails['userapplication']->cibilscore; ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Loan Purpose :</dd>
                      <dt class="col-md-8"><?php echo $userdetails['userapplication']->loanpurpose; ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Income :</dd>
                      <dt class="col-md-8"><?php echo formatePriceIndia($userdetails['userapplication']->income); ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">Current EMI :</dd>
                      <dt class="col-md-8"><?php echo formatePriceIndia($userdetails['userapplication']->currentemi); ?></dt>
                    </dl>
                    <hr/>

                    <dl class="row">
                      <dd class="col-md-4">EMI Bounced :</dd>
                      <dt class="col-md-8"><?php
                      if($userdetails['userapplication']->emibounce == 1) {
                        echo "Yes";
                      } else {
                        echo "No";
                      }
                      ?></dt>
                    </dl>
                    
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

<!-- Modal -->
<div class="modal fade text-left" id="convertlead" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3"
aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel3">Convert to Customer</h4>
      </div>
      <div class="modal-body">
          <?php echo form_open('users/converttocustomer', array('id'=>'submitForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>

            <input type="hidden" name="userid" id="userid" value="<?php echo $userdetails['userinfo']->id; ?>">

            <input type="hidden" name="applicationid" id="applicationid" value="<?php echo $userdetails['userapplication']->id; ?>">

            <div class="form-body">
              <div class="form-group">
                <h5>Registration Date</h5>
                <div class="controls">
                  <input type="date" name="regdate" id="regdate" class="form-control" value="<?php echo date('Y-m-d', strtotime($userdetails['userinfo']->rec_date)); ?>" required>
                  <div class="help-block font-small-3"></div>
                </div>
              </div>

              <div class="form-group">
                <h5>Card Number</h5>
                <div class="controls">
                  <input type="text" name="cardnumber" id="cardnumber" class="form-control" minlength="16" maxlength="16" data-validation-regex-regex="[0-9]+" value="<?php echo random_code(16); ?>">
                  <div class="help-block font-small-3"></div>
                </div>
              </div>

              <div class="form-group">
                <h5>Card Amount</h5>
                <div class="controls">
                <input type="text" aria-required="true" id="cardamount" name="cardamount" class="form-control" placeholder="As per your requirement" required min="10000" max="5000000" inputmode="numeric" data-validation-regex-regex="[0-9]+">
                  <em><strong>Note:</strong> 18% GST amount added on card amount.</em>
                  <div class="help-block font-small-3"></div>
                </div>
              </div>

              <div class="form-group">
                <h5>Payment Id</h5>
                <div class="controls">
                  <input type="text" name="paymentid" id="paymentid" class="form-control" value="<?php echo 'cash_'.random_password(13) ?>">
                </div>
              </div>
            </div>

            <div class="form-actions text-right pb-0">
              <button type="button" class="btn grey btn-outline-light btn-min-width" data-dismiss="modal">Close</button>
              <button type="submit" id="submit-btn" class="btn btn-success btn-min-width">Create An Account</button>
            </div>
          <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){

  $('#submitForm').on('submit', function(event){
    event.preventDefault();

    var REDIRECTURL = "<?php echo site_url('users/userdetails/'.$userdetails['userinfo']->id); ?>";

    $.ajax({
      url : $(this).attr('action') || window.location.pathname,
      method:"POST",
      data:new FormData(this),
      dataType: "JSON",
      contentType: false,
      cache: false,
      processData: false,
      beforeSend:function(){
          $('#submit-btn').html('Processing...');
          $('#submit-btn').attr('disabled', true);
      },
      success:function(response){
        if(response['success'] == true) {
            toastr.success(response['message']);
            setTimeout(function() {
               window.location.href = REDIRECTURL;
            }, 2000);
        }
        else {
          toastr.error(response['message']);
        }
      },
      error: function (jXHR, textStatus, errorThrown) {
          $('#submit-btn').attr('disabled', false);
          $('#submit-btn').html('Create Account');
          toastr.error(errorThrown, 'ERROR');
      }
    })
  });
  
});
</script>
