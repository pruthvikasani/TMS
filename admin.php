<?php session_start();
include("functions.php");
if(isset($_POST['login_user']))
	{
		
		$psw = $_POST['psw'];
		$password = md5($psw);
		$email = $_POST['email'];
		
		$query = "SELECT * from `accounts` WHERE type='admin';";
		
		if(count(fetchAll($query)) > 0)
		{
			foreach(fetchAll($query) as $row)
			{
				
				if($row['email']==$email && $row['password']==$password)
				{
					
					$_SESSION['login'] = true;
					$_SESSION['id'] = $row['id'];
					$_SESSION['name'] = $row['firstname']." ".$row['lastname'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['fname'] = $row['firstname'];
					$_SESSION['lname'] = $row['lastname'];
					
					
					header('Location:console.php');
					
				}
				else
				{
					
					echo "<script>alert('Wrong input details')</script>";
                    break;
					
				}
                
			}
		}
		else{
			
			echo "<script>alert('Error')</script>";
		}
		
		
	}?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<style>
@import url('https://fonts.googleapis.com/css?family=Cabin');
body {font-family: 'Cabin', sans-serif;
background-color:#e3e3e3;
color:#333333;}
form {
	
	 border: 3px solid #f1f1f1;
	 width: 35%;
	 margin: 0 auto;
	 background-color: #f6f6f6;
	 box-shadow: 5px 10px 18px #888888;
	 border-radius: 3px;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  background-color:#eaeaea;
}

button {
  background-color: #3b8beb;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  font-family: 'Cabin', sans-serif;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 36px;
 
}


/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2 align="center" style="margin-top:2%">ADMIN LOGIN</h2>

<form method="post" class="form-signin">
	
  <!---
  <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>
  
  -->

  <div class="container">
    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter password" name="psw" required>
        
    <button type="submit" name="login_user" style="margin-top: 5%;">LOGIN</button>
  </div>
</form>

</body>
</html>
