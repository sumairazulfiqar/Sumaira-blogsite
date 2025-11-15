<?php

include("config.php");
$get_id = $_GET['id'];

$positive_qry = "UPDATE `users_messages` SET `user_status`=2  WHERE user_id='$get_id'";

$result = mysqli_query($cn, $positive_qry);

if ($result) {
    session_start();
    $_SESSION['status'] = "Operation Performed Successfully...";
    header("Location:user-messages.php");
    mysqli_close($cn);
} else {
    $_SESSION['error'] = "Something went wrong Please Check...";
    header("Location:user-messages.php");

    mysqli_close($cn);
}
