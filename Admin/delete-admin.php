<?php

include("config.php");
$get_admin_id = $_GET['id'];

$delete_query = "DELETE FROM `admin` WHERE admin_id = '$get_admin_id'";
$result = mysqli_query($cn , $delete_query);

if($result){
    session_start();
    $_SESSION['status'] = "Operation Performed Successfully...";
    header("Location:view-admin.php");
    mysqli_close($cn);
}
else{
    $_SESSION['error'] = "Something went wrong Please Check...";
    header("Location:view-admin.php");

    mysqli_close($cn);
}



?>