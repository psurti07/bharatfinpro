<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("139").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-8 col-12 mb-1">
	    <h1 class="content-header-title text-uppercase">Application File Remarks</h1>
	  </div>
	  <div class="content-header-right btn-group-sm text-right col-md-4 col-12 mb-1">
	      <a href="<?php echo site_url('site/addRemarkForm'); ?>" target="_self" class="btn btn-outline-primary"><i class="la la-plus"></i> Add Remarks</a>
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
                        <th>Status</th>
                        <th>Title</th>
                        <th>Remarks</th>
                        <th class='text-center'>Edit</th>
                        <th class='text-center'>Delete</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                        if(count($datalist)) {
                        	$cnt=1; 
                        	foreach ($datalist as $row) {
                        		echo "<tr>";
                        		echo "<td width='50'>".htmlentities($cnt)."</td>";
                        		
                            echo "<td>".htmlentities($row->statusname)."</td>";
                            echo "<td>".htmlentities($row->title)."</td>";
                        		echo "<td>".htmlentities($row->remarks)."</td>";
                            
                        		echo "<td class='text-center' width='50'>".anchor("site/editRemarkForm/{$row->id}",'<i class="la la-pencil"></i>','class="btn btn-icon btn-outline-warning btn-sm"')."</td>";

                            if($row->isDelete == 1) {
                              echo "<td class='text-center' width='50'>".anchor("site/restorefileremark/{$row->id}",'<i class="la la-rotate-left"></i>','class="btn btn-icon btn-outline-dark btn-sm"')."</td>";
                            }
                            else {
                              echo "<td class='text-center' width='50'>".anchor("site/deletefileremark/{$row->id}",'<i class="la la-trash"></i>','class="btn btn-icon btn-outline-danger btn-sm"')."</td>";
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
    include_once(APPPATH.'views/includes/footer.php');
?>
