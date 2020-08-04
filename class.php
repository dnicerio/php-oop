<?php

  class User {

    // Properties
    public $username;
    protected $email;
    public $role = 'member';

    // Constructor
    public function __construct($username, $email){
      $this->username = $username;
      $this->email = $email;
    }

    // Destructor
    public function __destruct(){
      echo "the user $this->username was removed <br />";
    }

    // Clone
    public function __clone(){
      $this->username = $this->username . '(cloned)';
    }

    // Methods
    public function addFriend(){
      return "$this->username added a new friend";
    }

    public function message(){
      return "$this->email sent a new message";
    }

    //  Getters
    public function getEmail(){
      return $this->email;
    }

    // Setters
    public function setEmail($email){
      if(strpos($email, '@') > -1){
        $this->email = $email;
      }
    }

  }

  class AdminUser extends User {

    // Properties
    public $level;
    public $role = 'admin';

    // Constructor
    public function __construct($username, $email, $level){
      $this->level = $level;
      parent::__construct($username, $email);
    }

    // Methods
    public function message(){
      return "$this->email, an admin, sent a new message";
    }

  }

  $userOne = new User('ken', 'ken@streetfighter.com');
  $userTwo = new User('zangief', 'zangief@streetfighter.com');
  $userThree = new AdminUser('ryu', 'ryu@streefighter.com', 5);
  $userFour = new User('sagat', 'sagat@streetfighter.com');

  echo $userOne->addFriend() . '<br />';
  echo $userOne->message() . '<br />';
  echo $userOne->getEmail() . '<br />';
  $userOne->setEmail('ryu@streetfighter.com');
  echo $userOne->getEmail() . '<br />';

  echo $userTwo->addFriend() . '<br />';
  echo $userTwo->getEmail() . '<br />';

  echo $userThree->username . '<br />';
  echo $userThree->getEmail() . '<br />';
  echo $userThree->level . '<br />';
  echo $userThree->message() . '<br />';

  
  // print_r(get_class_vars('User'));
  // print_r(get_class_methods('User'));

  // echo 'the class is ' . get_class($userOne);

  // unset($userFour);
  $userFive = clone $userFour;
  echo $userFive->username . '<br />';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP OOP</title>
</head>
<body>
  
</body>
</html>