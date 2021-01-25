<?php
 session_start(); 
 if (!isset($_SESSION['login'])) {
	  
  	header('location: index.php');
	
  }

      
include "config.php";

    $userid = $_POST['userid'];

    $postid = $_POST['postid'];
	   
    $response = 0;
    $updatequery = "UPDATE posts SET bookmark=1 where userid=" . $userid . " and id=" . $postid;
    mysqli_query($con,$updatequery);
    $response = 1;
    
    echo $response;
    

   ?>
    
