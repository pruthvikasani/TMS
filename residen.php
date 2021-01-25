<?php
 session_start(); 
 if (!isset($_SESSION['login'])) {
	  
  	header('location: index.php');
	
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Functional excellence</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
  integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  
    <!--Modal popup link ---> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  
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
    <h2 style="text-align: center;padding: 10px;"><a href="index.html" style="text-decoration: none;">Menu</a></h2>
<header id="header" style="position: absolute;">
     <div class="container">
    <img style="float: left; padding-right: 5px;" src="headerlogo.png">
    <nav id="nav">
      <ul>
        <li><a href="about.html">Home</a></li>
        <li><a href="#">Custom Clusters</a></li>
        <li><a href="pushpull.php">Push to Pull</a></li>
        <li><a href="voiceoftech.php">Voice of Tech</a></li>
        <li><a href="#" style="color:grey;">Functional Excellence</a></li>
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

  <br><br> 
    
<body>
	<div class="container">
	<p>&nbsp;</p>
  <!-- The Modal -->
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

        <p>*open to public</p>
  <!---POST display card -->
      <div class="card bg-light text-dark">
        <div class="card-header">
        <a href="#" style="font-size:40px;text-decoration:none;" id="postlink" data-toggle="modal" data-target="#myModal"><h3>Post here and Faculty/Domain expert/Intern/Student can see and approach</h3></a>
        </div>
        <div class="card-body">
        <div class="card-text">Your post appears here....</div>
        </div>
      </div>
    
        <div class="row">
		<div class="col-md-4">
			<a href="student.php">
			<div class="container1">
			<img src="student.png" alt="Avatar" class="image">
			<div class="overlay">
			<div class="text">Students</div>
			</div>
			</div>
			</a>
		</div>
		
		<div class="col-md-4">
		<div class="container1">
			<img src="faculty.png" alt="Avatar" class="image">
		<div class="overlay">
		<div class="text">Faculties</div>
		</div>
		</div>
		</div>
		
		<div class="col-md-4">
		<div class="container1">
			<img src="laboratory.jpg" style="border-radius:50%;"alt="Avatar" class="image">
		<div class="overlay">
		<div class="text">Consultancy</div>
		</div>
		</div>
		</div>
	</div>
<!--
  <p>&nbsp;</p>
  <h3>Posts </h3>
  <div class="post_listing">
      
-->
      
    <?php
  $link = mysqli_connect("localhost","root","","user_approvals");
  
  $result = mysqli_query($link,"SELECT * FROM posts ORDER BY id DESC");
  

   while($row = mysqli_fetch_array($result))
   {
	$userid = $row['userid'];
	
	//to get the username of the user
	$user_query = mysqli_query($link,"SELECT * FROM accounts WHERE id=".$userid);
	
	$get_row = mysqli_fetch_array($user_query);
	$fname = $get_row['firstname'];
	$lname = $get_row['lastname'];
	$name = $fname.' '.$lname;
	
	
	
    $postid = $row['id'];
    $title = $row['title'];
    $content = $row['content'];
    $image = $row['image'];
	$post_date = strtotime($row['timestamp']);
	$date = date('d/m/Y',$post_date);
	$time = date('h:iA',$post_date);
    $type = -1;

    // Checking user status
   $status_query = "SELECT count(*) as cntStatus,type FROM like_unlike WHERE userid=".$userid." and postid=".$postid;
    $status_result = mysqli_query($link,$status_query);
    $status_row = mysqli_fetch_array($status_result);
    $count_status = $status_row['cntStatus'];
    if($count_status > 0){
      $type = $status_row['type'];
    }

    // Count post total likes and unlikes
    $like_query = "SELECT COUNT(*) AS cntLikes FROM like_unlike WHERE type=1 and postid=".$postid;
    $like_result = mysqli_query($link,$like_query);
    $like_row = mysqli_fetch_array($like_result);
    $total_likes = $like_row['cntLikes'];

    $unlike_query = "SELECT COUNT(*) AS cntUnlikes FROM like_unlike WHERE type=0 and postid=".$postid;
    $unlike_result = mysqli_query($link,$unlike_query);
    $unlike_row = mysqli_fetch_array($unlike_result);
    $total_unlikes = $unlike_row['cntUnlikes'];
       
    
      $image_query = "SELECT `profilepic` FROM `profile` WHERE id=".$userid;
    $image_retrieval = mysqli_query($link,$image_query);
    while ($row = mysqli_fetch_array($image_retrieval))
    {
        $imgPath = $row['profilepic'];
    }

    $response = 1;
       
   ?>
	
	
<!--
        <div class="card">
            <a href="comments.php?postid=<?php echo $postid?>" style="text-decoration:none;color:black;">
            <div class="card-header">
            <div style="overflow: hidden;">
                <p style="float: left;"><?php 
                if(!empty($imgPath))
                echo "<img src='$imgPath' width='50' height='50' style='border-radius:50%;'>".' '."<strong>$name</strong>";
                else
                echo "<img src='user.png' width='50' height='50' style='border-radius:50%;'>".' '."<strong>$name</strong>";

                    ?></p>
                <p style="float: right;"><?php echo "Posted on ".' '.$date.' '."at ".' '.$time; ?></p>
            </div>
            <h3><?php echo $title; ?></h3>
            </div>
            </a>
            <div class="card-body">
              <p class="card-text"><?php echo $content ?></p>
              <img src="<?php if(!empty($image)) echo $image?>">
            </div>

            <div class="card-footer">

                <div id="like_<?php echo $postid; ?>" class="like" style="display:inline-block; cursor:pointer;"><i class="fa fa-thumbs-up" >Like</i></div>&nbsp;<span id="likes_<?php echo $postid; ?>"><?php echo $total_likes; ?></span>&nbsp; &nbsp; 
                <div id="unlike_<?php echo $postid; ?>" class="unlike" style="display:inline-block; cursor:pointer;"><i class="fa fa-thumbs-down" >Dislike</i></div>&nbsp;<span id="unlikes_<?php echo $postid; ?>"><?php echo $total_unlikes; ?></span> &nbsp; &nbsp;

                <div class="unlike" style="display:inline-block; cursor:pointer;"><a href="comments.php?postid=<?php echo $postid?>" style="text-decoration:none;color:black;"><i class="fa fa-comments">Comment</i></a></div>&nbsp; &nbsp;

                <div id="bookmark_<?php echo $postid; ?>" class="bookmark" style="display:inline-block; cursor:pointer;"><i class="fa fa-bookmark">Bookmark</i></div><span id="bookmark_<?php echo $postid; ?>"></span>

                <?php 
                if ($userid == $_SESSION['id']){
                echo "<div id='delete_$postid' class='delete' style='display:inline-block; cursor:pointer;float:right;'><i class='fa fa-trash'>Delete</i></div><span id='bookmark_$postid'></span>";
                }
                ?>

            </div>
        </div>
-->
	
		
		
		<div class="clearfix"></div>
		<p>&nbsp;</p>
   <?php
       
   }
   
   ?>
        
  
    
	</div>
</body>
</html>



<script type="text/javascript"> 

function SetNewSize(textarea) {
   textarea.style.height = "0px";
   textarea.style.height = textarea.scrollHeight + "px";
}
    


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
			url: 'post.php',
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

function readURL(input){
    
    if(input.files && input.files[0])
        {
            var reader = new FileReader();
            reader.onload = function (e)
            {
                $('#post_pic')
                .attr('src',e.target.result)
                .css({"width": "100%","height":"auto"})
                .show();
                
            };
            reader.readAsDataURL(input.files[0]);
        }
}
</script>