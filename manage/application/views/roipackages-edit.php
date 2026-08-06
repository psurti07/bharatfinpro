<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("102").className += " active";
      document.getElementById("1022").className += " active";
  }
</script>

    <div class="content-header row">
      <div class="content-header-left col-md-8 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Edit ROI Package</h1>
      </div>
      <div class="content-header-right btn-group-sm text-right col-md-4 col-12 mb-1">
          <a href="<?php echo site_url('banks/roipackages'); ?>" target="_self" class="btn btn-outline-warning"><i class="la la-list-ol"></i> Packages List</a>
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

                    <?php echo form_open('banks/editRoiPackage', array('id'=>'submitForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>
                        <div class="form-body">
                          <input type="hidden" name="id" value="<?php echo $packagedetails->id; ?>" required>

                          <div class="form-group btn-group-toggle" data-toggle="buttons">
                            <div class="btn-group">
                              <label class="btn btn-outline-warning <?php echo ($packagedetails->loantype == 11) ? 'active' : ''; ?>">
                                <input type="radio" name="loantype" value="11" autocomplete="off" <?php echo ($packagedetails->id == 11) ? 'checked' : ''; ?>>Digital Personal Loan
                              </label>
                              <label class="btn btn-outline-warning <?php echo ($packagedetails->loantype == 12) ? 'active' : ''; ?>">
                                <input type="radio" name="loantype" value="12" autocomplete="off" <?php echo ($packagedetails->id == 12) ? 'checked' : ''; ?>>Digital Business Loan
                              </label>
                            </div>
                          </div>

                          <div class="form-group">
                            <h5>Bank <span class="required">*</span></h5>
                            <div class="controls">
                              <select name="bankid" id="bankid" data-placeholder="Select Bank" class="select2 form-control" required data-validation-required-message="Bank is required">
                                    <option value="">Select Bank</option>
                                    <?php
                                      foreach($banklist as $row) {
                                        if($packagedetails->bankid == $row->id) {
                                          echo "<option value='".$row->id."' selected>".$row->bank_name."</option>";
                                        }
                                        else {
                                          echo "<option value='".$row->id."'>".$row->bank_name."</option>";
                                        }
                                      }
                                    ?>
                              </select>
                              <div class="help-block font-small-3"></div>
                            </div>
                          </div>

                          <div class="form-group">
                            <h5>ROI <span class="required">*</span></h5>
                            <div class="controls">
                              <input type="text" name="roi" value="<?php echo $packagedetails->roi; ?>" class="form-control" required data-validation-regex-regex="[0-9,.]+" data-validation-required-message="ROI is required">
                              <div class="help-block font-small-3"></div>
                            </div>
                          </div>

                          <div class="form-group">
                            <h5>Terms - Years <span class="required">*</span></h5>
                            <div class="controls">
                              <input type="text" name="termsyears" value="<?php echo $packagedetails->termsyears; ?>" class="form-control" required data-validation-regex-regex="[0-9,.]+" data-validation-required-message="Terms is required">
                              <div class="help-block font-small-3"></div>
                            </div>
                          </div>

                          <div class="form-group">
                            <h5>Terms - Months <span class="required">*</span></h5>
                            <div class="controls">
                              <input type="text" name="termsmonths" value="<?php echo $packagedetails->termsmonths; ?>" class="form-control" required data-validation-required-message="Terms is required">
                              <div class="help-block font-small-3"></div>
                            </div>
                          </div>
                        </div>

                        <div class="form-actions text-right">
                          <a href="<?php echo site_url('banks/roipackages'); ?>" class="btn btn-outline-light">CANCEL</a>
                          <button type="submit" id="submit-btn" class="btn btn-success btn-min-width">UPDATE</button>
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