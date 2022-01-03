<?php
class User extends Base
{

  public function __construct()
  {
    if (!$_SESSION['isUserLoggedIn']) {
      setFlashData('error', 'Please login first');
      $login = base_url('login');
      header('location:' . $login);
      return false;
    }
    $this->userid = $_SESSION['user']['id'];
  }

  public function getAvailableVehicles()
  {
    return $this->query("SELECT v.*, u.name as agency_name FROM vehicles v LEFT JOIN users u ON (u.id = v.userid) WHERE booked_by = 0");
  }

  public function getOwnVehicles()
  {
    return $this->query("SELECT v.*, u.name as agency_name FROM vehicles v LEFT JOIN users u ON (u.id = v.userid) WHERE booked_by = ".$this->userid);
  }

  public function bookVehicle($vehicle_id)
  {
    return $this->query("UPDATE vehicles SET booked_by=$this->userid where id=$vehicle_id");
  }

  public function unbookVehicle($vehicle_id)
  {
    return $this->query("UPDATE vehicles SET booked_by=0 where id=$vehicle_id");
  }
}
