<!--https://www.youtube.com/watch?v=QS4LN747BXQ-->

<?php 
  include('functions.php'); // functions
  include('config.php'); 
?>

<?php



// define variables and set to empty values
/*$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

$messageErr = $senderErr = $receiverErr = "";
$message = $sender = $receiver = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["message"])) {
    $messageErr = "Message is required";
  } else {
    $message = test_input($_POST["message"]);
  }
  
  if (empty($_POST["sender"])) {
    $senderErr = "You ID is required";
  } else {
    $sender = test_input($_POST["sender"]);
  }
    
  if (empty($_POST["receiver"])) {
    $receiverErr = "The ID of the person you are sending the message to is needed";
  } else {
    $receiver = test_input($_POST["receiver"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}*/




$errors = array();
$sent = false;

if( ! empty($_POST)){
  $process = process_form($_POST);

  if( ! empty($process['message'])){
    $errors[] = $process['message'];
  } else if ( ! empty( $process['errors'])){
    $errors = $process['errors'];
  } else {
    $sent = true;
  }
}




?>




<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  



<h2>Messenger Form</h2>
<!--<p><span class="error">* required field</span></p>-->

<form class = "messageForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <!--Message: <input type="text" name="message">
  <span class="error">* <?php //echo $messageErr;?></span>
  <br><br>-->


  <label>
    <span>Sender ID:</span>
  </label>
  <input id="sender" type="text" name="sender"
  value = "<$php echo validate_input('sender'); ?>">
  <!--<span class="error">* <?php //echo $senderErr;?></span>-->
  <br><br>


  <label>
    <span>Receiver ID:</span>
  </label>
  <input id="receiver" type="text" name="receiver" 
  value = "<$php echo validate_input('receiver'); ?>">
  <!--<span class="error"><?php //echo $receiverErr;?></span>-->
  <br><br>

  <label>
    <span>Message:</span>
  </label>
  <textarea name="Message" rows="5" cols="40" placeholder="Enter your message"></textarea>
  <br><br>

  <input id="submit" type="submit" name="submit" value="Submit">  
</form>



</body>
</html>