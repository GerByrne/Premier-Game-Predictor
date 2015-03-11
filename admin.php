<?php
//links to other pages and displays title and headings
$page_title='Administration Database';
$page_heading='PGP Admin Area';
$admin_link='';
$login_link='';
$logout_link='<a style="color: #FF0000" href="logout.php">Logout</a>';
$home_link='<a style="color: #FF0000" href="index.php">Home</a>';
include ('/include/header.html'); // Include the HTML footer.
?>



<?php
//start session
   	session_start();
	
	//get the connection to the database from thr db_connect file
require_once("db_connect.php");


 if (!isset($_SESSION['logged_in']))
	{
    	header("Location: login.php");
  	}


?>

<html><head><title></title></head>
<body>

<style type="text/css">
.error { color: #ff0000 }
body {
	background-color:#CCC;
	color:#000;
	font-style:oblique;
	
}

fieldset{
	background-image:url(images/trophy.jpg);

	background-position:center;
	background-repeat:no-repeat;
	background-color:#FFF;
	width:400px;
	height:250px;
}

</style>
<center>
<fieldset>
<p>
<center><h3><a style="text-decoration: none"  href = "updateform.php">Premier Game Predictor Update</a></h3></center>
</p><br><br><br><br><br><br><br>
<p>
<center><h3><a style="text-decoration: none"  href = "updategamenumber.php">Premier Game Number Update</a></h3></center>
</p>
</fieldset></center>
<br><br>

</body>
</html>