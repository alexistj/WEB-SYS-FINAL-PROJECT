<?php
   

// Connect to the database
  @ $db = new mysqli('localhost', 'root', '', 'lybl');
  if ($db->connect_error) {
        echo '<div class="messages">Could not connect to the database. Error: ';
        echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
  }


// Check login
if (isset($_POST['uname']) && isset($_POST['psw'] )) {
     
 $password = password_hash($_POST['psw'],PASSWORD_DEFAULT);
 $sql = "SELECT * FROM `members` WHERE `email` = \"" . $_POST['uname'] . "\"";
 $userResult = $db->query($sql);
 $userRecord = $userResult->fetch_assoc();
 //echo $userRecord['email'];
 //echo $_POST['uname'];
  echo $userRecord['password'];
  echo '<br>';
  echo $password;
  
  if ($userRecord['email'] === $_POST['uname'] &&    $userRecord['password'] === $password) {
    $_SESSION['id'] = $userRecord['id'];
    $_SESSION['name'] = $userRecord['name'];
    $_SESSION['age'] = $userRecord['age'];
    $_SESSION['email'] = $userRecord['email'];
    $_SESSION['location'] = $userRecord['location'];
    $_SESSION['picture'] = $userRecord['name'];
      echo $userRecord['email'];
 
    header("Location: profile.php");

  } else {
    $err = 'Incorrect username or password.';
      
  }
}
    


?>