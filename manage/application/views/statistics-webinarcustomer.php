<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
		document.getElementById("144").className += " active";
      webinarcustomerdata();
  }
</script>

  <div class="content-body">

  <div class="row">
		<div class="col-12">
	      <h2 class="text-bold-600 text-center">Webinar Customer Statistics - <?php echo  date('d M, Y'); ?></h2><hr/>
	  	</div>
	</div>

	<div class="row">
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-blue bg-darken-4">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="<?php echo base_url() ?>webinar/webinarleads">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="webinarleadsell"></h3>
			          <span>Webinar Leads - All</span>
			        </div>
			        <div><i class="la la-server text-white font-large-1 float-right"></i></div>
			      </div>
			    </a>
			    </div>
			  </div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-blue bg-darken-4">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="<?php echo base_url() ?>webinar">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="webinarsellall"></h3>
			          <span>Webinar Customer - All</span>
			        </div>
			        <div><i class="la la-server text-white font-large-1 float-right"></i></div>
			      </div>
			    </a>
			    </div>
			  </div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
	      <h2 class="text-bold-600 text-center">Onboard Customer Statistics - <?php echo  date('d M, Y', strtotime('-1 day')); ?></h2><hr/>
	  	</div>
	</div>

	<div class="row">
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-blue bg-darken-4">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="<?php echo base_url() ?>webinar/webinar_onboard_detail">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="onboardleadsell"></h3>
			          <span>Onboard Leads - All</span>
			        </div>
			        <div><i class="la la-server text-white font-large-1 float-right"></i></div>
			      </div>
			    </a>
			    </div>
			  </div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up bg-blue bg-darken-4">
			  <div class="card-content">
			    <div class="card-body">
			    <a href="<?php echo base_url() ?>webinar/webinar_onboard_detail">
			      <div class="media d-flex">
			        <div class="media-body text-white text-left">
			          <h3 class="text-white" id="onboardsellall"></h3>
			          <span>Onboard Customer - All</span>
			        </div>
			        <div><i class="la la-server text-white font-large-1 float-right"></i></div>
			      </div>
			    </a>
			    </div>
			  </div>
			</div>
		</div>

  </div>

</div>
<script type="text/javascript">
function webinarcustomerdata(){
  	$.ajax({
      url: "<?php echo base_url('dashboard/webinarcustomerdata'); ?>",
      method: "POST",
      dataType: "JSON",
      cache: false,
      contentType: false,
	  	processData: false,
      beforeSend:function(){
		  document.getElementById('webinarleadsell').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('webinarsellall').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('onboardleadsell').innerHTML = "<i class='la la-spinner spinner'></i>";
          document.getElementById('onboardsellall').innerHTML = "<i class='la la-spinner spinner'></i>";
          //document.getElementById('customersellamount').innerHTML = "<i class='la la-spinner spinner'></i>";
         
      },
      success: function(response) {
          if(response['success'] == true) {
			document.getElementById('webinarleadsell').innerHTML = response['statistics']['webinarleadsell'];
            document.getElementById('webinarsellall').innerHTML = response['statistics']['webinarsellall'];
            document.getElementById('onboardleadsell').innerHTML = response['statistics']['onboardleadsell'];
            document.getElementById('onboardsellall').innerHTML = response['statistics']['onboardsellall'];
            //document.getElementById('customersellamount').innerHTML = response['statistics']['customersellamount']['total_amount'];
           
          }
      }
    });

    setTimeout(webinarcustomerdata, 300000);
}
</script>

<?php
    include_once(APPPATH.'views/includes/footer.php');
?>