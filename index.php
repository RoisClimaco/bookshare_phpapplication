<?php
require_once 'class/model/user.php';
session_start();

include 'default/header_base.php';
if (!empty($_SESSION['user'])){
  $user = $_SESSION['user'];
    if ($user->getRoleId()==1){
      include 'default/navbar_logged_in.php';
    } else if ($user->getRoleId()==2){
      include 'default/navbar_admin.php';
    }
} else {
include 'default/navbar_default.php';
}
include 'ui/homepageui.php';
include 'default/footer.php';
 ?>
