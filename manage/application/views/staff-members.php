<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
  window.onload = function() {
    document.getElementById("143").className += " active";
  }
</script>

<div class="content-header row">
  <div class="content-header-left col-md-8 col-12 mb-1">
    <h1 class="content-header-title text-uppercase">Staff Members</h1>
  </div>
  <div class="content-header-right btn-group-sm text-right col-md-4 col-12 mb-1">
    <a href="<?php echo site_url('site/staffaddForm'); ?>" target="_self" class="btn btn-outline-primary"><i class="la la-plus"></i> Add Staff Account</a>
  </div>
</div>

<div class="content-body">
  <section id="configuration">
    <div class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-content collapse show">
            <div class="card-body">
              <table class="table table-bordered table-sm dataex-res-configuration">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Fullname</th>
                    <th>Mobile No</th>
                    <th>Email Id</th>
                    <th>Role</th>
                    <th class='text-center'>Delete</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  if (count($datalist)) {
                    $cnt = 1;
                    foreach ($datalist as $row) {
                      echo "<tr>";
                      echo "<td width='50'>" . htmlentities($cnt) . "</td>";

                      echo "<td>" . htmlentities($row->fullname) . "</td>";
                      echo "<td>" . htmlentities($row->mobile) . "</td>";
                      echo "<td>" . htmlentities($row->emailid) . "</td>";

                      if ($row->role == 0) {
                        echo "<td>Admin</td>";
                      } elseif ($row->role == 1) {
                        echo "<td>Employee</td>";
                      } else {
                        echo "<td>Accountant</td>";
                      }

                      echo "<td class='text-center' width='50'>" . anchor("site/deletestaff/{$row->id}", '<i class="la la-trash"></i>', 'class="btn btn-icon btn-outline-danger btn-sm"') . "</td>";

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