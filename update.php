<?php
mysql_connect("localhost", "root", "usbw") or die("Connection Failed");
mysql_select_db("premier_league")or die("Connection Failed");

$team = isset($_REQUEST['team']) ? $_REQUEST['team'] : '';
$game_number = isset($_REQUEST['game_number']) ? $_REQUEST['game_number'] : '';

$game_number = $_POST['game_number'];
$team = $_POST['team'];

if (empty($_REQUEST['team']))
	{
		echo "Do not leave fields blank";
	}
	
	else if (empty($_REQUEST['game_number']))
	{
		echo "Do not leave fields blank";
	}

else{
$query = "UPDATE elo_rating SET game_number = '$game_number' WHERE team_name = '$team'";

if(mysql_query($query)){
echo "Elo Ratings Table Updated";}
else{
echo "fail";}

?>

<?php
}
?>