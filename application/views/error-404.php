<?php
    $this->load->view('includes/header.php');
?>
<section class="fullscreen" data-bg-image="<?php echo base_url('assets/images/slider/bw-business-bg.jpg'); ?>">
  <div class="container">
    <div class="container-fullscreen">
      <div class="row m-t-80">
        <div class="col-lg-6">
          <div class="page-error-404">404</div>
        </div>
        <div class="col-lg-6">
          <div class="text-left text-light">
            <h1 class="text-medium">Ooops, This Page Could Not Be Found!</h1>
            <p class="lead">The page you are looking for might have been removed, or is temporarily unavailable.</p>
            <a href="<?php echo base_url(); ?>" class="btn btn-primary btn-sm">Go to Homepage</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
    $this->load->view('includes/footer.php');
?>