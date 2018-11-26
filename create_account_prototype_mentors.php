<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'lybl');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['username']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $occupation= mysqli_real_escape_string($db, $_POST['occupation']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2  = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($age)) { array_push($errors, "Age is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
    if (empty($occupation)) { array_push($errors, "Occupation is required"); }
  if ($password_1 != $password_2)ccu {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  //  register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO members (name, age, email, location, gender,password) 
  			  VALUES('$name', '$age', '$email', '$loaction', '$gender',  '$password')";
      
  	mysqli_query($db, $query);
  	$_SESSION['name'] = $name;
  	$_SESSION['success'] = "You are now logged in";
      
    $result= mysql_query("SELECT id FROM members WHERE name=".$name. "AND email=". $email."");
    $row = mysql_fetch_row($result);
    mysqli_query($db, $query);
    //Note when you insert the new mentor you put the occupation in the mentors table ONLY. Also the default number of mentees should be 0.
    $query = "INSERT INTO mentors (id, name, age, email, location, gender,password, occupation, num_mentees) 
          VALUES(SELECT id from member WHERE name='.$name.'AND email='.'$email'.$name', '$age', '$email', '$loaction', '$gender',  '$password', '$occupation', 0)";
  	header('location: index.php');
  }
}