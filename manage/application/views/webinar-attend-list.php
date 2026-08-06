<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("1605").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-12 col-12 mb-1">
	    <h1 class="content-header-title text-uppercase">
        Webinar Attand List
      </h1>
	  </div>
	</div>


	<div class="content-body">
      <section id="configuration">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <div class="heading-elements">
                    <?php 
                      $attributes = array('class' => 'email', 'id' => 'myform');
                      echo form_open('webinar/webinar_attend_detail', array('id'=>'filterForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>
                      <fieldset class="form-group row">
                      From: <input name="dt_to" type="date" class="input-sm form-control col-md-4" id="datepicker" value="<?php echo $dt_to; ?>" style="display: inline;" />
                      &nbsp; &nbsp;
                        To: <input name="dt_from" type="date" class="input-sm form-control col-md-4" id="datepicker1" value="<?php echo $dt_from; ?>" style="display: inline;" />
                        &nbsp; &nbsp;
                        <button class="btn btn-outline-primary btn-sm" name="submit" type="submit">Show</button>
                      </fieldset>
                    <?php echo form_close(); ?> 
                </div>
              </div>

              <div class="card-content collapse show">
                <div class="card-body">
                  <table class="table table-striped table-bordered table-sm responsive dataex-html5-export">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Rec. Date</th>
                        <th>Event Name</th>
                        <th>Event Date</th>
                        <th>FullName</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                        if(count($attenddetaillist)) {
                        	$cnt=1; 
                        	foreach ($attenddetaillist as $row) { ?>
                        		<tr>
                        		<td><?php echo htmlentities($cnt);?></td>
                            <td><?php echo DateFormatDisplay($row->rec_date);?></td>
                            <td><?php echo htmlentities($row->event_title);?></td>
                            <td><?php echo displayDate($row->event_datetime);?></td>
                            <td><?php echo htmlentities($row->first_name);?></td>
                            <td><?php echo htmlentities($row->mobile);?></td>
                        		<td><?php echo htmlentities($row->email);?></td>
                            <td>
                              <?php if($row->isAttend == 0){?>
                                <a href="<?php echo base_url('webinar/attand_webinar/'.$row->webinar_id.'/'.$row->id)?>" class="btn btn-icon btn-outline-danger btn-sm">Not Attand</a>
                              <?php } else if($row->isAttend == 1) { ?>
                                  <a href="<?php echo base_url('webinar/attand_webinar/'.$row->webinar_id.'/'.$row->id)?>" class="btn btn-icon btn-outline-success btn-sm"> Attand</a>
                              <?php } ?>

                            </td>
                          	</tr>
                          <?php	$cnt++;
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
<script>
$(document).ready(function() {

    <?php if($this->session->flashdata('success')) { ?>
        toastr.success("<?= $this->session->flashdata('success'); ?>");
    <?php } ?>

});
</script>