<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("139").className += " active";
  }
</script>

    <div class="content-header row">
      <div class="content-header-left col-md-8 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Edit Application File Remark</h1>
      </div>
      <div class="content-header-right btn-group-sm text-right col-md-4 col-12">
          <a href="<?php echo site_url('site/fileremarks'); ?>" target="_self" class="btn btn-outline-primary"><i class="la la-list-ol"></i> Remarks List</a>
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

                    <?php echo form_open('site/editFileRemark', array('id'=>'submitForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>
                        <input type="hidden" name="id" value="<?php echo $remarkdetails->id; ?>" required>

                        <div class="form-body">
                          <div class="form-group">
                            <h5>Status <span class="required">*</span></h5>
                            <div class="controls">
                              <select name="statusid" id="statusid" data-placeholder="Select Status" class="select2 form-control" required data-validation-required-message="Status is required">
                                    <option value="">Select Status</option>
                                    <?php
                                      foreach($statuslist as $row) {
                                        if($row->id == $remarkdetails->statusid) {
                                            echo "<option value='".$row->id."' selected>".$row->statusname."</option>";
                                        }
                                        else {
                                            echo "<option value='".$row->id."'>".$row->statusname."</option>";
                                        }
                                      }
                                    ?>
                              </select>
                              <div class="help-block font-small-3"></div>
                            </div>
                          </div>

                          <div class="form-group">
                            <h5>Title <span class="required">*</span></h5>
                            <div class="controls">
                              <input type="text" name="title" class="form-control" value="<?php echo $remarkdetails->title; ?>" required data-validation-required-message="Remark title is required">
                              <div class="help-block font-small-3"></div>
                            </div>
                          </div>

                          <div class="form-group">
                            <h5>Remarks <span class="required">*</span></h5>
                            <div class="controls">
                              <textarea name="remarks" class="form-control" required data-validation-required-message="Remark content is required" rows="10"><?php echo $remarkdetails->remarks; ?></textarea>
                              <div class="help-block font-small-3"></div>
                            </div>
                          </div>
                        </div>

                        <div class="form-actions text-right">
                          <a href="<?php echo site_url('site/fileremarks'); ?>" class="btn btn-outline-light">CANCEL</a>
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
