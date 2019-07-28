<?php
require_once 'class/dataAccessingObject/connectionBase.php';
require_once 'class/model/user.php';
require_once 'class/model/book.php';

class bookDataAccessObject extends connectionBase {
public function __construct(){
}

public function addBook(User $newUser,Book $newBook){
   $connection = $this->retrieveConnection();
   $query = "INSERT INTO `tblbook` (`BookName`, `BookAuthor`,`StatusID`,`OwnerID`) VALUES ('"
                                    . $newBook->getBookName() . "', '"
                                    . $newBook->getBookAuthor() . "', "
                                    . 1 . ", "
                                    . $newUser->getUserId() . ")";
  $result = mysqli_query($connection, $query);
  $error =  (mysqli_error($connection));
  mysqli_close($connection);
  return $error;
}

public function deleteBook(User $newUser,Book $newBook){
  $connection = $this->retrieveConnection();
  $query = "UPDATE `tblbook` SET `StatusID` = '4' WHERE (`BookName` = '"
                                    . $newBook->getBookName() . "' AND `OwnerID` = "
                                    . $newUser->getUserId() . ")";
 $result = mysqli_query($connection, $query);
 $error =  (mysqli_error($connection));
 mysqli_close($connection);
 return $error;
}

public function deleteBookViaID(Book $newBook){
  $connection = $this->retrieveConnection();
  $query = "UPDATE `tblbook` SET `StatusID` = '4' WHERE (`BookID` = '"
                                    . $newBook->getBookId() . "')";
 $result = mysqli_query($connection, $query);
 $error =  (mysqli_error($connection));
 mysqli_close($connection);
 return $error;
}

public function getAllBooksDescending(){
  $connection = $this->retrieveConnection();
  $query = "SELECT `BookID`, `BookName`, `OwnerID`, `BorrowerID`, `BookAuthor` FROM `tblbook` WHERE `StatusID` != 4 ORDER BY `BookID` DESC;";
  $result = mysqli_query($connection, $query);
  $counter = 0;
  $library;
  while($row = mysqli_fetch_row($result)){
    $tempBook = new Book();
    $tempBook->setBookId($row[0]);
    $tempBook->setBookName($row[1]);
    $tempBook->setOwnerId($row[2]);
    $tempBook->setBorrowerId($row[3]);
    $tempBook->setBookAuthor($row[4]);
    $library[$counter] = $tempBook;
    $counter++;
  }
  mysqli_close($connection);
  return $library;
}

public function getCountOwner(User $oldUser){
  $connection = $this->retrieveConnection();
  $query = "SELECT COUNT(*) FROM tblbook WHERE OwnerID = " . $oldUser->getUserId();
  $result = mysqli_query($connection, $query);
  mysqli_close($connection);
  while($row = mysqli_fetch_row($result)){
    return $row[0];
  }

}

public function getStatusIdBook(Book $book){
  $connection = $this->retrieveConnection();
  $query = "SELECT StatusName FROM tblstatus WHERE StatusID = " . $book->getStatusId();
  $result = mysqli_query($connection, $query);
  mysqli_close($connection);
  while($row = mysqli_fetch_row($result)){
    return $row[0];
  }
}

public function getCountBorrow(User $oldUser){
  $connection = $this->retrieveConnection();
  $query = "SELECT COUNT(*) FROM tblbook WHERE BorrowerID = " . $oldUser->getUserId();
  $result = mysqli_query($connection, $query);
  mysqli_close($connection);
  while($row = mysqli_fetch_row($result)){
    return $row[0];
  }
}

public function returnBook(Book $oldBook){
  $connection = $this->retrieveConnection();
  $query = "SELECT `BookID`, `BookName`, `OwnerID`, `BorrowerID`, `BookAuthor`, `StatusID` FROM tblbook WHERE BookID = " . $oldBook->getBookId();
  $result = mysqli_query($connection, $query);
  $counter = 0;
  $tempBook = new Book();
  while($row = mysqli_fetch_row($result)){
    $tempBook->setBookId($row[0]);
    $tempBook->setBookName($row[1]);
    $tempBook->setOwnerId($row[2]);
    $tempBook->setBorrowerId($row[3]);
    $tempBook->setBookAuthor($row[4]);
    $tempBook->setStatusId($row[5]);
  }
  mysqli_close($connection);
  return $tempBook;
}

public function getBooksShared(User $oldUser){
  $connection = $this->retrieveConnection();
  $query = "SELECT `BookID`, `BookName`, `OwnerID`, `BorrowerID`, `BookAuthor` FROM tblbook WHERE OwnerID = " . $oldUser->getUserId();
  $result = mysqli_query($connection, $query);
  $counter = 0;
  $library[0] = new Book();
  $library[0]->setBookName("None");
  while($row = mysqli_fetch_row($result)){
    $tempBook = new Book();
    $tempBook->setBookId($row[0]);
    $tempBook->setBookName($row[1]);
    $tempBook->setOwnerId($row[2]);
    $tempBook->setBorrowerId($row[3]);
    $tempBook->setBookAuthor($row[4]);
    $library[$counter] = $tempBook;
    $counter++;
  }
  mysqli_close($connection);
  return $library;
}

public function borrowBooks(User $oldUser, Book $newBook){
  $connection = $this->retrieveConnection();
  $query = "UPDATE `tblbook` SET `StatusID` = '5', `BorrowerID` = " . $oldUser->getUserId() . " WHERE (`BookID` = '"
                                    . $newBook->getBookId() . "')";
 $result = mysqli_query($connection, $query);
 $error =  (mysqli_error($connection));
 mysqli_close($connection);
 return $error;
}

public function getBooksBorrowed(User $oldUser){
  $connection = $this->retrieveConnection();
  $query = "SELECT `BookID`, `BookName`, `OwnerID`, `BorrowerID`, `BookAuthor`, `StatusID` FROM tblbook WHERE BorrowerID = " . $oldUser->getUserId();
  $result = mysqli_query($connection, $query);
  $counter = 0;
  $library[0] = new Book();
  $library[0]->setBookName("None");
  while($row = mysqli_fetch_row($result)){
    $tempBook = new Book();
    $tempBook->setBookId($row[0]);
    $tempBook->setBookName($row[1]);
    $tempBook->setOwnerId($row[2]);
    $tempBook->setBorrowerId($row[3]);
    $tempBook->setBookAuthor($row[4]);
    $tempBook->setStatusId($row[5]);
    $library[$counter] = $tempBook;
    $counter++;
  }
  mysqli_close($connection);
  return $library;
}

public function getPendingOwnedBooks(User $oldUser){
  $connection = $this->retrieveConnection();
  $query = "SELECT `BookID`, `BookName`, `OwnerID`, `BorrowerID`, `BookAuthor`, `StatusID` FROM tblbook WHERE OwnerID = " . $oldUser->getUserId() . " AND StatusID = 5";
  $result = mysqli_query($connection, $query);
  $counter = 0;
  $library[0] = new Book();
  $library[0]->setBookName("null");
  while($row = mysqli_fetch_row($result)){
    $tempBook = new Book();
    $tempBook->setBookId($row[0]);
    $tempBook->setBookName($row[1]);
    $tempBook->setOwnerId($row[2]);
    $tempBook->setBorrowerId($row[3]);
    $tempBook->setBookAuthor($row[4]);
    $tempBook->setStatusId($row[5]);
    $library[$counter] = $tempBook;
    $counter++;
  }
  mysqli_close($connection);
  return $library;
}

public function getPendingBorrowedBooks(User $oldUser){
  $connection = $this->retrieveConnection();
  $query = "SELECT `BookID`, `BookName`, `OwnerID`, `BorrowerID`, `BookAuthor`, `StatusID` FROM tblbook WHERE BorrowerID = " . $oldUser->getUserId() . " AND StatusID = 5";
  $result = mysqli_query($connection, $query);
  $counter = 0;
  $library[0] = new Book();
  $library[0]->setBookName("null");
  while($row = mysqli_fetch_row($result)){
    $tempBook = new Book();
    $tempBook->setBookId($row[0]);
    $tempBook->setBookName($row[1]);
    $tempBook->setOwnerId($row[2]);
    $tempBook->setBorrowerId($row[3]);
    $tempBook->setBookAuthor($row[4]);
    $tempBook->setStatusId($row[5]);
    $library[$counter] = $tempBook;
    $counter++;
  }
  mysqli_close($connection);
  return $library;
}

public function removePending(book $book,user $user){
   $connection = $this->retrieveConnection();
   $query = "UPDATE `tblbook` SET `StatusID` = '1' , `BorrowerID` = null WHERE (`BookID` = '" . $book->getBookId() . "' AND `BorrowerID` = '" . $user->getUserId() . "')";
   $result = mysqli_query($connection, $query);
   $error =  (mysqli_error($connection));
   mysqli_close($connection);
   return $error;
}

public function approvePending(book $book,user $user){
  $connection = $this->retrieveConnection();
  $query = "UPDATE `tblbook` SET `StatusID` = '3' WHERE (`BookID` = '" . $book->getBookId() . "' AND `OwnerID` = '" . $user->getUserId() . "')";
  $result = mysqli_query($connection, $query);
  $error =  (mysqli_error($connection));
  mysqli_close($connection);
  return $error;
}

public function declinePending(book $book,user $user){
   $connection = $this->retrieveConnection();
   $query = "UPDATE `tblbook` SET `StatusID` = '1' , `BorrowerID` = null WHERE (`BookID` = '"
                                      . $book->getBookId() . " AND `OwnerID` = '" . $user->getUserId() . "')";
   $result = mysqli_query($connection, $query);
   $error =  (mysqli_error($connection));
   mysqli_close($connection);
   return $error;
}

}


 ?>
