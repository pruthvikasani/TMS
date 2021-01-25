<?php
 session_start(); 
 if (!isset($_SESSION['login'])) 
 {	  
  	header('location: index.php');	
}
      
    include "config.php";

    $userid = $_POST['userid'];

    $postid = $_POST['postid'];
	   
    $response = 0;

    $clikesquery = "DELETE from likeunlike_comment where commentid in (SELECT id from comments where pid=$postid)";
    mysqli_query($con,$clikesquery);

    $updatequery = "DELETE from posts where userid=" .$userid. " and id=" . $postid;
    mysqli_query($con,$updatequery);

    $commentquery = "DELETE from comments where pid=".$postid;
    mysqli_query($con,$commentquery);

    $likesquery = "DELETE from like_unlike where postid=".$postid;
    mysqli_query($con,$likesquery);

    $response = 1;

    //write for like and unlike for comments
    
    
    echo $response;
    

   ?>
    
