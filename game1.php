<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
//connect to the database using the db_connect link
require_once("db_connect.php");

//connect to the premier_league table
$db_link = db_connect("premier_league");
$self = $_SERVER['PHP_SELF'];
?>

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
	<title>Game 1</title>

	<link href="css/styles.css" rel="stylesheet"/>
	<link href="css/start/jquery-ui-1.9.1.custom.css" rel="stylesheet"/>
	<link href="css/naviStyle.css" rel="stylesheet"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> 
	<script type="text/javascript" src="js/jquery-ui-1.9.1.custom.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.9.1.custom.min.js"></script>
	<script type="text/javascript" src="js/jquery.imagecube.js"></script>	
	<script type="text/javascript" src="js/button_script.js"></script>
	<script type="text/javascript" src="js/tablestripe_script.js"></script>

	<!------------------ Javascript for thr image cube --------------->	
	<script type="text/javascript">
	$(function () {
	$('#basicCube').imagecube();
	});
	</script>

 </head>

 <body>
   <div class="bluebg" >

     <div id="basicCube">
		<img src="images/icons/evertonIcon.png" alt="evertonIcon" title="evertonIcon"/>
		<img src="images/icons/manutdIcon.png" alt="manutdIcon"title="manutdIcon"/>
		<img src="images/icons/mancityIcon.png" alt="mancityIcon" title="mancityIcon"/>
		<img src="images/icons/fulhamIcon.png" alt="fulhamIcon" title="fulhamIcon"/>
		<img src="images/icons/liverpoolIcon.png" alt="liverpoolIcon" title="liverpoolIcon"/>
		<img src="images/icons/readingIcon.png" alt="readingIcon" title="readingIcon"/>
		<img src="images/icons/swanseaIcon.png" alt="swanseaIcon" title="swanseaIcon"/>
		<img src="images/icons/westhamIcon.png" alt="westhamIcon" title="westhamIcon"/>
		<img src="images/icons/chelseaIcon.png" alt="chelseaIcon" title="chelseaIcon"/>
		<img src="images/icons/astonvillaIcon.png" alt="astonvillaIcon"title="astonvillaIcon"/>
		<img src="images/icons/newcastleIcon.png" alt="newcastleIcon" title="newcastleIcon"/>
		<img src="images/icons/norwichIcon.png" alt="norwichIcon" title="norwichIcon"/>
		<img src="images/icons/stokeIcon.png" alt="stokeIcon" title="stokeIcon"/>
		<img src="images/icons/spursIcon.png" alt="spursIcon" title="spursIcon"/>
		<img src="images/icons/sunderlandIcon.png" alt="sunderlandIcon" title="sunderlandIcon"/>
		<img src="images/icons/westbromIcon.png" alt="westbromIcon" title="westbromIcon"/>
		<img src="images/icons/qprIcon.png" alt="qprIcon" title="qprIcon"/>
		<img src="images/icons/arsenalIcon.png" alt="arsenalIcon" title="arsenalIcon"/>
		<img src="images/icons/wiganIcon.png" alt="wiganIcon" title="wiganIcon"/>
		<img src="images/icons/southamptonIcon.png" alt="southamptonIcon" title="southamptonIcon"/>
	 </div>

      <div id="rightHeader" align="center">
    	<img src="images/ball.gif" alt="ball." /><br/>
    	<a href="login.php"><i>Administrator Login</i></a>
     </div>

     <div id="titleHeader">
        <center><h1>Premier Game Predictor</h1></center>
     </div>

   </div><!-- End bluebg -->

   <!--------------------------------------------- Navi Bar Buttonset --------------------------------------->
	<div id="navbar">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="news.php">News</a></li>
			<li><a href="gallery.php">Gallery</a></li>
			<li><a href="contact.php">Contact</a></li>
		</ul>
	</div>
	<!--------------------------------------------------------------------------------------------------------->
	 
   <div class="bluebg" style="margin-top:20px">

    <!---------------------------------------------- Navi Bar Game set ----------------------------------------->
		<div id="radio" align="center" style="margin-top:-34px">
		  <input type="radio" id="radio1" name="radio" checked="checked" /><label for="radio1"><a href="game1.php">		  
		  <?php
		  $queryLabel1h = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='1h'");
    	  $resultLabel1h = mysql_fetch_assoc($queryLabel1h);
    	  $teamA_label1h = $resultLabel1h['team_name_small'];
    	  
    	  $queryLabel1a = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='1a'");
    	  $resultLabel1a = mysql_fetch_assoc($queryLabel1a);
    	  $teamB_label1a = $resultLabel1a['team_name_small'];
    	  echo $teamA_label1h." v ".$teamB_label1a;  
    	  ?> </a></label>
    	  
		  <input type="radio" id="radio2" name="radio" /><label for="radio2"><a href="game2.php">
		  <?php
		  $queryLabel2h = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='2h'");
    	  $resultLabel2h = mysql_fetch_assoc($queryLabel2h);
    	  $teamA_label2h = $resultLabel2h['team_name_small'];
    	  
    	  $queryLabel2a = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='2a'");
    	  $resultLabel2a = mysql_fetch_assoc($queryLabel2a);
    	  $teamB_label2a = $resultLabel2a['team_name_small'];
    	  echo $teamA_label2h." v ".$teamB_label2a;  
    	  ?></a></label>
    	  
		  <input type="radio" id="radio3" name="radio" /><label for="radio3"><a href="game3.php">
		  <?php
		  $queryLabel3h = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='3h'");
    	  $resultLabel3h = mysql_fetch_assoc($queryLabel3h);
    	  $teamA_label3h = $resultLabel3h['team_name_small'];
    	  
    	  $queryLabel3a = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='3a'");
    	  $resultLabel3a = mysql_fetch_assoc($queryLabel3a);
    	  $teamB_label3a = $resultLabel3a['team_name_small'];
    	  echo $teamA_label3h." v ".$teamB_label3a;  
    	  ?></a></label>
		  
		  <input type="radio" id="radio4" name="radio" /><label for="radio4"><a href="game4.php">		  
		  <?php
		  $queryLabel4h = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='4h'");
    	  $resultLabel4h = mysql_fetch_assoc($queryLabel4h);
    	  $teamA_label4h = $resultLabel4h['team_name_small'];
    	  
    	  $queryLabel4a = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='4a'");
    	  $resultLabel4a = mysql_fetch_assoc($queryLabel4a);
    	  $teamB_label4a = $resultLabel4a['team_name_small'];
    	  echo $teamA_label4h." v ".$teamB_label4a;  
    	  ?></a></label>
		  
		  <input type="radio" id="radio5" name="radio" /><label for="radio5"><a href="game5.php">		  
		  <?php
		  $queryLabel5h = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='5h'");
    	  $resultLabel5h = mysql_fetch_assoc($queryLabel5h);
    	  $teamA_label5h = $resultLabel5h['team_name_small'];
    	  
    	  $queryLabel5a = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='5a'");
    	  $resultLabel5a = mysql_fetch_assoc($queryLabel5a);
    	  $teamB_label5a = $resultLabel5a['team_name_small'];
    	  echo $teamA_label5h." v ".$teamB_label5a;  
    	  ?></a></label>
		  
		  <input type="radio" id="radio6" name="radio" /><label for="radio6"><a href="game6.php">		  
		  <?php
		  $queryLabel6h = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='6h'");
    	  $resultLabel6h = mysql_fetch_assoc($queryLabel6h);
    	  $teamA_label6h = $resultLabel6h['team_name_small'];
    	  
    	  $queryLabel6a = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='6a'");
    	  $resultLabel6a = mysql_fetch_assoc($queryLabel6a);
    	  $teamB_label6a = $resultLabel6a['team_name_small'];
    	  echo $teamA_label6h." v ".$teamB_label6a;  
    	  ?></a></label>
		  
		  <input type="radio" id="radio7" name="radio" /><label for="radio7"><a href="game7.php">		  
		  <?php
		  $queryLabel7h = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='7h'");
    	  $resultLabel7h = mysql_fetch_assoc($queryLabel7h);
    	  $teamA_label7h = $resultLabel7h['team_name_small'];
    	  
    	  $queryLabel7a = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='7a'");
    	  $resultLabel7a = mysql_fetch_assoc($queryLabel7a);
    	  $teamB_label7a = $resultLabel7a['team_name_small'];
    	  echo $teamA_label7h." v ".$teamB_label7a;  
    	  ?></a></label>
		  
		  <input type="radio" id="radio8" name="radio" /><label for="radio8"><a href="game8.php">		  
		  <?php
		  $queryLabel8h = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='8h'");
    	  $resultLabel8h = mysql_fetch_assoc($queryLabel8h);
    	  $teamA_label8h = $resultLabel8h['team_name_small'];
    	  
    	  $queryLabel8a = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='8a'");
    	  $resultLabel8a = mysql_fetch_assoc($queryLabel8a);
    	  $teamB_label8a = $resultLabel8a['team_name_small'];
    	  echo $teamA_label8h." v ".$teamB_label8a;  
    	  ?></a></label>
		  
		  <input type="radio" id="radio9" name="radio" /><label for="radio9"><a href="game9.php">		  
		  <?php
		  $queryLabel9h = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='9h'");
    	  $resultLabel9h = mysql_fetch_assoc($queryLabel9h);
    	  $teamA_label9h = $resultLabel9h['team_name_small'];
    	  
    	  $queryLabel9a = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='9a'");
    	  $resultLabel9a = mysql_fetch_assoc($queryLabel9a);
    	  $teamB_label9a = $resultLabel9a['team_name_small'];
    	  echo $teamA_label9h." v ".$teamB_label9a;  
    	  ?></a></label>
		  
		  <input type="radio" id="radio10" name="radio" /><label for="radio10"><a href="game10.php">		  
		  <?php
		  $queryLabel10h = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='10h'");
    	  $resultLabel10h = mysql_fetch_assoc($queryLabel10h);
    	  $teamA_label10h = $resultLabel10h['team_name_small'];
    	  
    	  $queryLabel10a = mysql_query("SELECT team_name_small FROM elo_rating WHERE game_number='10a'");
    	  $resultLabel10a = mysql_fetch_assoc($queryLabel10a);
    	  $teamB_label10a = $resultLabel10a['team_name_small'];
    	  echo $teamA_label10h." v ".$teamB_label10a;  
    	  ?></a></label>
		</div>
	<!--------------------------------------------------------------------------------------------------------->
	
	

  <div id="leftpanel">

  <div align="center">
	  <div align="left" id="feed">
	  <h2>Latest News...</h2>
	  <div id="feedmargin">
	  <hr/>
	    <script type="text/javascript" src="http://app.feed.informer.com/digest3/R9INZ6OU2Q.js"></script>
		<noscript><a href="http://app.feed.informer.com/digest3/R9INZ6OU2Q.html">Click for &quot;EPL News&quot;.</a>
		</noscript>	  </div>
	  </div>
  	  </div>

  </div><!-- end of leftpanel -->

 <div align="center">
  <div align="left" id="maincontent">

    <div>
        <h3>Gameweek 36</h3>
     </div>
     <div id = "fixtureList">
 		<table class = "gameweek" align="center" cellspacing="2" style="padding:30px 4px" >
 			<tr> 				
 				<td>
 				<?php
				$query40 = mysql_query("SELECT filename FROM elo_rating WHERE game_number='1h'");
    			$result40 = mysql_fetch_assoc($query40);
    			$image = $result40['filename'];    	
				echo "<img src = 'images/icons/$image'>";    			
				?>
 				</td>
				<td>
				<font class="important_text" style=" font-size: x-large; color: #0000A0; face= Verdana, Geneva, Tahoma, sans-serif;">
				<?php
				$query30 = mysql_query("SELECT team_name FROM elo_rating WHERE game_number='1h'");
    			$result30 = mysql_fetch_assoc($query30);
    			$teamA_name = $result30['team_name'];

    			$query31 = mysql_query("SELECT team_name FROM elo_rating WHERE game_number='1a'");
    			$result31 = mysql_fetch_assoc($query31);
    			$teamB_name = $result31['team_name'];
    			echo $teamA_name."<br/> v <br/>".$teamB_name;			//display game
				?>
				</font>
				</td>
				<td>
 				<?php
				$query40 = mysql_query("SELECT filename FROM elo_rating WHERE game_number='1a'");
    			$result40 = mysql_fetch_assoc($query40);
    			$image = $result40['filename'];    	
				echo "<img src = 'images/icons/$image'>";    			
				?>
 				</td>	
 			</tr>
 		</table>
 		 		
 		<table class = "gameweek" align="center" cellspacing="2" style="padding:30px 4px;" >
 			<tr>
				<td><?php fulVars(); ?></td>				
 			</tr> 			
 		</table>

<table class = "gameweek" align="center"  cellspacing="2" style="padding:30px 4px" >
<tr>
<td>


<?php
	$query1 = mysql_query("SELECT * FROM elo_rating WHERE game_number='1h'");
 	$result1 = mysql_fetch_assoc($query1);
    $rating1 = $result1['ranking']+80;											//adding 80 for the home advantage

	$query2 = mysql_query("SELECT * FROM elo_rating WHERE game_number='1a'");
 	$result2 = mysql_fetch_assoc($query2);
    $rating2 = $result2['ranking'];

    $query3 = mysql_query("SELECT team_name FROM elo_rating WHERE game_number='1h'");
    $result3 = mysql_fetch_assoc($query3);
    $teamA_name = $result3['team_name'];

    $query4 = mysql_query("SELECT team_name FROM elo_rating WHERE game_number='1a'");
    $result4 = mysql_fetch_assoc($query4);
    $teamB_name = $result4['team_name'];

    $query5 = mysql_query("SELECT lastweeks_K FROM elo_rating WHERE game_number='1h'");				//This selects one teams k factor 
    $result5 = mysql_fetch_assoc($query5);
    $k_factor = $result5['lastweeks_K'];

    $query6 = mysql_query("SELECT goal_diff FROM elo_rating WHERE game_number='1h'");				//This selects the goal diff from one team. Which is all that is needed
    $result6 = mysql_fetch_assoc($query6);
    $gd = $result6['goal_diff'];

	$query7 = mysql_query("SELECT win_lose_draw FROM elo_rating WHERE game_number='1h'");			//This selects Home teams win result
    $result7 = mysql_fetch_assoc($query7);
    $result_A = $result7['win_lose_draw'];

	$query8 = mysql_query("SELECT win_lose_draw FROM elo_rating WHERE game_number='1a'");			//This selects Away teams win result
    $result8 = mysql_fetch_assoc($query8);
    $result_B = $result8['win_lose_draw'];

    $teamA_win_expctncy = 0;
    $teamB_win_expctncy = 0;
    $teamA_win_expctncy_percent = 0;
    $teamB_win_expctncy_percent = 0;

	/************************************************* Elo Display  ************************************************/
	
    echo "<p>";    
  	get_win_expectancy();
  	echo "<font class='important_text' style=' font-size: x-large; color: #0000A0' face='Verdana, Geneva, Tahoma, sans-serif;'>";
   	echo "Forecast based on the World Football Elo Rating System<br/><br/>";
   	echo "</font>";  	
  	echo '<div id="eloOutput">'.$teamA_name." to win "."</div>";   	  	
  	echo '<div id="statOutput" align="center"><h1>'.$teamA_win_expctncy_percent."%"."</h1></div><br/>";  	
  	echo '<div id="eloOutput">'. $teamB_name." to win "."</div>"; 
  	echo '<div id="statOutput" align="center"><h1>'.$teamB_win_expctncy_percent."%"."</h1></div><br/>";  	 	
 	echo "</p>"; //end of win expectancy paragraph
 	
 	/********************************************* Win Expectancy Decider Function *********************************/
	function get_win_expectancy(){
	global $rating1, $rating2, $teamA_win_expctncy, $teamB_win_expctncy, $teamA_win_expctncy_percent, $teamB_win_expctncy_percent;
    $win_expctncy = (1/(pow(10,(-get_diff_rate()/400))+1));
    $win_expctncy_percent = number_format(($win_expctncy*100),0);		//This will be the higher win expectancy if Team A (Home) is greater than Team B (Away).

	if($rating1>$rating2){
     $teamA_win_expctncy = $win_expctncy;
     $teamB_win_expctncy = (1-$win_expctncy);
     $teamA_win_expctncy_percent = $win_expctncy_percent;
     $teamB_win_expctncy_percent = (100-$win_expctncy_percent);
     }
     else{
     $teamA_win_expctncy = (1-$win_expctncy);
     $teamB_win_expctncy = $win_expctncy;
     $teamA_win_expctncy_percent = (100-$win_expctncy_percent);
     $teamB_win_expctncy_percent = $win_expctncy_percent;
     }
 	}

    /********************************************** Get Goal Difference Rate Function ************************************************/
    function get_goal_diff(){
    global $gd;
    //This method returns a number from the index of goal difference to the new rating equation
    if ($gd <= 1)											//If the game is a draw or is won by one goal then 1 is returned
	   		return 1;

    else if ($gd == 2)										//If the game is won by two goals then 1.5 or 3/2 is returned
    		return 1.5;

    else 	return((11+ $gd)/8);							//If the game is won by three or more goals then (11 + the actual goal difference) divided by 8 is returned
    }   //double
    
    /********************************************** Get Team Difference in Rating Function ********************************************/
    function get_diff_rate(){
    global $rating1, $rating2;
    if ($rating1 > $rating2)									//if rating1 is greater than rating2 then return that difference
			return ($rating1 - $rating2);
	else if ($rating2 > $rating1)								//else if rating2 is greater than rating1 then return that difference
			return($rating2 - $rating1);
	else 	return 0;    									//otherwise they are both equal so return zero
	}
    /**********************************************************************************************************************************/    
?>


</td>
</tr>
</table>
</div>

<div align="center">
<!-------------------------------------------------------------------------------------------------------------------------------------->

	  <div align="left" id="feed"></div>
 </div>
</div><!-- end of maincontent -->
</div><!-- end of center align maincontent -->

  <div id="rightpanel">

  <div id="leagueTable">
  <img src="images/barclaysplLogo.png" alt=""/>
  <table cellspacing="0" cellpadding="3">
    <tr><th>Club</th><th>Pld</th><th>Pts</th></tr>
	<tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/man-utd">Man Utd</a></td><td class="clubDetails">35</td><td class="clubDetails">85</td></tr>
	<tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/man-city">Man City</a></td><td class="clubDetails">34</td><td class="clubDetails">71</td></tr>
    <tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/chelsea">Chelsea</a></td><td class="clubDetails">34</td><td class="clubDetails">65</td></tr>
    <tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/arsenal">Arsenal</a></td><td class="clubDetails">35</td><td class="clubDetails">64</td></tr>
    <tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/tottenham">Tottenham</a></td><td class="clubDetails">34</td><td class="clubDetails">62</td></tr>
    <tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/everton">Everton</a></td><td class="clubDetails">35</td><td class="clubDetails">59</td></tr>
    <tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/liverpool">Liverpool</a></td><td class="clubDetails">35</td><td class="clubDetails">54</td></tr>
    <tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/west-brom">West Brom</a></td><td class="clubDetails">34</td><td class="clubDetails">48</td></tr>
    <tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/swansea">Swansea</a></td><td class="clubDetails">34</td><td class="clubDetails">42</td></tr>
    <tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/west-ham">West Ham</a></td><td class="clubDetails">35</td><td class="clubDetails">42</td></tr>
    <tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/fulham">Fulham</a></td><td class="clubDetails">35</td><td class="clubDetails">40</td></tr>
    <tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/stoke">Stoke</a></td><td class="clubDetails">35</td><td class="clubDetails">40</td></tr>
    <tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/southampton">Southampton</a></td><td class="clubDetails">35</td><td class="clubDetails">39</td></tr>
    <tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/norwich">Norwich</a></td><td class="clubDetails">35</td><td class="clubDetails">38</td></tr>
    <tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/sunderland">Sunderland</a></td><td class="clubDetails">34</td><td class="clubDetails">37</td></tr>
    <tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/newcastle">Newcastle</a></td><td class="clubDetails">35</td><td class="clubDetails">37</td></tr>
    <tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/aston-villa">Aston Villa</a></td><td class="clubDetails">34</td><td class="clubDetails">34</td></tr>
    <tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/wigan">Wigan</a></td><td class="clubDetails">34</td><td class="clubDetails">32</td></tr>
    <tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/qpr">QPR</a></td><td class="clubDetails">35</td><td class="clubDetails">25</td></tr>
    <tr><td><a href="http://www.premierleague.com/content/premierleague/en-gb/clubs/profile.overview.html/reading">Reading</a></td><td class="clubDetails">35</td><td class="clubDetails">25</td></tr>
  </table>
  <p><a href="http://www.premierleague.com/content/premierleague/en-gb/matchday/league-table.html">View full table @ <br/>premierleague.com</a></p>
  </div>
  
  <!----------------------------------------------------- Elo Ratings table ------------------------------------------------------------------->
<div>
		  <table id="windowsList" align="center">
			<thead>
			<tr>
		      <th colspan ="3">Elo Rating System</th>
		    </tr>
			<tr>
			  <th></th>
		      <th>Team</th>
		      <th>Rating</th>
		  </tr>
		  </thead>
		  <tbody>
		  <tr>
		  	  <td><img src="images/small_icons/arsenalsmall.png" alt=""/></td>
		      <td  style="text-align:left; padding-left:2%">Arsenal</td>
		      <td>
		      	<?php
		      		$query11 = mysql_query("SELECT * FROM elo_rating WHERE team='1'");
 					$result11 = mysql_fetch_assoc($query11);
    				$rating11 = $result11['ranking'];
    				echo $rating11;
    			?>
    		 </td>
		  </tr>
		  <tr>
		  	  <td><img src="images/small_icons/astonvillasmall.png" alt=""/></td>
		      <td style="text-align:left; padding-left:2%">A Villa</td>
		      <td>
		      	<?php
		      		$query12 = mysql_query("SELECT * FROM elo_rating WHERE team='2'");
 					$result12 = mysql_fetch_assoc($query12);
    				$rating12 = $result12['ranking'];
    				echo $rating12;
    			?>
    		 </td>
		  </tr>
		  <tr>
		      <td><img src="images/small_icons/chelseasmall.png" alt=""/></td>
		      <td style="text-align:left; padding-left:2%">Chelsea</td>
		      <td>
		      	<?php
		      		$query13 = mysql_query("SELECT * FROM elo_rating WHERE team='3'");
 					$result13 = mysql_fetch_assoc($query13);
    				$rating13 = $result13['ranking'];
    				echo $rating13;
    			?>
    		 </td>

		  </tr>
		  <tr>
		      <td><img src="images/small_icons/evertonsmall.png" alt=""/></td>
		      <td style="text-align:left; padding-left:2%"> Everton </td>
		      <td>
		      	<?php
		      		$query14 = mysql_query("SELECT * FROM elo_rating WHERE team='4'");
 					$result14 = mysql_fetch_assoc($query14);
    				$rating14 = $result14['ranking'];
    				echo $rating14;
    			?>
    		 </td>
		  </tr>
		  <tr>
		      <td><img src="images/small_icons/fulhamsmall.png" alt=""/></td>
		      <td style="text-align:left; padding-left:2%"> Fulham </td>
		      <td>
		      	<?php
		      		$query15 = mysql_query("SELECT * FROM elo_rating WHERE team='5'");
 					$result15 = mysql_fetch_assoc($query15);
    				$rating15 = $result15['ranking'];
    				echo $rating15;
    			?>
    		 </td>
		  </tr>
		  <tr>
		      <td><img src="images/small_icons/liverpoolsmall.png" alt=""/></td>
		      <td style="text-align:left; padding-left:2%"> Liverpool </td>
		      <td>
		      	<?php
		      		$query16 = mysql_query("SELECT * FROM elo_rating WHERE team='6'");
 					$result16 = mysql_fetch_assoc($query16);
    				$rating16 = $result16['ranking'];
    				echo $rating16;
    			?>
    		 </td>
		  </tr>
		  <tr>
		      <td><img src="images/small_icons/manutdsmall.png" alt=""/></td>
		      <td style="text-align:left; padding-left:2%"> Man Utd </td>
		      <td>
		      	<?php
		      		$query17 = mysql_query("SELECT * FROM elo_rating WHERE team='7'");
 					$result17 = mysql_fetch_assoc($query17);
    				$rating17 = $result17['ranking'];
    				echo $rating17;
    			?>
    		 </td>
		  </tr>
		  <tr>
		      <td><img src="images/small_icons/mancitysmall.png" alt=""/></td>
		      <td style="text-align:left; padding-left:2%"> Man City </td>
		      <td>
		      	<?php
		      		$query18 = mysql_query("SELECT * FROM elo_rating WHERE team='8'");
 					$result18 = mysql_fetch_assoc($query18);
    				$rating18 = $result18['ranking'];
    				echo $rating18;
    			?>
    		 </td>
		  </tr>
		  <tr>
		      <td><img src="images/small_icons/newcastlesmall.png" alt=""/></td>
		      <td style="text-align:left; padding-left:2%"> Newcastle</td>
		      <td>
		      	<?php
		      		$query19 = mysql_query("SELECT * FROM elo_rating WHERE team='9'");
 					$result19 = mysql_fetch_assoc($query19);
    				$rating19 = $result19['ranking'];
    				echo $rating19;
    			?>
    		 </td>
		  </tr>
		  <tr>
		      <td><img src="images/small_icons/norwichsmall.png" alt=""/></td>
		      <td style="text-align:left; padding-left:2%"> Norwich </td>
		      <td>
		      	<?php
		      		$query20 = mysql_query("SELECT * FROM elo_rating WHERE team='10'");
 					$result20 = mysql_fetch_assoc($query20);
    				$rating20 = $result20['ranking'];
    				echo $rating20;
    			?>
    		 </td>
		  </tr>
		  <tr>
		      <td><img src="images/small_icons/qprsmall.png" alt=""/></td>
		      <td style="text-align:left; padding-left:2%"> QPR </td>
		      <td>
		      	<?php
		      		$query21 = mysql_query("SELECT * FROM elo_rating WHERE team='11'");
 					$result21 = mysql_fetch_assoc($query21);
    				$rating21 = $result21['ranking'];
    				echo $rating21;
    			?>
    		 </td>
		  </tr>
		  <tr>
		      <td><img src="images/small_icons/readingsmall.png" alt=""/></td>
		      <td style="text-align:left; padding-left:2%"> Reading </td>
		      <td>
		      	<?php
		      		$query22 = mysql_query("SELECT * FROM elo_rating WHERE team='12'");
 					$result22 = mysql_fetch_assoc($query22);
    				$rating22 = $result22['ranking'];
    				echo $rating22;
    			?>
    		 </td>
		  </tr>
		  <tr>
		      <td><img src="images/small_icons/southamptonsmall.png" alt=""/></td>
		      <td style="text-align:left; padding-left:2%"> S'hmpton </td>
		      <td>
		      	<?php
		      		$query23 = mysql_query("SELECT * FROM elo_rating WHERE team='13'");
 					$result23 = mysql_fetch_assoc($query23);
    				$rating23 = $result23['ranking'];
    				echo $rating23;
    			?>
    		 </td>
		  </tr>
		   <tr>
		      <td><img src="images/small_icons/stokesmall.png" alt=""/></td>
		      <td style="text-align:left; padding-left:2%"> Stoke </td>
		      <td>
		      	<?php
		      		$query24 = mysql_query("SELECT * FROM elo_rating WHERE team='14'");
 					$result24 = mysql_fetch_assoc($query24);
    				$rating24 = $result24['ranking'];
    				echo $rating24;
    			?>
    		 </td>
		  </tr>
		  <tr>
		      <td><img src="images/small_icons/sunderlandsmall.png" alt=""/></td>
		      <td style="text-align:left; padding-left:2%"> Sundrland </td>
		      <td>
		      	<?php
		      		$query25 = mysql_query("SELECT * FROM elo_rating WHERE team='15'");
 					$result25 = mysql_fetch_assoc($query25);
    				$rating25 = $result25['ranking'];
    				echo $rating25;
    			?>
    		 </td>
		  </tr>
		  <tr>
		      <td><img src="images/small_icons/swanseasmall.png" alt=""/></td>
		      <td style="text-align:left; padding-left:2%"> Swansea </td>
		      <td>
		      	<?php
		      		$query26 = mysql_query("SELECT * FROM elo_rating WHERE team='16'");
 					$result26 = mysql_fetch_assoc($query26);
    				$rating26 = $result26['ranking'];
    				echo $rating26;
    			?>
    		 </td>
		  </tr>
		  <tr>
		      <td><img src="images/small_icons/spurssmall.png" alt=""/></td>
		      <td style="text-align:left; padding: 0% 2%"> Tottnhm </td>
		      <td>
		      	<?php
		      		$query27 = mysql_query("SELECT * FROM elo_rating WHERE team='17'");
 					$result27 = mysql_fetch_assoc($query27);
    				$rating27 = $result27['ranking'];
    				echo $rating27;
    			?>
    		 </td>
		  </tr>
		  <tr>
		      <td><img src="images/small_icons/westbromsmall.png" alt=""/></td>
		      <td style="text-align:left; padding-left:2%"> W Brom </td>
		      <td>
		      	<?php
		      		$query28 = mysql_query("SELECT * FROM elo_rating WHERE team='18'");
 					$result28 = mysql_fetch_assoc($query28);
    				$rating28 = $result28['ranking'];
    				echo $rating28;
    			?>
    		 </td>
		  </tr>
		  <tr>
		      <td><img src="images/small_icons/westhamsmall.png" alt=""/></td>
		      <td style="text-align:left; padding-left:2%"> West Ham </td>
		      <td>
		      	<?php
		      		$query29 = mysql_query("SELECT * FROM elo_rating WHERE team='19'");
 					$result29 = mysql_fetch_assoc($query29);
    				$rating29 = $result29['ranking'];
    				echo $rating29;
    			?>
    		 </td>
		  </tr>
		  <tr>
		      <td><img src="images/small_icons/stokesmall.png" alt=""/></td>
		      <td style="text-align:left; padding-left:2%" > Stoke </td>
		      <td>
		      	<?php
		      		$query30 = mysql_query("SELECT * FROM elo_rating WHERE team='20'");
 					$result30 = mysql_fetch_assoc($query30);
    				$rating30 = $result30['ranking'];
    				echo $rating30;
    			?>
    		 </td>
		  </tr>
		  </tbody>
		</table>
	  </div>
<!-------------------------------------------------------------------------------------------------------------------------------------->
  </div><!-- end of rightpanel -->

    <div id="footer">
      &copy;itb 2013 Adrian Jebb, Gerard Byrne & Jim Smith <a href="mailto:B00045428@student.itb.ie">B00045428@student.itb.ie</a>
    </div>

 </div>	<!-- div for bluebg main-->

<?php
/**************************************************** PGP Predictions Function***************************************************************/
//start of the fulVars() function
function fulVars()
{
	$query31 = mysql_query("SELECT HomeWins FROM astonvilla WHERE vsTeam='chelsea'");
    $result31 = mysql_fetch_assoc($query31);
    $homeWinsHtoH = $result31['HomeWins'];
    
	$query32 = mysql_query("SELECT ELORating FROM teamformlast10 WHERE Team = 'chelsea'");
	$result32 = mysql_fetch_assoc($query32);
	$awayELO = $result32['ELORating'];
    
	$query33 = mysql_query("SELECT TotalMatches FROM astonvilla WHERE vsTeam = 'chelsea'");
	$result33 = mysql_fetch_assoc($query33);
	$totalHtoHMatches = $result33['TotalMatches'];
    
	$query34 = mysql_query("SELECT HomeWins FROM astonvilla WHERE vsTeam = 'chelsea'");
 	$result34 = mysql_fetch_assoc($query34);
 	$homeTeamWins  = $result34['HomeWins'];
    
	$query35 = mysql_query("SELECT HomeDefeats FROM astonvilla WHERE vsTeam = 'chelsea'");
	$result35 = mysql_fetch_assoc($query35);
	$awayTeamWins = $result35['HomeDefeats'];
    
	$query36 = mysql_query("SELECT TotalHomeGames FROM teamformlast10 WHERE Team = 'astonvilla'");
 	$result36 = mysql_fetch_assoc($query36);
 	$homeTeamHomeMatches = $result36['TotalHomeGames'];
    
	$query37 = mysql_query("SELECT HomeGamesWon FROM teamformlast10 WHERE Team = 'astonvilla'");
 	$result37 = mysql_fetch_assoc($query37);
 	$homeTeamHomeWins = $result37['HomeGamesWon'];
   
	$query38 = mysql_query("SELECT TotalAwayGames FROM teamformlast10 WHERE Team = 'chelsea'");
 	$result38 = mysql_fetch_assoc($query38);
 	$awayTeamAwayMatches = $result38['TotalAwayGames'];
    
	$query39 = mysql_query("SELECT AwayGamesWon FROM teamformlast10 WHERE Team = 'chelsea'");
 	$result39 = mysql_fetch_assoc($query39);
 	$awayTeamAwayWins = $result39['AwayGamesWon'];
    
	//Head to Head form
	$homeTeamHtoH = $homeTeamWins/$totalHtoHMatches;
	$awayTeamHtoH = $awayTeamWins/$totalHtoHMatches;

	//Current form
	$homeWinRatio = $homeTeamHomeWins/$homeTeamHomeMatches;
	$awayWinRatio = $awayTeamAwayWins/$homeTeamHomeMatches;
	

	global $teamA_win_expctncy, $teamB_win_expctncy, $teamA_name, $teamB_name;	
	echo "<font class='important_text' style=' font-size: x-large; color: #0000A0' face='Verdana, Geneva, Tahoma, sans-serif;'>";
	echo "Premier Games Predictor's Forecast<br/><br/>";	
	echo "</font>"; 

	echo "<div id='eloOutput'>".$teamA_name."'s win ratio playing at home against ".$teamB_name." is: <br/></div>".'<div id="statOutput" align="center">'."<h1>".number_format(($homeTeamHtoH*100),0)."%"."<h1>"."</div>"."<br/>";
	echo "<div id='eloOutput'>".$teamB_name."'s win ratio playing at home against ".$teamA_name." is: <br/></div>".'<div id="statOutput" align="center">'."<h1>".number_format(($awayTeamHtoH*100),0)."%"."<h1>"."</div>"."<br/>";

	echo "<div id='eloOutput'>Premier Game Predictons win expectancy for a ".$teamA_name." win is: <br/></div>".'<div id="statOutput" align="center">'."<h1>".number_format(((($homeTeamHtoH+$homeWinRatio+$teamA_win_expctncy)/3)*100),0)."%"."<h1>"."</div>"."<br/>";
	echo "<div id='eloOutput'>Premier Game Predictons win expectancy for a ".$teamB_name." win is: <br/></div>".'<div id="statOutput" align="center">'."<h1>".number_format(((($awayTeamHtoH+$awayWinRatio+$teamB_win_expctncy)/3)*100),0)."%"."<h1>"."</div>"."<br/>";
}
?>

</body>
</html>
