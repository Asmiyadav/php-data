<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Main</title>
</head>

<style>
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
<h3>Name : Prabhat Singh</h3>
<h3>Mobile : 8802603860</h3>
<h3>Email : prabhat9692@yahoo.com</h3>
</div>

<div id="footer">
<?php 
include ("footer.php"); 
?>
</div>

</body>
</html>