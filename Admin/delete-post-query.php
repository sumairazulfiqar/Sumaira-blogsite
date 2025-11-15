<?php

include("config.php");
$get_post_id = $_GET['id'];

$delete_query = "DELETE FROM `posts` WHERE post_id = '$get_post_id'";
$result = mysqli_query($cn , $delete_query);

if($result){
    session_start();
    $_SESSION['status'] = "Operation Performed Successfully...";
    header("Location:view-posts.php");
    mysqli_close($cn);
}
else{
    $_SESSION['error'] = "Something went wrong Please Check...";
    header("Location:view-posts.php");

    mysqli_close($cn);
}



?>