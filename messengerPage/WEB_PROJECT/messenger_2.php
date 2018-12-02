<!--https://www.youtube.com/watch?v=QS4LN747BXQ-->
<!-- https://www.youtube.com/watch?v=n35Jn2nP9iU -->

<?php 
  //include('functions.php'); // functions
  include('config.php');
    session_start();
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

    //websysproject.messenger2 is the 'messenger' table of the group database
    $sql = "INSERT INTO websysproject.messenger2 (SenderEmail,ReceiverEmail,Message,Date,Time) VALUES ('{$mysqli->real_escape_string($_POST['sender'])}','{$mysqli->real_escape_string($_POST['receiver'])}','{$mysqli->real_escape_string($_POST['Message'])}','".date('c')."','".$time."'         );";
    $insert = $mysqli->query($sql);
    if($insert){
      //echo "Success!";
      //echo "<br>";
      $sender = $_POST['sender'];
      $receiver = $_POST['receiver'];
      //echo "ID number ";
      //echo $sender;
      //echo " has sent the following messages:";
      //echo "<br>";
      //echo "<br>";

      //websysproject.pratice2 is the 'members' table of the group database
      $sql = "SELECT name FROM websysproject.practice2 WHERE email = '".$sender."'";
      $name1 = $mysqli->query($sql);
      //echo $name1;
      while ($row = $name1->fetch_assoc()) {
        echo $row['name']."<br>";
      }
      echo " has sent the following messages:";
      echo "<br>";
      echo "<br>";
      //echo $sender;

      //websysproject.messenger2 is the 'messenger' table of the group database
      $sqlquery = "SELECT * from websysproject.messenger2 where SenderEmail ='".$sender."' AND ReceiverEmail = '".$receiver."'";
      $result = $mysqli->query($sqlquery);
      //var_dump($sqlquery);
      //$numRecords = $result->num_rows;
      //print_r($result);
      //$count = $result->num_rows;
      //If this prints then that means something is wrong with the $result which also means that something was wrong with the $sqlquery
      if(!$result)
      {
        echo "<br>";
        echo "FAILURE!";
      }
      $count = mysqli_num_rows($result);
      if($count > 0){ 
        /*echo ' ';
        echo "Success!";
        echo ' ';
        echo $count;*/
        for ($i=0; $i < $count; $i++){
          $record = $result->fetch_assoc();

          //websysproject.messenger2 is the 'messenger' table of the group database
          $sql = "SELECT name FROM  websysproject.practice2 WHERE email = '".$record["ReceiverEmail"]."'";
          $name1 = $mysqli->query($sql);
          //echo $name1;
          echo '"';
          echo $record["Message"];
          echo '"';
          echo " to ";
          while ($row = $name1->fetch_assoc()) {
            echo $row['name'];
          }
          echo " at ".$record["Time"]." on ".$record["Date"];
          echo "<br>";
          //printf("%s \n",$record["2"]);
          /*echo '"';
          echo $record["Message"];
          echo '"';
          echo " to ID number ".$record["ReceiverID"]." at ".$record["Time"]." on ".$record["Date"];
          //print_r(array_values($record));
          echo "<br>";*/
        }
        $result->free();
      }
     /*for ($i=0; $i < 3; $i++) {
        $record = $result->fetch_assoc();
        print_r($record);
        echo ' ';
      }*/
    } else {
      die("Error: {$mysqli->errno} : {$mysqli->error}");
    }
    //$result->free();
    $mysqli->close();
  }
}
?>
  <head>
    <style>
      .error {color: #FF0000;}
    </style>
  </head>
  <body onload="ClearForm()">  



    <h2>Messenger Form</h2>
    <!--<p><span class="error">* required field</span></p>-->

    <form name = "messageForm" id = "messageForm" class = "messageForm" method="post" action="">  
      <!-- <?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>-->
      <!--Message: <input type="text" name="message">
      <span class="error">* <?php //echo $messageErr;?></span>
      <br><br>-->


      <label>
        <span>Sender email:</span>
      </label>
      <input id="sender" type="text" name="sender">
      <!-- <input id="sender" type="text" name="sender"
      value = "<$php echo validate_input('sender'); ?>">-->
      <!--<span class="error">* <?php //echo $senderErr;?></span>-->
      <br><br>


      <label>
        <span>Receiver email:</span>
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
  <script type="text/javascript" language="javascript">
    //$('form').each(function() { this.reset() });
    /*function ClearForm(){
      document.getElementById("messageForm").reset();
    }*/
    function ClearForm() {
      if(document.getElementById) {
        document.messageForm.reset();
      }
    }
  </script>
</html>