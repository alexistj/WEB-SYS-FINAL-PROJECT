<?php
$id=$_SESSION['SESS_MEMBER_ID'];
$result3 = mysql_query("SELECT * FROM member where mem_id='$id'");
while($row3 = mysql_fetch_array($result3))
{
$name=$row3['name'];
$location=$row3['location'];
$email=$row3['email'];
$picture=$row3['picture'];
$gender=$row3['gender'];
$age= $row3['age'];
$occupation= $row3['occupation'];
$num_mentees= $row3['num_mentees'];
}
?>


<head>
  <title>Term Project: Profile Page</title>
  <link rel="stylesheet" href="./login%2520page/static/semantic.min.css">
  <link rel="stylesheet" href="./login%20page/static/login_style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>



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
  <tr>
     <td valign="top"><div align="left">Occupation:</div></td>
    <td valign="top"><?php echo $occupation ?></td>
  </tr>

  <tr>
     <td valign="top"><div align="left">Currently mentors:</div></td>
    <td valign="top"><?php echo $num_mentees ?></td>
  </tr>
</table>
<p align="center"><a href="index.php"></a></p>
