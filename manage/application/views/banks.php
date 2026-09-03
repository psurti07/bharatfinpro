<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("102").className += " active";
    document.getElementById("1021").className += " active";
}
</script>

<div class="content-header row">
    <div class="content-header-left col-md-8 col-12 mb-1">
        <h1 class="content-header-title text-uppercase">Banks</h1>
    </div>
    <div class="content-header-right btn-group-sm text-right col-md-4 col-12 mb-1">
        <a href="<?php echo site_url('banks/addForm'); ?>" target="_self" class="btn btn-outline-primary"><i
                class="la la-plus"></i> Add Bank</a>
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
                                        <th>Bank</th>
                                        <th>Bank Name</th>
                                        <th>Order No</th>
                                        <th class='text-center'>Edit</th>
                                        <th class='text-center'>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                  if (count($banklist)) {
                    $cnt = 1;
                    foreach ($banklist as $row) {
                      echo "<tr>";
                      echo "<td width='50'>" . htmlentities($cnt) . "</td>";
                      echo "<td><img src='../assets/images/bank/" . htmlentities($row->bank_image) . "' width='200'></td>";

                      echo "<td>" . htmlentities($row->bank_name) . "</td>";
                      echo "<td>" . htmlentities($row->order_no) . "</td>";

                      echo "<td class='text-center' width='50'>" . anchor("banks/editForm/{$row->id}", '<i class="la la-pencil"></i>', 'class="btn btn-icon btn-outline-warning btn-sm"') . "</td>";

                      if ($row->isDelete == 1) {
                        echo "<td class='text-center' width='50'>" . anchor("banks/restorebank/{$row->id}", '<i class="la la-rotate-left"></i>', 'class="btn btn-icon btn-outline-dark btn-sm"') . "</td>";
                      } else {
                        echo "<td class='text-center' width='50'>" . anchor("banks/deletebank/{$row->id}", '<i class="la la-trash"></i>', 'class="btn btn-icon btn-outline-danger btn-sm"') . "</td>";
                      }

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