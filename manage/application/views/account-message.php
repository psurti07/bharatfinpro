<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("106").className += " active";
      document.getElementById("1066").className += " active";
  }
</script>
  
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-1">
      <h1 class="content-header-title text-uppercase">Account Message</h1>
    </div>
  </div>

  <div class="content-body">
  	<div class="row">
  		<div class="col-md-12">

            <div class="card">
              <div class="card-content collapse show">
                <div class="card-body">

                    <dl class="row mb-0">
                      <dt class="col-md-3 col-12">Customer Message</dt>
                      <dd class="col-md-9 col-12">
                        <?php echo form_open('site/updateaccountmsg', array('id'=>'filterForm1', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>

                            <input type="hidden" name="id" value="<?php echo $datalist['customermsg']->id; ?>" >

                            <span class="mr-2">
                              <textarea name="content" type="text" class="form-control" id="content" rows="7" style="display: inline;"><?php echo $datalist['customermsg']->option_value; ?></textarea>
                            </span>

                            <button class="btn btn-outline-dark btn-sm" name="submit1" type="submit">Update</button>
                        <?php echo form_close(); ?> 
                      </dd>
                    </dl>

                </div>
              </div>
            </div>

        </div>
    </div>
  </div>
    
<?php
    include_once(APPPATH.'views/includes/footer.php');
?>
