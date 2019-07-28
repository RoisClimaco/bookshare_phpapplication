<?php
require_once 'class/model/user.php';
require_once 'class/model/book.php';
require_once 'class/dataAccessingObject/bookDataAccessObject.php';
require_once 'class/dataAccessingObject/userDataAccessObject.php';
session_start();
if (!empty($_SESSION['user'])){
$user = $_SESSION['user'];
if ($user->getRoleId()!=2){
  header("Location: login.php");
}} else {
  header("Location: login.php");
}
if (!empty($_POST['deleteBookID'])) {
  $book = new Book();
  $book->setBookId($_POST['deleteBookID']);
  $dao = new bookDataAccessObject();
  $dao->deleteBookViaID($user,$book);
}

if (!empty($_POST['userID'])) {
  $user = new User();
  $user->setUserId($_POST['userID']);
  $user->setRoleId($_POST['rolenumber']);
  $dao = new userDataAccessObject();
  $dao->updateUserID($user);
  }

  include 'default/header_base.php';
  include 'default/navbar_admin.php';
  include 'ui/managelibraryui.php';
  include 'default/footer.php';


 ?>
