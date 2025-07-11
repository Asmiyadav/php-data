<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/user.css" />
<link rel="stylesheet" type="text/css" href="css/menu.css">
<title>Add Sub-Category</title>
</head>
<script>
function valid()
{
	if(document.form1.name.value=="")
	{
		alert ("PlEASE ENTER NAME");
		document.form1.name.focus();
		return false;
		}else 
	if(document.form1.mail.value=="")
	{
		alert ("PlEASE ENTER E-MAIL NAME");
		document.form1.mail.focus();
		return false;
		}else
	if(document.form1.pass.value=="")
	{
		alert ("PlEASE ENTER PASSWORD");
		document.form1.pass.focus();
		return false;
		}else
	if(!document.form1.gender[0].checked && !document.form1.gender[1].checked)
	{
		alert ("PlEASE CHOOSE MALE OR FEMALE");
		document.form1.gender[0].focus();
		return false;
		}else
	if(document.form1.city.value=="")
	{
		alert ("PlEASE SELECT YOUR CITY");
		document.form1.city.focus();
		return false;
		}else
	
		if(document.form1.image.value=="")
	{
		alert ("PlEASE UPLOAD IMAGE");
		document.form1.image,focus();
		return false;
		}else

		return true;	
	}
</script>

<?php
include ("connection.php");

$msg = "";
if(isset($_POST['submit']))
{
$name = $_POST['name'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$gender = $_POST['gender'];
$city = $_POST['city'];
$status = $_POST['status'];
$image = $_FILES['image']['name'];
$image_name = $_FILES['image']['tmp_name'];
$image_source = "admin/upload/".$image;

$cheq = "SELECT * FROM user WHERE name = '$name' && email = '$mail'";
$que = mysqli_query($con,$cheq);

if(mysqli_num_rows($que)>0)
		  {
			  $msg = "<font color='red'>Data Already In Database !";
			  }else
			  {
				  $insert = "INSERT INTO user VALUES ('','$name','$mail','$pass','$gender','$city','$image','$status')";
				  $run = mysqli_query($con, $insert);
				  
				  if($run)
				  {
					  $msg = "<font color='#006600'>Data Inserted Successfully";
					  move_uploaded_file($image_name,$image_source);
					  }else
					  $msg = "<font color='red'>Data Not Inserted !";
			  }

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
<form id="form1" enctype="multipart/form-data" name="form1" method="post" action="" onSubmit="return valid();">
  <center><table>
  
    <tr>
    <td colspan="2"><h1>Add User</h1></td>
    </tr>
    
      <tr>
      <th>Name</th>
      <td><input type="text" name="name" id="name" placeholder="Your Name.."/></td>
      </tr>
      
      <tr>
      <th>E-Mail</th>
      <td><input type="text" name="mail" id="mail" placeholder="Your E-mail.."/></td>
      </tr>
      
      <tr>
      <th>Password</th>
      <td><input type="password" name="pass" id="pass" placeholder="Your Password.."/></td>
      </tr>
      
      <tr>
      <th>Gender</th>
      <td>
      Male<input type="radio" name="gender" id="gender" value="male"/>
      Female<input type="radio" name="gender" id="gender" value="female"/>
      </td>
      </tr>
            
      <tr>
      <th>City</th>
      <td><select name="city">
      <option>Select City...</option>
      <option value="Delhi">Delhi</option>
      <option value="Punjab">Punjab</option>
      <option value="Haryana">Haryana</option>
      <option value="Goa">Goa</option>
      </select></td>
      </tr>
                  
      
      <tr>
      <th>Image</th>
      <td>
      <input type="file" name="image" id="image" style="width:50%;height:35px;" />
      <input type="hidden" name="status" id="status" value="1"/>
      </td>
      </tr>
      
      <tr>
      <th>&nbsp;</th>
      <td><input type="submit" name="submit" id="submit" value="Submit"/></td>
      </tr>
      
      <td colspan="2" style="text-align:center">
       <?php
	  echo $msg;
	  ?>
      </td>
      
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