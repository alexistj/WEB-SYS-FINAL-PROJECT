<?php
    $allowedExts = array("jpg", "jpeg", "gif", "png");

    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);

    //$extension = end(explode(".", $_FILES["file"]["name"]));
    if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/png")
        || ($_FILES["file"]["type"] == "image/pjpeg"))
        && ($_FILES["file"]["size"] < 100000)
        && in_array($extension, $allowedExts)) {

        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br>";
        } else {
            echo "Upload: " . $_FILES["file"]["name"] . "<br>";
            echo "Type: " . $_FILES["file"]["type"] . "<br>";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
            echo "Stored in: " . $_FILES["file"]["tmp_name"];
            if (move_uploaded_file( $_FILES['file']['tmp_name'], "../resources/profiles/" . basename($_FILES['file']['name']))) {
                echo "file moved";
            }
        }
    } else {
        echo "Invalid file";
    }
?>
