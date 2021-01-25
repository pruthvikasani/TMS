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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" 
  crossorigin="anonymous">
</head>
<body>


<?php
	
  
  
  $link = mysqli_connect("localhost","root","","user_approvals");
  $postid = mysqli_real_escape_string($link,$_POST['postid']);
  $result = mysqli_query($link,"SELECT * FROM comments WHERE pid = ".$postid." ORDER BY id");
  

   while($row = mysqli_fetch_array($result))
   {
	$userid = $row['userid'];
	
	//to get the username of the user
	$user_query = mysqli_query($link,"SELECT * FROM accounts WHERE id=".$userid);
	
	$get_row = mysqli_fetch_array($user_query);
	$fname = $get_row['firstname'];
	$lname = $get_row['lastname'];
	$name = $fname.' '.$lname;
	
	
    $commentid = $row['id'];
    $name = $row['name'];
    $comment = $row['comment'];
	$comment_date = strtotime($row['comment_date']);
	$date = date('d/m/Y',$comment_date);
	$time = date('h:iA',$comment_date);
    $type = -1;

    // Checking user status
    $status_query = "SELECT count(*) as cntStatus,type FROM likeunlike_comment WHERE userid=".$userid." and commentid=".$commentid;
    $status_result = mysqli_query($link,$status_query);
    $status_row = mysqli_fetch_array($status_result);
    $count_status = $status_row['cntStatus'];
    if($count_status > 0){
      $type = $status_row['type'];
    }

    // Count post total likes and unlikes
    $like_query = "SELECT COUNT(*) AS cntLikes FROM likeunlike_comment WHERE type=1 and commentid=".$commentid;
    $like_result = mysqli_query($link,$like_query);
    $like_row = mysqli_fetch_array($like_result);
    $total_likes = $like_row['cntLikes'];

    $unlike_query = "SELECT COUNT(*) AS cntUnlikes FROM likeunlike_comment WHERE type=0 and commentid=".$commentid;
    $unlike_result = mysqli_query($link,$unlike_query);
    $unlike_row = mysqli_fetch_array($unlike_result);
    $total_unlikes = $unlike_row['cntUnlikes'];

   ?>
	<div class="card">
		<div class="card-body">
		  <p class="card-text"><?php echo $comment ?></p>
		  <div id="like_<?php echo $commentid; ?>" class="like" style="display:inline-block; cursor:pointer;color:#282828;"><i class="fa fa-thumbs-up" >Like</i></div>&nbsp;<span id="likes_<?php echo $commentid; ?>"><?php echo $total_likes; ?></span>&nbsp; &nbsp;
		  <div id="unlike_<?php echo $commentid; ?>" class="unlike" style="display:inline-block; cursor:pointer;color:#282828;"><i class="fa fa-thumbs-down" >Dislike</i></div>&nbsp;<span id="unlikes_<?php echo $commentid; ?>"><?php echo $total_unlikes; ?></span>
		</div>
		<div class="card-footer">
            <p>By <strong><?php echo $name.' '."on".' '.$date.' '."at".' '.$time; ?></strong></p>
		</div>
	</div>
		
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
        var commentid = split_id[1];  // postid
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
            url: 'likeunlike_comment.php',
            type: 'post',
            data: {commentid:commentid,type:type,userid:userid},
            dataType: 'json',
            success: function(data){
                var likes = data['likes'];
                var unlikes = data['unlikes'];

                $("#likes_"+commentid).text(likes);        // setting likes
                $("#unlikes_"+commentid).text(unlikes);    // setting unlikes

                if(type == 1){
                    $("#like_"+commentid).css("color","#0077ea");
                    $("#unlike_"+commentid).css("color","#282828");
                }

                if(type == 0){
                    $("#unlike_"+commentid).css("color","#0077ea");
                    $("#like_"+commentid).css("color","#282828");
                }


            }
            
        });

    });

});
</script>