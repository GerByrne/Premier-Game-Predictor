<?php
//links to other pages and displays title and headings
$page_title = 'Admin Login Page';
$page_heading = 'PGP Admin Login Page';
$admin_link='';
$login_link='';
$logout_link='';
$home_link='<a style="color: #FF0000" href="index.php">Home</a>';
include ('/include/header.html');
?>


<?php
//start session
session_start();

// for the db_connect function
require_once("db_connect.php");


   if (isset($_REQUEST['username']) && isset($_REQUEST['password']))
   {
      // User has submitted a name and a password

      // First check that these values are only alphanumeric
      // and contain letters and numbers only -- create a regular expression

      $regExpression = '/^[a-zA-Z0-9]+$/';
      $username = preg_match( $regExpression, $_REQUEST['username']) ? $_REQUEST['username'] : "";
      $password = preg_match( $regExpression, $_REQUEST['password']) ? $_REQUEST['password'] : "";

//connect to the project database
$db_link = db_connect("premier_league");


// Query database to see if the name and password are valid
$query = "SELECT * FROM admin_login WHERE username='$username' && password='$password'";
$result = mysql_query($query);
$count = mysql_num_rows($result);


//if you click login button and count is equal to 1 display the following functions
if (isset($_REQUEST['login'])&& $count == 1)
	{
  		  $_SESSION['valid_user'] = $username;
          $_SESSION['authenticated'] = true;
		  $_SESSION['logged_in'] = true;
          mysql_free_result($result);
		  mysql_close();

         display_members_page();

         }
         else
         {
         display_login_page("Invalid login, try again");
         }
   }
  else
   {
      display_login_page("");
   }
?>

<?php
//start of display_login_page($message) function
function display_login_page($message)
{

?>
<html><head><title></title></head>
<style type="text/css">
.error { color: #ff0000 }
body {
	background-color:#CCC;
	color:#000;
	font-style:oblique;
}

fieldset{
	background-image:url(images/trophy.jpg);
	background-position:right;
	background-repeat:no-repeat;
	background-color:#FFF;
}

legend {
	 background-color:FFF;
}

</style>
<body>
<!-- Display the message and two input fields with the login button within a div tag and table-->

   <h2><?php echo $message ?></h2>
   <form method="POST" >	<center>
   <fieldset style="width:400px">
   <legend align="left">Administrator Login</legend>				<!-- change to action = "display.php"-->
   
   <table border="0">
   <tr>
   <td>
      <table border="0" align="left">
      <tr>
      <td colspan="2"><center><h3>Please Login</h3></center></td>
      </tr>
      <tr>      
         <td>Username:</td>
         <td><input type="text" name="username"></td>
      </tr>
      <tr>
         <td>Password:</td>
         <td><input type="password" name="password"></td>
      </tr>
      <tr>
         <td colspan="2" align="center">
         <input type="submit" name="login" value="Log in" style="background-color:#09F"></td>
      </tr>
</table>
</td>
</tr>
</fieldset>
</form>
</table>
<h5>***This Page is for Administration users only***</h5>

<?php
//end of display_login_page($message) function
}
?>


<?php
//start of display_members_page() function
function display_members_page()
{

?>
<!-- Display the messgae that the user are logged into the Admin Page and show links to Admin or logout -->

<h3>You have successfully logged into the Administration Page.<br><br>

You are logged in as Admin user: 
<strong><?php echo "<FONT COLOR='#ff0000'>"."".$_SESSION['valid_user']."</FONT>"?></strong></h3>
<br><br>
<h2>
<p><center>
<a href="admin.php?<?php echo SID?>">PGP Administration Area</a><br><br>
<a href="logout.php?<?php echo SID?>">Logout</a>
</center></p>
</h2>
<?php
//end of display_members_page() function
}
?>
</body>
</html>