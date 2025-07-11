<?php

include ("connection.php");
$id = $_GET['id'];

$status = $_GET['status'];

$update = "UPDATE user SET status = '$status' WHERE id = $id";
mysqli_query($con, $update);
header("location:view_user.php");
 
 ?>