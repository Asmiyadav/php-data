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
}

#leftmenu ul li a{
	color: black;
	font-size: 20px;
	display: block;
	padding: 15px;
	text-decoration: none;
}

#leftmenu ul li a:hover{
	background-color: #b9b1c9;
	color:white;
}





</style>
<body>

<div id="leftmenu">
<ul>
<li><a href="add_category.php">Add Category</a> </li>
<li><a href="view_category.php">View Category</a> </li>
<li><a href="add_sub_category.php">Add Sub Category</a> </li>
<li><a href="view_sub_category.php">View Sub Category</a> </li>
<li><a href="add_item.php">Add Item</a> </li>
<li><a href="view_item.php">View Item</a> </li>
<li><a href="add_user.php">Add Users</a> </li>
<li><a href="view_user.php">View Users</a> </li>

</ul>
</div>

</body>
</html>