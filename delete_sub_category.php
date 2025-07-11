<?php

include("connection.php");

$id = $_GET["id"];

$delete = "DELETE FROM sub_category WHERE id = '$id'";

$run = mysqli_query($con, $delete);

if($run)
{
	header("location:view_sub_category.php");
}else
echo "<script> alert ('Not Deleted')</script>";

?>