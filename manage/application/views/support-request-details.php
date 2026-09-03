<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("135").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-8 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Support Request Ticket Details</h1>
    </div>

    <div class="content-header-right btn-group-sm text-right col-md-4 col-12">
        <div class="btn-group">
            <button type="button" class="btn btn-primary btn-min-width btn-sm dropdown-toggle" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">Status</button>
            <div class="dropdown-menu">
                <a class="dropdown-item"
                    href="<?php echo site_url('support/changeticketstatus/1/' . $details->id); ?>">Open</a>
                <a class="dropdown-item"
                    href="<?php echo site_url('support/changeticketstatus/2/' . $details->id); ?>">Processing</a>
                <a class="dropdown-item"
                    href="<?php echo site_url('support/changeticketstatus/3/' . $details->id); ?>">Closed – No
                    Response</a>
                <a class="dropdown-item"
                    href="<?php echo site_url('support/changeticketstatus/4/' . $details->id); ?>">Solved</a>
            </div>
        </div>

        <button onclick="window.history.back();" class="btn btn-outline-dark"><i class="la la-chevron-left"></i>
            Back</button>
    </div>
</div>


<div class="content-body">
    <section>
        <div class="row">
            <div class="col-lg-5 col-md-5 col-12">
                <div class="card">
                    <div class="card-content">

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                Ticket No. : <strong
                                    class="font-medium-3"><?php echo $details->ticketnumber; ?></strong>
                            </li>

                            <li class="list-group-item">
                                Request Date : <strong><?php echo DateFormatDisplay($details->rec_date); ?></strong>
                            </li>

                            <li class="list-group-item">
                                User Type : <strong>
                                    <?php
                  switch ($details->usertype) {
                    case '1':
                      echo "Customer";
                      break;

                    case '2':
                      echo "Guest User";
                      break;

                    default:
                      echo "-";
                      break;
                  }
                  ?>
                                </strong>
                            </li>

                            <li class="list-group-item">
                                Full name : <strong><?php echo $details->fullname; ?></strong>
                            </li>

                            <li class="list-group-item">
                                Mobile : <strong><?php echo $details->mobile; ?></strong>
                            </li>

                            <li class="list-group-item">
                                Email Id : <strong><?php echo $details->email; ?></strong>
                            </li>

                            <li class="list-group-item">
                                Card No. : <strong><?php echo $details->cardno; ?></strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 col-md-7 col-12">
                <div class="card">
                    <div class="card-content collapse show">

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <?php
                switch ($details->status) {
                  case '1':
                    echo '<p class="badge-default badge-info text-center white">Ticket is currently open.</p>';
                    break;

                  case '2':
                    echo '<p class="badge-default badge-danger text-center white">Ticket is under processing.</p>';
                    break;

                  case '3':
                    echo '<p class="badge-default badge-warning text-center white">Ticket is closed, due to no customer response.</p>';
                    break;

                  case '4':
                    echo '<p class="badge-default badge-success text-center white">Ticket is successfully resolved.</p>';
                    break;
                }
                ?>

                                Issue Type : <strong class="font-medium-2"><?php echo $details->issuetype; ?></strong>
                            </li>

                            <li class="list-group-item text-danger">
                                Customer : <br />
                                <strong><?php echo $details->message; ?></strong>
                            </li>

                            <?php
              if (count($staffreply)) {
                foreach ($staffreply as $row) {
              ?>
                            <li class="list-group-item text-info">
                                <?php echo $row->fullname; ?> -
                                <small><em><?php echo DateFormatDisplay($row->rec_date); ?></em></small> <br />
                                <strong><?php echo $row->remarks; ?></strong>

                            </li>
                            <?php }
              } ?>
                        </ul>


                        <?php echo form_open('support/addRequeststaffmsg', array('id' => 'submitForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
                        <input type="hidden" name="requestid" id="requestid" value="<?php echo $details->id; ?>">

                        <fieldset>
                            <div class="input-group">
                                <textarea class="form-control" name="remarks" id="remarks" placeholder="Staff Remark"
                                    aria-describedby="button-addon6"></textarea>
                                <div class="input-group-append">
                                    <button type="submit" id="submit-btn" class="btn btn-light bg-light border-light"><i
                                            class="la la-check"></i></button>
                                </div>
                            </div>
                        </fieldset>
                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php
include_once(APPPATH . 'views/includes/footer.php');
?>