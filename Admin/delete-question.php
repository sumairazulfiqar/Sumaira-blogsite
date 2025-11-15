<?php

include("config.php");
$get_id = $_GET['id'];

$delete_query = "DELETE FROM `faq` WHERE id = '$get_id'";
$result = mysqli_query($cn, $delete_query);

if ($result) {
    session_start();
    $_SESSION['status'] = "Operation Performed Successfully...";
    header("Location:faq.php");
    mysqli_close($cn);
} else {
    $_SESSION['error'] = "Something went wrong Please Check...";
    header("Location:faq.php");

    mysqli_close($cn);
}
