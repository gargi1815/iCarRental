<?php
class Auth extends Base
{
  public $data = [];
  private $error;

  public function login($email, $password, $usertype)
  {
    // $usertype = 1 : customer 
    // $usertype = 2 : agency 
    $result = $this->query("SELECT * FROM users where email = '$email' AND usertype = $usertype")[0];
    if (!$result) {
      $this->error = "User not found";
    } else if (!password_verify($password, $result['password'])) {
      $this->error = "Invalid Password";
    } else if ($usertype == 1) {
      $_SESSION['user'] = $result;
      $_SESSION['isUserLoggedIn'] = true;
      header('location:user/dashboard');
    } else if ($usertype == 2) {
      $_SESSION['user'] = $result;
      $_SESSION['isAgencyLoggedIn'] = true;
      header('location:agency/dashboard');
    }
  }

  public function registerUser($name, $age, $email, $password)
  {
    if ($this->query("SELECT 1 FROM users WHERE email='$email' AND usertype=1")) {
      $this->error = "User already exists.";
      return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $result = $this->query("INSERT INTO users SET name='$name', email = '$email', password='$password', usertype=1");
    if (!$result) {
      $this->error = "Unable to register user.";
      return false;
    }
    return true;
  }

  public function registerAgency($name, $city, $email, $password)
  {
    if ($this->query("SELECT 1 FROM users WHERE email='$email' AND usertype=2")) {
      $this->error = "Email already exists.";
      return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $result = $this->query("INSERT INTO users SET name='$name', email = '$email', password='$password', usertype=2");
    if (!$result) {
      $this->error = "Unable to register agency.";
      return false;
    }
    return true;
  }

  public function getError()
  {
    return $this->error;
  }
  public function logout()
  {
    unset($_SESSION['isAgencyLoggedIn']);
    unset($_SESSION['isUserLoggedIn']);
    unset($_SESSION['userid']);
    unset($_SESSION['user']);
    setFlashData('success', 'You logout successfully');
    header('location:' . base_url('login'));
  }

  private function validate()
  {
    return true;
  }
}
