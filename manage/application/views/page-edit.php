<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("117").className += " active";
      document.getElementById("117"+<?php echo $pagedetails->id; ?>).className += " active";
  }
</script>

    <div class="content-header row">
      <div class="content-header-left col-md-12 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Page - <span class="text-uppercase"><?php echo $pagedetails->option_key; ?></span></h1>
      </div>
    </div>

    <div class="content-body">
        <!-- Input Validation start -->
        <section class="input-validation">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                
                <div class="card-content collapse show">
                  <div class="card-body">
                    <p><small class="text-muted">Fill the information to continue</small></p>

                    <?php echo form_open_multipart('site/updatePage', array('id'=>'submitForm', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data', 'novalidate'=>'novalidate')); ?>
                        <input type="hidden" name="id" value="<?php echo $pagedetails->id; ?>" required>
                        <input type="hidden" name="page" value="<?php echo $pagedetails->option_key; ?>" required>

                        <div class="form-body">
                          <div class="form-group">
                            <div class="controls">
                              <textarea name="content" class="ckeditor"><?php echo $pagedetails->option_value; ?></textarea>
                            </div>
                          </div>
                        </div>

                        <div class="form-actions text-right">
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