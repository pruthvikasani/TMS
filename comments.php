
<?php
 session_start(); 
 if (!isset($_SESSION['login'])) {
	  
  	header('location: index.php');
	
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Comments</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  
  
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
}

  
</style>
</head>
<header id="header">
     <div class="container">
    <img style="float: left; padding-right: 5px;" src="headerlogo.png">
    <nav id="nav">
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="#">Custom Clusters</a></li>
        <li><a href="pushpull.php">Push to Pull</a></li>
        <li><a href="writepost.php">Voice of Tech</a></li>
        <li><a href="#">Functional Excellence</a></li>
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
<body>
	<div class="container">
	<p>&nbsp;</p>
	
  <!-- The Modal -->

  
  <br>
  <!---POST display card -->
	
	<div class="post_listing"></div>
 
	<p>&nbsp;</p>
	 <h3>Comments </h3>
		<?php $postid = $_GET['postid']; ?>
		
		<div class="comment_listing"></div>
		<h3>Post comments here!</h3>
			<input type = "text" class="name form-control" value="<?php echo $_SESSION['name'] ?>"><br>
			<textarea class="comment form-control" placeholder="Enter your comment here"></textarea>
			<p>&nbsp;</p>
			<a href="javascript:void(0)" class="btn btn-primary submit">Submit</a>
			
		<div class="clearfix"></div>
		<p>&nbsp;</p>
	</div>
</body>
</html>


<script type="text/javascript">
function listComments()
		{
		var postid = "<?php echo $postid ?>";	
		$.ajax({
			url:'comment_list.php',
			data: 'postid='+postid,
			type: 'post',
			success:function(res){
				
				$('.comment_listing').html(res);
				
			}
				})
			
			
		}

function listPost()
		{
		var postid = "<?php echo $postid ?>";	
		$.ajax({
			url:'postin_comment.php',
			data: 'postid='+postid,
			type: 'post',
			success:function(res){
				
				$('.post_listing').html(res);
				
			}
				})
			
			
		}
		
$(function(){
		listComments();
		listPost();
	
			
		$('.submit').click(function() {
			var name = $('.name').val();
			var comment = $('.comment').val();
			var postid = "<?php echo $postid ?>";
			$.ajax({
				url:'save_comment.php',
				data:'name='+name+'&comment='+comment+'&postid='+postid,
				type: 'post',
				success:function()
				{
					alert('Your comment is posted successfully');
					listComments();
				}
			})
		})
	});
</script>