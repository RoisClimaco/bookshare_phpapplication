<?php
require_once 'class/logic/validator.php';
require_once 'class/model/user.php';
require_once 'class/dataAccessingObject/userDataAccessObject.php';

session_start();
$fields = $_POST;

if (!empty($_POST['lastname'])) {
  $validator = new Validator($_POST);
  $validationErrors = $validator->validateRegister();
  if (empty($validationErrors)) {
    $user = new User();
    $user->setUsername($fields['username']);
    $user->setEmailAddress($fields['email']);
    $user->setPassword(password_hash($fields['password'].strtolower($fields['username']),PASSWORD_DEFAULT));
    $user->setFirstName($fields['firstname']);
    $user->setLastName($fields['lastname']);
    $dao = new userDataAccessObject();
    if (empty($dao->addUser($user))){
      header("Location: index.php");
    } else {
      $validationErrors['Register'] = 'Email Address already Taken.';
      include 'login.php';
    }
  }
}

if (!empty($_POST['log_username'])) {
  //$validator = new Validator($_POST);
  //$validationErrors = $validator->validateLogin();

  if (empty($validationErrors)) {
    $user = new User();
    $user->setUsername($fields['log_username']);
    $user->setPassword($fields['log_password']);
    $dao = new userDataAccessObject();
    $temp = explode(":", $dao->searchUser($user));
    $id = $temp[0];
    if ($id != -9){
      $role = $temp[1];
      $user->setPassword("");
      $user->setUserId($id);
      $user->setRoleId($role);
      $_SESSION['user'] = $user;
      header('Location: index.php');
    } else {
      echo '<div class="alert alert-dismissible alert-danger">';
      echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
      echo '<strong>Oh snap!</strong> Incorrect Credentials inputted.';
      echo '</div>';
    }
  }
}


include 'default/header_base.php';
include 'default/navbar_default.php';
include 'ui/loginui.php';
include 'default/footer.php';
 ?>
