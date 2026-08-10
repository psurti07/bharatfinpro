<footer id="footer" class="inverted">
    <div class="copyright-content background-webcolor">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="text-md-end">
                        <div class="copyright-text"><?php echo date('Y') . " &copy; " . COMPANY_NAME; ?> All rights
                            reserved.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>

<script src="<?php echo base_url('assets/js/jquery.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/plugins.js'); ?>" type="text/javascript"></script>

<script src="<?php echo base_url('assets/js/functions.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/validation/jqBootstrapValidation.js'); ?>" type="text/javascript"></script>

<script src="<?php echo base_url('assets/plugins/validate/form-validation.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/validate/form-validation.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-switch/bootstrap-switch.min.js'); ?>" type="text/javascript">
</script>

<script src="<?php echo base_url('assets/plugins/rateit/jquery.rateit.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/toastr.min.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {

    $('#loanamount, #monincome, #monemi, #monthlyincome, #cardamount').on('input', function() {
        var inputVal = $(this).val();
        inputVal = inputVal.replace(/\D/g, '');
        inputVal = inputVal.slice(0, 7);
        $(this).val(inputVal);
    });

    $('#mobileno, #mobile').on('input', function() {
        var inputVal = $(this).val();
        inputVal = inputVal.replace(/\D/g, '');
        inputVal = inputVal.slice(0, 10);
        $(this).val(inputVal);
    });

    $('#user_aadharcard_number').on('input', function() {
        var inputVal = $(this).val();
        inputVal = inputVal.replace(/\D/g, '');
        inputVal = inputVal.slice(0, 12);
        $(this).val(inputVal);
    });

    $('#cardnumber').on('input', function() {
        var inputVal = $(this).val();
        inputVal = inputVal.replace(/\D/g, '');
        inputVal = inputVal.slice(0, 16);
        $(this).val(inputVal);
    });

});
</script>
</body>

</html>