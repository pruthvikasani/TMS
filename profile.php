<?php 

  include "config.php";
  session_start(); 

  if (!isset($_SESSION['login'])) {
	  
  	header('location: index.php');
	}
	
	if(isset($_POST['logout']))
	{
		session_destroy();
		header('location: index.php');
	}
	
	if(isset($_FILES['propic']) && $_FILES['propic']['error'] == 0)
		{
			$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg","png" => "image/png", "pdf" => "application/pdf"   , "doc" => "application/msword");
			$filename = $_SESSION['id'].'_'.$_FILES['propic']['name'];
			$filetype = $_FILES['propic']['type'];
			$filesize = $_FILES['propic']['size'];
			
			//verify extension
			
			$maxsize = 5 * 1024 *1024;
			if($filesize > $maxsize) die("File size is larger than expected");
			
			if(in_array($filetype,$allowed))
			{
				if(file_exists("propic/".$filename)){
					
					echo "<script> alert('File already exists. Please upload another file'); </script>";
				}
				else{
					$upload_directory = "propic/";
                    $uploaded_path = $upload_directory.$filename;
					move_uploaded_file($_FILES['propic']['tmp_name'],$uploaded_path);
					
                    $query = "INSERT INTO `profile`(`id`, `profilepic`) VALUES ('".$_SESSION['id']."','".$uploaded_path."')";
                    
                    $result = mysqli_query($con,$query);
                    
					echo "<script>alert('Your paper/solution has been submitted successfully');</script>";
                    
                    
                    
				}				
			}
			else{
				
				echo "Error: There was a problem uploading the file";
			}
		}
		
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
  integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
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

    </style>
</head>



<body>
<header id="header">
     <div class="container">
    <img style="float: left; padding-right: 5px;" src="headerlogo.png">
    <nav id="nav">
      <ul>
        <li><a href="about.php">Home</a></li>
        <li><a href="#">Custom Clusters</a></li>
        <li><a href="pushpull.php">Push to Pull</a></li>
        <li><a href="voiceoftech.php">Voice of Tech</a></li>
        <li><a href="writepost.php">Functional Excellence</a></li>
        <li><a href="resource.php">Resource Identification</a></li>
	<?php 
      
    $link = mysqli_connect("localhost","root","","user_approvals");
    $userid = $_SESSION['id'];
    
    $image_query = "SELECT * FROM `profile` WHERE id=".$userid;
    $image_retrieval = mysqli_query($link,$image_query) or die(mysqli_error($link));
    while ($row = mysqli_fetch_array($image_retrieval))
    {
        $imgPath = $row['profilepic'];
        $aboutme = $row['aboutme'];
        
        $fblink = $row['fblink'];
        $gitlink = $row['gitlink'];
        $twitterlink = $row['twitterlink'];
        $pinlink = $row['pinlink'];
        
    }
  
      
    $user_query = "SELECT * FROM `accounts` WHERE id=".$userid;
    $user_retrieval = mysqli_query($link,$user_query) or die(mysqli_error($link));
      
    while($row = mysqli_fetch_array($user_retrieval))
    {
        $fname = $row['firstname'];
        $lname = $row['lastname'];
        $email = $row['email'];
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

<div class="container">
            <div style="margin-top:80px">
            <form method="post" style="float:right;">
				<button name="logout" class="btn btn-danger my-2">Logout</button>
			</form>
            <div class="row">
  		        <div class="col-sm-12 col-xs-12"><h1><?php echo $fname.' '.$lname; ?></h1></div>
            </div>
            </div>
            <!--Profile Modal code starts here -->
            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4 class="modal-title">Make changes to your profile</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    <form name="updateform" class="updateform" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                           
                                            <input class="form-control col-md-6" type="text" id="fname" name="fname" value="<?php echo $fname; ?>" placeholder="Firstname">
                                            <input class="form-control col-md-6" type="text" id="lname" name="lname" value="<?php echo $lname; ?>" placeholder="Lastname">

                                        <br> <br>  <br>
                                    
                                        <?php 
                                        if(!empty($aboutme))
                                        echo "<textarea class='form-control col-md-12' type='text' id='aboutme' name='aboutme'>$aboutme</textarea>";
                                        else
                                        echo "<textarea class='form-control col-md-12' type='text' id='aboutme' name='aboutme' placeholder='Write something about you in two/three sentences'></textarea>";
                                            
                                        ?><br> <br> <br> <br>
                                        <input class="form-control col-md-12" type="text" id="fblink" name="fblink"  placeholder="Facebook link" value="<?php echo $fblink; ?>"> <br> <br> <br>
                                        <input class="form-control col-md-12" type="text" id="gitlink" name="gitlink" placeholder="Github link" value="<?php echo $gitlink; ?>"><br> <br> <br>
                                        <input class="form-control col-md-12" type="text" id="twitterlink" name="twitterlink" placeholder="Twitter link" value="<?php echo $twitterlink; ?>"><br> <br> <br>
                                        <input class="form-control col-md-12" type="text" id="pinlink" name="pinlink" placeholder="Pinterest link" value="<?php echo $pinlink; ?>">
                                        </div>
                                    </form>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-success" id="update" data-dismiss="modal">Update profile</button>
                                    </div>

                                    </div>
                                </div>
                            </div>
    
            <!---Profile pic modal --->
            <div class="modal" id="ppModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4 class="modal-title">Change your profile pic here</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="text-center">
                                                <?php 
                                                if(!empty($imgPath))
                                                echo "<img src='$imgPath' style='height: 150px;width:150px;' class='avatar img-circle img-thumbnail' id='propic' alt='http://ssl.gstatic.com/accounts/ui/avatar_2x.png'>";
                                                else
                                                echo "<img src='user.png' style='height: 150px;width:150px;' class='avatar img-circle img-thumbnail' id='propic' alt='http://ssl.gstatic.com/accounts/ui/avatar_2x.png'>";
                                                ?>
                                                <input type="file" onchange="readURL(this);" class="text-center center-block file-upload" name="file" id="file">
                                                
                                            </div> 
                                        </div>
                                    </form>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-success" id="profilepic" data-dismiss="modal">Change picture</button>
                                    </div>

                                    </div>
                                </div>
                            </div>
    
    
            <form class="form" method="post">
                <div class="row">
                    
  		            <div class="col-sm-3"><!--left col-->
                        <div class="text-center">
                            <a href="" data-toggle="modal" data-target="#ppModal" style="text-decoration:none;">
                            <div class="pro-pic">
                            <?php 
                            if(!empty($imgPath))
                            {
                            echo "<img src='$imgPath' style='height: 225px; width: 225px;display:inline-block;border-radius: 50%;'/>";
                            echo "<div class='overlay'>
                                <div class='text'>Change Picture</div>
                                 </div>";
                                
                            }
                            else
                            echo "<img src='user.png' style='height: 225px; width: 225px;display:inline-block;border-radius: 50%;'/>";
                            ?>
                            </div>
                            </a>
                        </div>  <br>
                    <div class="panel panel-default">
                        <div class="panel-heading">About</div> <?php
                        
                         if(!empty($aboutme))
                            echo "<div class='panel-body'>$aboutme</div>";
                         else
                            echo "<div class='panel-body'>Write something</div>";
                        
                        ?>
                        
                    </div>
          
                    <div class="profile_stats">
                        <ul class="list-group">
            
            
                        </ul> 
		            </div>
          
                    </div><!--/col-3-->
		            
                    <div class="col-sm-9">
                        <a href="" data-toggle="modal" data-target="#myModal" style="text-decoration:none;"><center><h3>Click to update your profile<i class="far fa-edit"></i></h3></center></a>

                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    <form>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="first_name"><h4>First name</h4></label>
                                            <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $fname; ?>" readonly>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="last_name"><h4>Last name</h4></label>
                                            <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $lname; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="email"><h4>Email</h4></label>
                                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="password"><h4>Password</h4></label>
                                            <input type="password" class="form-control" name="password" id="password" value="*******" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="mobile"><h4>Mobile</h4></label>
                                            <input type="text" class="form-control" name="mobile" id="mobile" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="email"><h4>Location</h4></label>
                                            <input type="email" class="form-control" id="location" readonly>
                                        </div>
                                    </div>
                                    <br>
                                       <div class="col-xs-12">
                                            <br>
<!--
                                            <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                            <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
-->
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><center><h4>Social Media</h4></center></div>
                                                <div class="panel-body">
                                                <center>
                                                    <?php
                                                    if(!empty($fblink))
                                                    echo "<a href='$fblink' target='_blank'><i class='fab fa-facebook fa-2x'></i></a>";
                                                    else
                                                    echo "<a href=''><i class='fab fa-facebook fa-2x'></i></a>";
                                                    ?>
                                                    &nbsp; &nbsp;&nbsp;
                                                    
                                                    <?php 
                                                    if(!empty($gitlink))
                                                    echo "<a href='$gitlink' target='_blank''><i class='fab fa-github fa-2x'></i></a>"; else
                                                    echo "<a href=''><i class='fab fa-github fa-2x'></i></a>";
                                                    ?>
                                                    &nbsp; &nbsp;&nbsp;
                                                    <?php 
                                                    if(!empty($twitterlink))
                                                    echo "<a href='$twitterlink' target='_blank'><i class='fab fa-twitter fa-2x'></i></a>";
                                                    else
                                                    echo "<a href=''><i class='fab fa-twitter fa-2x'></i></a>";
                                                    ?>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <?php
                                                    if(!empty($pinlink))
                                                    echo "<a href='$pinlink' target='_blank'><i class='fab fa-pinterest fa-2x'></i></a>";
                                                    else
                                                    echo "<a href=''><i class='fab fa-pinterest fa-2x'></i></a>";
                                                    ?>
                                                </center>
                                                </div>
                                            </div>
                                           <input type="text" class="form-control col-md-8" value="localhost/TMS-Titan/login/profilelink.php?userid=<?php echo $userid; ?>" id="myProfile" readonly>
                                           
                                           <button type="button" onclick="myFunction()" class="btn btn-default">Copy link</button>
                                           
                                       </div>
                                        
                                            
                                        
                                    </form>
                                </div>  <!--Tab pane --> 
                           </div> <!-- Tab content -->
                    </div><!--/col-9-->
                </div>
            </form>
</div><!--/row-->
</body>
</html>

<script>

function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myProfile");

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the link: " + copyText.value);
}
 
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#propic')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    
$(function(){
	var userid = "<?php echo $userid ?>";
	$.ajax({
			url:'profile_stats.php',
			data: 'userid='+userid,
			type: 'post',
			success:function(res){
				
				$('.profile_stats').html(res);
				
			}
			})
			
	
    $('button#update').click(function() {
        
			$.ajax({
			type: 'post',
			url: 'update.php',
			data: $('form.updateform').serialize(),
			success: function(message)
                {

                   location.reload(true);
                
			},
			error: function(){
			alert("Error");
			}
			})
			
		})
    
    $('button#profilepic').click(function() {
    
            var fd = new FormData();
            var files = $('#file')[0].files[0];
            fd.append('file',files);
        
            
			$.ajax({
			type: 'post',
			url: 'propic.php',
			data: fd,
            contentType: false,
            processData: false,
			success: function(response){
                
				   if(response != 0)
                       location.reload(true);
                    else
                        alert('Error. Please try again');
                
			},
			error: function(){
			alert("Error");
			}
			})
			
		})
		
	
});
    

</script>                                                  