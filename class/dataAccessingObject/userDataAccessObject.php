<?php
require_once 'class/dataAccessingObject/connectionBase.php';
require_once 'class/model/user.php';
require_once 'class/model/book.php';

class userDataAccessObject extends connectionBase {

public function __construct(){
}

public function addUser(User $newUser){
   $connection = $this->retrieveConnection();
   $query = "INSERT INTO `tbluser` (`Username`, `Password`,`EmailAddress`,`FirstName`,`LastName`,`RoleID`) VALUES ('"
                                    . $newUser->getUsername() . "', '"
                                    . $newUser->getPassword() . "', '"
                                    . $newUser->getEmailAddress() . "', '"
                                    . $newUser->getFirstName() . "', '"
                                    . $newUser->getLastName() . "', "
                                    . "1)";
   $result = mysqli_query($connection, $query);
  $error =  (mysqli_error($connection));
  mysqli_close($connection);
  return $error;
}

public function searchUser(User $oldUser){
   $connection = $this->retrieveConnection();
   $query = "SELECT `password` FROM `tbluser` WHERE `username` = '" . $oldUser->getUsername() . "'" ;
   $result = mysqli_query($connection, $query);
   while($row = mysqli_fetch_row($result)){
     if ( password_verify($oldUser->getPassword().strtolower($oldUser->getUsername()),$row[0]) == 1){
       $query2 = "SELECT `UserID` , `RoleID` FROM `tbluser` WHERE `username` = '" . $oldUser->getUsername() . "'" ;
       $result = mysqli_query($connection, $query2);
       while($row2 = mysqli_fetch_row($result)){
         return $row2[0].":".$row2[1];
       }

     }
     }
  return -9;
  mysqli_close($connection);
}

public function getOwnerName(Book $book){
  $connection = $this->retrieveConnection();
  $query = "SELECT `firstname` , `lastname` FROM `tbluser` WHERE `UserID` = " . $book->getOwnerId();
  $result = mysqli_query($connection, $query);
  while($row = mysqli_fetch_row($result)){
    return $row[0]." ".$row[1];
  }
  mysqli_close($connection);
}

public function getBorrowerName(Book $book){
  $connection = $this->retrieveConnection();
  $query = "SELECT `firstname` , `lastname` FROM `tbluser` WHERE `UserID` = " . $book->getBorrowerId();
  $result = mysqli_query($connection, $query);
  while($row = mysqli_fetch_row($result)){
    return $row[0]." ".$row[1];
  }
  mysqli_close($connection);
}

public function getFirstLastName(User $user){
  $connection = $this->retrieveConnection();
  $query = "SELECT `firstname` , `lastname` FROM `tbluser` WHERE `UserID` = " . $user->getUserId();
  $result = mysqli_query($connection, $query);
  while($row = mysqli_fetch_row($result)){
    return $row[0]." ".$row[1];
  }
  mysqli_close($connection);
}

public function updateUserID(User $updateUser){
  $connection = $this->retrieveConnection();
  $query = "UPDATE `tbluser` SET `RoleID` = " . $updateUser->getRoleId() . " WHERE (`UserID` = " . $updateUser->getUserId() .")";
  $result = mysqli_query($connection, $query);
 $error =  (mysqli_error($connection));
 mysqli_close($connection);
 return $error;
}
}
?>
