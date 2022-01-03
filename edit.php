<?php
include_once '../../includes/autoload.php';
?>
<?php
if (!isset($_GET['vehicle_id'])) {
  $url = base_url('agency/dashboard');
  header("location:$url");
}
$vehicle_id = $_GET['vehicle_id'];
$agency = new Agency();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $vehicle = $agency->getVehicle($vehicle_id);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($agency->updateVehicle($vehicle_id, $_POST['vehicle_name'], $_POST['vehicle_model'], $_POST['vehicle_number'], $_POST['seat_capacity'], $_POST['rent_per_day'])) {
    $success = "Vehicle updated successfully!";
  } else {
    $error = "Unable to update";
  }
  $vehicle = $agency->getVehicle($vehicle_id);
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

          <h1 class="mb-4">Update vehicle data</h1>
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
                  <label for="name">Vehicle Name</label>
                  <input type="text" name="vehicle_name" class="form-control" id="name" placeholder="Enter vehicle name" value="<?= $vehicle['vehicle_name'] ?>" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group mb-2">
                  <label for="">Vehicle Model</label>
                  <input type="text" name="vehicle_model" class="form-control" id="" placeholder="Enter model" value="<?= $vehicle['vehicle_model'] ?>" required>
                </div>
              </div>
            </div>
            <div class="form-group mb-2">
              <label for="exampleInputEmail1">Vehicle Number</label>
              <input type="text" name="vehicle_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter vehicle number" value="<?= $vehicle['vehicle_number'] ?>">
            </div>
            <div class="form-group mb-2">
              <label for="exampleInputPassword1">Seat Capacity</label>
              <input type="number" name="seat_capacity" class="form-control" id="exampleInputPassword1" placeholder="seat capacity" value="<?= $vehicle['seat_capacity'] ?>">
            </div>
            <div class="form-group mb-2">
              <label for="exampleInputPassword2">Rent per day</label>
              <input type="text" name="rent_per_day" class="form-control" id="exampleInputPassword2" placeholder="Rent per day (in &#8377;)" value="<?= $vehicle['rent_per_day'] ?>">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
          </form>
        </div>

      </section>

    </div>
  </main>
  <?php include_once filepath('footer') ?>
</body>

</html>