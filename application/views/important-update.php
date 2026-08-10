<?php
$this->load->view('includes/header.php');
?>

<section id="page-title">
    <div class="container">
        <div class="breadcrumb text-left">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active" aria-current="page">Important Update</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section id="update">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <?php
				if (count($noteslist)) {
					foreach ($noteslist as $row) {
				?>
                <div class="card">
                    <div class="card-body">
                        <p class="text-bold text-primary"><span
                                class="badge badge-primary text-uppercase m-r-10"><?php echo $row->tags; ?></span><?php echo displayDate($row->rec_date); ?>
                        </p>
                        <?php
								echo $row->descriptions;
								?>
                    </div>
                </div>
                <?php }
				} else {
					echo "<p class='text-center'><strong>No update as of now!</strong></p>";
				} ?>

            </div>
        </div>
    </div>
</section>

<?php
$this->load->view('includes/footer.php');
?>