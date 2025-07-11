<?php

include("connection.php");

$id = $_GET["id"];

$delete = "DELETE FROM item WHERE id = '$id'";

$run = mysqli_query($con, $delete);

if($run)
{
	header("location:view_item.php");
}else
echo "<script> alert ('Not Deleted')</script>";

?>