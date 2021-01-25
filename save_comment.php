<?php
 session_start(); 
 if (!isset($_SESSION['login'])) {
	  
  	header('location: index.php');
	
  }
?>

<?php 
$link = mysqli_connect("localhost","root","","user_approvals");

$name = mysqli_real_escape_string($link,$_POST['name']);
$comment = mysqli_real_escape_string($link,$_POST['comment']);
$postid = mysqli_real_escape_string($link,$_POST['postid']);
$userid = $_SESSION['id'];

$query = "INSERT INTO `comments`(`id`,`userid`,`pid`,`name`, `comment`, `comment_date`) VALUES (NULL,'".$userid."','".$postid."','".$name."','".$comment."',CURRENT_TIMESTAMP)";
mysqli_query($link,$query);



?>