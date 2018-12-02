<?php

    session_start();

    @ $db = new mysqli('localhost', 'root', 'lybl', 'lybl');
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
            echo $id;
            $row3 = mysqli_fetch_array( $userResult );

            $name=$row3['name'];
            $location=$row3['location'];
            $email=$row3['email'];
            $picture=$row3['picture'];
            $gender=$row3['gender'];
            $age= $row3['age'];
            $occupation= $row3['occupation'];
            $num_mentees= $row3['num_mentees'];

        echo '<table width="900" border="0" align="left" cellpadding="0">';
        echo  '<tr>';
        echo '<td height="26" colspan="2">Your Profile Information </td>';
        echo '<td><div align="right"><div align="right">  <form method="post" action="profile.php">
        <input name="logout" type="submit" value="Logout" />
      </form></div></td>';
        echo '<tr>';

        echo  '<tr>';
        echo '<td height="26" colspan="2">Contact mentees </td>';
        echo '<td><div align="right"><a href="../menssengerPage/WEB_PROJECT/Messenger.html">Messenger</a></div></td>';
        echo '<tr>';

        echo '<td width="82" valign="top"><div align="left">Name:</div></td>';
        echo '<td width="165" valign="top">'.$name.'</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td valign="top"><div align="left">Gender:</div></td>';
        echo '<td valign="top">'.$gender.'</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td valign="top"><div align="left">Age:</div></td>';
        echo '<td valign="top">'.$age.'</td>';
        echo '</tr>';


        echo '<tr>';
        echo '<td valign="top"><div align="left">Location:</div></td>';
        echo '<td valign="top">'.$location.'</td>';
        echo '</tr>';
        echo '<tr>';


        echo '<tr>';
        echo '<td valign="top"><div align="left">Occupation:</div></td>';
        echo '<td valign="top">'.$occupation.'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td valign="top"><div align="left">Email: </div></td>';
        echo '<td valign="top">'.$email.'</td>';
        echo '</tr>';
        echo '</table>';
        echo '<p align="center"><a href="index.php"></a></p>';
        echo '</tr>';
        echo '<tr>';
        echo '<td width="129" rowspan="5"><img src="'. $picture.'" width="129" height="129" alt="no image found"/></td>';

        echo '<form action="upload_file.php" method="post"
                enctype="multipart/form-data">
                <label for="file">Filename:</label>
                <input type="file" name="file" id="file"><br>
                <input type="submit" name="submit" value="Submit">
                </form>';


    }else{


        $sql = "SELECT * FROM `mentees` WHERE `id` = \"" . $id . "\"";
        $userResult = $db->query($sql);
        $row3 = $userResult->fetch_assoc();



        $name=$row3['name'];
        $location=$row3['location'];
        $email=$row3['email'];
        $picture=$row3['picture'];
        $gender=$row3['gender'];
        $age= $row3['age'];

        echo '<table width="900" border="0" align="left" cellpadding="0">';
        echo  '<tr>';
        echo '<td height="26" colspan="2">Your Profile Information </td>';
        echo '<td><div align="right">  <form method="post" action="index.php">
        <input name="logout" type="submit" value="Logout" />
      </form></div></td>';
        echo '<tr>';

         echo  '<tr>';
        echo '<td height="26" colspan="2">Contact mentors </td>';
        echo '<td><div align="right"><a href="../menssengerPage/WEB_PROJECT/Messenger.html">Messenger</a></div></td>';
        echo '<tr>';
        echo '<td width="82" valign="top"><div align="left">Name:</div></td>';
        echo '<td width="165" valign="top">'.$name.'</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td valign="top"><div align="left">Gender:</div></td>';
        echo '<td valign="top">'.$gender.'</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td valign="top"><div align="left">Age:</div></td>';
        echo '<td valign="top">'.$age.'</td>';
        echo '</tr>';


        echo '<tr>';
        echo '<td valign="top"><div align="left">Location:</div></td>';
        echo '<td valign="top">'.$location.'</td>';
        echo '</tr>';
        echo '<tr>';

        echo '<tr>';
        echo '<td valign="top"><div align="left">Email: </div></td>';
        echo '<td valign="top">'.$email.'</td>';
        echo '</tr>';
        echo '</table>';
        echo '<p align="center"><a href="profile.php"></a></p>';
        echo '</tr>';
        echo '<tr>';
        echo '<td width="129" rowspan="5"><img src="'. $picture.'" width="129" height="129" alt="no image found"/></td>';
    }

<<<<<<< HEAD
=======

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

>>>>>>> 10166574c292a4354171d3dd9c5cd8c6bb1907bd



?>


<head>
  <title>Term Project: Profile Page</title>
  <link rel="stylesheet" href="./login%2520page/static/semantic.min.css">
  <link rel="stylesheet" href="./login%20page/static/login_style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>
