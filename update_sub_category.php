<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/item.css" />
<link rel="stylesheet" type="text/css" href="css/menu.css">
<title>Update Sub-Category</title>
</head>
<?php

$msg = "";

include ("connection.php");


$id = $_GET['id'];
$select = "SELECT * FROM sub_category WHERE id = '$id'";
$result = mysqli_query($con, $select);
$row = mysqli_fetch_array($result);

if(isset($_POST['button']))
{
$category = $_POST['category'];
$company = $_POST['sub_category'];
$image = $_FILES['image']['name'];
$tmp_image = $_FILES['image']['tmp_name'];
$source = "upload/".$image;

$update = "UPDATE sub_category SET category='$category', company='$company',image='$image' WHERE id=$id";
$run = mysqli_query($con,$update);

if($run)
 {
  $msg = "<font color='#006600'>Data Updated Successfully</font>";
 move_uploaded_file($tmp_image,$source);
 }else
 $msg = "<font color='red'>Data Not Updated !</font>";
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
    <td colspan="2"><h1>Add Item</h1></td>
    </tr>
    
      <tr>
      <th>Category Name</th>
      <td><input type="text" name="category" id="category" placeholder="Category Name.." value="<?php echo $row['category']; ?>"/></td>
      </tr>
      
      <tr>
      <th>Sub-Category Name</th>
      <td><input type="text" name="sub_category" id="sub_category" placeholder="Sub-Category Name.." value="<?php echo $row['company']; ?>"/></td>
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
      <td><input type="submit" name="button" id="submit" value="Submit"/></td>
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