<!--https://www.youtube.com/watch?v=QS4LN747BXQ-->
<!-- https://www.youtube.com/watch?v=n35Jn2nP9iU -->

<?php 
  include('config.php');
    session_start();
?>

<!DOCTYPE HTML>  
<html>
<?php
  if(isset($_POST['submit']))
  {
  if( !empty($_POST)){

    //websysproject is the name of the database i have used and connected to. Please change it so that it connects to the group database
    $mysqli = new mysqli('localhost','root', '', 'lybl');
    date_default_timezone_set('America/New_York');
    $date = date('m/d/Y');
    $time = date("h:i:sa");
    if($mysqli->connect_error){
      die('Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error);
    }

    //websysproject.messenger2 is the 'messenger' table of the group database
    $sql = "INSERT INTO lybl.messenger (SenderEmail,ReceiverEmail,Message,Date,Time) VALUES ('{$mysqli->real_escape_string($_POST['sender'])}','{$mysqli->real_escape_string($_POST['receiver'])}','{$mysqli->real_escape_string($_POST['Message'])}','".date('c')."','".$time."'         );";
    $insert = $mysqli->query($sql);
    if($insert){
      $sender = $_POST['sender'];
      $receiver = $_POST['receiver'];

      //websysproject.pratice2 is the 'members' table of the group database
      $sql = "SELECT name FROM lybl.members WHERE email = '".$sender."'";
      $name1 = $mysqli->query($sql);
      while ($row = $name1->fetch_assoc()) {
        echo $row['name']."<br>";
      }
      echo " has sent the following messages:";
      echo "<br>";
      echo "<br>";

      //websysproject.messenger2 is the 'messenger' table of the group database
      $sqlquery = "SELECT * from lybl.messenger where SenderEmail ='".$sender."' AND ReceiverEmail = '".$receiver."'";
      $result = $mysqli->query($sqlquery);

      
      
      if(!$result)
      {
        echo "<br>";
        echo "FAILURE!";
      }
      
      $count = mysqli_num_rows($result);
      
      if($count > 0){ 
        for ($i=0; $i < $count; $i++){
          $record = $result->fetch_assoc();

          //websysproject.messenger2 is the 'messenger' table of the group database
          $sql = "SELECT name FROM  lybl.messenger WHERE email = '".$record["ReceiverEmail"]."'";
          $name1 = $mysqli->query($sql);
          echo '"';
          echo $record["Message"];
          echo '"';
          echo " to ";
          while ($row = $name1->fetch_assoc()) {
            echo $row['name'];
          }
          echo " at ".$record["Time"]." on ".$record["Date"];
          echo "<br>";
        }
        $result->free();
      }

////////////////////////////////////////////////////////////////////
      //websysproject.pratice2 is the 'members' table of the group database
      $sql = "SELECT name FROM lybl.members WHERE email = '".$sender."'";
      $name1 = $mysqli->query($sql);

      //websysproject.pratice2 is the 'members' table of the group database
    $sql = "SELECT name FROM lybl.members WHERE email = '".$receiver."'";
      $name2 = $mysqli->query($sql);

      echo "<br>";
      echo "<br>";
      while ($row = $name1->fetch_assoc()) {
        echo $row['name']." ";
      }
      echo " has received the following messages from ";
      while ($row2 = $name2->fetch_assoc()) {
        echo $row2['name'].":<br>";
      }
      echo "<br>";

      //websysproject.messenger2 is the 'messenger' table of the group database
      $sqlquery2 = "SELECT * from lybl.messenger where SenderEmail ='".$receiver."' AND ReceiverEmail = '".$sender."'";
      $result2 = $mysqli->query($sqlquery2);

      if(!$result2)
      {
        echo "<br>";
        echo "FAILURE!";
      }

      $count2 = mysqli_num_rows($result2);
      if($count2 > 0){
        for ($i=0; $i < $count2; $i++){
            $record2 = $result2->fetch_assoc();

            //websysproject.messenger2 is the 'messenger' table of the group database
            $sql2 = "SELECT name FROM  lybl.messenger WHERE email = '".$record2["SenderEmail"]."'";
            $name2 = $mysqli->query($sql2);
            echo '"';
            echo $record2["Message"];
            echo '"';
            echo " to ";
            while ($row2 = $name2->fetch_assoc()) {
              echo $row2['name'];
            }
            echo " at ".$record2["Time"]." on ".$record2["Date"];
            echo "<br>";
          }
          $result2->free();
        }else{
          echo "NO MESSAGES HAVE BEEN RECEIVED\n";
        }
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
  <body onload="ClearForm()">  



    <h2>Messenger Form</h2>

    <form name = "messageForm" id = "messageForm" class = "messageForm" method="post" action="">  


      <label>
        <span>Sender email:</span>
      </label>
      <input id="sender" type="text" name="sender">
      <br><br>


      <label>
        <span>Receiver email:</span>
      </label>
      <input id="receiver" type="text" name="receiver">
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
   
    function ClearForm() {
      if(document.getElementById) {
        document.messageForm.reset();
      }
    }
  </script>
</html>
