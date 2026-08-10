<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("1602").className += " active";
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
                            <a href="<?php echo site_url('webinar/webinar_event'); ?>" target="_self"
                                class="btn btn-primary"><i class="la la-plus"></i>Add Event</a>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-sm responsive dataex-html5-export">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Event Type</th>
                                        <th>Event Name</th>
                                        <th>Event Date</th>
                                        <th>Event Price</th>
                                        <th>Event Offer Price</th>
                                        <th>Event Title</th>
                                        <th>Mentor Name</th>
                                        <th>Language</th>
                                        <th>Image</th>
                                        <th class='text-center'>Details</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                  if (count($eventlist)) {
                    $cnt = 1;
                    foreach ($eventlist as $row) {
                      if ($row->isActive == 0) {
                        echo "<tr class='bg-danger bg-lighten-1 white'>";
                      } else {
                        echo "<tr>";
                      }

                      echo "<td width='50'>" . htmlentities($cnt) . "</td>";
                      if ($row->event_type == "0") {
                        echo "<td width='50'>Online</td>";
                      } else if ($row->event_type == "1") {
                        echo "<td width='50'>Workshop</td>";
                      }
                      echo "<td>" . htmlspecialchars($row->event_name ?? '') . "</td>";
                      echo "<td class='text-capitalize'>" . $row->event_datetime . "</td>";
                      echo "<td>" . htmlspecialchars($row->event_main_price ?? '') . "</td>";
                      echo "<td width='320' class='dont-break-out'>" . htmlspecialchars($row->event_offer_price ?? '') . "</td>";
                      echo "<td width='320' class='dont-break-out'>" . htmlspecialchars($row->event_title ?? '') . "</td>";
                      echo "<td width='320' class='dont-break-out'>" . htmlspecialchars($row->mentor_name ?? '') . "</td>";
                      echo "<td width='320' class='dont-break-out'>" . htmlspecialchars($row->language ?? '') . "</td>";
                      echo "<td width='320' class='dont-break-out'><img src='" . COMPANY_SITE . "/assets/images/webinarpage/" . htmlspecialchars($row->event_image ?? '') . "' width='200'></td>";
                      echo "<td class='text-center' width='50'>" .
                        anchor("webinar/editForm/{$row->id}", '<i class="la la-pencil"></i>', 'class="btn btn-icon btn-outline-dark btn-sm"')
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