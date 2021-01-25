<?php 
  session_start(); 

  if (!isset($_SESSION['login'])) {
	  
  	header('location: index.php');
	
  }
if(isset($_POST['logout']))
	{
		session_destroy();
		header('location: index.php');
	}

    if(isset($_POST['reg_user']))
    {
        
        $link = mysqli_connect("localhost","root","","user_approvals");
    
        $userid = $_SESSION['id'];
        $title = $_POST['title'];
        $univname = $_POST['univname'];
        $forum = $_POST['forum'];
        $relevant = $_POST['relevant'];
        $wherehow = $_POST['wherehow'];
        
        
	   if(isset($_FILES['paper']) && $_FILES['paper']['error'] == 0)
		{
			$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg","png" => "image/png", "pdf" => "application/pdf" , "doc" => "application/msword");
			$filename = $_SESSION['fname'].'_'.$_FILES['paper']['name'];
			$filetype = $_FILES['paper']['type'];
			$filesize = $_FILES['paper']['size'];
			
			//verify extension
           
			
			$maxsize = 5 * 1024 *1024;
			if($filesize > $maxsize) die("File size is larger than expected");
			
			if(in_array($filetype,$allowed))
			{
				if(file_exists("pushpull_papers/".$filename)){
					
					echo "<script> alert('File already exists. Please upload another file'); </script>";
				}
				else{
					move_uploaded_file($_FILES['paper']['tmp_name'],"pushpull_papers/".$filename);
					
					echo "<script>alert('Your paper/solution has been submitted successfully');</script>";
				}				
			}
			else{
				
				echo "Error: There was a problem uploading the file";
			}
		}
        
        $location = "pushpull_papers/".$filename;
          
        $insertquery = "INSERT INTO `pushpull`(`id`, `userid`, `title`, `univname`, `forum`, `relevant`, `wherehow`,`paper_location`,`timestamp`) VALUES (NULL,'".$userid."','".$title."','".$univname."','".$forum."','".$relevant."','".$wherehow."','".$location."',CURRENT_TIMESTAMP)";
        mysqli_query($link,$insertquery);
        
    }
       
    
		
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Push to Pull</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,400" rel="stylesheet">

  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>


  <!----Header styling-->
 
  <style>


 body {
background-color:#e3e3e3;
  }
  
  
 #header {
  z-index: 2;
  position: fixed;
  width: 100%;
  height: 60px;
  line-height: 60px;
  background: #222;
  color: white;
}
#header h1 {
  position: absolute;
  top: 0;
  left: 0;
  text-transform: uppercase;
}
#nav {
  position: absolute;
  right: 0;
}
#nav ul li {
  float: left;
}
    #nav li{
        list-style-type: none;
    }
#nav ul li a {
  display: block;
  color: white;
  text-decoration: none;
  padding: 0 10px;
}
@media (max-width: 599px) {
  #header .container {
    width: 100%;
  }
  #header h1 {
    left: 3%;
  }
  #nav {
    width: 100%;
    top: 60px;
  }
  #nav:before {
    content: '\2630';
    display: block;
    position: absolute;
    right: 3%;
    top: -50px;
    line-height: 40px;
    cursor: pointer;
  }
  #nav ul {
    background: #222;
    width: 100%;
  }
  #nav ul li {
    float: none;
  }
  #nav ul li a {
    padding: 10px 3%;
    line-height: 20px;
    border-top: 1px solid #333;
  }
  #nav ul {
    transition: 350ms;
    -moz-transition: 350ms;
    -webkit-transition: 350ms;
    transform: perspective(600) rotate3d(0, 0, 0, 0);
    -moz-transform: perspective(600) rotate3d(0, 0, 0, 0);
    -webkit-transform: perspective(600) rotate3d(1, 0, 0, -90deg);
    transform-origin: 50% 0;
    -moz-transform-origin: 50% 0;
    -webkit-transform-origin: 50% 0;
  }
  #nav.open ul {
    transform: translateY(0px);
    -moz-transform: translateY(0px);
    -webkit-transform: perspective(600) rotate3d(0, 0, 0, 0);
  }
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

.container1 {
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
function showDoc() {
document.getElementById('file').style.display = "block";

}

</script>
</head>

<body>
     <div class="row">
     <h2 class="col-md-4 col-xs-12" style="padding: 15px;margin-top:50px;"><a href="welcome.php" style="text-decoration: none;">Menu</a></h2>
        <p class="col-md-4 col-xs-12" style="text-align:center;font-size:40px;margin-top:50px;">MATERIALS CHAPTER</p>
      <div class="col-md-4 col-xs-12">
    <div class="card" style="margin-top: 10px;width:130px;height: 140px; float: right;padding: -5px;">
        <div class="card-body" style="margin-top: -15px;">
             <form method="post"><center><button name="logout" class="btn-sm btn-primary" style="width=3px;font-size: 10px;cursor: pointer;">Logout</button></center></form>
            <p style="color:black;text-align: center;font-size:10px;">Pruthvi Kasani</p>
            <center><img src="pruthvi.jpg" style="width: 25px;height:25px;border-radius:50%;margin-top: -15px;"></center> 
            <p style="color: black;text-align: center;font-size: 8px; margin-bottom: 3px;">Karma points: 30</p> 
            <p style="color: black;text-align: center;font-size: 8px;margin-bottom: 4px;">Logins this month: 10</p> 
            
        </div>
    </div>
    </div>
    </div>
<header id="header" style="position:absolute;">
    
     <div class="container">
    <img style="float: left; padding-right: 5px;" src="headerlogo.png">
    <nav id="nav">
      <ul>
        <li><a href="about.php">Home</a></li>
        <li><a href="#">Custom Clusters</a></li>
        <li><a href="pushpull.php" style="color:grey;">Push to Pull</a></li>
        <li><a href="voiceoftech.php">Voice of Tech</a></li>
        <li><a href="writepost.php">Functional Excellence</a></li>
        <li><a href="resource.php">Resource Identification</a></li>
	<?php 
      
    $link = mysqli_connect("localhost","root","","user_approvals");
    $userid = $_SESSION['id'];
    
    $image_query = "SELECT `profilepic` FROM `profile` WHERE id=".$userid;
    $image_retrieval = mysqli_query($link,$image_query);
    while ($row = mysqli_fetch_array($image_retrieval))
    {
        $imgPath = $row['profilepic'];
    }
    if(!empty($imgPath))
        echo "<a href='profile.php'><img src='$imgPath' style='height: 25px; width: 25px;display:inline-block;border-radius: 50%;'/></a>";
      else
        echo "<a href='profile.php'><img src='user.png' style='height: 25px; width: 25px;display:inline-block;'/>
        </a>";
    ?>
    </ul>
        
    </nav>
  </div>
    </header>
<br>
  <br><br> 
      <?php 
      
    $link = mysqli_connect("localhost","root","","user_approvals");
    $userid = $_SESSION['id'];
    
    $content_query = "SELECT * FROM `edit_content` WHERE userid=1";
    $content_retrieval = mysqli_query($link,$content_query) or die(mysqli_error($link));
    $row = mysqli_fetch_array($content_retrieval);
    
        $pushpull = $row['pushpull'];
        $voiceoftech = $row['voiceoftech'];
        $functional = $row['functional'];
        $resource = $row['resource'];
    
    
    ?>
    
<form method="post" enctype="multipart/form-data" name="pushpull_form" class="col-md-8" style="float:left;">
  <div class="container1">
      <h4>Push to Pull</h4> <br>
      <p><?php echo $pushpull ?></p>
      
<!--
	<label for="firstname"><b>Tell us something about your submission</b></label>
    <input type="text" placeholder="Enter message" name="firstname" required>
-->
      
    <br> <br>
      
	<p style="text-align:center;font-size:20px;"><strong>Upload the relevant paper/publication</strong></p>
	
      <label for="title"><b>Title</b></label>
    <input type="text" placeholder="write here" name="title" id="title" required>
      
	<label for="unvname"><b>Institution</b></label>
    <input type="text" placeholder="write here" name="univname" id="univname" required>
      
    <label for="forum"><b>Forum in which it is published</b></label>
    <input type="text" placeholder="write here" name="forum" id="forum" required>
    
      <label for="relevant"><b>Is it relevant to TITAN's businesses</b></label>
    <input type="text" placeholder="write here" name="relevant" id="relevant" required>
      
      <label for="wherehow"><b>If yes, let us know where and how</b></label>
    <input type="text" placeholder="write here" name="wherehow" required>
      
     <div class="col-sm-12 text-center">
        <button id="upload" class="btn btn-primary btn-md center-block" type="button" Style="width: 100px;" onclick="showDoc()">Upload</button> 
     </div>
      
    <div id="file" style="display:none;">
	<label for="file" style="display:inline-block;"><b>Upload</b></label> 
	<input type="file" id="myFile" multiple size="50" name="paper">
	<p>Note: PDF, Ms Docx, JPEG, JPG, PNG files below 5MB are allowed </p>
	</div>
	
        
    <button type="submit" name="reg_user" id="submit">SUBMIT</button>
    
  </div>
  </form>
    
    <?php 
      
    $link = mysqli_connect("localhost","root","","user_approvals");
    $userid = $_SESSION['id'];
    
    $recents_query = "SELECT * FROM pushpull ORDER BY timestamp DESC LIMIT 5";
    $recents_retrieval = mysqli_query($link,$recents_query) or die(mysqli_error($link));
    while ($row = mysqli_fetch_array($recents_retrieval))
    {
        $paper_location = $row['paper_location'];
        $title = $row['title'];
        
    }
    ?>
    
    <div class="col-md-4" style="float:right;">
    <div class="card">
    <div class="card-header" style="text-align:center;font-size:25px;">TITLES - Recent</div>
	<marquee direction="up" scrolldelay="250">
    <div class="card-body">
	
    <i class="far fa-hand-point-right"></i> <a href="<?php echo $paper_location ?>" target="_blank"><?php echo $title ?></a>
	<p>&nbsp;</p>
	<i class="far fa-hand-point-right"></i> <a href="<?php echo $paper_location ?>" target="_new"><?php echo $title ?></a>
	<p>&nbsp;</p>
	<i class="far fa-hand-point-right"></i> <a href="<?php echo $paper_location ?>" target="_new"><?php echo $title ?></a>
    <p>&nbsp;</p>
	<i class="far fa-hand-point-right"></i> <a href="<?php echo $paper_location ?>" target="_new"><?php echo $title ?></a>
    <p>&nbsp;</p>
	<i class="far fa-hand-point-right"></i> <a href="<?php echo $paper_location ?>" target="_new"><?php echo $title ?></a>
	
	</div> 
	</marquee>
  </div>
    </div>
</body>

</html>

<script>



</script>
