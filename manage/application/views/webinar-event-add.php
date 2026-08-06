<?php
    include_once(APPPATH.'views/includes/header.php');
?>

<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("1602").className += " active";
  }
</script>

    <div class="content-header row">
      <div class="content-header-left col-md-8 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Create a Webinar Event</h1>
      </div>
      <div class="content-header-right btn-group-sm text-right col-md-4 col-12">
          <a href="<?php echo site_url('webinar/webinar_event_detail'); ?>" target="_self" class="btn btn-outline-primary"><i class="la la-list-ol"></i>Event List</a>
      </div>
    </div>


    <div class="content-body">
        <!-- Input Validation start -->
        <section class="input-validation">
          <div class="row">
            <div class="col-lg-8 col-md-8">
              <div class="card">
                
                <div class="card-content collapse show">
                  <div class="card-body">
                    <?php echo form_open('webinar/addevent', array('id'=>'submitForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate','enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8')); ?>

                        <div class="form-body">
                          <h4 class="form-section"><i class="ft-user"></i> Event Info</h4>

                            <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="eventdate">Program Date <span class="required">*</span></label>
                                  <input type="datetime-local" name="eventdate" id="eventdate" class="form-control" value="<?php echo date('Y-m-d H:i:s'); ?>" >
                                  <div class="help-block font-small-3"></div>
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="event_lag">Program Type<span class="required">*</span></label>
                                  <select class="custom-select form-control" aria-required="true" id="event_type" name="event_type" required>
                                      <option value="">Select</option>
                                      <option value="0">Online</option>
                                      <option value="1">Workshop</option>
                                      
                                  </select>
                                  <div class="help-block font-small-3"></div>
                                </div>
            
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="eventname">Program name <span class="required">*</span></label>
                                  <input type="text" name="eventname" id="eventname" aria-required="true" class="form-control">
                                  <div class="help-block font-small-3"></div>
                                </div>
                                 <div class="form-group col-md-6">
                                  <label for="event_title">Program Title <span class="required">*</span></label>
                                  <input type="text" name="event_title" id="event_title" aria-required="true" class="form-control">
                                  <div class="help-block font-small-3"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="mainprice">Program Main Price <span class="required">*</span></label>
                                  <input type="text" name="mainprice" id="mainprice" class="form-control" data-validation-regex-regex="[0-9]+" value="">
                                  <div class="help-block font-small-3"></div>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="fullname">Program Offer Price <span class="required">*</span></label>
                                  <input type="text" name="offerprice" id="offerprice" class="form-control" data-validation-regex-regex="[0-9]+" value="">
                                  <div class="help-block font-small-3"></div>
                                </div>
                            </div>
                           
                        </div>
                           
                            <div class="row">
                                <div class="form-group col-md-6">
                                  <label for="event_mentor">Program Mentor Name <span class="required">*</span></label>
                                  <input type="text" name="event_mentor" id="event_mentor" aria-required="true" class="form-control" required data-validation-regex-regex="^[a-zA-Z ]*$">
                                  <div class="help-block font-small-3"></div>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="event_lag">Program Language<span class="required">*</span></label>
                                  <select class="custom-select form-control" aria-required="true" id="event_lag" name="event_lag" required>
                                      <option value="">Select Event</option>
                                      <option value="english">English</option>
                                      <option value="hindi">Hindi</option>
                                      <option value="gujarati">Gujarati</option>
                                  </select>
                                  <div class="help-block font-small-3"></div>
                              </div>
                            </div>
                           
                             <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="event_image">Program Image <span class="required">*</span></label>
                                   <input type="file" name="event_image" ID="event_image" class="form-control" required data-validation-required-message="event image is required" accept="image/*">
                                  <div class="help-block font-small-3"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="community_link">Community Link <span class="required">*</span></label>
                                  <input type="text" name="community_link" id="community_link" aria-required="true" class="form-control">
                                  <div class="help-block font-small-3"></div>
                                </div>
                            </div>

                             <div class="row">
                                <div class="form-group col-md-12">
                                  <label for="event_desc">Program Description <span class="required">*</span></label>
                                    
                                    <div class="controls">
                                      <textarea name="event_desc" ID="event_desc" class="ckeditor"></textarea>
                                    </div>
                                  <div class="help-block font-small-3"></div>
                                </div>
                            </div>

                        <div class="form-actions text-right">
                          <button type="submit" id="submit-btn" class="btn btn-success btn-min-width">CREATE PROGRAM</button>
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
