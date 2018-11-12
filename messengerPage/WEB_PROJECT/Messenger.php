<!--https://www.youtube.com/watch?v=QS4LN747BXQ-->
<!-- https://www.youtube.com/watch?v=n35Jn2nP9iU -->

<?php 
  //include('functions.php'); // functions
  include('config.php'); 
?>

<!DOCTYPE HTML>  
<html>
<?php


  if(isset($_POST['submit']))
  {
  if( !empty($_POST)){
    $mysqli = new mysqli('localhost','root', '', 'websysproject');

    date_default_timezone_set('America/New_York');
    $date = date('m/d/Y');
    $time = date("h:i:sa");

    if($mysqli->connect_error){
      die('Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error);
    }

    $sql = "INSERT INTO websysproject.messenger (SenderID,ReceiverID,Message,Date,Time) VALUES ('{$mysqli->real_escape_string($_POST['sender'])}','{$mysqli->real_escape_string($_POST['receiver'])}','{$mysqli->real_escape_string($_POST['Message'])}','".date('c')."','".$time."'         );";
    $insert = $mysqli->query($sql);

    if($insert){
      echo "Success!";
    } else {
      die("Error: {$mysqli->errno} : {$mysqli->error}");
    }

    $mysqli->close();
  }
}
?>
  <head>
    <style>
      .error {color: #FF0000;}
    </style>
  </head>
  <body>  



    <h2>Messenger Form</h2>
    <!--<p><span class="error">* required field</span></p>-->

    <form class = "messageForm" method="post" action="">  
      <!-- <?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>-->
      <!--Message: <input type="text" name="message">
      <span class="error">* <?php //echo $messageErr;?></span>
      <br><br>-->


      <label>
        <span>Sender ID:</span>
      </label>
      <input id="sender" type="text" name="sender">
      <!-- <input id="sender" type="text" name="sender"
      value = "<$php echo validate_input('sender'); ?>">-->
      <!--<span class="error">* <?php //echo $senderErr;?></span>-->
      <br><br>


      <label>
        <span>Receiver ID:</span>
      </label>
      <input id="receiver" type="text" name="receiver">
      <!--<input id="receiver" type="text" name="receiver" 
      value = "<$php echo validate_input('receiver'); ?>">-->
      <!--<span class="error"><?php //echo $receiverErr;?></span>-->
      <br><br>

      <label>
        <span>Message:</span>
      </label>
      <textarea id = "Message" name="Message" rows="5" cols="40" placeholder="Enter your message"></textarea>
      <br><br>

      <input id="submit" type="submit" name="submit" value="Submit">  
    </form>
  </body>
  <script type ="text/javascript">

  </script>
</html>