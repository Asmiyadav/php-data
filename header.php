<!DOCTYPE html>
<html>
<head>
<title>Header</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

body { 
  margin:0;
  padding:0px;
  }

#header {	
  overflow:hidden;
  background-color:#164443;
  height:80px;
}

#header a {
  float:left;
  color:white;
  text-align:center;
  padding:12px;
  text-decoration:none;
  font-size:35px; 
  line-height:35px;
  border-radius:15px;
  margin-top:13px;
}

#header a:hover {
  background-color:#c4d6a9;
  color:black;
}

#header-right {
  float:right;
  }

#header-right a{
	font-size:25px;
}

</style>
</head>
<body>

<div id="header">
<a href="main.php">Admin Pannal</a>    

<div id="header-right">
    <a href="logout.php">Log Out</a>
</div>    

</div>



</body>
</html>
