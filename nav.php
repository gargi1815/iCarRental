<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">iCarRental</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('') ?>">Home</a>
        </li>
        <?php if (isset($_SESSION['user']['usertype']) && $_SESSION['user']['usertype'] == 2) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('agency/dashboard') ?>">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('agency/add') ?>">Add Vehicle</a>
          </li>
        <?php elseif (isset($_SESSION['user']['usertype']) && $_SESSION['user']['usertype'] == 1) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/dashboard') ?>">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/booked') ?>">Booked by you</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('agency/register') ?>">Agency Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/register') ?>">User Register</a>
          </li>
        <?php endif ?>

      </ul>
      <?php if (isset($_SESSION['user']['usertype'])) : ?>
        <a href="<?= base_url('logout') ?>" class="btn btn-outline-success">Logout</a>
      <?php else : ?>
        <a href="<?= base_url('login') ?>" class="btn btn-outline-success">Login</a>
      <?php endif ?>
    </div>
  </div>
</nav>