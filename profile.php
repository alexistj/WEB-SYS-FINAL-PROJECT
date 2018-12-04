<!DOCTYPE html>
<html>
<head>
  <title>Term Project: Profile Page</title>
  <link rel="stylesheet" href="./login%2520page/static/semantic.min.css">
  <link rel="stylesheet" href="./login%20page/static/login_style.css">
  <link rel="stylesheet" href="../landing_page/style.css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>
<body>

<?php

    session_start();

    @ $db = new mysqli('localhost', 'root', '', 'lybl');
      if ($db->connect_error) {
            echo '<div class="messages">Could not connect to the database. Error: ';
            echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
      }



    $id=   $_SESSION['id'];
    $sql = 'SELECT * FROM `members` WHERE `id` =" ' . $id . '"';
    $userResult = $db->query($sql);
    $row3 = mysqli_fetch_array( $userResult );


    if( $row3['mentor'] == 1){
            $sql = 'SELECT * FROM `mentors` WHERE `id` =" ' . $id . '"';
            $userResult = $db->query($sql);

            $row3 = mysqli_fetch_array( $userResult );

            $name=$row3['name'];
            $location=$row3['location'];
            $email=$row3['email'];
            $picture= "../resources/profiles/" . $row3['picture'];
            $gender=$row3['gender'];
            $age= $row3['age'];
            $occupation= $row3['occupation'];
            $num_mentees= $row3['num_mentees'];

        echo '<div id="navbar" class="white_bg shadow_bottom">
            <div id="logo">
              <div id="logo_image">
                <a href="../landing_page/index.php"><img src="../resources/logo.png"/ width="25%" > LYBL</a>
              </div>
            </div>
            <div id="navigation">
              <div id="navigation_links">
                <button value="../messengerPage/WEB_PROJECT/messenger_2.php" class="navigation_button citrus">
                  Messenger
                </button>
                <button value="../list_mentor_mentee_pages/mentor_mentee_list.php" class="navigation_button citrus">
                  Mentees
                </button>
                <button value="../resources_page/resources.html" class="navigation_button citrus">
                  Resources
                </button>
                <form method="post" action="profile.php" style="display: inline-block">
                  <input class="navigation_button" name="logout" type="submit" value="Logout" />
                </form>
              </div>
            </div>
          </div>
          <div id="content">';

        echo '<div id="profile">
                <div id="profile_left">
                  <img src='. $picture.' width="250em" height="250em" alt="no image found"/>
                </div>
                <div id="profile_right">
                  <h1 id="name">'.$name."'s Information</h1>
                  <h2 class='profile_info'>Age: ".$age.'</h2>
                  <h2 class="profile_info">Gender: '.$gender.'</h2>
                  <h2 class="profile_info">Email: '.$email.'</h2>
                  <h2 class="profile_info">Location: '.$location.'</h2>
                  <h2 class="profile_info">Occupation: '.$occupation.'</h2>
                </div>
                <form action="upload_file.php" method="post"
                  enctype="multipart/form-data">
                  <input type="file" name="file" id="file"><br>
                  <input class="upload_button" type="submit" name="submit" value="Submit">
                </form>
              </div>';







    }else{


        $sql = "SELECT * FROM `mentees` WHERE `id` = \"" . $id . "\"";
        $userResult = $db->query($sql);
        $row3 = $userResult->fetch_assoc();



        $name=$row3['name'];
        $location=$row3['location'];
        $email=$row3['email'];
        $picture= "../resources/profiles/" . $row3['picture'];
        $gender=$row3['gender'];
        $age= $row3['age'];



        echo '<div id="navbar" class="white_bg shadow_bottom">
            <div id="logo">
              <div id="logo_image">
                <a href="../landing_page/index.php"><img src="../resources/logo.png"/ width="25%" > LYBL</a>
              </div>
            </div>
            <div id="navigation">
              <div id="navigation_links">
                <button value="../messengerPage/WEB_PROJECT/messenger_2.php" class="navigation_button citrus">
                  Messenger
                </button>
                <button value="../list_mentor_mentee_pages/mentor_mentee_list.php" class="navigation_button citrus">
                  Mentors
                </button>
                <button value="../resources_page/resources.html" class="navigation_button citrus">
                  Resources
                </button>
                <form method="post" action="profile.php" style="display: inline-block">
                  <input class="navigation_button" name="logout" type="submit" value="Logout" />
                </form>
              </div>
            </div>
          </div>
          <div id="content">';

          echo '<div id="profile">
                  <div id="profile_left">
                    <img src='. $picture.' width="250em" height="250em" alt="no image found"/>
                  </div>
                  <div id="profile_right">
                    <h1 id="name">'.$name."'s Information</h1>
                    <h2 class='profile_info'>Age: ".$age.'</h2>
                    <h2 class="profile_info">Gender: '.$gender.'</h2>
                    <h2 class="profile_info">Email: '.$email.'</h2>
                    <h2 class="profile_info">Location: '.$location.'</h2>
                  </div>
                  <form action="upload_file.php" method="post"
                    enctype="multipart/form-data">
                    <input type="file" name="file" id="file"><br>
                    <input class="upload_button" type="submit" name="submit" value="Submit">
                  </form>
                </div>';
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
  <script src="../landing_page/jquery.min.js"></script>
  <script src="../landing_page/index.js"></script>
</body>
</html>
