<?php
 session_start(); 
 if (!isset($_SESSION['login'])) {
	  
  	header('location: index.php');
	
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
  integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>

<?php

	   $link = mysqli_connect("localhost","root","","user_approvals");
	   
	   $fname = mysqli_real_escape_string($link,$_POST['fname']);
	   $lname = mysqli_real_escape_string($link,$_POST['lname']);
       $aboutme = mysqli_real_escape_string($link,$_POST['aboutme']);
       $fblink = mysqli_real_escape_string($link,$_POST['fblink']);
       $gitlink = mysqli_real_escape_string($link,$_POST['gitlink']);
       $twitterlink = mysqli_real_escape_string($link,$_POST['twitterlink']);
       $pinlink = mysqli_real_escape_string($link,$_POST['pinlink']);
        
        
	   $userid = $_SESSION['id'];

       echo "<script>alert('$fblink');</script>";
	   
       $updatequery = "UPDATE `accounts` SET `firstname`='$fname',`lastname`='$lname', WHERE accounts.id=".$userid;
	   mysqli_query($link,$updatequery);
    
       $sociallink = "UPDATE `profile` SET `aboutme`='$aboutme',`fblink`='$fblink',`gitlink`='$gitlink',`twitterlink`='$twitterlink',`pinlink`='$pinlink' WHERE profile.id=".$userid;
	   mysqli_query($link,$sociallink);

    
?>
    
	
</body>

</html>
   