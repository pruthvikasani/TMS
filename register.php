<?php 
session_start();
include("functions.php"); 
	if(isset($_POST['reg_user']))
	{
		//database 
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$psw = $_POST['psw'];
		$password = md5($psw);
		$email = $_POST['email'];
		$message = $_POST['msg'];
		$designation = "CEO";
		$univname = $_POST['univname'];
		$expert = $_POST['expert'];
		$experience = $_POST['exp'];
		$filesize = null;
		//$query = "INSERT INTO `requests` (`id`, `firstname`, `lastname`, `email`, `password`, `message`, `date`) 
		//VALUES (NULL, '$fname', '$lname', '$email', '$password', '$message', CURRENT_TIMESTAMP);";
		
			
		//file upload
		if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0)
		{
			$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg","png" => "image/png", "pdf" => "application/pdf" , "doc" => "application/msword");
			$filename = $_FILES['photo']['name'];
			$filetype = $_FILES['photo']['type'];
			$filesize = $_FILES['photo']['size'];
			
			//verify extension
			
			$maxsize = 5 * 1024 *1024;
			if($filesize > $maxsize) die("File size is larger than expected");
			
			if(in_array($filetype,$allowed))
			{
				if(file_exists("upload/".$filename)){
					
					echo $filename."already exists";
				}
				else{
					move_uploaded_file($_FILES['photo']['tmp_name'],"upload/".$filename);
					
					echo "Your file uploaded successfully";
				}				
			}
			else{
				
				echo "Error: There was a problem uploading the file";
			}
		}
	
		if($filesize != 0)
		{
			$profile = $filename;
			
		}
		else
		{
			$profile = "link".$_POST['profile'];
			
			}
		
		$query = "INSERT INTO `user_requests`(`id`, `firstname`, `lastname`, `email`, `password`, `message`, `designation`, 
		`profile`, `institute`, `expetise`, `experience`, `date`) VALUES (NULL, '$fname', '$lname', '$email', '$password', '$message', '$designation',
		'$profile', '$univname', '$expert', '$experience', CURRENT_TIMESTAMP);";
		
		if(performQuery($query))
		{
			echo"<script>alert('Your account is pending for approval. You will soon hear from us. Thank you.')</script>";
			
		}
		else
		{
			echo"<script>alert('Unknown error occured')</script>";
		}
		}
		
		
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<style>
@import url('https://fonts.googleapis.com/css?family=Cabin');
body {
	
font-family: 'Cabin', sans-serif;
background-color:#e3e3e3;
color:#333333;
}
form {
	
	border: 3px solid #f1f1f1;
	 width: 45%;
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
  width: 100%;
  font-family: 'Cabin', sans-serif;
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


span.register {
	
	float: none;
	
}
#btnSearch,
#btnClear{
    display: inline-block;
    vertical-align: top;
	padding: -10px;
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

<script>
function showLink(){
	document.getElementById('profile').style.display = "block";
	document.getElementById('file').style.display = "none";
	document.getElementById('uppro').style.display = "none";
	
	
}
function showDoc() {
document.getElementById('file').style.display = "block";
document.getElementById('profile').style.display = "none";
document.getElementById('uppro').style.display = "none";
}

function showAll() {
	
	document.getElementById('uppro').style.display = "block";
	document.getElementById('file').style.display = "none";
	document.getElementById('profile').style.display = "none";
}

</script>
</head>
<body>

<h2 align="center" style="margin-top:2%">User registration</h2>
	<form method="post" enctype="multipart/form-data">
  <!---
  <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>
  
  -->

  <div class="container">
    <label for="firstname"><b>First name *</b></label>
    <input type="text" placeholder="Enter Firstname" name="firstname" required>
	
	<label for="lastname"><b>Last name *</b></label>
    <input type="text" placeholder="Enter Lastname" name="lastname" required>
	
	<label for="email"><b>Email *</b></label>
    <input type="text" placeholder="Enter email" name="email" required>
	
	<label for="psw"><b>Password *</b></label>
    <input type="password" placeholder="Enter password" name="psw" required>
	
	<label for="msg"><b>Message</b></label>
    <input type="text" placeholder="Enter message" name="msg">
	
	<label for="desig"><b>Designation</b></label>
	<select style="float:right;padding: 6px;" class="selectpicker" name="designation" required>
		<option>CEO</option>
		<option>Manager</option>
		<option>Asst. Manager</option>
	</select>
	<br> <br>
	
	<div id="uppro" style="display:block">
	<p style="text-align:center;">Upload or Send your Profile Link</p>
	<div class="row" style="text-align:center";>
    <div class="col-sm-12 text-center">
        <button id="upload" class="btn btn-primary btn-md center-block" type="button" Style="width: 100px;" onclick="showDoc()">Upload</button> 
         <button id="link" class="btn btn-danger btn-md center-block" type="button" Style="width: 100px;" onclick="showLink()">Send Link</button>
     </div>
	</div>
	</div>
	
	<div id="profile" style="display:none;">
	<label for="profile" style="display:inline-block;"><b>Profile Link</b></label> <button id="refresh" type="button" style="float:right;width:50px;font-size:10px;padding:0px;" onclick="showAll()">Roll back</button>
    <input type="text" placeholder="Paste the link here" name="profile">
	</div>
	
	<div id="file" style="display:none;">
	<label for="file" style="display:inline-block;"><b>Upload</b></label>  <button id="refresh" type="button" style="float:right;width:50px;font-size:10px;padding:0px;" onclick="showAll()">Roll back</button> <br>
	<input type="file" id="myFile" multiple size="50" name="photo">
	<p>Note: PDF, Ms Docx, JPEG, JPG, PNG files below 5MB are allowed </p>
	</div>

	<br>
	<label for="unvname"><b>Institution</b></label>
    <input type="text" placeholder="Enter Institute/University name" name="univname">
	
	<label for="expert"><b>Expertise</b></label>
    <input type="text" placeholder="Enter expertise" name="expert" required>
	
	<label for="exp"><b>Experience</b></label>
    <input type="text" placeholder="Enter experience (numbers)" name="exp" required>
        
    <button type="submit" name="reg_user">REGISTER</button>
    
  </div>

  <div class="container" style="background-color:#f1f1f1;">
    <center><span class="register">Already a member?<a href="index.php" style="text-decoration:none;color:#2165b6;">Sign in</a></span></center>
  </div>
</form>

</body>
</html>
