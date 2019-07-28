<?php
require_once 'class/model/user.php';
require_once 'class/logic/book-setup.php';
require_once 'class/dataAccessingObject/bookDataAccessObject.php';
session_start();
if (!empty($_SESSION['user'])){
  $user = $_SESSION['user'];
if (!empty($_POST['bookId'])) {
//  if (!empty($_SESSION['user'])){
  $user = $_SESSION['user'];
  $dao = new bookDataAccessObject();
  $book = new Book();
  $book->setBookId($_POST['bookId']);
  $dao->borrowBooks($user,$book);
  header('Location: account.php');
}
include 'default/header_base.php';
  $user = $_SESSION['user'];
    if ($user->getRoleId()==1){
      include 'default/navbar_logged_in.php';
    } else if ($user->getRoleId()==2){
      include 'default/navbar_admin.php';
    } else {
      include 'default/navbar_default.php';
    }
} else {
include 'default/header_base.php';
include 'default/navbar_default.php';
}
include 'ui/bookui.php';
include 'default/footer.php';

 ?>
