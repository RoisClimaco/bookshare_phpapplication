<div id = "inner">
<!-- New Arrivals -->

  <h2>
    Library
  </h2>

  <br>
  <div id ="library" class="pl-3">
    <?php
    require_once 'class/logic/list-maker.php';

    $maker = new listmaker();
    $maker->allBooks();
    ?>

</div>
</div>
