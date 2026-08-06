<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("130").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-8 col-12 mb-1">
	    <h1 class="content-header-title text-uppercase">Important Update</h1>
	  </div>
	  <div class="content-header-right btn-group-sm text-right col-md-4 col-12 mb-1">
	      <a href="<?php echo site_url('site/addNoteForm'); ?>" target="_self" class="btn btn-outline-primary"><i class="la la-plus"></i> Add Update</a>
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
                        <th>Tag</th>
                        <th>Descriptions</th>
                        <th class='text-center'>Status</th>
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
                            echo "<td>".displayDate($row->rec_date)."</td>";
                            echo "<td>".htmlentities($row->tags)."</td>";
                            echo "<td>".$row->descriptions."</td>";
                        		
                            if($row->isActive == 1) {
                              echo "<td class='text-center'>".anchor("site/impupdatestatus/{$row->isActive}/{$row->id}",'Show','class="btn btn-icon btn-outline-success btn-sm"')."</td>";
                            }
                            else {
                              echo "<td class='text-center'>".anchor("site/impupdatestatus/{$row->isActive}/{$row->id}",'Hidden','class="btn btn-icon btn-outline-danger btn-sm"')."</td>";
                            }

                            echo "<td class='text-center' width='50'>".anchor("site/deleteimpupdate/{$row->id}",'<i class="la la-trash"></i>','class="btn btn-icon btn-outline-danger btn-sm"')."</td>";
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
