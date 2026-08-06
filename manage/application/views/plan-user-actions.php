<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("111").className += " active";
      document.getElementById("1111").className += " active";
      document.getElementById("8005").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-8 col-12 mb-1">
        <div class="badge badge-pill badge-light badge-square">Customer</div>
  	    <h1 class="content-header-title text-uppercase">Customer Actions</h1>
        <h1 class="text-primary text-uppercase"><?php echo $userdata['fullname']." - ".$userdata['mobile']; ?></h1>
	  </div>

      <div class="content-header-right text-right col-md-4 col-12">
            <button onclick="window.history.back();" class="btn btn-outline-dark btn-sm"><i class="la la-chevron-left"></i> Back</button>
      </div>
	</div>


	<div class="content-body">
      <section id="input-validation">
        <div class="row">
          <?php
              include_once(APPPATH.'views/includes/plan-user-menu.php');
          ?>

          <div class="col-lg-9 col-md-9">
            <div class="card">
              <div class="card-content collapse show">
                <div class="card-body">

                    <?php echo form_open('plan/changepassword', array('id'=>'submitForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>
                    <h3>Change Password</h3>
                    <hr/>

                    <div class="form-body">
                      <input type="hidden" name="id" value="<?php echo $userdetails->id; ?>">
                      <input type="hidden" name="mobileno" value="<?php echo $userdetails->mobile; ?>">

                      <div class="row">
                          <div class="form-group col-md-5">
                            <h5>New Password <span class="required">*</span></h5>
                            <div class="controls">
                              <input type="password" name="newpassword" id="newpassword" class="form-control" required>
                              <div class="help-block font-small-3"></div>
                            </div>
                          </div>
                          <div class="form-group col-md-5">
                            <h5>Retype Password <span class="required">*</span></h5>
                            <div class="controls">
                              <input type="password" name="retypepassword" id="retypepassword" class="form-control" required>
                              <div class="help-block font-small-3"></div>
                            </div>
                          </div>
                          <div class="form-group col-md-2">
                            <h5><strong id="passwordtext">&nbsp;</strong></h5>
                            <button type="button" id="generate-btn" class="btn btn-light" onclick="return generatepassword();">Generate</button>
                          </div>
                      </div>

                      <div class="text-right">
                          <button type="submit" id="submit-btn" class="btn btn-success btn-min-width">Change</button>
                      </div>
                    </div>

                    <?php echo form_close(); ?>
                </div>
              </div>
            </div>


            <div class="card">
              <div class="card-content collapse show">
                <div class="card-body text-center">
                    <?php 
                      if($userdetails->isActive == 1) {
                        echo "<a onclick=\"return confirm('Are you sure you want to delete customer account permanently?');\" href='".site_url('plan/accountdeletepermanently/'.$userdata['id'])."' class='btn btn-danger btn-min-width text-white mr-5'>DELETE CUSTOMER ACCOUNT</a>";
                        echo "<a href='".site_url('plan/accountstatus/0/'.$userdata['id'])."' class='btn btn-danger btn-min-width text-white'>DEACTIVATE CUSTOMER ACCOUNT</a>";
                      }
                      else {
                        echo "<a href='".site_url('plan/accountstatus/1/'.$userdata['id'])."' class='btn btn-success btn-min-width text-white'>ACTIVATE CUSTOMER ACCOUNT</a>";
                      }
                    ?>
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

<script type="text/javascript">
  function generatepassword() {
      newpass = Math.floor(100000 + Math.random() * 900000);
      document.getElementById('newpassword').value = newpass;
      document.getElementById('retypepassword').value = newpass;
      $('#passwordtext').html(newpass);
  }

  $(function(){
      $('#submitForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url : $(this).attr('action') || window.location.pathname,
                type: "POST",
                data: new FormData(this),
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    $('#submit-btn').html("<i class='la la-spinner spinner'></i>");
					$('#submit-btn').attr('disabled', true);
                },
                success: function (response) {
                  if(response['success'] == true) {
                      toastr.success(response['message']);
                      setTimeout(function() {
                         location.reload();
                      }, 2000);
                  }
                  else {
                    toastr.error(response['message']);
                    $('#submit-btn').html("Change");
					$('#submit-btn').attr('disabled', false);
                  }
                },
                error: function (jXHR, textStatus, errorThrown) {
                    $('#submit-btn').html("Change");
					$('#submit-btn').attr('disabled', false);
                    toastr.error(errorThrown, 'ERROR');
                }
            });
        });
  });
</script>