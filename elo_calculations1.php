<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
//connect to the database using the db_connect link
require_once("db_connect.php"); 
?>

<?php
//connect to the premier_league table
$db_link = db_connect("premier_league");
$self = $_SERVER['PHP_SELF'];
?>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>

<font class="important_text" style=" font-size: xx-large; color: #643EBF" face="Arial, Helvetica, sans-serif">  	  
<?php

$game_number = $_POST['game_number'];
	if($game_number == 1){$home = "1h";	$away = "1a";}
	if($game_number == 2){$home = "2h";	$away = "2a";}
	if($game_number == 3){$home = "3h";	$away = "3a";}
	if($game_number == 4){$home = "4h";	$away = "4a";}
	if($game_number == 5){$home = "5h";	$away = "5a";}
	if($game_number == 6){$home = "6h";	$away = "6a";}
	if($game_number == 7){$home = "7h";	$away = "7a";}
	if($game_number == 8){$home = "8h";	$away = "8a";}
	if($game_number == 9){$home = "9h";	$away = "9a";}
	if($game_number == 10){$home = "10h"; $away = "10a";}

 	$query1 = mysql_query("SELECT * FROM elo_rating WHERE game_number='$home'"); 
 	$result1 = mysql_fetch_assoc($query1);	
    $rating1 = $result1['ranking']+80;											//adding 80 for the home advantage
	
	$query2 = mysql_query("SELECT * FROM elo_rating WHERE game_number='$away'"); 
 	$result2 = mysql_fetch_assoc($query2);				
    $rating2 = $result2['ranking'];
    
    $query3 = mysql_query("SELECT team_name FROM elo_rating WHERE game_number='$home'");
    $result3 = mysql_fetch_assoc($query3);	
    $teamA_name = $result3['team_name'];
    
    $query4 = mysql_query("SELECT team_name FROM elo_rating WHERE game_number='$away'");
    $result4 = mysql_fetch_assoc($query4);	
    $teamB_name = $result4['team_name'];
    $k_factor = $_POST['lastweeks_K'];
	$gd = $_POST['goal_diff'];
	$result_A = $_POST['win_lose_draw1'];
	$result_B = $_POST['win_lose_draw2'];
	
   
    $teamA_win_expctncy = 0;	
    $teamB_win_expctncy = 0;	
    $teamA_win_expctncy_percent = 0;
    $teamB_win_expctncy_percent = 0; 

	/************************************************ Initial Display - Will be Hidden **********************************************/     
    echo "<p>";
    //80 is subtracted to rebalance the elo rating (after win expectancy is calculated) for the output
    $rating1_minus_home_adv = $rating1-80;						
    echo "$teamA_name Elo rating is: ".$rating1_minus_home_adv."<br/>";			
  	echo "$teamB_name Elo rating is: ".$rating2."<br/>";
  	echo "Difference in ratings is: ".get_diff_rate()."<br/>"; 
  	get_win_expectancy(); 
  	
  	echo "$teamA_name win expectancy is: ".$teamA_win_expctncy."<br/>";
    echo "$teamB_name win expectancy is: ".$teamB_win_expctncy."<br/><br/>";
    echo "$teamA_name have a ".$teamA_win_expctncy_percent."%"." of winning<br/>";
  	echo "$teamB_name have a ".$teamB_win_expctncy_percent."%"." of winning<br/>"; 
 	echo "</p>"; //end of win expectancy paragraph
 	
 	echo "<p>";
	echo "The K factor is: ".$k_factor."<br/>";
	echo "Goal difference rate is: ".get_goal_diff()."<br/>";
	echo "Goal team rating difference is: ".get_diff_rate()."<br/><br/>";
	echo "The New Elo rating for Team A is: ".get_new_rating_teamA()."<br/>";
	echo "The New Elo rating for Team B is: ".get_new_rating_teamB()."<br/>";
	echo "</p>";
	
	$new_teamA = get_new_rating_teamA();
	$new_teamB = get_new_rating_teamB();
	
	$query9 = "UPDATE elo_rating SET ranking = '$new_teamA', lastweeks_K = '$k_factor' WHERE game_number='$home'";		 		
	$result9 = mysql_query($query9) or die("<br>Insertion failed");
	
	$query10 = "UPDATE elo_rating SET ranking = '$new_teamB', lastweeks_K = '$k_factor' WHERE game_number='$away'";				
	$result10 = mysql_query($query10) or die("<br>Insertion failed");
 
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

/*******************************************************   New Team Rankings ***********************************************************************************************************/	
    
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
    /**********************************************************************************************************************************/
    
    /********************************************** Get Team Difference in Rating Function ********************************************/   
    function get_diff_rate(){
    global $rating1, $rating2;
    if ($rating1 > $rating2)									//if rating1 is greater than rating2 then return that difference
			return ($rating1 - $rating2);
	else if ($rating2 > $rating1)								//else if rating2 is greater than rating1 then return that difference
			return($rating2 - $rating1);
	else 	return 0;    									//otherwise they are both equal so return zero
	}
       
    /********************************************** Get The NEW Ranking for team A Function *******************************************/
    function get_new_rating_teamA(){
    global $rating1, $k_factor, $result_A, $teamA_win_expctncy, $teamB_win_expctncy;
        
			    /********************************************************************************************/
			    /*		This is initially based on the World Football Elo Ranking is: Rn = Ro+KG(W-We).		*/
			    /*		A value of 80 is subtracted to rebalance the elo rating, It was initial added 		*/ 
			    /*		at the queary stage so that win expectancy could reflect home advantage.The 		*/
			    /*	 	return value is formatted to 2 decimal places and a comma removes a comma from 		*/
			    /*		the number_format method that normally separates thousand values. It had to be	    */
			    /*		removed as it conflicted with the database UPDATE query.							*/ 
			    /********************************************************************************************/
    
    //return ($rating1-80)+$k_factor*get_goal_diff()*($result_A-$teamA_win_expctncy);						//This is not number formatted    
    return number_format((($rating1-80)+$k_factor*get_goal_diff()*($result_A-$teamA_win_expctncy)),2, '.','');  //This is formatted to 2 decimal places 
    }
    
    /**********************************************************************************************************************************/
    
    /********************************************** Get The NEW Ranking for team B Function *******************************************/
    function get_new_rating_teamB(){
    global $rating2, $k_factor, $result_B, $teamA_win_expctncy, $teamB_win_expctncy;
    
    //World Football Elo Ranking is: Rn = Ro+KG(W-We)
    //return $rating2+$k_factor*get_goal_diff()*($result_B-$teamB_win_expctncy);						//This is not number formatted    
    return number_format(($rating2+$k_factor*get_goal_diff()*($result_B-$teamB_win_expctncy)),2, '.','');  //This is formatted to 2 decimal places
    }
    
    /**********************************************************************************************************************************/ 	  	  
?> 
</font>

<div>           
		  <table border="1" align="center">
			<thead>
			<tr>
		      <th colspan ="3">Elo Rating System</th>
		    </tr>
			<tr>
			  <th></th>
		      <th>Team</th>
		      <th>Elo rating</th>
		  </tr>
		  </thead>
		  <tbody>
		  <tr>
		  	  <td><img src="images/small_icons/arsenalsmall.png" alt=""/></td>
		      <td>Arsenal</td>
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
		      <td>Aston Villa</td>
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
		      <td>Chelsea</td>
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
		      <td> Everton </td>
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
		      <td> Fulham </td>
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
		      <td> Liverpool </td>
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
		      <td> Manchester United </td>
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
		      <td> Manchester City </td>
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
		      <td> Newcastle United </td>
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
		      <td> Norwich City </td>
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
		      <td> Queens Park Rangers </td>
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
		      <td> Reading </td>
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
		      <td> Southampton </td>
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
		      <td> Stoke City </td>
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
		      <td> Sunderland </td>
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
		      <td> Swansea City </td>
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
		      <td> Tottenham Hotspur </td>
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
		      <td> West Brom </td>
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
		      <td><img src="images/small_icons/stokesmall.png" alt=""/></td>
		      <td> West Ham United </td>
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
		      <td><img src="images/small_icons/wigansmall.png" alt=""/></td>
		      <td> Stoke City </td>
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
</body>
</html>
