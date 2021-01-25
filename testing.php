
<?php
              
              
        $userid = 1;
        
      


        $link = mysqli_connect("localhost","root","","user_approvals");
	   
	   $pushpull = "";
	   $voiceoftech = "";
       $functional = "";
       $resource = "SFV";
	   
      
	   $editquery = "UPDATE `edit_content` SET `pushpull`= '$pushpull',`voiceoftech`= '$voiceoftech',`functional`='$functional',`resource`='$resource' WHERE userid=".$userid;
	   mysqli_query($link,$editquery);
        
?>