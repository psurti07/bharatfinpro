<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("125").className += " active";
  }
</script>

  <div class="content-header row">
	  <div class="content-header-left col-md-12 col-12 mb-1">
	    <h1 class="content-header-title text-uppercase">Invoice</h1>
	  </div>
	</div>


	<div class="content-body">
      <section id="configuration">
        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <div class="heading-elements">
                    <?php echo form_open('account/invoice', array('id'=>'filterForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>
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
                        <th>Rec Date</th>
                        <th>INV Date</th>
                        <th>INV #</th>
                        <th>Fullname</th>
                        <th>Mobile</th>
                        <th class='text-right'>Total Amount</th>
                        <th>Payment Id</th>
                        <th class='text-center'>Print</th>
                        <th class='text-center'>Refund</th>
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

                            echo "<td>" . DateFormatDisplay($row['rec_date']) . "</td>";

                            echo "<td>".displayDate($row['inv_date'])."</td>";

                            echo "<td>".$row['inv_prefix'].$row['inv_number']."</td>";

                            echo "<td>";
                            if($row['inv_for'] == 1 || $row['inv_for'] == 2) {
                              if(isset($row['fullname'])){
                                echo anchor("users/userdetails/{$row['userid']}",$row['fullname'],'class="text-capitalize"');
                              }
                            } else if($row['inv_for'] == 4 || $row['inv_for'] == 5) {
                              if(isset($row['fullname'])){
                                echo anchor("plan/userdetails/{$row['userid']}",$row['fullname'],'class="text-capitalize"');
                              }
                            }
                            else if($row['inv_for'] == 3) {
                                echo anchor("channel/partnerdetails/{$row['userid']}",$row['fullname'],'class="text-capitalize"');
                            }
                            echo "</td>";
                            
                            echo "<td>";
                            if(isset($row['mobile'])){ echo htmlentities($row['mobile']);}
                            "</td>";

                            echo "<td class='text-right'>".formatePriceIndia($row['inv_grandtotal'])."</td>";

                            echo "<td>".htmlspecialchars($row['paymentid'] ?? '')."</td>";

                            echo "<td class='text-center' width='50'>";
                            if($row['inv_for'] == 1 || $row['inv_for'] == 2) {
                                echo anchor("users/downloadinvoice/{$row['userid']}/{$row['id']}",'<i class="la la-print"></i>','class="btn btn-icon btn-outline-primary btn-sm" target="_blank"');
                            } else if($row['inv_for'] == 4 || $row['inv_for'] == 5) {
                                echo anchor("plan/downloadinvoice/{$row['userid']}/{$row['id']}",'<i class="la la-print"></i>','class="btn btn-icon btn-outline-primary btn-sm" target="_blank"');
                            }
                            else if($row['inv_for'] == 3) {
                                echo anchor("channel/downloadinvoice/{$row['userid']}/{$row['id']}",'<i class="la la-print"></i>','class="btn btn-icon btn-outline-primary btn-sm" target="_blank"');
                            }
                            echo "</td>";

                            echo "<td class='text-center' width='50'><a href='#' class='btn btn-icon btn-outline-warning btn-sm' onclick='showRefundModal({$row['id']}, {$row['inv_number']})'><i class='la la-reply'></i></a></td>";
                           
                            echo "<td class='text-center' width='50'>";
                            if($row['isDelete'] == 1) {
                              echo anchor("account/restoreinvoice/{$row['id']}",'<i class="la la-rotate-left"></i>','class="btn btn-icon btn-outline-dark btn-sm"');
                            }
                            else {
                              echo anchor("account/deleteinvoice/{$row['id']}",'<i class="la la-trash"></i>','class="btn btn-icon btn-outline-danger btn-sm"');
                            }
                            echo "</td>";

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
    

<!-- Modal -->
<div class="modal text-left" id="refundamountmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel17">Refund Amount</h4>
      </div>
      <div class="modal-body">
          <?php echo form_open('account/raiserefund', array('id'=>'submitForm', 'class'=>'form-horizontal', 'novalidate'=>'novalidate')); ?>

            <div class="form-body">
              <div class="form-group">
                <h5>Invoice Number : <span id="invoicenumber"></span></h5>
                <div class="controls">
                    <input type="hidden" name="invoiceno" id="invoiceno" class="form-control" required value="">
                    <input type="hidden" name="invoiceid" id="invoiceid" class="form-control" required value="">
                </div>
              </div>

              <div class="form-group">
                <h5>Payment Id <span class="required">*</span></h5>
                <div class="controls">
                    <input type="text" name="paymentid" id="paymentid" aria-required="true" class="form-control" required />
                    <div class="help-block font-small-3"></div>
                </div>
              </div>

              <div class="form-group">
                <h5>Remarks</h5>
                <div class="controls">
                    <textarea name="remarks" id="remarks" rows="6" class="form-control"></textarea>
                </div>
              </div>
            </div>

            <div class="form-actions text-right pb-0">
              <button type="button" class="btn grey btn-outline-light btn-min-width" data-dismiss="modal">Close</button>
              <button type="submit" id="submit-btn" class="btn btn-success btn-min-width">Refund Now</button>
            </div>
          <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>

<?php
    include_once(APPPATH.'views/includes/footer.php');
?>

<script type="text/javascript">   
  function showRefundModal(invid=0, invno=0){
    if(invid!=0 || invno!=0) {
      $('#invoiceid').val(invid);
      $('#invoiceno').val(invno);
      document.getElementById('invoicenumber').innerHTML = invno;
    
      $('#refundamountmodal').modal('show');
    }
  }

$(document).ready(function(){
  $('#submitForm').on('submit', function(event){
    event.preventDefault();

    $.ajax({
      url : $(this).attr('action') || window.location.pathname,
      method:"POST",
      data:new FormData(this),
      dataType: "JSON",
      contentType: false,
      cache: false,
      processData: false,
      beforeSend:function(){
          $('#submit-btn').html('Processing...');
          $('#submit-btn').attr('disabled', true);
      },
      success:function(response){
        if(response['success'] == true) {
            toastr.success(response['message']);
            setTimeout(function() {
               location.reload();
            }, 2000);
        }
        else {
          toastr.error(response['message']);
        }
      },
      error: function (jXHR, textStatus, errorThrown) {
          $('#submit-btn').attr('disabled', false);
          $('#submit-btn').html('Refund No');
          toastr.error(errorThrown, 'ERROR');
      }
    })
  });
  
});
</script>