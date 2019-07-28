<?php
require_once 'class/dataAccessingObject/bookDataAccessObject.php';
require_once 'class/dataAccessingObject/userDataAccessObject.php';


class accountSetup{
  private $bookdao;
  private $userdao;
  private $user;
  function __construct()
  {
    $this->user = $_SESSION['user'];
    $this->bookdao = new bookDataAccessObject();
    $this->userdao = new userDataAccessObject();
  }

  public function getUsername(){
    echo $this->user->getUsername();
  }

  public function getRealName(){
    echo $this->userdao->getFirstLastName($this->user);
  }

  public function getBookOwnerCount(){
    echo $this->bookdao->getCountOwner($this->user);
  }

  public function getBookBorrowedCount(){
  echo $this->bookdao->getCountBorrow($this->user);
}
  public function getBookShared(){
    $library = $this->bookdao->getBooksShared($this->user);
    for ($i = 0; $i < sizeof($library); $i ++){
      echo $library[$i]->getBookName();
      echo '<br>';
    }
  }

  public function getBookBorrowed(){
    $library = $this->bookdao->getBooksBorrowed($this->user);
    for ($i = 0; $i < sizeof($library); $i ++){
      echo $library[$i]->getBookName();
      echo '<br>';
    }
  }
}

 ?>
