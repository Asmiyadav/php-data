
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Main</title>
</head>

<style>
.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
}

.gallery img {
    width: 150px;
    height: 200px;
	padding:25px;
}


.gallery:hover {
    border: 1px solid #777;
}


.name {
    text-align: center;
	font-weight:bold;
}

.name a {
	text-decoration:none;
	}




.container::after{
	content:"";
	display:block;
	clear:both;
}


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
if(!isset($_SESSION['user']))
{
	header('location:index.php');
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
<?php
include ("connection.php");

$query = "select * from category";
$run = mysqli_query($con,$query);

while($result = mysqli_fetch_array($run))
{
echo "<div class='gallery'>
   <img src='admin/upload/$result[image]'>
    <div class='name'><a href='sub_category.php?id=$result[1]'>$result[category_name]</a></div>
</div>";


}
?>
</div>

<div id="footer">
<?php 
include ("footer.php"); 
?>
</div>

</body>
</html>