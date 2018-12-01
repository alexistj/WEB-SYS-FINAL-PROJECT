<?php
    @ $db = new mysqli('localhost', 'root', '', 'lybl');
    if ($db->connect_error) {
        echo '<div class="messages">Could not connect to the database. Error: ';
        echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
    } else {
        if (isset($_POST)) {
            $name = $_POST['username'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $occupation = $_POST['occupation'];
            $location = $_POST['location'];
            $password_1 = $_POST['password'];
            $password_2  = $_POST['password_2'];
            if ($password_1 == $password_2) {
                $password_1 = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $sql = "SELECT * FROM `members` WHERE `email` = \"" . $email . "\"";

                $userResult = $db->query($sql);

                $userRecord = $userResult->fetch_assoc();

                if($userRecord['email'] == $email){
                    echo("An account already exists with this email");
                }else{

                    $selected = $_POST['listSelect'];
                    if ($selected[0] == 'mentor') {
                        $query = "INSERT INTO members (name, age, email, location, gender, password, mentor)
                      			  VALUES(\"" . $name . "\", \"" . $age . "\", \"" . $email . "\", \"" . $location . "\", \"" . $gender . "\", \"" . $password_1 . "\", \"" . 1 . "\")";

                      	mysqli_query($db, $query);

                        $query = "INSERT INTO mentors (name, age, email, location, gender, password, occupation, num_mentees)
                      			  VALUES('$name', '$age', '$email', '$location', '$gender',  '$password_1', '$occupation', 0)";
                        mysqli_query($db, $query);

                        header("Location: homepage.html");
                    } else {
                        $query = "INSERT INTO members (name, age, email, location, gender, password, mentor)
                      			  VALUES('$name', '$age', '$email', '$location', '$gender',  '$password_1', 0)";

                      	mysqli_query($db, $query);

                        $query = "INSERT INTO mentees (name, age, email, location, gender, password)
                      			  VALUES('$name', '$age', '$email', '$location', '$gender',  '$password_1')";
                        mysqli_query($db, $query);

                        header("Location: homepage.html");
                    }
                }
            } else {
                echo 'Error: Passwords do not match.';
            }
        }
    }


?>
