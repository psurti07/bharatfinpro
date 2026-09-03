<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("116").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Newsletter Subsciptions</h1>
    </div>
</div>


<div class="content-body">
    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table class="table table-bordered table-sm dataex-res-configuration">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Email Id</th>
                                        <th class='text-center'>Status</th>
                                        <th class='text-center'>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                  if (count($subscribelist)) {
                    $cnt = 1;
                    foreach ($subscribelist as $row) {
                      echo "<tr>";
                      echo "<td width='50'>" . htmlentities($cnt) . "</td>";
                      echo "<td>" . DateFormatDisplay($row->rec_date) . "</td>";
                      echo "<td>" . htmlentities($row->subscribeemail) . "</td>";

                      if ($row->isActive == 1) {
                        echo "<td class='text-center'>" . anchor("site/substatus/{$row->isActive}/{$row->id}", 'Subscribe', 'class="btn btn-icon btn-outline-dark btn-sm"') . "</td>";
                      } else {
                        echo "<td class='text-center'>" . anchor("site/substatus/{$row->isActive}/{$row->id}", 'Unsubscribe', 'class="btn btn-icon btn-outline-light btn-sm"') . "</td>";
                      }

                      echo "<td class='text-center' width='50'>" . anchor("site/subscribedelete/{$row->id}", '<i class="la la-trash"></i>', 'class="btn btn-icon btn-outline-danger btn-sm"') . "</td>";
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