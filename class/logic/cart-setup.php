<?php
require_once 'class/dataAccessingObject/bookDataAccessObject.php';
require_once 'class/dataAccessingObject/userDataAccessObject.php';
require_once 'class/model/book.php';
require_once 'class/model/user.php';
class cartSetup{
  private $borrowedBook;
  private $sharedBook;
  private $user;
  private $userDao;
  private $bookDao;
  function __construct()
  {
    $this->user = $_SESSION['user'];
    $this->bookDao = new bookDataAccessObject();
    $this->userDao = new userDataAccessObject();
    $this->borrowedBook = $this->bookDao->getPendingBorrowedBooks($this->user);
    $this->sharedBook = $this->bookDao->getPendingOwnedBooks($this->user);
  }

  public function setupBorrowedBooksCart(){
    if ($this->borrowedBook[0]->getBookName() != "null"){
    for ($i = 0; $i < sizeof($this->borrowedBook); $i++){
      echo '<tr>';
      echo '<td>';
      echo '<div class="media">';
      echo '<a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>';
      echo '<div class="media-body">';
      echo '<h4 class="media-heading"><a href="book.php?book=' . $this->borrowedBook[$i]->getBookId() . '">' . $this->borrowedBook[$i]->getBookName() . '</a></h4>';
      echo '<h5 class="media-heading"> by' . $this->borrowedBook[$i]->getBookAuthor() . '</h5>';
      echo '<span>Status: </span><span class="text-success"><strong>'. $this->bookDao->getStatusIdBook($this->borrowedBook[$i]) . '</strong></span>';
      echo '</div>';
      echo '</div></td>';
      echo '<td class="text-center"><strong>'. $this->userDao->getOwnerName($this->borrowedBook[$i]) .'</strong></td>';
      echo '<td>';
      echo '<a href="cart.php?remove='. $this->borrowedBook[$i]->getBookId() .'"><button type="button" class="btn btn-danger">Remove</button></a>';
      echo '</td>';
      echo '</tr>';
    }
  }
  }

  public function setupOwnedBooksCart(){
    if ($this->borrowedBook[0]->getBookName() != "null"){
    for ($i = 0; $i < sizeof($this->sharedBook); $i++){
      echo '<tr>';
      echo '<td>';
      echo '<div class="media">';
      echo '<a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>';
      echo '<div class="media-body">';
      echo '<h4 class="media-heading"><a href="book.php?book=' . $this->sharedBook[$i]->getBookId() . '">' . $this->sharedBook[$i]->getBookName() . '</a></h4>';
      echo '<h5 class="media-heading">' . $this->sharedBook[$i]->getBookAuthor() . '</a></h5>';
      echo '<span>Status: </span><span class="text-success"><strong>'. $this->bookDao->getStatusIdBook($this->sharedBook[$i]) . '</strong></span>';
      echo '</div>';
      echo '</div></td>';
      echo '<td class="text-center"><strong>'. $this->userDao->getBorrowerName($this->sharedBook[$i]) .'</strong></td>';
      echo '<td>';
      echo '<a href="cart.php?decline='. $this->sharedBook[$i]->getBookId() .'"><button type="button" class="btn btn-danger" name=decline_'. $this->sharedBook[$i]->getBookId() .'">Decline</button></a>';
      echo '</td>';
      echo '<td>';
      echo '<a href="cart.php?approve='. $this->sharedBook[$i]->getBookId() .'"><button type="button" class="btn btn-success" name=approve_'. $this->sharedBook[$i]->getBookId() .'">Approve</button></a>';
      echo '</td>';
      echo '</tr>';
    }
  }
  }
}
 ?>
