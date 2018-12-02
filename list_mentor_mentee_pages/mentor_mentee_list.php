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
   
        foreach($data as $row ) {

            $name=$row3['name'];
            $location=$row3['location'];
            $email=$row3['email'];
            $picture=$row3['picture'];
            $gender=$row3['gender'];
            $age= $row3['age'];
            $occupation= $row3['occupation'];
            $num_mentees= $row3['num_mentees'];

            echo '<table width="150" border="0" align="left" cellpadding="0">';
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
            
            echo '<tr>';
            echo '<td valign="top"><div align="left">Number of Mentees:</div></td>';
            echo '<td valign="top">'.$num_mentees.'</td>';
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
            
            foreach($data as $row ) {
       
            //Fetch all the results then output each row using foreach
            $data = $pstmt->fetchAll();
            $name=$row3['name'];
            $location=$row3['location'];
            $email=$row3['email'];
            $picture=$row3['picture'];
            $gender=$row3['gender'];
            $age= $row3['age'];

            echo '<table width="150" border="0" align="left" cellpadding="0">';
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
