<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/sub_cate.css" />
<link rel="stylesheet" type="text/css" href="css/menu.css">
<title>Add Category</title>
</head>
<script>
function valid()
{
	if(document.form1.category.value=="")
	{
		alert ("PlEASE ENTER CATEGORY NAME");
		document.form1.category.focus();
		return false;
		}else 
		if(document.form1.image.value=="")
	{
		alert ("PlEASE UPLOAD IMAGE");
		document.form1.image.focus();
		return false;
		}else

		return true;	
	}
	
	</script>
	
<?php
include('session.php');
$msg = "";
include ("connection.php");

if(isset($_POST['button']))
{
$category = $_POST['category'];
$image = $_FILES['image']['name'];
$tmp_image = $_FILES['image']['tmp_name'];
$source = "upload/".$image;

$cheq = "SELECT * FROM category WHERE category_name = '$category'";
$que = mysqli_query($con,$cheq);

if(mysqli_num_rows($que)>0)
		  {
			  $msg = "<font color='red'>Data Already In Database !";
			  }else
			  {
				  $insert = "INSERT INTO category VALUES ('','$category','$image')";
				  $run = mysqli_query($con, $insert);
				  
				  if($run)
				  {
					  $msg = "<font color='#006600'>Data Inserted Successfully";
					  move_uploaded_file($tmp_image,$source);
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
<form name="form1" enctype="multipart/form-data" method="post" action="" onSubmit="return valid();">
  <center><table>
  
    <tr>
    <td colspan="2"><h1>Add Category</h1></td>
    </tr>
    
      <tr>
      <th>Category Name</th>
      <td><input type="text" name="category" placeholder="Category Name.."/></td>
      </tr>
      
      <tr>
      <th>Image</th>
      <td><input type="file" name="image" id="image" style="width:50%;height:35px;"/></td>
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