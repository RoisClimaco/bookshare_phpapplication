<?php
require_once 'class/dataAccessingObject/bookDataAccessObject.php';
require_once 'class/model/book.php';
class bookSetup{
  private $book;
  function __construct($bookid)
  {
    $bookname = new Book();
    $bookname->setBookId($bookid);
    $bookdao = new bookDataAccessObject();
    $this->book = $bookdao->returnBook($bookname);
  }

  public function setupGetBookName(){
    return $this->book->getBookName();
  }

  public function setupGetBookAuthor(){
    return $this->book->getBookAuthor();
  }

  public function setupGetBookId(){
    return $this->book->getBookId();
  }

  public function setupGetBookStatus(){
    return $this->book->getStatusId();
  }
}

?>
