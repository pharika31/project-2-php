<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title>Unscramble me</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="css/gamePage.css">
  </head>

  <body>
  
 
  
  <div class="page-header">
	
	  <img class="img-responsive" src="images/header.png" alt="header"/>
  </div>
  <div class="container">
  
	<!--Inside the following container we only want to show different characters of the word
	we might want to create seperate boxes depending upon number of characters.
	-->
	
	<div class="word-box">
	<?php
	
	
   //header( "url=gamePage.php" );
  //php to set up words for the game
  $words=array("PROGRAM","STRANGE","JUMBLE","APPLE","CRAZY","COMPLEX","MANGO","AMERICA","WEBSITE");
  
  //randomly pick one element from word list
  $random_word_index=mt_rand(0,(count($words)-1));
  
  //this is randomly selected to display to user, u still have to unscramble word
  $selected_word= $words[$random_word_index];
  
  
  
  ?>
  
 <?php $length=strlen($selected_word);
 // echo $length;
  
  //scrambled word
  $shuffled = str_shuffle($selected_word);
  
  //compare scrambled word with original - reshuffle if its same
  $comparison_result=strcmp($shuffled,$selected_word);
  
  
  
  if(  $comparison_result!=0){
	  $shuffled=$shuffled;
	 
  }
  else{
	   $shuffled = str_shuffle($selected_word);
  }
  
  //get each character of the scrambled word - store in array
  $scrambled_chars = str_split($shuffled);
  
 // echo"$selected_word<br/>";
  //echo"$shuffled";
  
  //$chars=print_r($scrambled_chars);
  
  //accessing each character of the jumbled word
  
	  
	  echo "<table id=\"event_table\">";
	  echo "<tbody>";
	  echo "<tr>";
	  
	  for($i=0;$i<$length;$i++)
	  {
	  echo "<td class=\"hr_td\">".$scrambled_chars[$i]."</td>";
	  }
	  
	  echo "</tr>";
	  echo "</tbody>";
	  echo "</table>";
	  
	 
	  
	  
	 echo"<div class=\"answer\">";
 
  
  echo"<p><form name=\"answer\" action=\"verify.php\" method=\"post\"></p>";
 
 
		for($i=0;$i<$length;$i++){
	 
 
		echo"&nbsp<input class= \"glow-effect\" name=\"$i\" type=\"text\" size=\"5\" />";
		}
		
  echo"<input type=\"hidden\" name=\"selected_word\" value=\"$selected_word\" /> ";
 
        
		echo"<p><input type=\"submit\" class=\"button\" value=\"Submit\" name=\"Submit\"/></p>";
		  
  echo"</form>"; 
  echo"</div>";

 ?>
 
          
  
  
	</div>
	<!--Another container with multiple sections to show seperate boxes for each char of the word-->
	
  </div>
  <div class="answer-box">
	<!--you might need form with post method here-->
	<audio autoplay="autoplay"  loop="loop">  
   <source src="images/Marimba-Music/happy.mp3" />  
  
</audio> 


<p><input type="submit" class="button" value="New Word" name="newword"/></p>
</form>

<form name="endgame"  action="endGame.php">

<p><input type="submit" class="button" value="End Game" name="end"/></p>
</form>

	</div>
	
  </body>
  </html>