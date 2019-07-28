<?php

class connectionBase {
private $host = "DatabaseIpAddress";
private $userName  = "DatabaseUsername";
private $userPassword  ="DatabasePassword";
private $database = "Databasename";

  protected function retrieveConnection(){
  return mysqli_connect($this->host, $this->userName, $this->userPassword, $this->database);
  }
}
?>
