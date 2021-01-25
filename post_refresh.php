<?php
 session_start(); 
 if (!isset($_SESSION['login'])) {
	  
  	header('location: index.php');
	
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
  integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>


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
	$post_date = $row['timestamp'];
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

   ?>
	
	
	<div class="card">
		<a href="comments.php?postid=<?php echo $postid?>" style="text-decoration:none;color:black;">
		<div class="card-header">
		<h2><?php echo $title; ?></h2>
		</div>
		</a>
		<div class="card-body">
		  <p class="card-text"><?php echo $content ?></p>
		  <div id="like_<?php echo $postid; ?>" class="like" style="display:inline-block; cursor:pointer;"><i class="fa fa-thumbs-up" >Like</i></div>&nbsp;<span id="likes_<?php echo $postid; ?>"><?php echo $total_likes; ?></span>&nbsp; &nbsp; 
		  <div id="unlike_<?php echo $postid; ?>" class="unlike" style="display:inline-block; cursor:pointer;color:"><i class="fa fa-thumbs-down" >Dislike</i></div>&nbsp;<span id="unlikes_<?php echo $postid; ?>"><?php echo $total_unlikes; ?></span>
		</div>
		
		<div class="card-footer">
			<p>Posted by <?php echo "<strong>$name</strong> on".' '.$post_date; ?></p>
		</div>
	</div>
	
		
		
		<div class="clearfix"></div>
		<p>&nbsp;</p>
   <?php
   }
   ?>

</body>
</html>

<script>
$(document).ready(function(){

    // like and unlike click
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

                if(type == 1){
                    $("#like_"+postid).css("color","#0077ea");
                    $("#unlike_"+postid).css("color","#282828");
                }

                if(type == 0){
                    $("#unlike_"+postid).css("color","#0077ea");
                    $("#like_"+postid).css("color","#282828");
                }


            }
            
        });

    });

});
</script>