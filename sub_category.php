<!DOCTYPE html><head>
<title>Untitled Document</title>
<link rel="stylesheet" href="css/style.css">
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
$category=$_REQUEST["id"];
$query = "select * from sub_category where category='$category' ";
$run = mysqli_query($con,$query);

while($result = mysqli_fetch_array($run))
{
echo "<div class='gallery'>
   <img src='admin/upload/$result[image]'>
    <div class='name'><a href='item.php?id=$result[company]'>$result[company]</a></div>
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