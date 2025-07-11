<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<title>Main</title>
</head>

<style>
#left{
	float:left;
	width:25%;
	height:85%;
	position:absolute;
	}
	
#right{
	float:right;
	width:74%;
	height:100%;
	}
	
#container :: after{
	
	display:block;
	clear:both;
	content:"";
	}		

</style>
<?php
session_start();
include("connection.php");
$msg = "";
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$pass = $_POST['pass'];
	
	
$cheq = "SELECT * FROM user where name='$name' and password='$pass' and status=1";
$result=mysqli_query($con,$cheq);

if (mysqli_num_rows($result)>0)
{
	$_SESSION["user"]=$name;
	header("location:home.php");
}
else
$msg = "<font color='#FF0000'>Invalid User</font>";
	}

?>

<body>
<?php 
include ("header.php");
?>

<div id="left">
<?php
include ("left_menu.php");
?>
</div>

<div id="right">
<form id="form1" name="form1" method="post" action="">
  <center><table>
    <tr>
    <td colspan="2"><h1>Log In</h1></td>
    </tr>
    
      <tr>
      <th>User Name</th>
      <td><input type="text" name="name" id="name" placeholder="User Name.."/></td>
      </tr>
    <tr>
      <th>Password</th>
      <td>
      <input type="password" name="pass" id="pass" placeholder="User Password.."/>
      <input type="hidden" name="status" id="status" value="1"/>
      </td>
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
</div>

<div id="footer">
<?php 
include ("footer.php"); 
?>
</div>

</body>
</html>