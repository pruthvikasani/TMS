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
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  
</head>
<body>


<?php
	
	$link = mysqli_connect("localhost","root","","user_approvals");
	$userid = mysqli_real_escape_string($link,$_POST['userid']);
    

    // Count post total likes and unlikes
    $like_query = "SELECT COUNT(*) AS cntLikes FROM like_unlike WHERE type=1 and userid=".$userid;
    $like_result = mysqli_query($link,$like_query);
    $like_row = mysqli_fetch_array($like_result);
    $total_likes = $like_row['cntLikes'];

    $unlike_query = "SELECT COUNT(*) AS cntUnlikes FROM like_unlike WHERE type=0 and userid=".$userid;
    $unlike_result = mysqli_query($link,$unlike_query);
    $unlike_row = mysqli_fetch_array($unlike_result);
    $total_unlikes = $unlike_row['cntUnlikes'];
	
	//count comment likes and unlikes
	$comment_like_query = "SELECT COUNT(*) AS cntLikes FROM likeunlike_comment WHERE type=1 and userid=".$userid;
    $comment_like_result = mysqli_query($link,$comment_like_query);
    $comment_like_row = mysqli_fetch_array($comment_like_result);
    $comment_total_likes = $comment_like_row['cntLikes'];

    $comment_unlike_query = "SELECT COUNT(*) AS cntUnlikes FROM likeunlike_comment WHERE type=0 and userid=".$userid;
    $comment_unlike_result = mysqli_query($link,$comment_unlike_query);
    $comment_unlike_row = mysqli_fetch_array($comment_unlike_result);
    $comment_total_unlikes = $comment_unlike_row['cntUnlikes'];

    $bookmark_query = "SELECT COUNT(*) As cntBookmarks FROM posts WHERE bookmark=1 and userid=".$userid;
    $bookmark_query_result = mysqli_query($link,$bookmark_query);
    $bookmark_row = mysqli_fetch_array($bookmark_query_result);
    $bookmark_total_likes = $bookmark_row['cntBookmarks'];

	$posts_query = "SELECT COUNT(*) AS cnt FROM posts WHERE userid=".$userid;
    $posts_result = mysqli_query($link,$posts_query);
    $posts_row = mysqli_fetch_array($posts_result);
    $posts_count = $posts_row['cnt'];

	$comments_query = "SELECT COUNT(*) AS cntcomments FROM comments WHERE userid=".$userid;
    $comments_result = mysqli_query($link,$comments_query);
    $comments_row = mysqli_fetch_array($comments_result);
    $comments_count = $comments_row['cntcomments'];
    
	
	
   ?>
			<li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
        
            <a href="bookmark_activity.php" style="text-decoration:none;">
            <li class="list-group-item d-flex justify-content-between align-items-center">Bookmark
				<span class="badge badge-primary badge-pill"><?php echo $bookmark_total_likes ?></span>
			</li>
            </a>
	
			<a href="likes_activity.php" style="text-decoration:none;">
            <li class="list-group-item d-flex justify-content-between align-items-center">Likes
				<span class="badge badge-primary badge-pill"><?php echo $total_likes ?></span>
			</li>
            </a>
            
            <a href="unlikes_activity.php" style="text-decoration:none;">
			<li class="list-group-item d-flex justify-content-between align-items-center">Unlikes
				<span class="badge badge-primary badge-pill"><?php echo $total_unlikes ?></span>
			</li>
            </a>
                
            <a href="posts_activity.php" style="text-decoration:none;">   
			<li class="list-group-item d-flex justify-content-between align-items-center">Posts
				<span class="badge badge-primary badge-pill"><?php echo $posts_count ?></span>
			</li>
            </a>
                
            <a href="comments_activity.php" style="text-decoration:none;">
			<li class="list-group-item d-flex justify-content-between align-items-center">Comments
				<span class="badge badge-primary badge-pill"><?php echo $comments_count ?></span>
			</li>
            </a>

</body>
</html>
<script>

</script>