<?php

include("config.php");
$get_id = $_GET['id'];

$delete_query = "DELETE FROM `users_messages` WHERE user_id = '$get_id'";
$result = mysqli_query($cn , $delete_query);

if($result){
    session_start();
    $_SESSION['status'] = "Operation Performed Successfully...";
    header("Location:user-messages.php");
    mysqli_close($cn);
}
else{
    $_SESSION['error'] = "Something went wrong Please Check...";
    header("Location:user-messages.php");

    mysqli_close($cn);
}



?>