<?php
require_once 'class/model/user.php';
require_once 'class/model/book.php';
require_once 'class/dataAccessingObject/bookDataAccessObject.php';
session_start();
if (!empty($_SESSION['user'])){
$user = $_SESSION['user'];
if ($user->getRoleId()!=1){
  header("Location: login.php");
}
} else {
  header("Location: login.php");
}
include 'default/header_base.php';
include 'default/navbar_logged_in.php';
include 'ui/accountui.php';
include 'default/footer.php';
$fields = $_POST;

if (!empty($_POST['addBookName'])) {
  $book = new Book();
  $book->setBookName($fields['addBookName']);
  $book->setBookAuthor($fields['addBookAuthor']);
  $dao = new bookDataAccessObject();
  $dao->addBook($_SESSION['user'],$book);
  }

  if (!empty($_POST['deleteBookName'])) {
    $book = new Book();
    $book->setBookName($fields['deleteBookName']);
    $dao = new bookDataAccessObject();
    $dao->deleteBook($_SESSION['user'],$book);
    }
 ?>
