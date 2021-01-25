<?php 

  include "config.php";
  
		
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
  .header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
	
}
 body {
background-color:#e3e3e3;
  }
  
.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
  margin: 0 auto;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}


@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
    </style>
</head>



<body>
    <div class="header">
  <a href="home.php" class="logo" style="margin: 0 auto;">CompanyLogo</a>
  <div class="header-right">
    <a href="home.php">Home</a>
    <a href="#clusters.php">Custom clusters</a>
    <a class="active" href="pushpull.php">Push to Pull</a>
	<a href="writepost.php">Voice of Tech</a>
    <a href="#functional.php">Functional Excellence</a>
    <a href="resource.php">Resource Identification</a>
	<?php 
      
    $link = mysqli_connect("localhost","root","","user_approvals");
    $userid = $_GET['userid'];
    
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
  
  
  
    $user_query = mysqli_query($link,"SELECT * FROM accounts WHERE id=".$userid);
	$get_row = mysqli_fetch_array($user_query);
      
	$fname = $get_row['firstname'];
	$lname = $get_row['lastname'];
	$name = $fname.' '.$lname;
      
    $email = $get_row['email'];
    
    ?>
  </div>
</div>
<div class="container bootstrap snippet">
            <div class="row">
  		        <div class="col-sm-12"><h1><?php echo $name; ?></h1></div>
            </div>
            
                <div class="row">
                    
  		            <div class="col-sm-3"><!--left col-->
                        <div class="text-center">
                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                            
                        </div>  <br>
	

                    <div class="panel panel-default">
                        <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
                        <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
                    </div>
          
                    <div class="profile_stats">
                        <ul class="list-group">
            
            
                        </ul> 
		            </div>
          
                    </div><!--/col-3-->
		            
                    <div class="col-sm-9">

                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    <form>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="first_name"><h4>Name</h4></label>
                                            <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $name ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="email"><h4>Email</h4></label>
                                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $email ?>" readonly>
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
                                                    <?php 
                                                    $link = mysqli_connect("localhost","root","","user_approvals");
  
                                                    $result = mysqli_query($link,"SELECT * FROM profile WHERE id=".$userid);
  

                                                   while($row = mysqli_fetch_array($result))
                                                   {
                                                    $fblink = $row['fblink'];
                                                    $gitlink = $row['gitlink'];
                                                    $twitterlink = $row['twitterlink'];
                                                    $pinlink = $row['pinlink'];
                                                    
                                                   }
                                                    ?>
                                                <center>
                                                    <a href="<?php echo "$fblink"; ?>"><i class="fab fa-facebook fa-2x"></i></a>&nbsp; &nbsp;&nbsp;
                                                    <a href="<?php echo "$gitlink"; ?>"><i class="fab fa-github fa-2x"></i></a> &nbsp; &nbsp;&nbsp;
                                                    <a href="<?php echo "$twitterlink"; ?>"><i class="fab fa-twitter fa-2x"></i></a>&nbsp;&nbsp;&nbsp;
                                                    <a href="<?php echo "$pinlink"; ?>"><i class="fab fa-pinterest fa-2x"></i></a>
                                                </center>
                                                </div>
                                            </div>
                                       </div>    
                                    </form>
                                </div>  <!--Tab pane --> 
                           </div> <!-- Tab content -->
                    </div><!--/col-9-->
                </div>
         
</div><!--/row-->
</body>
</html>

<script>


$(function(){
	var userid = "<?php echo $userid?>";
	$.ajax({
			url:'profile_stats.php',
			data: 'userid='+userid,
			type: 'post',
			success:function(res){
				
				$('.profile_stats').html(res);
				
			}
			})
			
	
    
	
});
    

</script>                                                  