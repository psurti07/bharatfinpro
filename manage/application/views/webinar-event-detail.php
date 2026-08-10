<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("1603").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Webinar Event</h1>
    </div>
</div>

<div class="content-body">
    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="content-header">
                        <div class="content-header-right btn-group-md text-right col-12 mt-2">
                            <a href="<?php echo site_url('webinar/webinar_event_detail_add'); ?>" target="_self"
                                class="btn btn-primary"><i class="la la-plus"></i>Add Event Detail</a>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-sm responsive dataex-html5-export">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Event Name</th>
                                        <th>Event Title</th>
                                        <th>Mentor Name</th>
                                        <th>Event Price</th>
                                        <th>Event Offer Price</th>
                                        <th class='text-center'>Details</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                  if (count($eventlistdetail)) {
                    $cnt = 1;
                    foreach ($eventlistdetail as $row) {
                      if ($row->isActive == 0) {
                        echo "<tr class='bg-danger bg-lighten-1 white'>";
                      } else {
                        echo "<tr>";
                      }
                      echo "<td width='50'>" . htmlentities($cnt) . "</td>";
                      echo "<td>" . htmlentities($row->event_name) . "</td>";
                      echo "<td>" . htmlentities($row->event_title) . "</td>";
                      echo "<td class='text-capitalize'>" . $row->mentor_name . "</td>";
                      echo "<td>" . htmlentities($row->event_main_price) . "</td>";
                      echo "<td width='320' class='dont-break-out'>" . htmlentities($row->event_offer_price) . "</td>";
                      echo "<td class='text-center' width='50'>" .
                        anchor("webinar/editeventdetail/{$row->id}", '<i class="la la-pencil"></i>', 'class="btn btn-icon btn-outline-dark btn-sm"')
                        . "</td>";

                      echo "</tr>";
                      $cnt++;
                    }
                  }
                  ?>

                                </tbody>
                            </table>
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
<?php if ($this->session->flashdata('success')) : ?>
<script>
toastr.success('<?php echo $this->session->flashdata("success") ?>');
</script>
<?php endif;
$this->session->unset_userdata('success'); ?>