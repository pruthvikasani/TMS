<?php

	include('functions.php');
	$id = $_GET['id'];
	$query = "DELETE FROM `user_requests` WHERE `user_requests`.`id` = $id;";
	
	if(performQuery($query))
	{
		header('location:console.php');
	
	}
	else{
		
		echo "Unkown error occured. Please try again";
	}

?>

<br/> <br/>
<a href="console.php">Back</a>