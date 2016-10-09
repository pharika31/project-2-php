<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title>Unscramble me</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="css/gamePage.css">
  </head>

  <body>
  
 <audio autoplay="autoplay"  loop="loop">  
   <source src="images/Marimba-Music/Marimba-Music.mp3" />  
  
</audio> 
  
  <div class="page-header">
	
	  <img class="img-responsive" src="images/header.png" alt="header"/>
  </div>
  <div class="message-container">
  
  <?php
  session_start();
  
   $addup=$_SESSION['addup'];
  //code to retrieve word from previous page-header
  $word_to_match=$_POST['selected_word'];
   $user_answer=array();
  for($i=0;$i<strlen( $word_to_match);$i++)
  {
	  $user_answer[$i]=$_POST[$i];
	 
	  
  }
  
  $answer_as_string=implode($user_answer);
  $comparison_value=strcasecmp( $answer_as_string,$word_to_match);
  
  if($comparison_value==0)
  {
	echo "<p class= para>Good job! You got it right!</p>";  
  }
  else{
	  echo "<p class= para>Better luck next time!<br/>";
	  echo "The correct answer is: $word_to_match</p>";	
  
  }
  
 $score=0;
  if($comparison_value==0){
	  $score=$score+10+$addup;
		echo"<p class= para>Your score is:  $score </p>";
  }
 else{
	  $score=$addup;
  echo"<p class= para>Your score is:  $score </p>";	
 }
  $_SESSION['score']=$score;
  
  ?>
  </div>
  
  <div class="answer-box">
	<!--you might need form with post method here-->
	
<form name="newword"  action="newgame.php">

<p><input type="submit" class="button" value="New Word" name="newword"/></p>
</form>

<form name="endgame"  action="endGame.php">

<p><input type="submit" class="button" value="End Game" name="end"/></p>
</form>

	</div>
	
  
  
  </div>
  </body>
  </html>