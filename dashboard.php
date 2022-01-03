<?php
include_once '../../includes/autoload.php';
?>
<?php
$user = new User();
$isLoggedIn = true;
$userFlag = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($user->bookVehicle($_POST['vehicle_id'])) {
    $success = "Vehicle booked to you! Owner contact you soon.";
  } else {
    $error = "Unable to book this vehicle!";
  }
}

$vehicles = $user->getAvailableVehicles();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once filepath('meta_head') ?>
</head>

<body class="bg-light">
  <?php include_once filepath('nav') ?>
  <main>
    <div class="container pt-3">
      <section>
        <h4 class="mb-4">Welcome <?=$_SESSION['user']['name']?>,</h4>
        <h1 class="mb-4">All Available vehicle</h1>
        <?php if (isset($success)) : ?>
          <div class="alert alert-success"><?= $success ?></div>
        <?php endif ?>
        <?php if (isset($error)) : ?>
          <div class="alert alert-danger"><?= $error ?></div>
        <?php endif ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Agency Name</th>
              <th scope="col">Vehicle Name</th>
              <th scope="col">Vehicle Model</th>
              <th scope="col">Vehicle Number</th>
              <th scope="col">Seat Capacity</th>
              <th scope="col">Rent per day(&#8377;)</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($vehicles as $vehicle) : ?>
              <tr>
                <th scope="row"><?= $vehicle['id'] ?></th>
                <td><?= $vehicle['agency_name'] ?></td>
                <td><?= $vehicle['vehicle_name'] ?></td>
                <td><?= $vehicle['vehicle_model'] ?></td>
                <td><?= $vehicle['vehicle_number'] ?></td>
                <td><?= $vehicle['seat_capacity'] ?></td>
                <td><?= $vehicle['rent_per_day'] ?></td>
                <td>
                  <form method="POST">
                    <input type="hidden" name="vehicle_id" value="<?= $vehicle['id'] ?>">
                    <button class="btn btn-outline-primary btn-sm">Book Now</button>
                  </form>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>

      </section>

    </div>
  </main>
  <?php include_once filepath('footer') ?>
</body>

</html>