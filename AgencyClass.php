<?php
class Agency extends Base
{
  public $data = [];
  private $userid;
  public function __construct()
  {
    if (!$_SESSION['isAgencyLoggedIn']) {
      setFlashData('error', 'Please login first');
      $login = base_url('login');
      header('location:' . $login);
      return false;
    }
    $this->userid = $_SESSION['user']['id'];
  }

  public function getVehicle($vehicle_id)
  {
    return $this->query("SELECT * FROM vehicles WHERE id = $vehicle_id")[0];
  }

  public function getVehicles()
  {
    return $this->query("SELECT v.*, u.name as booked_by_name FROM vehicles v LEFT JOIN users u on (v.booked_by = u.id) WHERE userid = " . $this->userid);
  }

  public function addVehicle($vehicle_name, $vehicle_model, $vehicle_number, $seat_capacity, $rent_per_day)
  {
    return $this->query("INSERT INTO vehicles SET vehicle_name='$vehicle_name', vehicle_model = '$vehicle_model', vehicle_number='$vehicle_number', seat_capacity='$seat_capacity', rent_per_day='$rent_per_day', userid=" . $this->userid);
  }

  public function updateVehicle($vehicle_id, $vehicle_name, $vehicle_model, $vehicle_number, $seat_capacity, $rent_per_day)
  {
    return $this->query("UPDATE vehicles SET vehicle_name='$vehicle_name', vehicle_model = '$vehicle_model', vehicle_number='$vehicle_number', seat_capacity='$seat_capacity', rent_per_day='$rent_per_day' WHERE id=$vehicle_id");
  }
}
