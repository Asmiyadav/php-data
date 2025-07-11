<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View User</title>
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
<table width = "100%" border="1">
<tr>
<th>User Name</th><th>E-Mail</th><th>Password</th><th>Gender</th><th>City</th><th>Image</th><th colspan="2">Opration</th></tr>

<?php
include ("connection.php");

$select = "Select * FROM user";
$query = mysqli_query($con, $select);

while($row = mysqli_fetch_array($query))
{
	echo "<tr>
	<td>$row[name]</td>
	<td>$row[email]</td>
	<td>$row[password]</td>
	<td>$row[gender]</td>
	<td>$row[city]</td>
	<td><img src='upload/$row[image]' width='100' height='100'/></td>";
		
	echo "<td>
	<a href = 'delete_user.php?id=$row[0]'><button>Delete</button></a>
	</br>
	</br>
	<a href = 'update_user.php?id=$row[0]'><button>Update</button></a>
	</td>";
	
	echo "<td>";
	if($row ['status']== 1)
	{
	echo "<a href='active.php?id=$row[0] & status=0'><button style='background-color:green; color:white;'>Active</button></a>";
	
	}else
	{
	echo "<a href='active.php?id=$row[0] & status=1'><button style='background-color:red; color:black;'>Deactive</button></a>";	
	}
	echo "</td>";
	
	echo "</tr>";
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



