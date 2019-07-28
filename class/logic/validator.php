<?php
/**
 *
 */
class Validator
{

  private $fields = [];
  function __construct($fields)
  {
    $this->fields = $fields;
  }

  public function validateLogin()
  {
      $validationErrors = [];

      if (!filter_var($this->fields['email'], FILTER_VALIDATE_EMAIL)) {
        $validationErrors['email'] = 'Email is not valid.';
      }
      return $validationErrors;
  }

  public function validatePassword()
  {
      $validationErrors = [];

      if (empty($this->fields['password']) || mb_strlen($this->fields['password']) < 8) {
         $validationErrors['password'] = 'Incorrect length should be not less 8.';
      }

      if (empty($this->fields['repeat_password']) || mb_strlen($this->fields['repeat_password']) < 8) {
         $validationErrors['repeat_password'] = 'Incorrect length should be not less 8.';
      }

      if (!preg_match('/[^a-zA-Z\d]/', $this->fields['password'])) {
        $validationErrors['password'] = 'Password must contain at least'.
         ' one special character.';
      }

      if (!preg_match('/[^a-z\d]/', $this->fields['password'])) {
        $validationErrors['password'] = 'Password must contain'.
         ' one uppercase character.';
      }

      if (!empty($this->fields['repeat_password']) && $this->fields['password'] != $this->fields['repeat_password']) {
        $validationErrors['password'] = 'Passwords do not match.';
      }

      return $validationErrors;
  }

  public function validateRegister()
  {
      $validationErrors = [];
         if (empty($this->fields['firstname']) || mb_strlen($this->fields['firstname']) < 2) {
           $validationErrors['firstname'] = 'First Name Incorrect length should be not less 2.';
      }

      if (empty($this->fields['lastname']) || mb_strlen($this->fields['lastname']) < 2) {
         $validationErrors['lastname'] = 'Last Name Incorrect length should be not less 2.';
      }

      if (empty($this->fields['email']) || mb_strlen($this->fields['email']) < 4) {
        $validationErrors['email'] = 'Email Incorrect length should be not less 4.';
      }

      if (!filter_var($this->fields['email'], FILTER_VALIDATE_EMAIL)) {
        $validationErrors['email'] = 'Email is not valid.';
      }

      if (empty($this->fields['password']) || mb_strlen($this->fields['password']) < 8) {
         $validationErrors['password'] = 'Password Incorrect length should be not less 8.';
      }

      if (empty($this->fields['confirmPassword']) || mb_strlen($this->fields['confirmPassword']) < 8) {
         $validationErrors['confirmPassword'] = 'Confirm Password Incorrect length should be not less 8.';
      }

      if (!preg_match('/[^a-zA-Z\d]/', $this->fields['password'])) {
        $validationErrors['password'] = 'Password must contain at least'.
         ' one special character.';
      }

      if (!preg_match('/[^a-z\d]/', $this->fields['password'])) {
        $validationErrors['password'] = 'Password must contain'.
         ' one uppercase character.';
      }

      if (!empty($this->fields['confirmPassword']) && $this->fields['password'] != $this->fields['confirmPassword']) {
        $validationErrors['password'] = 'Passwords do not match.';
      }



      return $validationErrors;

  }

}

 ?>
