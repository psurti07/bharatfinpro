<div class="col-lg-3 col-md-3">
  <div class="card">
    <div class="card-content collapse show">
        <div class="list-group">

          <a href="<?php echo site_url('users/userdetails/'.$userdata['id']); ?>" id="7001" class="list-group-item list-group-item-action">Customer Info</a>

          <a href="<?php echo site_url('users/kycdocuments/'.$userdata['id']); ?>" id="7006" class="list-group-item list-group-item-action">KYC Documents</a>
          
          <a href="<?php echo site_url('users/membershipcard/'.$userdata['id']); ?>" id="7002" class="list-group-item list-group-item-action">Membership Card</a>

          <a href="<?php echo site_url('users/applicationlist/'.$userdata['id']); ?>" id="7003" class="list-group-item list-group-item-action">Application List</a>

          <a href="<?php echo site_url('users/referrallist/'.$userdata['id']); ?>" id="7004" class="list-group-item list-group-item-action">Referral Customers List</a>

          <a href="<?php echo site_url('users/actions/'.$userdata['id']); ?>" id="7005" class="list-group-item list-group-item-action">Actions</a>

        </div>
    </div>
  </div>
</div>