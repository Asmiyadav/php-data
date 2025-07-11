<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<title>Admin Log In</title>
</head>
<?php

session_start();


$msg ="";
include("connection.php");
if (isset($_POST['submit']))
{

$name=$_POST["name"];
$pass=$_POST["pass"];


$cheq = "select * from admin where name='$name' and password='$pass'";
$result=mysqli_query($con,$cheq);
if (mysqli_num_rows($result)>0)
{
	$_SESSION["admin"]=$name;
	header("location:main.php");
}
else
$msg = "<font color='#FF0000'>Invalid User</font>";

}
?>
<body>
<form id="form1" name="form1" method="post" action="">
  <center><table>
    <tr>
    <td colspan="2"><h1>Admin Log In</h1></td>
    </tr>
    
      <tr>
      <th>Admin Name </th>
      <td><input type="text" name="name" id="name" placeholder="Admin Name.."/></td>
      </tr>
    <tr>
      <th>Admin Password</th>
      <td><input type="password" name="pass" id="pass" placeholder="Admin Password.."/></td>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td><input type="submit" name="submit" id="submit" value="Log In"/></td>
    </tr>
    <tr><td colspan="2" align="center">
    <?php echo $msg; ?>
    </td></tr>
  </table></center>
</form>
</body>
</html>