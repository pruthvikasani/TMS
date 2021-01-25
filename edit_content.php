<?php
 session_start(); 
 if (!isset($_SESSION['login'])) {
	  
  	header('location: index.php');
	
  }

        $link = mysqli_connect("localhost","root","","user_approvals");
	   
	   $pushpull = mysqli_real_escape_string($link,$_POST['pushpull']);
	   $voiceoftech = mysqli_real_escape_string($link,$_POST['voiceoftech']);
       $functional = mysqli_real_escape_string($link,$_POST['functional']);
       $resource = mysqli_real_escape_string($link,$_POST['resource']);
	   
   
      
	   $editquery = "UPDATE edit_content SET pushpull='$pushpull',voiceoftech= '$voiceoftech',functional='$functional',resource='$resource' WHERE userid=1";
	   mysqli_query($link,$editquery);
       if(mysqli_query($link,$editquery)){
    // Do something
           echo "1";
}
else
{
    echo "0";
}
        
?>	
