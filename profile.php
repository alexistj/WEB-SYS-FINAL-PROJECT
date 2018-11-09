<?php
require_once('connection.php');
$id=$_SESSION['SESS_MEMBER_ID'];
$result3 = mysql_query("SELECT * FROM member where mem_id='$id'");
while($row3 = mysql_fetch_array($result3))
{ 
$name=$row3['name'];
//$lname=$row3['lname'];
$location=$row3['location'];
$email=$row3['email'];
$picture=$row3['picture'];
$gender=$row3['gender'];
$age= $row['age'];
}
?>
<table width="398" border="0" align="center" cellpadding="0">
  <tr>
    <td height="26" colspan="2">Your Profile Information </td>
	<td><div align="right"><a href="index.php">logout</a></div></td>
  </tr>
  <tr>
    <td width="129" rowspan="5"><img src="<?php echo $picture ?>" width="129" height="129" alt="no image found"/></td>
    <td width="82" valign="top"><div align="left">Name:</div></td>
    <td width="165" valign="top"><?php echo $name ?></td>
  </tr>
 /* <tr>
    <td valign="top"><div align="left">LastName:</div></td>
    <td valign="top"><?php echo $lname ?></td>
  </tr> */
  <tr>
    <td valign="top"><div align="left">Gender:</div></td>
    <td valign="top"><?php echo $gender ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Location:</div></td>
    <td valign="top"><?php echo $location ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Email: </div></td>
    <td valign="top"><?php echo $email?></td>
  </tr>
</table>
<p align="center"><a href="index.php"></a></p>