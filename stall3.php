<?php

$HostName = "localhost";

//Define your database username here.
$HostUser = "*********";

//Define your database password here.
$HostPass = "********";

//Define your database name here.
$DatabaseName = "feedback_tti";
 
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
     
 $name = $_POST['name'];
 $email = $_POST['email'];
$rating = $_POST['rating'];
 $department = $_POST['department'];
$feedback = $_POST['feedback'];


 $Sql_Query = "insert into stall1 (name,email,rating,department,feedback) values ('$name','$email','$rating','$department','$feedback')";
 
 if(mysqli_query($con,$Sql_Query)){
 
 echo 'Data Submit Successfully';
   
 }
 else{
 
 echo 'Try Again';
 
 }
 mysqli_close($con);
?>