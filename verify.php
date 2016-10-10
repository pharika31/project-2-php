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
  <div class="message-container">
  
  <?php
  session_start();
 
  
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
	  echo"<audio autoplay=\"autoplay\" >  
   <source src=\"images/Marimba-Music/applause.mp3\" />  
  
</audio> ";
	echo "<p class= para>Good job! You got it right!</p>"; 
 echo"<img class=\"img-game\" src=\"images/win.png\"/>";	
  }
  else{
	  echo"<audio autoplay=\"autoplay\" >  
   <source src=\"images/Marimba-Music/sad.mp3\" />  
  
</audio> ";
	  echo "<p class= para>Sorry! Your answer is incorrect.<br/>";
	  echo "The correct answer is: $word_to_match</p>";	  
	  echo"<img class=\"img-game\" src=\"images/lose.png\"/>";
  }
  
 $score=0;
  if($comparison_value==0){
	  $score=$score+10;
	  echo"<p class= para>Your score is:  $score </p>";
  }
  else{
	  $score=$score;
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