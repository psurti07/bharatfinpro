<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("105").className += " active";
    document.getElementById("1051").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-8 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Edit Current Opening</h1>
    </div>
    <div class="content-header-right btn-group-sm text-right col-md-4 col-12">
        <a href="<?php echo site_url('career'); ?>" target="_self" class="btn btn-outline-primary"><i
                class="la la-list-ol"></i> Current Opening List</a>
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

                            <?php echo form_open('career/editCareer', array('id' => 'submitForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                            <input type="hidden" name="id" value="<?php echo $careerdetails->id; ?>" required>

                            <div class="form-body">
                                <div class="form-group">
                                    <h5>Job Title <span class="required">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="co_title" class="form-control"
                                            value="<?php echo $careerdetails->title; ?>" required
                                            data-validation-required-message="Job title is required">
                                        <div class="help-block font-small-3"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Description</h5>
                                    <div class="controls">
                                        <textarea name="co_description"
                                            class="ckeditor"><?php echo $careerdetails->descriptions; ?></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="form-actions text-right">
                                <a href="<?php echo site_url('career'); ?>" class="btn btn-outline-light">CANCEL</a>
                                <button type="submit" id="submit-btn"
                                    class="btn btn-success btn-min-width">UPDATE</button>
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