<?php
$this->load->view('includes/header.php');
?>

<section id="page-title">
    <div class="container">
        <div class="breadcrumb text-left">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section id="gallery">
    <div class="container">

        <h2 class="text-center p-t-100 p-b-100">No image found!</h2>

        <!-- <nav class="grid-filter gf-outline text-center m-b-20" data-layout="#portfolio">
			<ul>
				<li class="active"><a href="#" data-category="*">Show All</a></li>
				<li><a href="#" data-category=".igceo">CEO</a></li>
				<li><a href="#" data-category=".igoffice">Office</a></li>
				<li><a href="#" data-category=".igemployee">Employee</a></li>
				<li><a href="#" data-category=".igcustomer">Customer</a></li>
				<li><a href="#" data-category=".igoffer">Offer</a></li>
				<li><a href="#" data-category=".igupdate">Update</a></li>
			</ul>
			<div class="grid-active-title">Show All</div>
		</nav>
		<div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="0">
			
			<div class="portfolio-item img-zoom igoffer igoffice">
				<div class="portfolio-item-wrap">
					<div class="portfolio-image">
						<img src="<?php echo base_url('assets/images/gallery/150.jpg'); ?>" alt="">
					</div>
					<div class="portfolio-description" data-lightbox="gallery">
						<a title="" data-lightbox="gallery-image" href="<?php echo base_url('assets/images/gallery/150.jpg'); ?>"><i class="icon-copy"></i></a>
					</div>
				</div>
			</div>

		</div> -->

    </div>
</section>

<?php
$this->load->view('includes/footer.php');
?>