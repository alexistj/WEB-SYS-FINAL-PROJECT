<!-- file: create_account_action.php -->
<!-- purpose: allow new users to register an account -->


<?php
    @ $db = new mysqli('localhost', 'root', '', 'lybl');
    if ($db->connect_error) {
        echo '<div class="messages">Could not connect to the database. Error: ';
        echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
    } else {
        // check if a post request has been made and retrieve the information the user inputted
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
                // hashing for the password 
                $password_1 = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $sql = "SELECT * FROM `members` WHERE `email` = \"" . $email . "\"";

                $userResult = $db->query($sql);

                $userRecord = $userResult->fetch_assoc();

                if($userRecord['email'] == $email){
                    echo("An account already exists with this email");
                }else{

                    $selected = $_POST['listSelect'];
                    if ($selected[0] == 'mentor') {
                        $query = "INSERT INTO members ( name, age, email, location, gender, password, mentor)
                      			  VALUES(\"" . $name . "\", \"" . $age . "\", \"" . $email . "\", \"" . $location . "\", \"" . $gender . "\", \"" . $password_1 . "\", \"" . 1 . "\")";

                      	mysqli_query($db, $query);

                        $sql = "SELECT * FROM `members` WHERE `email` = \"" . $email . "\"";

                        $userResult = $db->query($sql);
                        $userRecord = $userResult->fetch_assoc();
                        $id=  $userRecord['id'];
                        echo $id;

                        $query = "INSERT INTO mentors (id, name, age, email, location, gender, password, occupation, num_mentees)
                      			  VALUES('$id', '$name', '$age', '$email', '$location', '$gender',  '$password_1', '$occupation', 0)";
                        if(!mysqli_query($db, $query)){
                             printf("Errormessage: %s\n", mysqli_error($db));
                        }
                        //echo "<script type='text/javascript'>alert('Register successful');</script>";
                        //header("Location: homepage.html");
                        echo "<script>
                            alert('Register successful');
                            window.location.href='index.php';
                            </script>";
                    } else {
                        $query = "INSERT INTO members (name, age, email, location, gender, password, mentor)
                      			  VALUES('$name', '$age', '$email', '$location', '$gender',  '$password_1', 0)";

                      	mysqli_query($db, $query);
                        $sql = "SELECT * FROM `members` WHERE `email` = \"" . $email . "\"";

                        $userResult = $db->query($sql);

                        $userRecord = $userResult->fetch_assoc();
                        $id=  $userRecord['id'];

                        $query = "INSERT INTO mentees (id,name, age, email, location, gender, password)
                      			  VALUES('$id','$name', '$age', '$email', '$location', '$gender',  '$password_1')";
                        mysqli_query($db, $query);
                        //echo "<script type='text/javascript'>alert('Register successful');</script>";
                        //header("Location: homepage.html");
                        echo "<script>
                            alert('Register successful');
                            window.location.href='homepage.html';
                            </script>";
                    }
                }
            } else {
                echo 'Error: Passwords do not match.';
            }
        }
    }


?>
