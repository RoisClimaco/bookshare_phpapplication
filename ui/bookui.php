<br><br>
<div style="width:800px; margin:0 auto;text-align:center;margin-top:2.5%;margin-bottom:2.5%">
  <br>
  <h4>Book Name: </h4>
  <h5> <?php
    require_once 'class/logic/book-setup.php';
    $setup = new bookSetup($_GET["book"]);
    echo $setup->setupGetBookName();
  ?> </h5>
  <br>
  <h4>Author: </h4>
  <h5> <?php
    echo $setup->setupGetBookAuthor();
  ?> </h5>

<!-- disable button if borrowed -->
<?php
if ($setup->setupGetBookStatus() == 1){
  echo '<form role="form" method="post" action="book.php?book='.$setup->setupGetBookId().'">';
  echo '<input type="hidden" id="bookId" name="bookId" value="'.$setup->setupGetBookId().'">';
  echo '<input type="submit" class="btn btn-lg btn-warning" value="Borrow Book">';
  echo '</form>';
} else {
  echo '<button type="button" class="btn btn-danger disabled">Book Unavailable</button>';

}
?>
