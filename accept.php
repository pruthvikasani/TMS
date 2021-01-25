<?php

	include('functions.php');
	$id = $_GET['id'];
	$query = "SELECT * FROM `user_requests` WHERE `id` = $id;";
	
	if(count(fetchAll($query)) >0)
	{
	foreach(fetchAll($query) as $row)
	{
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$email = $row['email'];
		$password = $row['password'];
		$designation = $row['designation'];
		$institute = $row['institute'];
		$expertise = $row['expetise'];
		
		
		$query = "INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `email`, `type`, `password`, `designation`,`institute`, `expertise`) 
		VALUES (NULL, '$firstname', '$lastname', '$email', 'user', '$password', '$designation', '$institute', '$expertise');";
		performQuery($query);
		
		
	}
	
	$query = "DELETE FROM `user_requests` WHERE `user_requests`.`id` = $id;";
	
	if(performQuery($query))
	{
		header('location:console.php');
	
	}
	else{
		
		echo "Unkown error occured";
	}
	}else
	{
		echo "Error occured";
		
	}
?>

<br/> <br/>
<a href="console.php">Back</a>