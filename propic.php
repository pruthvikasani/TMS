<?php

session_start(); 

  if (!isset($_SESSION['login'])) {
	  
  	header('location: index.php');
	
  }

$userid =$_SESSION['id'];
// file name
$filename = $userid.$_FILES['file']['name'];

// Location
$location = 'propic/'.$filename;

// file extension
$file_extension = pathinfo($location, PATHINFO_EXTENSION);
$file_extension = strtolower($file_extension);

// Valid image extensions
$image_ext = array("jpg","png","jpeg","gif");

$response = 0;
if(in_array($file_extension,$image_ext)){
  // Upload file
  if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
   
    $link = mysqli_connect("localhost","root","","user_approvals");
      
    $query = "UPDATE `profile` SET `profilepic`='$location' WHERE id=".$userid;
              
    mysqli_query($link,$query);
    $response = 1;
  }
}

echo $response;
?>