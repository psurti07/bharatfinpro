<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("111").className += " active";
      document.getElementById("1111").className += " active";
      document.getElementById("8002").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-8 col-12 mb-1">
        <div class="badge badge-pill badge-light badge-square">Customer</div>
  	    <h1 class="content-header-title text-uppercase">Membership Card Details</h1>
        <h1 class="text-primary text-uppercase"><?php echo $userdata['fullname']." - ".$userdata['mobile']; ?></h1>
	  </div>

	  <div class="content-header-right btn-group-sm text-right col-md-4 col-12">
            <button onclick="window.history.back();" class="btn btn-outline-dark"><i class="la la-chevron-left"></i> Back</button>
      </div>
	</div>


	<div class="content-body">
      <section id="input-validation">
        <div class="row">
          <?php
              include_once(APPPATH.'views/includes/plan-user-menu.php');
          ?>

          <div class="col-lg-9 col-md-9">
            <div class="card">
              <div class="card-content collapse show">
                <div class="card-body">

                  <div class="text-right">
                    <a href="<?php echo site_url('plan/downloadinvoice/'.$userdata['id'].'/'.$carddetails->id); ?>" target="_blank" class="btn btn-success btn-sm text-white">Download Invoice</a>
                    <hr/>
                  </div>

                  <dl class="row">
                    <dd class="col-md-4">Card Type :</dd>
                    <dt class="col-md-8 text-capitalize">
                      <?php 
                      if($userdata['cardtype'] == 21) {
                        echo "Plan Personal";
                      }
                      else if($userdata['cardtype'] == 22) {
                        echo "Plan Business";
                      }
                      else { 
                        echo "-";
                      }
                      ?>
                    </dt>
                  </dl>
                  <hr/>

                  <dl class="row">
                    <dd class="col-md-4">Fullname :</dd>
                    <dt class="col-md-8 text-capitalize"><?php echo $carddetails->fullname; ?></dt>
                  </dl>
                  <hr/>

                  <dl class="row">
                    <dd class="col-md-4">Purchase Date :</dd>
                    <dt class="col-md-8"><?php echo displayDate($carddetails->registration_date); ?></dt>
                  </dl>
                  <hr/>

                  <dl class="row">
                    <dd class="col-md-4">Expiry Date :</dd>
                    <dt class="col-md-8"><?php echo displayDate($carddetails->expiry_date); ?></dt>
                  </dl>
                  <hr/>

                  <dl class="row">
                    <dd class="col-md-4">Card Number :</dd>
                    <dt class="col-md-8"><?php echo $carddetails->card_number; ?></dt>
                  </dl>
                  <hr/>

                  <dl class="row">
                    <dd class="col-md-4">Amount :</dd>
                    <dt class="col-md-8"><?php echo formatePriceIndia($carddetails->amount); ?></dt>
                  </dl>
                  <hr/>

                  <dl class="row">
                    <dd class="col-md-4">Payment Id :</dd>
                    <dt class="col-md-8"><?php echo $carddetails->paymentid; ?></dt>
                  </dl>
                  <hr/>

                  <dl class="row">
                    <dd class="col-md-4">Card Status :</dd>
                    <dt class="col-md-8"><?php
                      if($carddetails->isActive == 1) {
                        echo "<span class='text-success'>Active</span>";
                      }
                      else {
                        echo "<span class='text-danger'>Not Active</span>";
                      } ?></dt>
                  </dl>
                
                </div>
              </div>
            </div>
          </div>
         
        </div>
      </section>
    </div>
    
<?php
    include_once(APPPATH.'views/includes/footer.php');
?>
