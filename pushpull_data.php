<?php 
session_start();
include("functions.php");
	   
	   if (!isset($_SESSION['login'])) {
	  
  	header('location: index.php');
	}
	
	if(isset($_POST['logout']))
	{
		session_destroy();
		header('location: index.php');
	} 
	if(isset($_POST['update']))
	{
		//database 
		$userid = $_SESSION['id'];
		//$query = "INSERT INTO `requests` (`id`, `firstname`, `lastname`, `email`, `password`, `message`, `date`) 
		//VALUES (NULL, '$fname', '$lname', '$email', '$password', '$message', CURRENT_TIMESTAMP);";
		$pushpull = $_POST['pushpull'];
	   $voiceoftech = $_POST['voiceoftech'];
       $functional = $_POST['functional'];
       $resource = $_POST['resource'];
	   
		
		$editquery = "UPDATE edit_content SET pushpull= '$pushpull',voiceoftech`= '$voiceoftech',`functional`='$functional',`resource`='$resource' WHERE userid=".$userid;
	   
		if(performQuery($editquery))
		{
			echo"<script>alert('Your changes will reflect on the main website.')</script>";
			
		}
		else
		{
			echo"<script>alert('Unknown error occured')</script>";
		}
		}
		
		
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Admin Console</title>

    <!-- Bootstrap core CSS -->
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
	@import url('https://fonts.googleapis.com/css?family=Cabin');
body {font-family: 'Cabin', sans-serif;}
	
	
	</style>
  </head>

  

    <header>
      
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            
            <strong>Hello, <?php echo 'admin'?></strong>
          </a>
		  <div class="pull-right">
		  
                <a href="console.php" style="text-decoration:none;color:white;"><button name="edit" style="background:white;" class="btn btn-default my-2">Home</button></a>
                <a href="pushpull_data.php" style="text-decoration:none;color:white;"><button name="edit" class="btn btn-warning my-2 active">Push to Pull</button></a>
                <a href="voiceoftech_data.php" style="text-decoration:none;color:white;"><button name="edit" class="btn btn btn-primary my-2">Voice of Tech</button></a>
                <a href="#" data-toggle="modal" data-target="#myModal" style="text-decoration:none;color:white;"><button name="edit" class="btn btn-info my-2">Edit Content</button></a>
				<button name="logout" class="btn btn-danger my-2">Logout</button>
			
		  </div>
        </div>
      </div>
    </header>
    
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
    
    
    <body>
   
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
				<textarea class="form-control" onKeyUp="SetNewSize(this);" name="pushpull" rows="3" id="pushpull" placeholder="About Push and Pull"><?php echo $pushpull ?></textarea><br>
				<textarea class="form-control" onKeyUp="SetNewSize(this);" rows="3" name="voiceoftech" id="voiceoftech" placeholder="About Voice of Tech"><?php echo $voiceoftech ?></textarea> <br>
                 <textarea class="form-control" onKeyUp="SetNewSize(this);" name="functional" rows="2" id="functional" placeholder="About Functional Excellence"><?php echo $functional ?></textarea><br>
				<textarea class="form-control" onKeyUp="SetNewSize(this);" rows="3" name="resource" id="resource" placeholder="About Resource Identification"><?php echo $resource ?></textarea>
                <img id="post_pic" style="display: none;margin: 0 auto;" src="user.png"> 
			 </div>
		</form>
            
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
<!--
            <form method="post" enctype="multipart/form-data">
                <input type="file" onchange="readURL(this)" name="file" id="file" style="display: none;"></form>
            <button type="button" class="btn btn-default mr-auto" id="image_button"><i class="far fa-image"></i></button>
-->
		    <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" id="post" data-dismiss="modal">Add Post</button>
        </div>
        
      </div>
    </div>
  </div>
	<?php
	
		 $query = "SELECT * FROM `pushpull`;";
			if(count(fetchAll($query)) > 0)
			{
				echo "<table class='table'>
				<thead>
				  <tr>
					<th>ID</th>
					<th>Name</th>
					<th>Title</th>
					<th>University Name?</th>
					<th>Forum Published?</th>
					<th>Relevant to TITAN?</th>
					<th>Where and How?</th>
					<th>View</th>
					<th>Submitted time</th>
				  </tr>
				</thead>
				<tbody>";
				foreach(fetchAll($query) as $row)
				{
					
				
				echo "<tr>
					<td>".$row['userid']."</td>";
    
					$user_query = "SELECT * FROM `accounts` WHERE id=".$userid;
                    $user_retrieval = mysqli_query($link,$user_query) or die(mysqli_error($link));
      
                    $row_user = mysqli_fetch_array($user_retrieval);
                    $fname = $row_user['firstname'];
                    $lname = $row_user['lastname'];
                    $name = $fname.' '.$lname;
                    
                    echo
					"<td>".$name."</td>
					<td>".$row['title']."</td>
					<td>".$row['univname']."</td>   
					<td>".$row['forum']."</td>
					<td>".$row['relevant']."</td>
                    <td>".$row['wherehow']."</td>
					<td><a href='".$row['paper_location']."' target='_new'>View</a></td>
					<td>".$row['timestamp']."</td>
				  </tr>" ?>
				
				<?php 
				}
				echo"</tbody>
			  </table>";
        
				
			}
				else{
					
					echo "<p style='text-align:center; padding-top:50px;'>No pending requests </p>";
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
    
    $('button#post').click(function() {
			
			$.ajax({
			type: 'POST',
			url: 'edit_content.php',
			data: $('form.questionform').serialize(),
			success: function(message){
				if (message == 1)
                    alert("Changes made successfully");
                else
                    alert("Unknown error. Try again");

			},
			error: function(){
			alert("Error");
			}
			})
			
		});
});
</script>