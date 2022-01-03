<?php
include_once '../includes/autoload.php';
?>
<?php
$error = getFlashData('error');
$success = getFlashData('success');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $auth = new Auth();
  $auth->login($_POST['email'], $_POST['password'], $_POST['usertype']);
  // if not logged show error
  $error = $auth->getError();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once filepath('meta_head') ?>
</head>

<body class="bg-light">
  <?php include_once filepath('nav') ?>
  <main>
    <div class="container pt-5">
      <section class="m-auto" style="max-width: 560px;">
        <div class="card card-body">
          <h1 class="mb-4">Login</h1>
          <?php if (isset($success)) : ?>
            <div class="alert alert-success"><?= $success ?></div>
          <?php endif ?>
          <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
          <?php endif ?>
          <form method="POST" action="login">
            <div class="d-flex justify-content-around mb-3 flex-wrap">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="usertype" id="flexRadioDefault1" value="1" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                  Customer Login
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="usertype" id="flexRadioDefault2" value="2">
                <label class="form-check-label" for="flexRadioDefault2">
                  Agency Login
                </label>
              </div>
            </div>
            <div class="form-group mb-3">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mb-3">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>

            <div class="d-grid d-md-block">
              <button type="submit" class="btn btn-success btn-block">Login</button>
            </div>
          </form>
        </div>

      </section>

    </div>
  </main>
  <?php include_once filepath('footer') ?>

</body>

</html>