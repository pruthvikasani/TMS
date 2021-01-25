<?php

include "config.php";


$commentid = $_POST['commentid'];
$type = $_POST['type'];
$userid = $_POST['userid'];

// Check entry within table
$query = "SELECT COUNT(*) AS cntpost FROM likeunlike_comment WHERE commentid=".$commentid." and userid=".$userid;
$result = mysqli_query($con,$query);
$fetchdata = mysqli_fetch_array($result);
$count = $fetchdata['cntpost'];


if($count == 0){
    $insertquery = "INSERT INTO likeunlike_comment(userid,commentid,type) values(".$userid.",".$commentid.",".$type.")";
    mysqli_query($con,$insertquery);
}else {
    $updatequery = "UPDATE likeunlike_comment SET type=" . $type . " where userid=" . $userid . " and commentid=" . $commentid;
    mysqli_query($con,$updatequery);
}


// count numbers of like and unlike in post
$query = "SELECT COUNT(*) AS cntLike FROM likeunlike_comment WHERE type=1 and commentid=".$commentid;
$result = mysqli_query($con,$query);
$fetchlikes = mysqli_fetch_array($result);
$totalLikes = $fetchlikes['cntLike'];

$query = "SELECT COUNT(*) AS cntUnlike FROM likeunlike_comment WHERE type=0 and commentid=".$commentid;
$result = mysqli_query($con,$query);
$fetchunlikes = mysqli_fetch_array($result);
$totalUnlikes = $fetchunlikes['cntUnlike'];

// initalizing array
$return_arr = array("likes"=>$totalLikes,"unlikes"=>$totalUnlikes);

echo json_encode($return_arr);