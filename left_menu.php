<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Left Menu</title>
</head>


<style>

body{
	margin:0px;
	padding:0px;
	}
#leftmenu{
	margin: 0px;
	padding: 0px;
	white-space: 20px;
	background-color: #b1c9b8;
	height:100%;
	position:absolute;
	float:left;
	
}
#leftmenu li{
	list-style: none;
	color: black;
	font-size: 20px;
	display: block;
	padding: 15px;
	text-decoration: none;	
}


#leftmenu ul li:hover{
	background-color: #b9b1c9;
	color:white;
}





</style>
<body>

<div id="leftmenu">
<ul>
<li><h3>Category</h3></li>


<?php
include ("connection.php");

$select = "Select * FROM category";
$query = mysqli_query($con, $select);

while($row = mysqli_fetch_array($query))
{
	echo "<li>
	
	<td><a href='sub_category.php?id=$row[category_name]'>$row[category_name]</a></td>";		
	
	echo "</li>";
	
}
?>

</ul>
</div>

</body>
</html>