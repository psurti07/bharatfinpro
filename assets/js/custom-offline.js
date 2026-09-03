$(document).ready(function() {
	
	function resendotp() {
  		mobile = document.getElementById('mobileno').value;

  		$.ajax({
            url : '<?php echo base_url('apply/sendotpCode'); ?>',
            type: "POST",
            data: 'mobile=' + mobile,
            dataType: "JSON",
            cache: false,
            processData: false,
            success: function (response) {
              if(response['success'] == true) {
                  $('#resend-message').html(response['message']);
              }
            },
            error: function (jXHR, textStatus, errorThrown) {
                $('#otpcodeError').html(errorThrown);
            }
        });
  	}
/* theme:eld6MEZ6NFozNDV2WFZNYzFPWGxrUzJxaGpaLzJaWXJ2M1dKaWs1dDdNQVdLbzcvbDRwZGcwcXBkeHlZMWhtSQ==*/
  	$(function(){
      	$('#submitForm1').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url : $(this).attr('action') || window.location.pathname,
                type: "POST",
                data: $(this).serialize(),
                dataType: "JSON",
                cache: false,
                processData:false,
                beforeSend: function(){
                    $('#form-submit1').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Applying...');
                },
                success: function (response) {
                  if(response['success'] == true) {
                      $('#modalotp').modal({backdrop: 'static', keyboard: false});
                      $('#otpmobile').val(response['mobile']);
                      $('#modelotpmobile').html(response['mobile']);
                      $('#form-submit1').html("APPLY FOR LOAN");
                  }
                   else {
                    $('#mobilenoError').html(response['message']);
                    $('#form-submit1').html("APPLY FOR LOAN");
                  }
                },
                error: function (jXHR, textStatus, errorThrown) {
                    $('#form-submit1').html("APPLY FOR LOAN");
                    $('#mobilenoError').html(errorThrown);
                }
            });
        });


      	$('#submitForm2').on('submit', function(e) {
            e.preventDefault();
            $('#modalotp').modal({backdrop: 'static', keyboard: false});

            $.ajax({
                url : $(this).attr('action') || window.location.pathname,
                type: "POST",
                data: $(this).serialize(),
                dataType: "JSON",
                cache: false,
                processData:false,
                beforeSend: function(){
                    $('#form-submit2').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Verifying...');
                },
                success: function (response) {
                  if(response['success'] == true) {
                      window.location.replace("personalLoanForm/" + response['mobile']);
                  }
                   else {
                    $('#otpcodeError').html(response['message']);
                    $('#form-submit2').html("VERIFY NOW");
                  }
                },
                error: function (jXHR, textStatus, errorThrown) {
                    $('#form-submit2').html("VERIFY NOW");
                    $('#otpcodeError').html(errorThrown);
                }
            });
        });

      	$('#submitForm').on('submit', function(e) {
		    $('#form-submit').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting...');
		});
  	});
});