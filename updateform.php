<?php
//links to other pages and displays title and headings
$page_title='Administration Area';
$page_heading='Update PGPs Elo Rating';
$admin_link='<a style="color: #FF0000" href="admin.php">Back to Admin Area</a>';
$login_link='';
$logout_link='<a style="color: #FF0000" href="logout.php">Logout</a>';
$home_link='<a style="color: #FF0000" href="index.php">Home</a>';
include ('/include/header.html'); // Include the HTML footer.
?>

<?php
//start session
   	session_start();

//connect to the database using the db_connect link
require_once("db_connect.php"); 
?>

<?php
//connect to the premier_league table
$db_link = db_connect("premier_league");
$self = $_SERVER['PHP_SELF'];
?>

<?php
$query = mysql_query("SELECT * FROM elo_rating");
?>

<?php

 if (!isset($_SESSION['logged_in']))
	{
    	header("Location: login.php");
  	}

?>

<html>
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
	width:400px;
	height:200px;
}

legend {
	 background-color:FFF;
}

</style>
<form method="post" name="update" action="elo_calculations1.php"/><center>
<fieldset>
<legend align="left">Game Elo Update</legend>
<table border="0" align="left">
<tr>

<tr>
<th>Game Number:</th>
<td><input type="text" name="game_number" /></td>
</tr>

<tr>
<th>Lastweeks K:</th>
<td><input type="text" name="lastweeks_K" /></td>
</tr>

<tr>
<th>Goal Diffrence:</th>
<td><input type="text" name="goal_diff" /></td>
</tr>

<tr>
<th>Team A Results:</th>
<td><input type="text" name="win_lose_draw1" /></td>
</tr>

<tr>
<th>Team B Results:</th>
<td><input type="text" name="win_lose_draw2" /></td>
</tr>

<tr>
<td colspan="2" align="center"><input type="submit" name="Submit" value="update" style="background-color:#09F"/></td>
</tr>

</tr>
</table>
</fieldset>
</form>
</center>


<br>
</html>

<html>
<center><h3>PGP's Elo-Ranking Table</h3></center>
</html>

<?php
echo "<table border='1' align='center' bgcolor='#FFFFFF'>";
echo "<tr bgcolor='#BEFCFA'>\n";
echo "<th>".'Game No'."</th><th>".'Team'."</th><th>".'Team Name'."</th><th>".'Icon'."</th><th>".'Elo Rating'."</th><th>".'K-Value'."</th><th>".'Goal Difference'."</th><th>".'Win, Lose, Draw'."</th>";

while ($row = mysql_fetch_assoc($query))
	{
	   $game_number = $row['game_number'];
	   $team =$row['team'];
	   $team_name =$row['team_name'];
	   $image = $row['filename'];
	   $ranking =$row['ranking'];
	   $lastweeks_K =$row['lastweeks_K'];
	   $goal_diff =$row['goal_diff'];
	   $win_lose_draw =$row['win_lose_draw'];
	
	   	echo "<tr>";
		echo "<td>$game_number</td>";
		echo "<td>$team</td>";
		echo "<td>$team_name</td>";
		echo "<td><img src = 'images/icons/$image'></td>";
		echo "<td>$ranking</td>";
		echo "<td>$lastweeks_K</td>";
		echo "<td>$goal_diff</td>";
		echo "<td>$win_lose_draw</td>";

		echo "</tr>";
	}
echo "</tr>";
echo "</table>";
?>