<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="css/item.css" />
<link rel="stylesheet" type="text/css" href="css/menu.css">
<title>Update Category</title>
</head>
<?php

$msg = "";

include ("connection.php");


$id = $_GET['id'];
$select = "SELECT * FROM category WHERE id = '$id'";
$result = mysqli_query($con, $select);
$row = mysqli_fetch_array($result);

if(isset($_POST['button']))
{
$category = $_POST['category'];
$image = $_FILES['image']['name'];
$tmp_image = $_FILES['image']['tmp_name'];
$source = "upload/".$image;


$update = "UPDATE category SET category_name='$category',image='$image' WHERE id=$id";
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
<form name="form1" enctype="multipart/form-data" method="post" action="" onSubmit="return valid();">
  <center><table>
  
    <tr>
    <td colspan="2"><h1>Update Category</h1></td>
    </tr>
    
      <tr>
      <th>Category Name</th>
      <td><input type="text" name="category" value="<?php echo $row['category_name'];  ?>"/></td>
      </tr>
      
      <tr>
      <th>Image</th>
      <td><input type="file" name="image" id="image" style="width:50%;height:35px;"/></td>
      <td><img src="upload/<?php echo $row['image']; ?>" width="100" height="120"/></td>
      </tr>
      
      <tr>
      <th>&nbsp;</th>
      <td><input type="submit" name="button" value="Submit"/></td>
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