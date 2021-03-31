<?php require_once APPROOT . '/views/inc/header.php'; ?>
<h1><?php  echo $data['title']; ?></h1> 
<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light"><?php echo $data['title']; ?></h1>
        <p class="lead text-muted"><?php echo $data['description']; ?></p>
      </div>
    </div>
  </section>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>

