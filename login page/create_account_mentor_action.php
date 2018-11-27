<?php

session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', 'lybl', 'lybl');
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// REGISTER USER
//if (isset($_POST['submit'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['username']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $occupation= mysqli_real_escape_string($db, $_POST['occupation']);
  $location = mysqli_real_escape_string($db, $_POST['location']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2  = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($age)) { array_push($errors, "Age is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
    if (empty($occupation)) { array_push($errors, "Occupation is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM lybl WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);

  if ($result) { // if user exists
    $user = mysqli_fetch_assoc($result);
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  //  register user if there are no errors in the form
  //if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO members (name, age, email, location, gender, password, mentor)
  			  VALUES('$name', '$age', '$email', '$location', '$gender',  '$password', 1)";

  	mysqli_query($db, $query);
  	$_SESSION['name'] = $name;
	$_SESSION['mentor'] = 1;
  	$_SESSION['success'] = "You are now logged in";

    $query = "INSERT INTO mentors (name, age, email, location, gender, password, occupation, num_mentees)
  			  VALUES('$name', '$age', '$email', '$location', '$gender',  '$password', '$occupation', 0)";
    mysqli_query($db, $query);
  //}

//}

echo 'done';
?>
