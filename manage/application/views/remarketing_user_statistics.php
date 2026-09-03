<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
window.onload = function() {
    document.getElementById("142").className += " active";
    document.getElementById('lodder').innerHTML = "<i class='la la-spinner spinner' style='font-size: 100px;'></i>";
    applicationdata();

}
</script>

<div class="content-body">
    <div class="row">
        <div class="col-12">
            <h2 class="text-bold-600 text-center">Data lock detail</h2>
            <h3>
                <?php if (DATA_LOCK == 'YES') { ?>
                <?php if (DAYS_LOCK != '#') { ?>
                <strong>Days Lock :</strong> <?php echo DAYS_LOCK; ?>
                <?php } else if (DATE_LOCK != '#') { ?>
                <strong>Date Lock :</strong> <?php echo DATE_LOCK; ?>
                <?php } ?>
                <?php } else { ?>
                <strong>No data lock</strong>
                <?php } ?>

            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h2 class="text-bold-600 text-center">Remarketing User Statistics</h2>
            <hr />
        </div>
    </div>

    <div class="row" id="remarketingusers">
        <div id="lodder"></div>
        <!-- Digital Loan -->

    </div>
    <div class="row">
        <div class="col-12">
            <h2 class="text-bold-600 text-center">Whatsapp Remarketing Users</h2>
            <hr />
        </div>
    </div>
    <div class="row" id="whremarketingusers">
        <div id="lodder"></div>
        <!-- Digital Loan -->

    </div>

    <div class="row">
        <div class="col-12">
            <h2 class="text-bold-600 text-center">Interakt Remarketing Users</h2>
            <hr />
        </div>
    </div>
    <div class="row" id="intremarketingusers">
        <div id="lodder"></div>
        <!-- Digital Loan -->

    </div>
</div>

<script type="text/javascript">
function applicationdata() {
    $.ajax({
        url: "<?php echo base_url('dashboard/remarketinguserstatistics'); ?>",
        method: "POST",
        dataType: "JSON",
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
            //document.getElementById('lodder').innerHTML="<i class='la la-spinner spinner' style='font-size: 100px;'></i>";
        },
        success: function(response) {
            /* Digital remarketing user data display */
            $('#remarketingusers').html('');
            if (response['success'] == true) {
                var html = "";
                $.each(response.statistics['digitalremarketing'], function(index, element) {
                    html += '<div class="col-xl-3 col-lg-3 col-12">';
                    html += '<div class="card pull-up border-primary">';
                    html += '<div class="card-content">';
                    html += '<div class="card-body">';
                    html += '<a class="text-dark" href="#">';
                    html += '<div class="media d-flex">';
                    html += '<div class="media-body text-left">';
                    html += '<h3 class="text-bold-700" id="oldapplication">' + element.countrec +
                        '</h3>';
                    html += '<span>Days - ' + element.day + '</span><br>';
                    html += '<span>Date - ' + element.udate + '</span>';
                    html += '</div>';
                    html += '<div><i class="la la-users font-large-1 float-right"></i></div>';
                    html += '</div>';
                    html += '</a>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';

                });
                $('#remarketingusers').html(html);
            }

            /* Whatsapp remarketing user data display */
            $('#whremarketingusers').html('');
            if (response['success'] == true) {
                var html = "";
                $.each(response.statistics['whremarketing'], function(index, element) {
                    html += '<div class="col-xl-3 col-lg-3 col-12">';
                    html += '<div class="card pull-up border-primary">';
                    html += '<div class="card-content">';
                    html += '<div class="card-body">';
                    html += '<a class="text-dark" href="#">';
                    html += '<div class="media d-flex">';
                    html += '<div class="media-body text-left">';
                    html += '<h3 class="text-bold-700" id="oldapplication">' + element.countrec +
                        '</h3>';
                    html += '<span>Days - ' + element.day + '</span><br>';
                    html += '<span>Date - ' + element.udate + '</span>';
                    html += '</div>';
                    html += '<div><i class="la la-users font-large-1 float-right"></i></div>';
                    html += '</div>';
                    html += '</a>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';

                });
                $('#whremarketingusers').html(html);

            }
            /* Interakt remarketing user data display */
            $('#intremarketingusers').html('');
            if (response['success'] == true) {
                var html = "";
                $.each(response.statistics['intremarketing'], function(index, element) {
                    html += '<div class="col-xl-3 col-lg-3 col-12">';
                    html += '<div class="card pull-up border-primary">';
                    html += '<div class="card-content">';
                    html += '<div class="card-body">';
                    html += '<a class="text-dark" href="#">';
                    html += '<div class="media d-flex">';
                    html += '<div class="media-body text-left">';
                    html += '<h3 class="text-bold-700" id="oldapplication">' + element.countrec +
                        '</h3>';
                    html += '<span>Days - ' + element.day + '</span><br>';
                    html += '<span>Date - ' + element.udate + '</span>';
                    html += '</div>';
                    html += '<div><i class="la la-users font-large-1 float-right"></i></div>';
                    html += '</div>';
                    html += '</a>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';

                });
                $('#intremarketingusers').html(html);

            }
        }
    });
    //setTimeout(applicationdata, 300000);
}
</script>
<?php
include_once(APPPATH . 'views/includes/footer.php');
?>