<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/item.css" />
<link rel="stylesheet" type="text/css" href="css/menu.css">
<title>Update User</title>
</head>
<?php

$msg = "";

include ("connection.php");


$id = $_GET['id'];
$select = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($con, $select);
$row = mysqli_fetch_array($result);

if(isset($_POST['submit']))
{
$name = $_POST['name'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$gender = $_POST['gender'];
$city = $_POST['city'];
$image = $_FILES['image']['name'];
$image_name = $_FILES['image']['tmp_name'];
$image_source = "upload/".$image;

$update = "UPDATE user SET name='$name', email='$mail',password='$pass',gender='$gender',city='$city',image='$image' WHERE id=$id";
$run = mysqli_query($con,$update);

if($run)
 {
  $msg = "<font color='#006600'>Data Updated Successfully";
 move_uploaded_file($image_name,$image_source);
 }else
 $msg = "<font color='red'>Data Not Updated !";
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
      <td><input type="text" name="name" id="name" placeholder="Your Name.." value="<?php echo $row['name']; ?>"/></td>
      </tr>
      
      <tr>
      <th>E-Mail</th>
      <td><input type="text" name="mail" id="mail" placeholder="Your E-mail.." value="<?php echo $row['email']; ?>"/></td>
      </tr>
      
      <tr>
      <th>Password</th>
      <td><input type="password" name="pass" id="pass" placeholder="Your Password.." value="<?php echo $row['password']; ?>"/></td>
      </tr>
      
      <tr>
      <th>Gender</th>
      <td>
      Male<input type="radio" name="gender" id="gender" value="male" 
	  <?php 
	  if($row["gender"]=="male")
	  {
		  echo "checked";
		  }
	  ?>/>
      Female<input type="radio" name="gender" id="gender" value="female"
      <?php 
	  if($row["gender"]=="female")
	  {
		  echo "checked";
		  }
	  ?>/>
      </td>
      </tr>
            
      <tr>
      <th>City</th>
      <td><select name="city">
      <option>Select City...</option>
      <option value="Delhi"<?php if($row["city"]=="Delhi") {echo "selected";} ?>>Delhi</option>
      <option value="Punjab"<?php if($row["city"]=="Punjab") {echo "selected";} ?>>Punjab</option>
      <option value="Haryana"<?php if($row["city"]=="Haryana") {echo "selected";} ?>>Haryana</option>
      <option value="Goa"<?php if($row["city"]=="Goa") {echo "selected";} ?>>Goa</option>
      </select></td>
      </tr>
                  
      
      <tr>
      <th>Image</th>
      <td><input type="file" name="image" id="image" style="width:50%;height:35px;" /></td>
       <td>
      <img src="upload/<?php echo $row['image']; ?>" width="100" height="120"/>
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