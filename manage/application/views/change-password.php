<?php
    include_once(APPPATH.'views/includes/header.php');
?>
    <div class="content-header row">
      <div class="content-header-left col-md-12 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Change Password</h1>
      </div>
    </div>


    <div class="content-body">
        <!-- Input Validation start -->
        <section class="input-validation">
          <div class="row">
            <div class="col-lg-8 col-md-12">
              <div class="card">
                
                <div class="card-content collapse show">
                  <div class="card-body">
                    <p><small class="text-muted">Fill the information to continue</small></p>

                    <?php echo form_open('login/changePassword', array('id'=>'submitForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>

                    	<input type="hidden" name="id" value="<?php echo $this->session->userdata('adminid'); ?>">

                        <div class="form-body">
                          <div class="form-group">
                            <h5>Old Password <span class="required">*</span></h5>
                            <div class="controls">
                              <input type="password" name="oldpassword" class="form-control" required data-validation-required-message="Old password is required">
                              <div class="help-block font-small-3"></div>
                            </div>
                          </div>

                          <div class="form-group">
                              <h5>New Password <span class="required">*</span></h5>
                              <div class="controls">
                                <input type="password" name="newpassword" class="form-control" required data-validation-required-message="New password is required" minlength="6">
                              </div>
                            </div>

                            <div class="form-group">
                              <h5>Retype Password <span class="required">*</span></h5>
                              <div class="controls">
                                <input type="password" name="retypepassword" class="form-control" required data-validation-required-message="Retype password is required" data-validation-match-match="newpassword" data-validation-match-message="New passwrod and Retype password are not matched." minlength="6">
                              </div>
                            </div>
                        </div>

                        <div class="form-actions text-right">
                          <button type="submit" id="submit-btn" class="btn btn-primary btn-min-width">SAVE</button>
                        </div>
                        
                    <?php echo form_close(); ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Input Validation end -->
    </div>
    
<?php
    include_once(APPPATH.'views/includes/footer.php');
?>

<script type="text/javascript">
  $(function(){
      $('#submitForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url : $(this).attr('action') || window.location.pathname,
                type: "POST",
                data: $(this).serialize(),
                dataType: "JSON",
                cache: false,
                processData:false,
                beforeSend: function(){
                    $('#submit-btn').html("<i class='la la-spinner spinner'></i>");
					$('#submit-btn').attr('disabled', true);
                },
                success: function (response) {
                  if(response['success'] == true) {
                      $('#submitForm')[0].reset();
                      toastr.success(response['message']);
                      setTimeout(function() {
                         window.location.href = '<?php echo base_url("Login/logout"); ?>';
                      }, 2000);
                  }
                   else {
                    toastr.error(response['message']);
					$('#submit-btn').attr('disabled', false);
                    $('#submit-btn').html("SAVE");
                  }
                },
                error: function (jXHR, textStatus, errorThrown) {
                    $('#submit-btn').attr('disabled', false);
					$('#submit-btn').html("SAVE");
                    toastr.error(errorThrown, 'ERROR');
                }
            });
        });
  });
</script>