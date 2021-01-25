<?php 
  session_start(); 

  if (!isset($_SESSION['login'])) {
	  
  	header('location: index.php');
	
  }
  /*
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index1.php");
  }
  */
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
  <title>Welcome</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  
      <link rel="stylesheet" href="navcss/style.css">

  
</head>

<body>

  <div class="col-md-2" style="float:right;">
    <div class="card" style="margin-top: 10px;width:120px;height: 120px; float: right;padding: -5px;">
        <div class="card-body" style="margin-top: -15px;">
            <form method="post"><center><button name="logout" class="btn-sm btn-primary" style="width=3px;font-size: 10px;cursor: pointer;">Logout</button></center></form>
            <p style="color:black;text-align: center;font-size:10px;">Pruthvi Kasani</p>
            <center><img src="pruthvi.jpg" style="width: 25px;height:25px;border-radius:50%;margin-top: -15px;"></center> 
            <p style="color: black;text-align: center;font-size: 8px; margin-bottom: 3px;">Karma points: 30</p> 
            <p style="color: black;text-align: center;font-size: 8px;margin-bottom: 4px;">Logins this month: 10</p> 
            
        </div>
    </div>
    </div>
     
<div class="container">
   
  <div class="component">
    <!-- Start Nav Structure -->
    <button class="cn-button" id="cn-button">Menu</button>
    <div class="cn-wrapper" id="cn-wrapper">
      <ul>
        <li>
          <a href="about.php">
            <span>Home</span>
            <svg class="caticon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 width="35px" height="70px" viewBox="0 0 512 512" enable-background="new 0 0 50 50" xml:space="preserve">
              <path fill="white" id="shop-3-icon" d="M79.792,217.25v235h352.75v-235H79.792z M397.542,381.75h-282.75v-129.5h282.75V381.75z M220.62,59.75
                                        l-17.798,85.332h-0.081v17.34c0,18.314-14.847,33.161-33.161,33.161s-33.16-14.847-33.16-33.161v-17.34l50.841-85.332H220.62z
                                        M168.232,59.75l-51.91,85.332v17.34c0,18.314-14.847,33.161-33.161,33.161S50,180.736,50,162.422v-17.34l83.666-85.332H168.232z
                                        M462,145.082v17.34c0,18.314-14.847,33.161-33.161,33.161s-33.161-14.847-33.161-33.161v-17.34l-51.91-85.332h34.566L462,145.082z
                                        M289.08,145.082h0.081v17.34c0,18.314-14.847,33.161-33.161,33.161s-33.161-14.847-33.161-33.161v-17.34h0.081l16.729-85.332
                                        h32.703L289.08,145.082z M324.739,59.75l50.841,85.332v17.34c0,18.314-14.846,33.161-33.16,33.161s-33.161-14.847-33.161-33.161
                                        v-17.34h-0.081L291.38,59.75H324.739z"/>
            </svg>
          </a>
        </li>
          <li><a href="#"><span>Custom <br> Clusters</span></a></li>
        <li><a href="pushpull.php"><span>Push <br>to<br> Pull</span></a></li>
        <li><a href="voiceoftech.php"><span>Voice <br>of <br>Tech</span></a></li>
        <li><a href="writepost.php"><span>Functional <br>Excellence</span></a></li>
        <li><a href="residen.php"><span>Resource <br>Identification</span></a></li>
        
        
      </ul>
    </div>
      
    <!-- End of Nav Structure -->
  </div>
    <p style="text-align: center;margin-top: 100px;font-size: 70px;font-family: 'Lato', Arial, sans-serif;">MATERIALS &nbsp; CHAPTER</p>
</div><!-- /container -->
  
  

    <script  src="navjs/index.js"></script>




</body>

</html>
