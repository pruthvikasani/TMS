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
              
              
        $userid = $_SESSION['id'];
        $filename = $userid.$_FILES['file']['name'];

        // Location
        $location = 'postpic/'.$filename;


        $link = mysqli_connect("localhost","root","","user_approvals");
	   
	   $title = mysqli_real_escape_string($link,$_POST['title']);
	   $question = mysqli_real_escape_string($link,$_POST['question']);
	   
      
	   $insertquery = "INSERT INTO `posts`(`id`,`userid`, `title`, `content`,`bookmark`,`timestamp`) VALUES (NULL,'".$userid."','".$title."','".$question."', 0,CURRENT_TIMESTAMP)";
	   mysqli_query($link,$insertquery);
    
   ?>
    
	
</body>

</html>
   