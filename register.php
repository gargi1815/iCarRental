<?php
include_once '../../includes/autoload.php';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $auth = new Auth();
  if ($auth->registerUser($_POST['name'], $_POST['age'], $_POST['email'], $_POST['password'])) {
    $success = "User registered! Go to Login.";
  } else {
    $error = $auth->getError();
  }
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

          <h1 class="mb-4">Register Customer</h1>
          <?php if (isset($success)) : ?>
            <div class="alert alert-success"><?= $success ?></div>
          <?php endif ?>
          <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
          <?php endif ?>
          <form method="POST">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group mb-2">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group mb-2">
                  <label for="">Age</label>
                  <input type="number" name="age" class="form-control" id="" placeholder="Enter age">
                </div>
              </div>
            </div>
            <div class="form-group mb-2">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mb-2">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <div class="form-group mb-2">
              <label for="exampleInputPassword2">Confirm Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password" required>
            </div>
            <!-- <div class="form-group form-check mb-2">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <button type="submit" class="btn btn-success">Register</button>
          </form>
        </div>

      </section>

    </div>
  </main>
  <?php include_once filepath('footer') ?>
</body>

</html>