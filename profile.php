<!-- file: profile.php -->
<!-- purpose: show the information of the current user and allow user to upload an image. -->

<!DOCTYPE html>
<html>
<head>
  <title>Term Project: Profile Page</title>

  <link rel="stylesheet" href="resources/css/style.css"/>
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

    // check the type of user, this one checks if the user is a mentor
    if( $row3['mentor'] == 1){
            $sql = 'SELECT * FROM `mentors` WHERE `id` =" ' . $id . '"';
            $userResult = $db->query($sql);

            $row3 = mysqli_fetch_array( $userResult );
            // grab the information of the user and save them to variables
            $name=$row3['name'];
            $location=$row3['location'];
            $email=$row3['email'];
            $picture=  'resources/images/profiles/'.$row3['picture'];
            $gender=$row3['gender'];
            $age= $row3['age'];
            $occupation= $row3['occupation'];
            $num_mentees= $row3['num_mentees'];

        // output the navbar
        echo '<div id="navbar" class="white_bg shadow_bottom">
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
          <div id="content">';

        // this is the actual profile information for a mentor
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
                  <button class="navigation_button citrus" value="mentor_mentee_list.php">Show Mentees</button>
                </div>
                <form action="upload_file.php" method="post"
                  enctype="multipart/form-data">
                  <input type="file" name="file" id="file"><br>
                  <input class="upload_button" type="submit" name="submit" value="Submit">
                </form>
              </div>';







    }else{

      // this is the case in which the user is a mentee
        $sql = "SELECT * FROM `mentees` WHERE `id` = \"" . $id . "\"";
        $userResult = $db->query($sql);
        $row3 = $userResult->fetch_assoc();


        // save the information relevant for a mentee user
        $name=$row3['name'];
        $location=$row3['location'];
        $email=$row3['email'];
        $picture= 'resources/images/profiles/'.$row3['picture'];
        $gender=$row3['gender'];
        $age= $row3['age'];

        // output the navbar
        echo '<div id="navbar" class="white_bg shadow_bottom">
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
          <div id="content">';

          // output the mentee information 
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
                    <button class="navigation_button citrus" value="mentor_mentee_list.php">Show Mentors</button>
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
        header("Location: index.php");

    }

?>
  </div>

  <script src="resources/js/jquery.min.js"></script>
  <script src="resources/js/index.js"></script>
</body>
</html>
