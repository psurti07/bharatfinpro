<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("102").className += " active";
      document.getElementById("1021").className += " active";
  }
</script>

    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Add Bank</h1>
      </div>
      <div class="content-header-right btn-group-sm text-right col-md-6 col-12 mb-1">
          <a href="<?php echo site_url('banks'); ?>" target="_self" class="btn btn-outline-primary"><i class="la la-list-ol"></i> Banks List</a>
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

                    <?php echo form_open_multipart('banks/addBank', array('id'=>'submitForm', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data', 'novalidate'=>'novalidate')); ?>
                        <div class="form-body">
                          <div class="form-group">
                            <h5>Bank Name <span class="required">*</span></h5>
                            <div class="controls">
                              <input type="text" name="bank_name" class="form-control" required data-validation-required-message="Bank name is required">
                              <div class="help-block font-small-3"></div>
                            </div>
                          </div>

                          <div class="form-group">
                            <h5>Bank Logo <span class="required">*</span></h5>
                            <div class="controls">
                              <input type="file" name="bank_image" class="form-control" required data-validation-required-message="Bank logo is required" accept="image/*">
                              <div class="help-block font-small-3"></div>
                              <p class="text-muted font-small-2 mt-1">Recommended Image Size - Width: 200px, Height: 100px</p>
                            </div>
                          </div>

                          <div class="form-group">
                            <h5>Order No</h5>
                            <div class="controls">
                              <input type="number" name="order_no" class="form-control" value="1">
                            </div>
                          </div>
                        </div>

                        <div class="form-actions text-right">
                          <a href="<?php echo site_url('banks'); ?>" class="btn btn-outline-light">CANCEL</a>
                          <button type="submit" id="submit-btn" class="btn btn-success btn-min-width">ADD</button>
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