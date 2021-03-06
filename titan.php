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
    <header id="header">
     <div class="container">
    <img style="float: left; padding-right: 5px;" src="headerlogo.png">
    <nav id="nav">
      <ul>
        <li><a href="about.php">About us</a></li>
        <li><a href="objective.php">Objective</a></li>
        <li><a href="titan.php" style="color:grey;">About TITAN</a></li>
        <li><a href="members.php">Board Members</a></li>
        <li><a href="contact.php">Contact us</a></li>
        <li><a href="news.php">News</a></li>
      </ul>
        
    </nav>
  </div>
    </header>

  <br><br> <br> <br>

  <div class="container">
	<div class="row justify-content-center">
	<div class="col-md-12">
        <h4 style="text-align: center;">About TITAN</h4>
        <br>
        <p style="text-align: justify">Titan Company Limited (Titan), a joint venture between the Tata Group and the Tamil Nadu Industrial Development Corporation (TIDCO), commenced its operations in 1984 under the name Titan Watches Limited. Titan is the fifth largest integrated own brand watch manufacturer in the world. Over the last three decades, Titan has expanded into underpenetrated markets and created lifestyle brands across different product categories. Titan is widely known for transforming the watch and jewellery industry in India and for shaping India's retail market by pioneering experiential retail.
        </p>
    </div>
</div>
  
<!--
  <br><br>
  <div class="row justify-content-center">
	<div class="col-md-6">
   <div class="card">
    <div class="card-header" style="text-align:center;font-size:25px;" >VOICE OF TECHNOLOGY</div>
	<marquee direction="up" scrolldelay="150">
    <div class="card-body">
	<i class="far fa-hand-point-right"></i> Forum for voice of technology is a specialized, interdisciplinary global forum. <br>
	<p>&nbsp;</p>
	<i class="far fa-hand-point-right"></i> It deals with science, technology and recent innovations interface.<br>
	<p>&nbsp;</p>
	<i class="far fa-hand-point-right"></i>Will examine how to bridge the awareness gaps between recent innovations / researches and our knowledge on the same .
	Posting the recent technology that we come across and debating on the various aspects of it.</div> 
	</marquee>
    <div class="card-footer">
	<a href="writepost.php"><center><button class='btn btn-primary' type='button'>Know more</button></center></a></div>
  </div>
  </div>
  
  <div class="col-md-6">
  <div class="card">
    <div class="card-header" style="text-align:center;font-size:25px;">RESOURCE IDENTIFICATION</div>
	<marquee direction="up" scrolldelay="150">
    <div class="card-body">
	<i class="far fa-hand-point-right"></i>Help our group companies to identify the right candidate for various roles. <br>
	<p>&nbsp;</p>
	<i class="far fa-hand-point-right"></i>Also lab and testing facility identification becomes handy.</div> 
	</marquee>
    <div class="card-footer">
	<a href="resource.php"><center><button class='btn btn-primary' type='button'>Know more</button></center></a></div>
  </div>
  </div>
  
  </div>
-->
</div>

</body>

</html>
