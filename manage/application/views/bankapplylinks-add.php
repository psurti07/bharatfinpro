<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("102").className += " active";
      document.getElementById("1023").className += " active";
  }
</script>

    <div class="content-header row">
      <div class="content-header-left col-md-8 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Add Bank Apply Direct Link</h1>
      </div>
      <div class="content-header-right btn-group-sm text-right col-md-4 col-12 mb-1">
          <a href="<?php echo site_url('banks/applylinks'); ?>" target="_self" class="btn btn-outline-primary"><i class="la la-list-ol"></i> Link List</a>
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

                    <?php echo form_open('banks/addApplyLink', array('id'=>'submitForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>
                        <div class="form-body">
                          <div class="form-group btn-group-toggle" data-toggle="buttons">
                            <div class="btn-group">
                              <label class="btn btn-outline-primary active">
                                <input type="radio" name="loantype" value="11" autocomplete="off" checked>Digital Personal Loan
                              </label>
                              <label class="btn btn-outline-primary">
                                <input type="radio" name="loantype" value="12" autocomplete="off">Digital Business Loan
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
                                        echo "<option value='".$row->id."'>".$row->bank_name."</option>";
                                      }
                                    ?>
                              </select>
                              <div class="help-block font-small-3"></div>
                            </div>
                          </div>

                          <div class="form-group">
                            <h5>Apply URL <span class="required">*</span></h5>
                            <div class="controls">
                              <textarea name="applyurl" class="form-control" required data-validation-required-message="Apply URL is required" rows="5"></textarea>
                              <div class="help-block font-small-3"></div>
                            </div>
                          </div>
                        </div>

                        <div class="form-actions text-right">
                          <a href="<?php echo site_url('banks/applylinks'); ?>" class="btn btn-outline-light">CANCEL</a>
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