<?php
  /*
  Unfinished prototype for "create account" for mentees
  */

  /* Create a new database connection object, passing in the host, username,
   password, and database to use. The "@" suppresses errors. */
  @ $db = new mysqli('localhost', 'root', 'lybl', 'lybldb');
  if ($db->connect_error) {
      echo '<div class="messages">Could not connect to the database. Error: ';
      echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
  }

  else{
    if (isset($_POST)){
      $email = $_POST['email'];
      $password = $_POST['password'];

      $sql = "SELECT * FROM `mentees` WHERE `email` = \"" . $email . "\"";

      $userResult = $db->query($sql);

      $userRecord = $userResult->fetch_assoc();

      if($userRecord['email'] == $email){
        echo("An account already exists with this email");
      }
      else{
        $hashedpw = password_hash($password, PASSWORD_DEFAULT);
        // Add other important values later
        //$sql = "INSERT INTO `mentees` (username, email, password) VALUES (\"" . $username . "\", \"" . $email . "\", \"" . $hashedpw . "\")";
        $userResult = $db->query($sql);
        header("Location: login.php");
        exit;
      }
    }

  }
?>
