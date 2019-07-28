<?php
require_once 'class/dataAccessingObject/bookDataAccessObject.php';

class listmaker{

private $dao;

  function __construct()
  {
    $this->dao = new bookDataAccessObject();
  }

public function newArrivals(){
  $newArrival = $this->dao->getAllBooksDescending();
  for ($i = 0; $i < 6 && $i < sizeof($newArrival); $i++){
    if($i%3 == 0 && $i != 0){
    echo '</div>';
    }
    if($i%3 == 0 && $i != 5){
    echo '<div class="row">';
    }
    echo '<div class="column">';
    echo '<div class="card border-primary mb-3" style="width: 20rem;">';
    echo '<a href="book.php?book=' . $newArrival[$i]->getBookId() . '">  <div class="card-header">' . $newArrival[$i]->getBookName() . ' by ' . $newArrival[$i]->getBookAuthor() . '</div></a>';
    echo '<div class="card-body">';
    echo '<h4 class="card-title">' . $newArrival[$i]->getBookName() . '</h4>';
    echo '<h6 class="card-subtitle text-muted">Author: ' . $newArrival[$i]->getBookAuthor() . '</h6> ';
    echo '<p class="card-text">Owner: '. "Owner Name Here" .'</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
  }
}

public function allBooks(){
  $newArrival = $this->dao->getAllBooksDescending();
  for ($i = 0; $i < sizeof($newArrival); $i++){
    if($i%3 == 0 && $i != 0){
    echo '</div>';
    }
    if($i == 0 || $i != (sizeof($newArrival)-1) && $i%3 == 0 ){
    echo '<div class="row">';
    }
    echo '<div class="column">';
    echo '<div class="card border-primary mb-3" style="width: 20rem;">';
    echo '<a href="book.php?book=' . $newArrival[$i]->getBookId() . '">  <div class="card-header">' . $newArrival[$i]->getBookName() . ' by ' . $newArrival[$i]->getBookAuthor() . '</div></a>';
    echo '<div class="card-body">';
    echo '<h4 class="card-title">' . $newArrival[$i]->getBookName() . '</h4>';
    echo '<h6 class="card-subtitle text-muted">Author: ' . $newArrival[$i]->getBookAuthor() . '</h6> ';
    echo '<p class="card-text">Owner: '. "Owner Name Here" .'</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
  }
}
}
 ?>
