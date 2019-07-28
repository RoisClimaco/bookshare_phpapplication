<div id = "inner">
<!-- New Arrivals -->

  <h2>
    New Arrivals
  </h2>
  <br>
    <div id ="homepage_new" class="pl-3">
<?php
require_once 'class/logic/list-maker.php';

$maker = new listmaker();
$maker->newArrivals();
?>
