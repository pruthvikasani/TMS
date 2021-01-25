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
  <title>Resource Identification</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,400" rel="stylesheet">

  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
      

  <!----Header styling-->
 
  <style>

 body 
 {
background-color:#e3e3e3;
overflow-x: hidden;
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



.container1 {
  position: relative;
  width: 70%;
  padding: 5%;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  bottom: 100%;
  left: 0;
  right: 0;
  background-color: #008CBA;
  overflow: hidden;
  width: 100%;
  height:0;
  transition: .5s ease;
}

.container1:hover .overlay {
  bottom: 0;
  height: 100%;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
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


<header id="header" style="position:absolute;">
     <div class="container">
    <img style="float: left; padding-right: 5px;" src="headerlogo.png">
    <nav id="nav">
      <ul>
        <li><a href="about.php">Home</a></li>
        <li><a href="#">Custom Clusters</a></li>
        <li><a href="pushpull.php">Push to Pull</a></li>
        <li><a href="voiceoftech.php">Voice of Tech</a></li>
        <li><a href="writepost.php">Functional Excellence</a></li>
        <li><a href="resource.php" style="color:grey;">Resource Identification</a></li>
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

     <br><br> <br> <br>
    <div class="container">
    <div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add your question here and we will post it</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            
		<form name="questionform" class="questionform">
			 <div class="form-group">
				<textarea class="form-control" onKeyUp="SetNewSize(this);" name="title" rows="2" id="title" placeholder="Post title..."></textarea><br>
				<textarea class="form-control" onKeyUp="SetNewSize(this);" rows="3" name="question" id="question" placeholder="Your question (or) challenge here..."></textarea>
                <img id="post_pic" style="display: none;margin: 0 auto;" src="user.png"> 
			 </div>
		</form>
            
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <form method="post" enctype="multipart/form-data">
                <input type="file" onchange="readURL(this)" name="file" id="file" style="display: none;"></form>
            <button type="button" class="btn btn-default mr-auto" id="image_button"><i class="far fa-image"></i></button>
		    <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" id="post" data-dismiss="modal">Add Post</button>
        </div>
        
      </div>
    </div>
  </div>
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
        <p>*open to public</p>
  <!---POST display card -->
        <div class="col-md-8" style="float: left;">
      <div class="card bg-light text-dark">
        <div class="card-header">
            <h4>Resource Identification</h4> <br>
            <p style="text-aling:justify;"><?php echo $resource; ?></p>
        </div>
        <div class="card-body">
            <div class="card-text"><a href="#" style="font-size:20px;text-decoration:none;" id="postlink" data-toggle="modal" data-target="#myModal">Post here and Faculty/Domain expert/Intern/Student can see and approach</a></div>
        </div>
      </div>
            </div>
        
        <div class="col-md-4" style="float:right;">
        <a href="student.php">
			<div class="container1">
			<img src="student.png" alt="Avatar" class="image">
			<div class="overlay">
			<div class="text">Students</div>
			</div>
			</div>
        </a> <br>
            
        <div class="container1">
			<img src="faculty.png" alt="Avatar" class="image">
		<div class="overlay">
		<div class="text">Faculties</div>
		</div>
		</div> <br>
        
        <div class="container1">
			<img src="laboratory.jpg" style="border-radius:50%;"alt="Avatar" class="image">
		<div class="overlay">
		<div class="text">Consultancy</div>
        </div> 
        
        </div>
 

  <br><br>
	
		</div>
	</div>

  
</body>

</html>
<script>
$(function(){
    
		
		
		$('button#post').attr('disabled',true);
		
		$('textarea').on('keyup',function()
		{
			var textarea_title = $("#title").val();
			var textarea_question = $("#question").val();
			
			if( textarea_title != '' && textarea_question != '')
			{
				$('button#post').attr('disabled',false);
			}
			else
			{
				$('button#post').attr('disabled',true);
			}
			
		});
		
		$('#postlink').click(function()
         {                   
        
            $('#post_pic').attr('src', '');
        
         }
        );
		$('button#post').click(function() {
			
			$.ajax({
			type: 'POST',
			url: 'resource_  post.php',
			data: $('form.questionform').serialize(),
			success: function(message){
				alert('Success');
				listPosts();
			},
			error: function(){
			alert("Error");
			}
			})
			
		});
    
        $('button#post').click(function() {
             var fd = new FormData();
            var files = $('#file')[0].files[0];
            fd.append('file',files);
			
			$.ajax({
			type: 'POST',
			url: 'image_upload.php',
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
			
		});
    
        $('button#image_button').click(function(){
            
            $('#file').click();
            $('#post_pic').attr('src', '');
            
        });
    
        $(".bookmark").click(function(){                 
        
        var id = this.id;   // Getting Button id
        var split_id = id.split("_");

        var text = split_id[0];
        var postid = split_id[1];  // postid
            
        var userid= "<?php echo $_SESSION['id'] ?>";
           
            
        $.ajax({
            url: 'bookmark.php',
            type: 'post',
            data: {postid:postid,userid:userid},
            dataType: 'json',
            success: function(response){
                
				   if(response != 0)
                        $("#bookmark_"+postid).css("color","#0077ea");
                    else
                        alert('Error. Please try again');
                
			},
			error: function(){
			alert("Error");
			}
            
        });
        
        });
    
    
        $(".delete").click(function(){                 
        
        var id = this.id;   // Getting Button id
        var split_id = id.split("_");

        var text = split_id[0];
        var postid = split_id[1];  // postid
        
        var userid= "<?php echo $_SESSION['id'] ?>";
           
            
        $.ajax({
            url: 'delete.php',
            type: 'post',
            data: {postid:postid,userid:userid},
            dataType: 'json',
            success: function(response){
                
				   if(response != 0)
                        location.reload(true);
                    else
                        alert('Error. Please try again');
                
			},
			error: function(){
			alert("Error");
			}
            
        });
        
        });
    
    
         $(".like, .unlike").click(function(){
        var id = this.id;   // Getting Button id
        var split_id = id.split("_");

        var text = split_id[0];
        var postid = split_id[1];  // postid
		var userid= "<?php echo $_SESSION['id'] ?>";
        // Finding click type
        var type = 0;
        if(text == "like"){
            type = 1;
        }else{
            type = 0;
        }

        // AJAX Request
        $.ajax({
            url: 'likeunlike.php',
            type: 'post',
            data: {postid:postid,type:type,userid:userid},
            dataType: 'json',
            success: function(data){
                var likes = data['likes'];
                var unlikes = data['unlikes'];

                $("#likes_"+postid).text(likes);        // setting likes
                $("#unlikes_"+postid).text(unlikes);    // setting unlikes

                if(type == 1)
                {
                    $("#like_"+postid).css("color","#0077ea");
                    $("#unlike_"+postid).css("color","#282828");
                    
                }

                if(type == 0)
                {
                    $("#unlike_"+postid).css("color","#0077ea");
                    $("#like_"+postid).css("color","#282828");
                }


            }
            
        });

    });

});


</script>
