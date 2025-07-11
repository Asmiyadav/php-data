<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Category</title>
</head>
<style>
td{
	text-align:center;
	}
	
#left{
	float:left;
	width:25%;
	height:85%;
	
	}
	
#right{
	float:right;
	width:78%;
	height:100%;
	}	

</style>


<body>
<?php
include('session.php');
include ("header.php");
?>

<div id="left">
<?php
include ("left_menu.php");
?>
</div>

<div id="right">
<table width = "100%">
<tr>
<th>Category Name</th><th>Image</th><th colspan="2">Opration</th></tr>

<?php
include ("connection.php");

$select = "Select * FROM category";
$query = mysqli_query($con, $select);

while($row = mysqli_fetch_array($query))
{
	echo "<tr>
	<td>$row[category_name]</td>
	<td><img src='upload/$row[image]' width='100' height='100'/></td>
	<td><button><a href = 'delete_category.php?id=$row[0]'>Delete</button></td>
	<td><button><a href = 'update_category.php?id=$row[0]'>Update</button></td>
	
	
	</tr>";
}
?>
</table>
</div>

<div id="footer">
<?php 
include ("footer.php"); 
?>
</div>

</body>
</html>