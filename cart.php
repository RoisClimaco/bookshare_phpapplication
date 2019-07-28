<?php
require_once 'class/model/user.php';
require_once 'class/model/book.php';
require_once 'class/dataAccessingObject/bookDataAccessObject.php';
session_start();
if (!empty($_GET['remove'])) {
  $dao = new bookDataAccessObject();
  $book = new Book();
  $book->setBookId($_GET['remove']);
  $dao->removePending($book,$_SESSION['user']);
}
if (!empty($_GET['decline'])) {
  $dao = new bookDataAccessObject();
  $book = new Book();
  $book->setStatusId(1);
  $book->setBookId($_GET['decline']);
  $dao->declinePending($book,$_SESSION['user']);
}
if (!empty($_GET['approve'])) {
  $dao = new bookDataAccessObject();
  $book = new Book();
  $book->setStatusId(3);
  $book->setBookId($_GET['approve']);
  $dao->approvePending($book,$_SESSION['user']);
}
include 'default/header_base.php';
include 'default/navbar_logged_in.php';
include 'ui/cartui.php';
include 'default/footer.php';
 ?>
