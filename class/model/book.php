<?php
class Book {
  private $bookId;
  private $bookName;
  private $statusId;
  private $ownerId;
  private $borrowerId;
  private $bookAuthor;

  public function __construct(){

  }

  public function setBookAuthor($bookAuthor){
    $this->bookAuthor = $bookAuthor;
  }

  public function getBookAuthor(){
    return $this->bookAuthor;
  }

  public function setBookId($bookId){
    $this->bookId = $bookId;
  }

  public function getBookId(){
    return $this->bookId;
  }

  public function setBookName($bookName){
    $this->bookName = $bookName;
  }

  public function getBookName(){
    return $this->bookName;
  }

  public function setStatusId($statusId){
    $this->statusId = $statusId;
  }

  public function getStatusId(){
    return $this->statusId;
  }

  public function setOwnerId($ownerId){
    $this->ownerId = $ownerId;
  }

  public function getOwnerId(){
    return $this->ownerId;
  }

  public function setBorrowerId($borrowerId){
    $this->borrowerId = $borrowerId;
  }

  public function getBorrowerId(){
    return $this->borrowerId;
  }
}
 ?>
