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
	width:80%;
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
<p align="justify" style="padding-right:15px">Building a website is, in many ways, an exercise of willpower. It’s tempting to get distracted by the bells and whistles of the design process, and forget all about creating compelling content. 

It's that compelling content that's crucial to making inbound marketing work for your business.

So how do you balance your remarkable content creation with your web design needs? It all starts with the "About Us" page.

For a remarkable about page, all you need to do is figure out your company's unique identity, and then share it with the world. Easy, right? Of course not. Your "About Us" page is one of the most important pages on your website, and it needs to be well crafted. This profile also happens to be one of the most commonly overlooked pages, which is why you should make it stand out.</p>
<p align="justify" style="padding-right:15px">The good news? It can be done. In fact, there are some companies out there with remarkable "About Us" pages, the elements of which you can emulate on your own website.

By the end of this post, you'll know what makes some of today's best "About Us" pages so great, and how to make your own "About Us" or "About Me" page that shares your company's greatness.
</p>
</div>

<div id="footer">
<?php 
include ("footer.php"); 
?>
</div>

</body>
</html>