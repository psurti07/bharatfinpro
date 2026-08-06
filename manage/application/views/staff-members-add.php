<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
  window.onload = function() {
    document.getElementById("143").className += " active";
  }
</script>

<div class="content-header row">
  <div class="content-header-left col-md-8 col-12 mb-1">
    <h1 class="content-header-title text-uppercase">Add Staff Member</h1>
  </div>
  <div class="content-header-right btn-group-sm text-right col-md-4 col-12 mb-1">
    <a href="<?php echo site_url('site/stafflist'); ?>" target="_self" class="btn btn-outline-primary"><i class="la la-list-ol"></i> Staff List</a>
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

              <?php echo form_open('site/addStaffmember', array('id' => 'submitForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
              <div class="form-body">
                <div class="form-group btn-group-toggle" data-toggle="buttons">
                  <div class="btn-group">
                    <label class="btn btn-outline-dark">
                      <input type="radio" name="staffrole" value="0" autocomplete="off"><i class="icon-user"></i> Admin
                    </label>
                    <label class="btn btn-outline-dark active">
                      <input type="radio" name="staffrole" value="1" autocomplete="off" checked><i class="icon-user"></i> Employee
                    </label>
                    <label class="btn btn-outline-dark">
                      <input type="radio" name="staffrole" value="2" autocomplete="off"><i class="icon-user"></i> ACCOUNTANT
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label for="fullname">Full Name <span class="required">*</span></label>
                  <div class="controls">
                    <input type="text" name="fullname" class="form-control" required data-validation-required-message="Name is required">
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="mobile">Mobile No <span class="required">*</span></label>
                  <input type="text" name="mobile" id="mobile" class="form-control" aria-required="true" required inputmode="numeric" data-validation-regex-regex="^[6789]\d{9}$" maxlength="10">
                  <div class="help-block font-small-3"></div>
                </div>

                <div class="form-group">
                  <label for="emailid">Email Id <span class="required">*</span></label>
                  <input type="email" name="emailid" id="emailid" class="form-control" aria-required="true" required>
                  <div class="help-block font-small-3"></div>
                </div>

                <div class="form-group">
                  <h5>New Password <span class="required">*</span></h5>
                  <div class="controls">
                    <input type="password" name="newpassword" id="newpassword" class="form-control" required>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>

                <div class="form-group">
                  <h5>Retype Password <span class="required">*</span></h5>
                  <div class="controls">
                    <input type="password" name="retypepassword" id="retypepassword" class="form-control" required>
                    <div class="help-block font-small-3"></div>
                  </div>
                </div>

                <div class="form-group">
                  <h5><strong id="passwordtext">&nbsp;</strong></h5>
                  <button type="button" id="generate-btn" class="btn btn-light" onclick="return generatepassword();">Generate</button>
                </div>

              </div>

              <div class="form-actions text-right">
                <a href="<?php echo site_url('site/stafflist'); ?>" class="btn btn-outline-light">CANCEL</a>
                <button type="submit" id="submit-btn" class="btn btn-success btn-min-width">CREATE ACCOUNT</button>
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
include_once(APPPATH . 'views/includes/footer.php');
?>

<script type="text/javascript">
  function generatepassword() {
    newpass = Math.floor(10000000 + Math.random() * 90000000);
    document.getElementById('newpassword').value = newpass;
    document.getElementById('retypepassword').value = newpass;
    $('#passwordtext').html(newpass);
  }

  $(function() {
    $('#submitForm').on('submit', function(e) {
      e.preventDefault();

      $.ajax({
        url: $(this).attr('action') || window.location.pathname,
        type: "POST",
        data: new FormData(this),
        dataType: "JSON",
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          $('#submit-btn').html("<i class='la la-spinner spinner'></i>");
          $('#submit-btn').attr('disabled', true);
        },
        success: function(response) {
          if (response['success'] == true) {
            toastr.success(response['message']);
            setTimeout(function() {
              location.reload();
            }, 2000);
          } else {
            toastr.error(response['message']);
            $('#submit-btn').html("CREATE ACCOUNT");
            $('#submit-btn').attr('disabled', false);
          }
        },
        error: function(jXHR, textStatus, errorThrown) {
          $('#submit-btn').html("CREATE ACCOUNT");
          $('#submit-btn').attr('disabled', false);
          toastr.error(errorThrown, 'ERROR');
        }
      });
    });
  });
</script>