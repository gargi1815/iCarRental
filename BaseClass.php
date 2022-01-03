<?php

class Base
{
  private $conn = NULL;
  private $result;

  public function connectDB()
  {
    $this->conn = mysqli_connect(MYSQL_HOSTNAME, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DB_NAME);
    if (!$this->conn) {
      echo "<h1>Service Unavailable!</h2>";
      echo "<p>Something bad happened. Please come back later when we fixed that problem. Thanks.</p>";
      exit;
    }
  }

  public function query($sql)
  {
    if (!$this->conn) {
      $this->connectDB();
    }
    $result = mysqli_query($this->conn, $sql);
    if (is_bool($result)) {
      return $result;
    }
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
    }
    return $rows;
  }

  public function result()
  {
    return mysqli_fetch_all($this->result);
  }
}
