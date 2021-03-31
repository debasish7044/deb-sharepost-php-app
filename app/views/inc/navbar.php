<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
  <div class="container-fluid container">
    <a class="navbar-brand" href="#"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"href="<?php echo URLROOT ?>/pages/about">About</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <?php if(isset($_SESSION['user_id'])) : ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT ?>/users/logout">logout</a>
        </li>
        
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo URLROOT ?>/users/register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"href="<?php echo URLROOT ?>/users/login">Login</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>