<?php
class UserModel extends BaseModel{
  private $username;
  private $password;
  private $name;
  private $isLoggedIn;
  private $usertype;
  
  public function getUsername()
  {
    return $this->username;
  }
}