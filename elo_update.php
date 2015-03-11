<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Untitled Document</title>
</head>

<?php
//connect to the database using the db_connect link
require_once("db_connect.php"); 

//connect to the premier_league table
$db_link = db_connect("premier_league");
$self = $_SERVER['PHP_SELF'];

//if submit button is clicked display the following functions
if (isset($_REQUEST['update']))
{
   display_update_page();
}

$query1 = mysql_query("SELECT * FROM elo_rating");

$query10 = mysql_query("SELECT ranking FROM elo_rating WHERE team=1"); 
$result = mysql_fetch_assoc($query10);
echo $result['ranking'];

echo "<br>";
echo "<table border='1' align='center' bgcolor='#ffffcc' width='40%'>";
echo "<tr bgcolor='#BEFCFA'>\n";
echo "<th>".'Team'."</th><th>".'Teams Name'."</th><th>".'Elo_rating'."</th>";

echo "</tr>";
	
	while ($row = mysql_fetch_assoc($query1))
	{
	   $team =$row['team'];
	   $team_name =$row['team_name'];
	   $ranking =$row['ranking'];
	

	   	echo "<tr>";
	      echo "<td>$team</td>";
	      echo "<td>$team_name</td>";
	      echo "<td>$ranking</td>";
		echo "</tr>";  	 
	}
?>

<?php
 echo "</table>";		//end of table
?>


<?
function display_update_page(){
	
	    $team = isset($_REQUEST['team']) ? $_REQUEST['team'] : '';
        $team_name = isset($_REQUEST['team_name']) ? $_REQUEST['team_name'] : '';
        $ranking = isset($_REQUEST['ranking']) ? $_REQUEST['ranking'] : '';
	 
	 
	 $arsenal_rank = 6000;
	 $aston_villa_rank = 1000;
	
	if($team_name == "arsenal")
		{
	
		$query1 = mysql_query("SELECT * FROM elo_rating WHERE team=1");
		$new_rank = $arsenal_rank + 50;
		$query = mysql_query("UPDATE elo_rating SET ranking='$new_rank' WHERE team=1");
		}

}
?>
<body>
<table border="0" align="center">

<!--<form action="" method="post">-->
<form action= "" method="post">
<tr>
<th>Team A: </th><td><input type="text" name="team_a" ></td>
</tr>
<tr>
<th>Team B: </th><td><input type="text" name="team_b"></td>
</tr>
<tr><th>Goal Difference: </th><td><input type="text" name="goal_difference"></td>
</tr>
<tr><th colspan="2"><center><input type="submit" name="update" value="Submit"></center></th>
</tr>
</form>
</table>

</body>
</html>