<?php

    session_start();

    // Connect to the database
    @ $db = new mysqli('localhost', 'root', 'lybl', 'lybl');
    if ($db->connect_error) {
        echo '<div class="messages">Could not connect to the database. Error: ';
        echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
    }

    $allowedExts = array("jpg", "jpeg", "gif", "png");

    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);

    if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/png")
        || ($_FILES["file"]["type"] == "image/pjpeg"))
        && ($_FILES["file"]["size"] < 100000)
        && in_array($extension, $allowedExts)) {

        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br>";
        } else {

            if (move_uploaded_file( $_FILES['file']['tmp_name'], "../resources/profiles/" . basename($_FILES['file']['name']))) {
                echo "file moved";

                $id =   $_SESSION['id'];
                $sql = 'SELECT * FROM `members` WHERE `id` =" ' . $id . '"';
                $userResult = $db->query($sql);
                $user = mysqli_fetch_array( $userResult );

                if ($user['mentor'] == 1) {
                    $sql = 'SELECT * FROM `mentors` WHERE `id` =" ' . $id . '"';
                    $userResult = $db->query($sql);
                    $user = mysqli_fetch_array( $userResult );

                    $sql = 'UPDATE `mentors` SET picture="' . $_FILES["file"]["name"] . '" WHERE id="' . $id . '"';
                    if ($db->query($sql) === TRUE) {
                        echo "Record updated successfully";
                    } else {
                        echo "Error updating record: " . $db->error;
                    }
                } else {
                    $sql = 'SELECT * FROM `mentees` WHERE `id` =" ' . $id . '"';
                }

            }
        }
    } else {
        echo "Invalid file";
    }
?>
