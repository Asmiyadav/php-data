<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/item.css" />
<link rel="stylesheet" type="text/css" href="css/menu.css">
<title>Add Item</title>
</head>
<script>
function valid()
{
	if(document.form1.category.value=="Select Category...")
	{
		alert ("PlEASE ENTER CATEGORY NAME");
		document.form1.category.focus();
		return false;
		}else 
	if(document.form1.sub_category.value=="Select Sub-Category...")
	{
		alert ("PlEASE ENTER SUB-CATEGORY NAME");
		document.form1.sub_category.focus();
		return false;
		}else
	if(document.form1.item.value=="")
	{
		alert ("PlEASE ENTER ITEM NAME");
		document.form1.item.focus();
		return false;
		}else
	if(document.form1.price.value=="")
	{
		alert ("PlEASE ENTER PRICE");
		document.form1.price.focus();
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
$msg="";

include ("connection.php");

if(isset($_POST['button']))
{
$category = $_POST['category'];
$company = $_POST['sub_category'];
$item = $_POST['item'];
$price = $_POST['price'];
$image = $_FILES['pic']['name'];
$image_name = $_FILES['pic']['tmp_name'];
$image_source = "upload/".$image;

$cheq = "SELECT * FROM item WHERE item_name = '$item'";
$que = mysqli_query($con,$cheq);

if(mysqli_num_rows($que)>0)
		  {
			  $msg = "<font color='red'>Data Already In Database !";
			  }else
			  {
				  $insert = "INSERT INTO item VALUES ('','$category','$company','$item','$price','$image')";
				  $run = mysqli_query($con, $insert);
				  
				  if($run)
				  {
					  $msg = "<font color='#006600'>Data Inserted Successfully";
					  move_uploaded_file($image_name,$image);
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
    <td colspan="2"><h1>Add Item</h1></td>
    </tr>
    
      <tr>
      <th>Category Name</th>
      <td><select name="category" style="width:95%;padding:12px;border: 1px solid #ccc;border-radius: 10px;">
      <option>Select Category...</option>
      <?php
      include ("connection.php");
	  $select = "Select * FROM category";
	  $query = mysqli_query($con, $select);
	  while($row = mysqli_fetch_array($query))
	  {
		  echo "<option>$row[category_name]</option> ";
	  }
	?>         
      </select>
      </td>
      </tr>
      
      <tr>
      <th>Sub-Category Name</th>
      <td><select name="sub_category" style="width:95%;padding:12px;border: 1px solid #ccc;border-radius: 10px;">
      <option>Select Sub-Category...</option>
      <?php
      include ("connection.php");
	  $select = "Select * FROM sub_category";
	  $query = mysqli_query($con, $select);
	  while($row = mysqli_fetch_array($query))
	  {
		  echo "<option>$row[company]</option> ";
	  }
	?>         
      </select>
      </td>
      </tr>
      
      <tr>
      <th>Item Name</th>
      <td><input type="text" name="item" id="item" placeholder="Item Name.."/></td>
      </tr>
      
      <tr>
      <th>Price</th>
      <td><input type="text" name="price" id="price" placeholder="Item Price.."/></td>
      </tr>
                  
      
      <tr>
      <th>Image</th>
      <td><input type="file" name="pic" id="pic" style="width:50%;height:35px;" /></td>
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