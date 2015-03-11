<?php
//links to other pages and displays title and headings
$page_title='Logout Page';
$page_heading='Logout Admin Page';
$admin_link='';
$login_link='<a style="color: #FF0000" href="login.php">Login</a>';
$logout_link='';
$home_link='<a style="color: #FF0000" href="index.php">Home</a>';

include ('/include/header.html');
?>
<?php
// Log the user out using unset $_SESSION and session_destroy()

  session_start();
  unset($_SESSION['valid_user']);
  unset($_SESSION['authenticated']);
  unset($_SESSION['password']);
  unset($_SESSION['username']);
  session_destroy();
?>
<html>
<head><title></title></head>
<body>

<!-- Display the logout message to Admin User -->
<h3>If you were logged in,  you have now been logged out</h3>

</body>
</html>
<?php
//include ('/include/footer.html'); // Include the footer link.
?>