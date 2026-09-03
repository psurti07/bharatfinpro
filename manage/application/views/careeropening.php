<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("105").className += " active";
    document.getElementById("1051").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-8 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Current Openings</h1>
    </div>
    <div class="content-header-right btn-group-sm text-right col-md-4 col-12">
        <a href="<?php echo site_url('career/addForm'); ?>" target="_self" class="btn btn-outline-primary"><i
                class="la la-plus"></i> Add Openings</a>
    </div>
</div>


<div class="content-body">
    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table class="table table-striped table-bordered table-sm dataex-res-configuration">
                                <thead>
                                    <tr>
                                        <th width='50'>#</th>
                                        <th width='200'>Title</th>
                                        <th>Descriptions</th>
                                        <th class='text-center'>Status</th>
                                        <th class='text-center'>Edit</th>
                                        <th class='text-center'>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                  if (count($openinglist)) {
                    $cnt = 1;
                    foreach ($openinglist as $row) {
                      echo "<tr>";
                      echo "<td>" . htmlentities($cnt) . "</td>";
                      echo "<td>" . htmlentities($row->title) . "</td>";
                      echo "<td>" . $row->descriptions . "</td>";

                      if ($row->isActive == 1) {
                        echo "<td class='text-center'>" . anchor("career/changestatus/{$row->isActive}/{$row->id}", 'Active', 'class="btn btn-icon btn-outline-success btn-sm"') . "</td>";
                      } else {
                        echo "<td class='text-center'>" . anchor("career/changestatus/{$row->isActive}/{$row->id}", 'Inactive', 'class="btn btn-icon btn-outline-danger btn-sm"') . "</td>";
                      }

                      echo "<td class='text-center' width='50'>" . anchor("career/editForm/{$row->id}", '<i class="la la-pencil"></i>', 'class="btn btn-icon btn-outline-warning btn-sm"') . "</td>";

                      echo "<td class='text-center' width='50'>" . anchor("career/deletecareer/{$row->id}", '<i class="la la-trash"></i>', 'class="btn btn-icon btn-outline-danger btn-sm"') . "</td>";

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