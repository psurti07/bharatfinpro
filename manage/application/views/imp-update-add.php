<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("130").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-8 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Add Important Update</h1>
    </div>
    <div class="content-header-right btn-group-sm text-right col-md-4 col-12">
        <a href="<?php echo site_url('career'); ?>" target="_self" class="btn btn-outline-primary"><i
                class="la la-list-ol"></i> Update List</a>
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

                            <?php echo form_open('site/addNoteData', array('id' => 'submitForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>

                            <div class="form-body">
                                <div class="form-group">
                                    <h5>Tag <span class="required">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="tags" class="form-control" required
                                            data-validation-required-message="Tag is required">
                                        <div class="help-block font-small-3"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Description</h5>
                                    <div class="controls">
                                        <textarea name="descriptions" class="ckeditor"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions text-right">
                                <a href="<?php echo site_url('site/impupdate'); ?>"
                                    class="btn btn-outline-light">CANCEL</a>
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
include_once(APPPATH . 'views/includes/footer.php');
?>