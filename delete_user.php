<?php

include("connection.php");

$id = $_GET["id"];

$delete = "DELETE FROM user WHERE id = '$id'";

$run = mysqli_query($con, $delete);

if($run)
{
	header("location:view_user.php");
}else
echo "<script> alert ('Not Deleted')</script>";

?>