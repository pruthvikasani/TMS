<?php
	
  include("functions.php");
  $link = mysqli_connect("localhost","root","","user_approvals");
  $search_token = mysqli_real_escape_string($link,$_POST['search']);
  
	if (strlen($search_token) >= 3)
	{
		$query = "SELECT * FROM accounts WHERE LOWER(CONCAT(firstname,lastname,email,designation,institute,expertise))LIKE '%".$search_token."%'";
		echo "<h3>Profiles</h3>";
		if(count(fetchAll($query)) > 0)
		{
			
			echo "<div class='row'>";
			
			foreach(fetchAll($query) as $row)
			{
			$name=$row['firstname'].' '.$row['lastname'];
			$designation = $row['designation'];
			$institute = $row['institute'];
			$expertise = $row['expertise'];
			$id = $row['id'];
			
            $image_query = "SELECT * FROM `profile` WHERE id=".$id;
            $image_retrieval = mysqli_query($link,$image_query) or die(mysqli_error($link));
            while ($row = mysqli_fetch_array($image_retrieval))
            {
                $imgPath = $row['profilepic'];
                
            }
			echo "<div class='col-md-4'>
			<div class='card'>
			<div class='card-header'>
			<center>";
            if(!empty($imgPath))
            echo "<center><a href='profilelink.php?userid=$id' ><img src='$imgPath' style='height:150px;width:150px;border-radius:50%'></a></center> <br>";
            else
            echo "<center><a href='profilelink.php?userid=$id'><img src='user.png' style='height: 150px; width: 150px;border-radius:50%;display:inline-block;'/>
            </a></center> <br>";
            
        
			echo "<h2 style='text-align:center'> $name </h2>
			</div>
			<div class='card-body'>
			  <p class='card-text'> <strong>$name</strong> is <strong>$designation</strong> at <strong>$institute</strong> and expertises at <strong>$expertise</strong> </p>
			</div>
			<div class='card-footer'>
				<a href='profilelink.php?id=$id'><center><button id='profile_link' class='btn btn-primary' type='button'>See Profile</button></center></a>
			</div>
			</div>
			</div>";
			}
			
			echo "</div>";
			
		}
		else
		{
			echo "<p>No profiles found</p>";
		
		}		
		
		$postquery = "SELECT * FROM posts WHERE LOWER(CONCAT(title,content))LIKE '%".$search_token."%'";
		echo "<h3>Posts</h3>";
		if(count(fetchAll($postquery)) > 0)
		{
			
			foreach(fetchAll($postquery) as $row)
			{
			$postid=$row['id'];
			$userid=$row['userid'];
			$title = $row['title'];
			$content = $row['content'];
			
			echo "<a href='comments.php?postid=$postid' style='text-decoration:none;color:black;'><div class='card'>
			<div class='card-header'>
			<h2> $title </h2>
			</div>
			<div class='card-body'>
			  <p class='card-text'> $content</p>
			</div>
			</div>
			</a>";
			}
			
			
			
		}
		
		else
		{
			
			echo "<p>No posts found</p>";
		}

		
	}
	else
	echo"<script>alert('Please enter a better keyword');</script>";


	?>