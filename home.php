<?php 
  session_start(); 

  if (!isset($_SESSION['login'])) {
	  
  	header('location: index.php');
	
  }
 
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,400" rel="stylesheet">

  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
  integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script  src="js/index.js"></script>
  <!----Header styling-->
 
<style>
/*
  .header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
	
}
    */
 body {
background-color:#e3e3e3;
  }
  
    /*
.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
  margin: 0 auto;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

.card-body{
	
	text-align: justify;
  text-justify: inter-word;
	
}
@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
.header-right {
    float: none;
  }
}
*/
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

</style>

</head>

<body>


<!--
<div class="header">
  <a href="home.php" class="logo" style="margin: 0 auto;">CompanyLogo</a>
  <div class="header-right">
    <a class="active" href="home.php">Home</a>
    <a href="#clusters.php">Custom clusters</a>
    <a href="pushpull.php">Push to Pull</a>
	<a href="writepost.php">Voice of Tech</a>
    <a href="#functional.php">Functional Excellence</a>
    <a href="resource.php">Resource Identification</a>
    
	
  </div>
</div>
-->
    <header id="header">
     <div class="container">
    <img style="float: left; padding-right: 5px;" src="headerlogo.png">
    <nav id="nav">
      <ul>
        <li><a href="about.html">About us</a></li>
        <li><a href="objective.html">Objective</a></li>
        <li><a href="titan.html">About TITAN</a></li>
        <li><a href="members.html">Board Members</a></li>
        <li><a href="contact.html">Contact us</a></li>
        <li><a href="news.html">News</a></li>
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
        echo "<li><a href='profile.php'><img src='$imgPath' style='height: 25px; width: 25px;display:inline-block;border-radius: 50%;'/></a></li>";
      else
        echo "<li><a href='profile.php'><img src='user.png' style='height: 25px; width: 25px;display:inline-block;'/>
        </a></li>";
    ?>
      </ul>
        
    </nav>
  </div>
    </header>

  <br><br> <br> <br>

  <div class="container">
	<div class="row justify-content-center">
	
      </div>
  

</div>

</body>

</html>
