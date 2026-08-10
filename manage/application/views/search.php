<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("999").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Search Data</h1>
    </div>
</div>

<div class="content-body">
    <section id="configuration">
        <div class="row">

            <div class="col-md-5 col-12">
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <?php echo form_open('site/search', array('id' => 'submitForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <h5>Search Data <span class="required">*</span></h5>
                                    <div class="controls">
                                        <fieldset class="radio">

                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" value="customer" name="module" checked <?php
                                                                                      echo set_value('customer', $module) == 'customer' ? "checked" : "";
                                                                                      ?> /> Customer - Digital
                                                </label>
                                            </div>

                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" value="customerplan" name="module" <?php
                                                                                  echo set_value('customerplan', $module) == 'customerplan' ? "checked" : "";
                                                                                  ?> /> Customer - Plan
                                                </label>
                                            </div>
                                        </fieldset>

                                        <div class="help-block font-small-3"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Mobile No <span class="required">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="mobile" id="mobile" value="<?php echo $mobile; ?>"
                                            class="form-control" required data-validation-regex-regex="[0-9]+"
                                            maxlength="10">
                                        <div class="help-block font-small-3"></div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-actions text-right">
                                <button type="submit" id="submit-btn"
                                    class="btn btn-success btn-min-width">SEARCH</button>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-7 col-12">
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <?php
              if (!empty($datalist)) {
                echo "<ul class='list-group'>";
                echo "<li class='list-group-item text-uppercase'><strong>Module : </strong>" . $module . "</li>";

                echo "<li class='list-group-item'><strong>Mobile : </strong>" . $datalist['mobile'] . "</li>";

                echo "<li class='list-group-item'><strong>Date : </strong>" . date('d-m-Y H:i', strtotime($datalist['rec_date'])) . "</li>";

                echo "<li class='list-group-item text-uppercase'><strong>Fullname : </strong>" . $datalist['fullname'] . "</li>";

                echo "<li class='list-group-item'><strong>Email Id : </strong>" . $datalist['emailid'] . "</li>";

                if ($module == "customer") {
                  if (isset($datalist['isuser'])) {
                    if ($datalist['isuser'] == 2) {
                      echo "<li class='list-group-item text-success'>Registred as a customer.</li>";
                      echo "<li class='list-group-item'>" . anchor("users/userdetails/{$datalist['id']}", 'MORE DETAILS <i class="la la-long-arrow-right"></i>', 'class="btn btn-icon btn-outline-dark btn-sm"') . " " . anchor("loan/appdetails/{$datalist['id']}", 'Application Status <i class="la la-long-arrow-right"></i>', 'class="btn btn-icon btn-outline-dark btn-sm"') . "</li>";
                    }
                    if ($datalist['isuser'] == 1) {
                      echo "<li class='list-group-item text-warning'>Data as a Company lead</li>";
                      echo "<li class='list-group-item'>" . anchor("users/leaddetails/{$datalist['id']}", 'MORE DETAILS <i class="la la-long-arrow-right"></i>', 'class="btn btn-icon btn-outline-dark btn-sm"') . "</li>";
                    }
                  }
                } else if ($module == "customerplan") {
                  if (isset($datalist['isuser'])) {
                    if ($datalist['isuser'] == 2) {
                      echo "<li class='list-group-item text-success'>Registred as a customer.</li>";
                      echo "<li class='list-group-item'>" . anchor("plan/userdetails/{$datalist['id']}", 'MORE DETAILS <i class="la la-long-arrow-right"></i>', 'class="btn btn-icon btn-outline-dark btn-sm"') . " " . anchor("planloan/appdetails/{$datalist['id']}", 'Application Status <i class="la la-long-arrow-right"></i>', 'class="btn btn-icon btn-outline-dark btn-sm"') . "</li>";
                    }
                    if ($datalist['isuser'] == 1) {
                      echo "<li class='list-group-item text-warning'>Data as a Company lead</li>";
                      echo "<li class='list-group-item'>" . anchor("plan/leaddetails/{$datalist['id']}", 'MORE DETAILS <i class="la la-long-arrow-right"></i>', 'class="btn btn-icon btn-outline-dark btn-sm"') . "</li>";
                    }
                  }
                }

                echo "</ul>";
              } else {
                echo "<p>No data found.</p>";
              }
              ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<?php
include_once(APPPATH . 'views/includes/footer.php');
?>