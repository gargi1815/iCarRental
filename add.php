<?php
include_once '../../includes/autoload.php';
?>
<?php
$agencyFlag = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $agency = new Agency();
  if ($agency->addVehicle($_POST['vehicle_name'], $_POST['vehicle_model'], $_POST['vehicle_number'], $_POST['seat_capacity'], $_POST['rent_per_day'])) {
    $success = "Vehicle added successfully!";
  } else {
    $error = "Unable to add";
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

          <h1 class="mb-4">Add new vehicle</h1>
          <?php if (isset($success)) : ?>
            <div class="alert alert-success"><?= $success ?></div>
          <?php endif ?>
          <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
          <?php endif ?>
          <form  method="POST">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group mb-2">
                  <label for="name">Vehicle Name</label>
                  <input type="text" name="vehicle_name" class="form-control" id="name" placeholder="Enter vehicle name">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group mb-2">
                  <label for="">Vehicle Model</label>
                  <input type="text" name="vehicle_model" class="form-control" id="" placeholder="Enter city">
                </div>
              </div>
            </div>
            <div class="form-group mb-2">
              <label for="exampleInputEmail1">Vehicle Number</label>
              <input type="text" name="vehicle_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter vehicle number">
            </div>
            <div class="form-group mb-2">
              <label for="exampleInputPassword1">Seat Capacity</label>
              <input type="number" name="seat_capacity" class="form-control" id="exampleInputPassword1" placeholder="seat capacity">
            </div>
            <div class="form-group mb-2">
              <label for="exampleInputPassword2">Rent per day</label>
              <input type="text" name="rent_per_day" class="form-control" id="exampleInputPassword2" placeholder="Rent per day (in &#8377;)">
            </div>
            <button type="submit" class="btn btn-success">Add</button>
          </form>
        </div>

      </section>

    </div>
  </main>
  <?php include_once filepath('footer') ?>
</body>

</html>