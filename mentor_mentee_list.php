<!DOCTYPE html>
<html>
<head>
  <title>Term Project: Profile Page</title>

  <link rel="stylesheet" href="resources/css/style.css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>
<body>
  <div id="navbar" class="white_bg shadow_bottom">
      <div id="logo">
        <div id="logo_image">
          <a href="index.php"><img src="resources/images/logo.png"/ width="25%" > LYBL</a>
        </div>
      </div>
      <div id="navigation">
        <div id="navigation_links">
          <button value="profile.php" class="navigation_button apricot">
            Profile
          </button>
          <button value="messenger_2.php" class="navigation_button citrus">
            Messenger
          </button>
          <button value="resources.html" class="navigation_button citrus">
            Resources
          </button>
          <form method="post" action="profile.php" style="display: inline-block">
            <input class="navigation_button" name="logout" type="submit" value="Logout" />
          </form>
        </div>
        </div>
      </div>
    </div>
    <div id="mentor_mentee_list">
<?php

    session_start();
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname="lybl";
    $db =new PDO("mysql:host=".$host.";dbname=$dbname;",$user,$pass);

  /*  @ $db = new mysqli('localhost', 'root', '', 'lybl');
      if ($db->connect_error) {
            echo '<div class="messages">Could not connect to the database. Error: ';
            echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
      }
      */



    $id=   $_SESSION['id'];
    $sql = 'SELECT * FROM `members` WHERE `id` =" ' . $id . '"';
    $pstmt = $db->query($sql);
    $row3 = $pstmt->fetchAll();



    if( $row3[0]['mentor'] == 0){

        // Attempt insert query execution
        $sql = "SELECT * FROM mentors
        WHERE 1=1";
        $pstmt = $db->prepare($sql);
        $sql =$pstmt->execute();

        if($sql === FALSE){
            $errors = $conn->errorInfo();
            die($errors[2]);
            echo "</br>";
        }
        //Fetch all the results then output each row using foreach
        $data = $pstmt->fetchAll();
        echo '<h1 id="mentor_mentee_title">Mentor List</h1>';
        foreach($data as $row3 ) {

            $name=$row3['name'];
            $location=$row3['location'];
            $email=$row3['email'];
            $picture='resources/images/profiles/'.$row3['picture'];
            $gender=$row3['gender'];
            $age= $row3['age'];
            $occupation= $row3['occupation'];
            $num_mentees= $row3['num_mentees'];


            echo '<div class="mentor_mentee">
                    <div class="mentor_mentee_left">
                      <img src='. $picture.' width="250em" height="250em" alt="no image found"/>
                    </div>
                    <div class="mentor_mentee_right">
                      <h1 id="name">'.$name."'s Information</h1>
                      <h2 class='profile_info'>Age: ".$age.'</h2>
                      <h2 class="profile_info">Gender: '.$gender.'</h2>
                      <h2 class="profile_info">Email: '.$email.'</h2>
                      <h2 class="profile_info">Location: '.$location.'</h2>
                      <h2 class="profile_info">Occupation: '.$occupation.'</h2>
                    </div>
                  </div>';
        }
    }

        else{



            // Attempt insert query execution
            $sql = "SELECT * FROM mentees
            WHERE 1=1";
            $pstmt = $db->prepare($sql);
            $sql =$pstmt->execute();

            if($sql === FALSE){
                $errors = $conn->errorInfo();
                die($errors[2]);
                echo "</br>";
            }
            //Fetch all the results then output each row using foreach
            $data = $pstmt->fetchAll();
            echo '<h1 id="mentor_mentee_title">Mentor List</h1>';
            foreach($data as $row3 ) {

            //Fetch all the results then output each row using foreach
            //$data = $pstmt->fetchAll();
            $name=$row3['name'];
            $location=$row3['location'];
            $email=$row3['email'];
            $picture='resources/images/profiles/'.$row3['picture'];
            $gender=$row3['gender'];
            $age= $row3['age'];

                  echo '<div class="mentor_mentee">
                          <div class="mentor_mentee_left">
                            <img src='. $picture.' width="250em" height="250em" alt="no image found"/>
                          </div>
                          <div class="mentor_mentee_right">
                            <h1 id="name">'.$name."'s Information</h1>
                            <h2 class='profile_info'>Age: ".$age.'</h2>
                            <h2 class="profile_info">Gender: '.$gender.'</h2>
                            <h2 class="profile_info">Email: '.$email.'</h2>
                            <h2 class="profile_info">Location: '.$location.'</h2>
                          </div>
                        </div>';
         }
        }




    // Logout
    if (isset($_SESSION['id']) && isset($_POST['logout']) && $_POST['logout'] == 'Logout') {
      // Unset the keys from the superglobal
      unset($_SESSION['id']);
      // Destroy the session cookie for this session
      setcookie(session_name(), '', time() - 72000);
      // Destroy the session data store
      session_destroy();
      $err = 'You have been logged out.';
        echo $err;
        header("Location: homepage.html");

    }




?>

</div>

<script src="resources/js/jquery.min.js"></script>
<script src="resources/js/index.js"></script>
</body>
</html>
