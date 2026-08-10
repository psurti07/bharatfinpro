<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("141").className += " active";
    //processstepdata();
}
</script>

<div class="content-body">
    <div class="row">
        <div class="col-12">
            <h2 class="text-bold-600 text-center">Process Steps Statistics - <?php echo date('d M, Y'); ?></h2>
            <hr />
        </div>
        <div class="col-12">

            <div class="heading-elements">
                <?php echo form_open('dashboard/processstepdata', array('id' => 'filterForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                <fieldset class="form-group row">
                    From: <input name="dt_to" type="date" class="input-sm form-control col-md-4" id="datepicker"
                        value="<?php echo $dt_to; ?>" style="display: inline;" />
                    &nbsp; &nbsp;
                    To: <input name="dt_from" type="date" class="input-sm form-control col-md-4" id="datepicker1"
                        value="<?php echo $dt_from; ?>" style="display: inline;" />
                    &nbsp; &nbsp;
                    <button class="btn btn-outline-primary btn-sm" name="submit" type="submit">Show</button>
                </fieldset>
                <?php echo form_close(); ?>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a class="text-dark" href="<?php echo site_url('report/processstep/1'); ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700" id="userregistration">
                                        <?php echo  $statistics['userregistration'] ?></h3>
                                    <span>User Registration</span>
                                </div>
                                <div><i class="la font-large-1 float-right">1</i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a class="text-dark" href="<?php echo site_url('report/processstep/2'); ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700" id="usereligibility">
                                        <?php echo  $statistics['usereligibility'] ?></h3>
                                    <span>Check Eligibility</span>
                                </div>
                                <div><i class="la font-large-1 float-right">2</i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a class="text-dark" href="<?php echo site_url('report/processstep/3'); ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700" id="userpreapproved">
                                        <?php echo  $statistics['userpreapproved'] ?></h3>
                                    <span>Pre-approved</span>
                                </div>
                                <div><i class="la font-large-1 float-right">3</i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a class="text-dark" href="<?php echo site_url('report/processstep/4'); ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700" id="membershipcard">
                                        <?php echo  $statistics['membershipcard'] ?></h3>
                                    <span>Membership Card</span>
                                </div>
                                <div><i class="la font-large-1 float-right">4</i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a class="text-dark" href="<?php echo site_url('report/processstep/5'); ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700" id="userverification">
                                        <?php echo  $statistics['userverification'] ?></h3>
                                    <span>User Verification</span>
                                </div>
                                <div><i class="la font-large-1 float-right">5</i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a class="text-dark" href="<?php echo site_url('report/processstep/6'); ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700" id="docverification">
                                        <?php echo  $statistics['docverification'] ?></h3>
                                    <span>Document Verification</span>
                                </div>
                                <div><i class="la font-large-1 float-right">6</i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a class="text-dark" href="<?php echo site_url('report/processstep/7'); ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700" id="appinprocess">
                                        <?php echo  $statistics['appinprocess']; ?></h3>
                                    <span>Application - In Process</span>
                                </div>
                                <div><i class="la font-large-1 float-right">7</i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a class="text-dark" href="<?php echo site_url('report/processstep/8'); ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700" id="appqueryprocess">
                                        <?php echo $statistics['appqueryprocess'] ?></h3>
                                    <span>Application - Query Process</span>
                                </div>
                                <div><i class="la font-large-1 float-right">8</i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a class="text-dark" href="<?php echo site_url('report/processstep/9'); ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700" id="appfilereopen">
                                        <?php echo $statistics['appfilereopen'] ?></h3>
                                    <span>Application - File Reopen</span>
                                </div>
                                <div><i class="la font-large-1 float-right">9</i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a class="text-dark" href="<?php echo site_url('report/processstep/10'); ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700" id="apprejected"><?php echo $statistics['apprejected'] ?>
                                    </h3>
                                    <span>Application - Rejected</span>
                                </div>
                                <div><i class="la font-large-1 float-right">10</i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card pull-up border-primary">
                <div class="card-content">
                    <div class="card-body">
                        <a class="text-dark" href="<?php echo site_url('report/processstep/11'); ?>">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="text-bold-700" id="appapproved"><?php echo $statistics['appapproved'] ?>
                                    </h3>
                                    <span>Application - Approved</span>
                                </div>
                                <div><i class="la font-large-1 float-right">11</i></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
/*function processstepdata(){
  	$.ajax({
      url: "<?php echo base_url('dashboard/processstepdata'); ?>",
      method: "POST",
      dataType: "JSON",
      cache: false,
      contentType: false,
	  	processData: false,
      beforeSend:function(){
          document.getElementById('userregistration').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('usereligibility').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('userpreapproved').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('membershipcard').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('userverification').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('docverification').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('appinprocess').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('appqueryprocess').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('appfilereopen').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('apprejected').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('appapproved').innerHTML = "<i class='la la-spinner spinner'></i>";
      },
      success: function(response) {
          if(response['success'] == true) {
            document.getElementById('userregistration').innerHTML = response['statistics']['userregistration'];
            document.getElementById('usereligibility').innerHTML = response['statistics']['usereligibility'];
            document.getElementById('userpreapproved').innerHTML = response['statistics']['userpreapproved'];
            document.getElementById('membershipcard').innerHTML = response['statistics']['membershipcard'];
            document.getElementById('userverification').innerHTML = response['statistics']['userverification'];
            document.getElementById('docverification').innerHTML = response['statistics']['docverification'];
            document.getElementById('appinprocess').innerHTML = response['statistics']['appinprocess'];
            document.getElementById('appqueryprocess').innerHTML = response['statistics']['appqueryprocess'];
            document.getElementById('appfilereopen').innerHTML = response['statistics']['appfilereopen'];
            document.getElementById('apprejected').innerHTML = response['statistics']['apprejected'];
            document.getElementById('appapproved').innerHTML = response['statistics']['appapproved'];
          }
      }
    });

    setTimeout(applicationdata, 300000);
}*/
</script>

<?php
include_once(APPPATH . 'views/includes/footer.php');
?>